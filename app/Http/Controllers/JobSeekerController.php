<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSeeker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;
use App\Exports\JobSeekerExport;
use Maatwebsite\Excel\Facades\Excel;

class JobSeekerController extends Controller
{
   public function store(Request $request)
{
    $jobAreaInput = $request->input('job_areas');
    $selectedJobAreas = [];

    if (is_array($jobAreaInput)) {
        $selectedJobAreas = $jobAreaInput;
    } elseif (is_string($jobAreaInput) && !empty($jobAreaInput)) {
        $selectedJobAreas = array_map('trim', explode(',', $jobAreaInput));
        $selectedJobAreas = array_filter($selectedJobAreas);
    }

    $baseRules = [
        'job_areas' => 'required',
        'given_name' => 'required|string|max:255',
        'family_name' => 'required|string|max:255',
        'dob' => 'required|date|before:today',
        'address' => 'required|string|max:500',
        'mobile_no' => 'required|string|max:20',
        'personal_email' => 'required|email|max:255|unique:job_seekers,personal_email',
        'total_experience' => 'required|integer|min:0',
        'current_city' => 'required|string|size:3|alpha',
        'willing_to_relocate' => 'required|in:Yes,No',
        'preferred_cities' => 'nullable|string|max:255|required_if:willing_to_relocate,Yes',
        'current_salary' => 'nullable|numeric|min:0',
        'cv_upload' => 'required|file|mimes:pdf,doc,docx|max:2048',
        'agree_terms' => 'required|accepted',
    ];

    $dynamicRules = [];

    foreach ($selectedJobAreas as $jobArea) {
        switch ($jobArea) {
            case 'Fresher/New Entrant':
                $dynamicRules = array_merge($dynamicRules, [
                    'no_prior_experience' => 'required|in:Yes,No',
                    'completed_travel_course' => 'required|in:Yes,No',
                    'institution_name' => 'nullable|string|max:255|required_if:completed_travel_course,Yes',
                    'institution_city' => 'nullable|string|max:255|required_if:completed_travel_course,Yes',
                ]);
                break;

            case 'Domestic Travel':
                $dynamicRules = array_merge($dynamicRules, [
                    'domestic_gds_itinerary' => 'nullable|in:Yes,No',
                    'domestic_pnr_adult' => 'nullable|in:Yes,No',
                    'domestic_pnr_child_infant' => 'nullable|in:Yes,No',
                    'domestic_senior_citizen_fares' => 'nullable|in:Yes,No',
                    'domestic_student_fares' => 'nullable|in:Yes,No',
                    'domestic_youth_special_fares' => 'nullable|in:Yes,No',
                    'domestic_fare_mask' => 'nullable|in:Yes,No',
                    'domestic_ticketing_gds' => 'nullable|in:Yes,No',
                    'domestic_lcc_websites' => 'nullable|in:Yes,No',
                    'domestic_supplier_portal' => 'nullable|in:Yes,No',
                    'domestic_gds_type' => 'nullable|string|max:255|required_if:domestic_ticketing_gds,Yes',
                    'domestic_gds_other_name' => 'nullable|string|max:255|required_if:domestic_gds_type,Other',
                    'domestic_supplier_portal_name' => 'nullable|string|max:255|required_if:domestic_supplier_portal,Yes',
                ]);
                break;

            case 'Hotel Bookings & Car Hire':
                $dynamicRules = array_merge($dynamicRules, [
                    'hotel_bookings_india' => 'nullable|in:Yes,No',
                    'hotel_contact_direct' => 'nullable|in:Yes,No',
                    'hotel_consolidator_websites' => 'nullable|in:Yes,No',
                    'hotel_local_dmc' => 'nullable|in:Yes,No',
                    'car_hire_city' => 'nullable|in:Yes,No',
                    'car_hire_other_cities' => 'nullable|in:Yes,No',
                ]);
                break;

            // Add other cases as needed...
        }
    }

    $rules = array_merge($baseRules, $dynamicRules);
    $validatedData = $request->validate($rules);

    // Handle CV upload
    $cvPath = null;
    if ($request->hasFile('cv_upload')) {
        $cvPath = $request->file('cv_upload')->store('cvs', 'public');
    }

    $dataToStore = $validatedData;

    // Convert only submitted Yes/No fields to 1/0
    foreach ($validatedData as $key => $value) {
        if (in_array($value, ['Yes', 'No'])) {
            $dataToStore[$key] = $value === 'Yes' ? 1 : 0;
        }
    }

    $dataToStore['job_areas'] = json_encode($selectedJobAreas);
    $dataToStore['cv_path'] = $cvPath;

    try {
        JobSeeker::create($dataToStore);
        return redirect()->back()->with('success', 'Your profile has been submitted successfully!');
    } catch (\Exception $e) {
        \Log::error('Error saving job seeker: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while submitting your profile.')->withInput();
    }
}



