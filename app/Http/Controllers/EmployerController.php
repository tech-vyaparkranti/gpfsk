<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;
use App\Exports\EmployerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr; // Import Arr helper

class EmployerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Base validation rules for fields that are always required
        $validationRules = [
            'given_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile_no' => 'required|string|max:255',
            'personal_email' => 'required|string|email|max:255|unique:employers,contact_email',
            'total_experience' => 'nullable|integer',
            'job_areas' => 'required', // Allow string or array
            'agree_terms' => 'required|accepted',
        ];

        // Get job_areas and ensure it's an array
        $jobAreas = Arr::wrap($request->input('job_areas', []));

        // Add validation for job_areas to ensure valid values
        $validationRules['job_areas.*'] = 'in:Domestic Travel,Hotel Bookings & Car Hire,International Travel - Basic Skills,International Travel - Advanced Skills,VISA Handling,Tours and Holiday Packages,Accounting,Cargo Handlers,Fresher/New Entrant';

        // Dynamically add validation rules based on selected job areas
        if (in_array('Domestic Travel', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'domestic_gds_itinerary' => 'nullable|in:Yes,No',
                'domestic_pnr_adult' => 'nullable|in:Yes,No',
                'domestic_pnr_child_infant' => 'nullable|in:Yes,No',
                'domestic_senior_citizen_fares' => 'nullable|in:Yes,No',
                'domestic_student_fares' => 'nullable|in:Yes,No',
                'domestic_youth_special_fares' => 'nullable|in:Yes,No',
                'domestic_fare_mask' => 'nullable|in:Yes,No',
                'domestic_ticketing_gds' => 'nullable|in:Yes,No',
                'domestic_gds_type' => 'nullable|string',
                'domestic_gds_other_name' => 'nullable|string',
                'domestic_lcc_websites' => 'nullable|in:Yes,No',
                'domestic_supplier_portal' => 'nullable|in:Yes,No',
                'domestic_supplier_portal_name' => 'nullable|string',
            ]);
        }

        if (in_array('Hotel Bookings & Car Hire', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'hotel_bookings_india' => 'nullable|in:Yes,No',
                'hotel_contact_direct' => 'nullable|in:Yes,No',
                'hotel_consolidator_websites' => 'nullable|in:Yes,No',
                'hotel_local_dmc' => 'nullable|in:Yes,No',
                'car_hire_city' => 'nullable|in:Yes,No',
                'car_hire_other_cities' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('International Travel - Basic Skills', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'intl_gds_itinerary' => 'nullable|in:Yes,No',
                'intl_pnr_child_infant' => 'nullable|in:Yes,No',
                'intl_senior_citizen_fares' => 'nullable|in:Yes,No',
                'intl_student_fares' => 'nullable|in:Yes,No',
                'intl_youth_special_fares' => 'nullable|in:Yes,No',
                'intl_fare_mask' => 'nullable|in:Yes,No',
                'intl_gds_type' => 'nullable|string',
                'intl_gds_other_name' => 'nullable|string',
                'intl_queue_pnrs' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('International Travel - Advanced Skills', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'intl_first_reissue' => 'nullable|in:Yes,No',
                'intl_subsequent_reissue' => 'nullable|in:Yes,No',
                'intl_ticket_refunds' => 'nullable|in:Yes,No',
                'intl_hotac_rooms' => 'nullable|in:Yes,No',
                'intl_group_pnr' => 'nullable|in:Yes,No',
                'intl_issue_emd' => 'nullable|in:Yes,No',
                'intl_standalone_emd' => 'nullable|in:Yes,No',
                'intl_associated_emd' => 'nullable|in:Yes,No',
                'intl_mng_queues_upd_pnrs' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('VISA Handling', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'visa_aware_procedures' => 'nullable|in:Yes,No',
                'visa_handled_personally' => 'nullable|in:Yes,No',
                'visa_in_department' => 'nullable|in:Yes,No',
                'visa_usa' => 'nullable|in:Yes,No',
                'visa_canada' => 'nullable|in:Yes,No',
                'visa_mexico' => 'nullable|in:Yes,No',
                'visa_brazil' => 'nullable|in:Yes,No',
                'visa_other_south_america' => 'nullable|in:Yes,No',
                'visa_uk' => 'nullable|in:Yes,No',
                'visa_ireland' => 'nullable|in:Yes,No',
                'visa_haj_umrah' => 'nullable|in:Yes,No',
                'visa_uae' => 'nullable|in:Yes,No',
                'visa_schengen_countries' => 'nullable|string',
                'visa_russia' => 'nullable|in:Yes,No',
                'visa_china' => 'nullable|in:Yes,No',
                'visa_vietnam' => 'nullable|in:Yes,No',
                'visa_cambodia' => 'nullable|in:Yes,No',
                'visa_hongkong' => 'nullable|in:Yes,No',
                'visa_philippines' => 'nullable|in:Yes,No',
                'visa_singapore' => 'nullable|in:Yes,No',
                'visa_malaysia' => 'nullable|in:Yes,No',
                'visa_australia' => 'nullable|in:Yes,No',
                'visa_newzealand' => 'nullable|in:Yes,No',
                'visa_draft_cover_note' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('Tours and Holiday Packages', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'tours_handled_packages' => 'nullable|in:Yes,No',
                'tours_countries' => 'nullable|string',
                'tours_worked_cost' => 'nullable|in:Yes,No',
                'tours_incentive_groups' => 'nullable|in:Yes,No',
                'tours_mice_groups' => 'nullable|in:Yes,No',
                'tours_cruise_pax' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('Accounting', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'acc_record_transactions' => 'nullable|in:Yes,No',
                'acc_bank_cc_reconciliation' => 'nullable|in:Yes,No',
                'acc_corporate_card_reconciliation' => 'nullable|in:Yes,No',
                'acc_track_commissions' => 'nullable|in:Yes,No',
                'acc_submit_invoices' => 'nullable|in:Yes,No',
                'acc_manage_financial_records' => 'nullable|in:Yes,No',
                'acc_software_excel_proficient' => 'nullable|in:Yes,No',
                'acc_prepare_analyze_reports' => 'nullable|in:Yes,No',
                'acc_ensure_compliance' => 'nullable|in:Yes,No',
                'acc_manage_ap_ar' => 'nullable|in:Yes,No',
                'acc_process_payroll_expenses' => 'nullable|in:Yes,No',
                'acc_calculate_pay_taxes' => 'nullable|in:Yes,No',
                'acc_coordinate_auditors' => 'nullable|in:Yes,No',
                'acc_monitor_cashflow_forecast' => 'nullable|in:Yes,No',
                'acc_reconcile_bsp' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('Cargo Handlers', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'customs_documentation_knowledge' => 'nullable|in:Yes,No',
                'iata_dg_certification' => 'nullable|in:Yes,No',
                'airline_negotiation' => 'nullable|in:Yes,No',
                'air_waybill_execution' => 'nullable|in:Yes,No',
                'regulations_compliance' => 'nullable|in:Yes,No',
                'shipping_bill_knowledge' => 'nullable|in:Yes,No',
                'pharma_shipment_handling' => 'nullable|in:Yes,No',
                'live_animal_handling' => 'nullable|in:Yes,No',
                'perishable_shipment_handling' => 'nullable|in:Yes,No',
                'incoterms_knowledge' => 'nullable|in:Yes,No',
            ]);
        }

        if (in_array('Fresher/New Entrant', $jobAreas)) {
            $validationRules = array_merge($validationRules, [
                'no_prior_experience' => 'required|in:Yes,No',
                'completed_travel_course' => 'required|in:Yes,No',
                'institution_name' => 'nullable|string|max:255',
                'institution_city' => 'nullable|string|max:255',
            ]);

            // Conditional validation for institution fields if completed_travel_course is Yes
            if ($request->input('completed_travel_course') === 'Yes') {
                $validationRules['institution_name'] = 'required|string|max:255';
                $validationRules['institution_city'] = 'required|string|max:255';
            }
        }

        // Validate the request with dynamic rules
        $validatedData = $request->validate($validationRules);

        // Create the employer record
        $employer = Employer::create([
            'company_name' => $validatedData['given_name'],
            'contact_person' => $validatedData['family_name'],
            'address' => $validatedData['address'],
            'contact_mobile' => $validatedData['mobile_no'],
            'contact_email' => $validatedData['personal_email'],
            'min_travel_trade_experience_years' => $validatedData['total_experience'],
            'job_areas' => json_encode($jobAreas), // Store as JSON
            'desired_domestic_travel_expertise' => in_array('Domestic Travel', $jobAreas),
            'desired_hotel_car_hire_expertise' => in_array('Hotel Bookings & Car Hire', $jobAreas),
            'desired_international_travel_expertise' => in_array('International Travel - Basic Skills', $jobAreas) || in_array('International Travel - Advanced Skills', $jobAreas),
            'desired_visa_handling_expertise' => in_array('VISA Handling', $jobAreas),
            'desired_tours_holiday_packages_expertise' => in_array('Tours and Holiday Packages', $jobAreas),
            'desired_accounting_expertise' => in_array('Accounting', $jobAreas),
            'desired_cargo_handlers_expertise' => in_array('Cargo Handlers', $jobAreas),
            'desired_fresher_expertise' => in_array('Fresher/New Entrant', $jobAreas),

            // Domestic Travel
            'domestic_gds_itinerary' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_gds_itinerary') === 'Yes') : false,
            'domestic_pnr_adult' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_pnr_adult') === 'Yes') : false,
            'domestic_pnr_child_infant' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_pnr_child_infant') === 'Yes') : false,
            'domestic_senior_citizen_fares' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_senior_citizen_fares') === 'Yes') : false,
            'domestic_student_fares' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_student_fares') === 'Yes') : false,
            'domestic_youth_special_fares' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_youth_special_fares') === 'Yes') : false,
            'domestic_fare_mask' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_fare_mask') === 'Yes') : false,
            'domestic_ticketing_gds' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_ticketing_gds') === 'Yes') : false,
            'domestic_gds_type' => in_array('Domestic Travel', $jobAreas) ? $request->input('domestic_gds_type') : null,
            'domestic_gds_other_name' => in_array('Domestic Travel', $jobAreas) ? $request->input('domestic_gds_other_name') : null,
            'domestic_lcc_websites' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_lcc_websites') === 'Yes') : false,
            'domestic_supplier_portal' => in_array('Domestic Travel', $jobAreas) ? ($request->input('domestic_supplier_portal') === 'Yes') : false,
            'domestic_supplier_portal_name' => in_array('Domestic Travel', $jobAreas) ? $request->input('domestic_supplier_portal_name') : null,

            // Hotel Bookings & Car Hire
            'hotel_bookings_india' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('hotel_bookings_india') === 'Yes') : false,
            'hotel_contact_direct' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('hotel_contact_direct') === 'Yes') : false,
            'hotel_consolidator_websites' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('hotel_consolidator_websites') === 'Yes') : false,
            'hotel_local_dmc' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('hotel_local_dmc') === 'Yes') : false,
            'car_hire_city' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('car_hire_city') === 'Yes') : false,
            'car_hire_other_cities' => in_array('Hotel Bookings & Car Hire', $jobAreas) ? ($request->input('car_hire_other_cities') === 'Yes') : false,

            // International Travel - Basic Skills
            'intl_gds_itinerary' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_gds_itinerary') === 'Yes') : false,
            'intl_pnr_child_infant' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_pnr_child_infant') === 'Yes') : false,
            'intl_senior_citizen_fares' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_senior_citizen_fares') === 'Yes') : false,
            'intl_student_fares' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_student_fares') === 'Yes') : false,
            'intl_youth_special_fares' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_youth_special_fares') === 'Yes') : false,
            'intl_fare_mask' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_fare_mask') === 'Yes') : false,
            'intl_gds_type' => in_array('International Travel - Basic Skills', $jobAreas) ? $request->input('intl_gds_type') : null,
            'intl_gds_other_name' => in_array('International Travel - Basic Skills', $jobAreas) ? $request->input('intl_gds_other_name') : null,
            'intl_queue_pnrs' => in_array('International Travel - Basic Skills', $jobAreas) ? ($request->input('intl_queue_pnrs') === 'Yes') : false,

            // International Travel - Advanced Skills
            'intl_first_reissue' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_first_reissue') === 'Yes') : false,
            'intl_subsequent_reissue' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_subsequent_reissue') === 'Yes') : false,
            'intl_ticket_refunds' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_ticket_refunds') === 'Yes') : false,
            'intl_hotac_rooms' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_hotac_rooms') === 'Yes') : false,
            'intl_group_pnr' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_group_pnr') === 'Yes') : false,
            'intl_issue_emd' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_issue_emd') === 'Yes') : false,
            'intl_standalone_emd' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_standalone_emd') === 'Yes') : false,
            'intl_associated_emd' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_associated_emd') === 'Yes') : false,
            'intl_mng_queues_upd_pnrs' => in_array('International Travel - Advanced Skills', $jobAreas) ? ($request->input('intl_mng_queues_upd_pnrs') === 'Yes') : false,

            // VISA Handling
            'visa_aware_procedures' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_aware_procedures') === 'Yes') : false,
            'visa_handled_personally' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_handled_personally') === 'Yes') : false,
            'visa_in_department' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_in_department') === 'Yes') : false,
            'visa_usa' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_usa') === 'Yes') : false,
            'visa_canada' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_canada') === 'Yes') : false,
            'visa_mexico' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_mexico') === 'Yes') : false,
            'visa_brazil' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_brazil') === 'Yes') : false,
            'visa_other_south_america' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_other_south_america') === 'Yes') : false,
            'visa_uk' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_uk') === 'Yes') : false,
            'visa_ireland' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_ireland') === 'Yes') : false,
            'visa_haj_umrah' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_haj_umrah') === 'Yes') : false,
            'visa_uae' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_uae') === 'Yes') : false,
            'visa_schengen_countries' => in_array('VISA Handling', $jobAreas) ? $request->input('visa_schengen_countries') : null,
            'visa_russia' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_russia') === 'Yes') : false,
            'visa_china' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_china') === 'Yes') : false,
            'visa_vietnam' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_vietnam') === 'Yes') : false,
            'visa_cambodia' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_cambodia') === 'Yes') : false,
            'visa_hongkong' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_hongkong') === 'Yes') : false,
            'visa_philippines' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_philippines') === 'Yes') : false,
            'visa_singapore' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_singapore') === 'Yes') : false,
            'visa_malaysia' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_malaysia') === 'Yes') : false,
            'visa_australia' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_australia') === 'Yes') : false,
            'visa_newzealand' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_newzealand') === 'Yes') : false,
            'visa_draft_cover_note' => in_array('VISA Handling', $jobAreas) ? ($request->input('visa_draft_cover_note') === 'Yes') : false,

            // Tours and Holiday Packages
            'tours_handled_packages' => in_array('Tours and Holiday Packages', $jobAreas) ? ($request->input('tours_handled_packages') === 'Yes') : false,
            'tours_countries' => in_array('Tours and Holiday Packages', $jobAreas) ? $request->input('tours_countries') : null,
            'tours_worked_cost' => in_array('Tours and Holiday Packages', $jobAreas) ? ($request->input('tours_worked_cost') === 'Yes') : false,
            'tours_incentive_groups' => in_array('Tours and Holiday Packages', $jobAreas) ? ($request->input('tours_incentive_groups') === 'Yes') : false,
            'tours_mice_groups' => in_array('Tours and Holiday Packages', $jobAreas) ? ($request->input('tours_mice_groups') === 'Yes') : false,
            'tours_cruise_pax' => in_array('Tours and Holiday Packages', $jobAreas) ? ($request->input('tours_cruise_pax') === 'Yes') : false,

            // Accounting
            'acc_record_transactions' => in_array('Accounting', $jobAreas) ? ($request->input('acc_record_transactions') === 'Yes') : false,
            'acc_bank_cc_reconciliation' => in_array('Accounting', $jobAreas) ? ($request->input('acc_bank_cc_reconciliation') === 'Yes') : false,
            'acc_corporate_card_reconciliation' => in_array('Accounting', $jobAreas) ? ($request->input('acc_corporate_card_reconciliation') === 'Yes') : false,
            'acc_track_commissions' => in_array('Accounting', $jobAreas) ? ($request->input('acc_track_commissions') === 'Yes') : false,
            'acc_submit_invoices' => in_array('Accounting', $jobAreas) ? ($request->input('acc_submit_invoices') === 'Yes') : false,
            'acc_manage_financial_records' => in_array('Accounting', $jobAreas) ? ($request->input('acc_manage_financial_records') === 'Yes') : false,
            'acc_software_excel_proficient' => in_array('Accounting', $jobAreas) ? ($request->input('acc_software_excel_proficient') === 'Yes') : false,
            'acc_prepare_analyze_reports' => in_array('Accounting', $jobAreas) ? ($request->input('acc_prepare_analyze_reports') === 'Yes') : false,
            'acc_ensure_compliance' => in_array('Accounting', $jobAreas) ? ($request->input('acc_ensure_compliance') === 'Yes') : false,
            'acc_manage_ap_ar' => in_array('Accounting', $jobAreas) ? ($request->input('acc_manage_ap_ar') === 'Yes') : false,
            'acc_process_payroll_expenses' => in_array('Accounting', $jobAreas) ? ($request->input('acc_process_payroll_expenses') === 'Yes') : false,
            'acc_calculate_pay_taxes' => in_array('Accounting', $jobAreas) ? ($request->input('acc_calculate_pay_taxes') === 'Yes') : false,
            'acc_coordinate_auditors' => in_array('Accounting', $jobAreas) ? ($request->input('acc_coordinate_auditors') === 'Yes') : false,
            'acc_monitor_cashflow_forecast' => in_array('Accounting', $jobAreas) ? ($request->input('acc_monitor_cashflow_forecast') === 'Yes') : false,
            'acc_reconcile_bsp' => in_array('Accounting', $jobAreas) ? ($request->input('acc_reconcile_bsp') === 'Yes') : false,

            // Cargo Handlers
            'customs_documentation_knowledge' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('customs_documentation_knowledge') === 'Yes') : false,
            'iata_dg_certification' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('iata_dg_certification') === 'Yes') : false,
            'airline_negotiation' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('airline_negotiation') === 'Yes') : false,
            'air_waybill_execution' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('air_waybill_execution') === 'Yes') : false,
            'regulations_compliance' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('regulations_compliance') === 'Yes') : false,
            'shipping_bill_knowledge' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('shipping_bill_knowledge') === 'Yes') : false,
            'pharma_shipment_handling' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('pharma_shipment_handling') === 'Yes') : false,
            'live_animal_handling' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('live_animal_handling') === 'Yes') : false,
            'perishable_shipment_handling' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('perishable_shipment_handling') === 'Yes') : false,
            'incoterms_knowledge' => in_array('Cargo Handlers', $jobAreas) ? ($request->input('incoterms_knowledge') === 'Yes') : false,

            // Fresher/New Entrant
            'no_prior_experience' => in_array('Fresher/New Entrant', $jobAreas) ? ($request->input('no_prior_experience') === 'Yes') : false,
            'completed_travel_course' => in_array('Fresher/New Entrant', $jobAreas) ? ($request->input('completed_travel_course') === 'Yes') : false,
            'institution_name' => in_array('Fresher/New Entrant', $jobAreas) ? $request->input('institution_name') : null,
            'institution_city' => in_array('Fresher/New Entrant', $jobAreas) ? $request->input('institution_city') : null,
        
        'payment_status' => 'pending',       // Default pending
    'transaction_id' => null, 
        ]);

        return redirect()->route('checkout')->with('employer', $employer);
    }

    /**
     * Download a PDF of all employers.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadEmployersPdf()
    {
        $employers = Employer::select('company_name', 'address')->get();

        $pdf = Pdf::loadView('pdfs.employers', compact('employers'));

        return $pdf->download('registered_employers.pdf');
    }

    /**
     * Display the employer data page.
     *
     * @return \Illuminate\Http\Response
     */
    public function employersDataPage()
    {
        return view("Dashboard.Pages.employers");
    }

    /**
     * Returns a JSON response for DataTables.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function employersData(Request $request)
    {
        if ($request->ajax()) {
            $data = Employer::select('id', 'company_name', 'contact_person', 'contact_email', 'contact_mobile', 'payment_status',
    'transaction_id','min_travel_trade_experience_years', 'created_at')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Employer $employer) {
                    $url = route('employer.generate_profile_pdf', ['id' => $employer->id]);
                    return '<a href="' . $url . '" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-file-pdf"></i> Download PDF</a>';
                })
                ->addColumn('created_at_formatted', function (Employer $employer) {
                    return $employer->created_at->format('d-m-Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        abort(403, 'Unauthorized access.');
    }

    /**
     * Generate and download a PDF of the employer's profile.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\RedirectResponse
     */
    public function generateProfilePdf($id)
    {
        $employer = Employer::find($id);

        if (!$employer) {
            return redirect()->back()->with('error', 'Employer not found.');
        }

        // Decode job_areas to pass as selectedSections
        $selectedSections = json_decode($employer->job_areas, true) ?? [];

        $pdf = Pdf::loadView('pdfs.employer_profile', compact('employer', 'selectedSections'));

        $companyName = Str::slug($employer->company_name);
        $pdfFileName = $companyName . '_Profile.pdf';

        return $pdf->download($pdfFileName);
    }
    /**
     * Export all employer data to a CSV file.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function exportExcel()
    {
        return Excel::download(new EmployerExport, 'employers_data.xlsx');
    }
}