    public function generateProfilePdf($id)
    {
        $jobSeeker = JobSeeker::find($id);

        if (!$jobSeeker) {
            return redirect()->back()->with('error', 'Job Seeker not found.');
        }

        // Decode job_areas from JSON to array
        $jobAreas = json_decode($jobSeeker->job_areas, true) ?? [];

        // Map job_areas to section identifiers used in the Blade template
        $sectionMapping = [

            'Domestic Travel' => 'domestic_travel_skills',
            'Hotel Bookings & Car Hire' => 'hotel_car_hire_skills',
            'International Travel - Basic Skills' => 'international_travel_basic_skills',
            'International Travel - Advanced Skills' => 'international_travel_advanced_skills',
            'VISA Handling' => 'visa_processing_skills',
            'Tours and Holiday Packages' => 'tours_packages_skills',
            'Accounting' => 'accounting_skills',
            'Cargo Handlers' => 'cargo_handlers',
            'Fresher/New Entrant' => 'fresher_skill', // Map to domestic_travel_skills for fresher-related fields
        ];

        // Create selectedSections array, always include personal_information and curriculum_vitae
        $selectedSections = [
            'personal_information',
            'curriculum_vitae',
        ];

        // Add sections based on job_areas
        foreach ($jobAreas as $jobArea) {
            if (isset($sectionMapping[$jobArea]) && !in_array($sectionMapping[$jobArea], $selectedSections)) {
                $selectedSections[] = $sectionMapping[$jobArea];
            }
        }

        // Remove duplicates (in case of overlap, e.g., Fresher mapping to domestic_travel_skills)
        $selectedSections = array_unique($selectedSections);

        $pdf = Pdf::loadView('pdfs.jobseeker_profile', compact('jobSeeker', 'selectedSections'));
        $givenName = Str::slug($jobSeeker->given_name);
        $familyName = Str::slug($jobSeeker->family_name);
        $pdfFileName = $givenName . '_' . $familyName . '_Profile.pdf';

        return $pdf->download($pdfFileName);
    }
    public function jobseekersdatapage()
    {
        return view("Dashboard.Pages.jobseekers");
    }

    public function export()
    {
        $fileName = 'job_seeker_full_data_' . now()->format('Y-m-d_His') . '.xlsx';
        return Excel::download(new JobSeekerExport, $fileName);
    }

    public function jobseekersdata(Request $request)
    {
        if ($request->ajax()) {
            $data = JobSeeker::select('id', 'given_name', 'family_name', 'personal_email', 'mobile_no', 'total_experience', 'cv_path', 'created_at');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('cv_download', function (JobSeeker $jobSeeker) {
                    if ($jobSeeker->cv_path) {
                        $url = route('jobseeker.download_cv', ['id' => $jobSeeker->id]);
                        return '<a href="' . $url . '" class="btn btn-sm btn-info"><i class="fas fa-download"></i> Download CV</a>';
                    }
                    return 'N/A';
                })
                ->addColumn('profile_pdf', function (JobSeeker $jobSeeker) {
                    $url = route('jobseeker.generate_profile_pdf', ['id' => $jobSeeker->id]);
                    return '<a href="' . $url . '" class="btn btn-sm btn-primary"><i class="fas fa-file-pdf"></i> Download Profile PDF</a>';
                })
                ->addColumn('created_at_formatted', function (JobSeeker $jobSeeker) {
                    return $jobSeeker->created_at->format('Y-m-d H:i:s');
                })
                ->rawColumns(['cv_download', 'profile_pdf'])
                ->make(true);
        }
        abort(403, 'Unauthorized access.');
    }

    public function downloadCv($id)
    {
        $jobSeeker = JobSeeker::find($id);

        if (!$jobSeeker || !$jobSeeker->cv_path) {
            return redirect()->back()->with('error', 'CV file not found or path is missing.');
        }

        if (!Storage::disk('public')->exists($jobSeeker->cv_path)) {
            \Log::error('CV file not found on public disk: ' . $jobSeeker->cv_path);
            return redirect()->back()->with('error', 'CV file does not exist on the server.');
        }

        $extension = pathinfo($jobSeeker->cv_path, PATHINFO_EXTENSION);
        $givenName = Str::slug($jobSeeker->given_name);
        $familyName = Str::slug($jobSeeker->family_name);
        $newFileName = $givenName . '_' . $familyName . '_CV.' . $extension;

        return Storage::disk('public')->download($jobSeeker->cv_path, $newFileName);
    }
}