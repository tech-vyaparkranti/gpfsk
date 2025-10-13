<!DOCTYPE html>
<html>

<head>
    <title>Job Seeker Profile - {{ $jobSeeker->given_name }} {{ $jobSeeker->family_name }}</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10pt;
            line-height: 1.6;
            color: #333;
            background-color: #e6e6f2;
            margin: 0;
            padding: 0;
            border-radius: 20px;
        }

        .container {
            width: 90%;
            padding: 30px;
            padding-top: 20px;
            box-sizing: border-box;
            padding-bottom: 0px;
        }

        h1 {
            font-size: 24pt;
            color: #030358;
            border-bottom: 2px solid #030358;
            padding-bottom: 10px;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
        }

        h2 {
            font-size: 16pt;
            color: black;
            border-bottom: 1px solid #ccc;
            padding-bottom: 8px;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .section {
            margin-bottom: 10px;
            padding: 15px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin: 10px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            border: 1px solid #e9ecef;
            padding: 10px 12px;
            text-align: left;
        }

        th {
            background-color: #e2e6ea;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 9pt;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        .yes-no {
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 3px;
            display: inline-block;
            min-width: 40px;
            text-align: center;
        }

        .yes {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 3px 10px;
            margin-left: 45px;
            margin-top: 5px;
        }

        .no {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 3px 10px;
            text-align: center;
            margin-left: 45px;
            margin-top: 5px;
        }

        .cv-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 11pt;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Job Seeker Profile: {{ $jobSeeker->given_name }}</h1>

        @if(empty($selectedSections))
            <div class="section">
                <p>No sections selected. Please choose at least one section to generate the profile.</p>
            </div>
        @else

            @if(in_array('personal_information', $selectedSections))
                <div class="section bg-white shadow rounded-xl p-6 border border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">Personal Information</h2>
                    <table class="w-full text-sm sm:text-base text-gray-700 table-auto">
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black w-1/2" style="color:black;font-weight:bold">Full
                                    Name:</td>
                                <td class="py-2">{{ $jobSeeker->given_name }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Family Name:
                                </td>
                                <td class="py-2">{{ $jobSeeker->family_name }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Date of
                                    Birth:</td>
                                <td class="py-2">{{ \Carbon\Carbon::parse($jobSeeker->dob)->format('d M, Y') }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Address:
                                </td>
                                <td class="py-2">{{ $jobSeeker->address }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Mobile No:
                                </td>
                                <td class="py-2">{{ $jobSeeker->mobile_no }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Personal
                                    Email:</td>
                                <td class="py-2">{{ $jobSeeker->personal_email }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Total
                                    Experience:</td>
                                <td class="py-2">{{ $jobSeeker->total_experience }} Years</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Current
                                    City:</td>
                                <td class="py-2">{{ $jobSeeker->current_city }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Willing to
                                    Relocate:</td>
                                <td class="py-2">
                                    <span
                                        class="inline-block px-2 py-0.5 rounded-full text-white text-xs font-semibold {{ $jobSeeker->willing_to_relocate ? 'yes' : 'no' }}">
                                        {{ $jobSeeker->willing_to_relocate ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                            </tr>
                            @if($jobSeeker->preferred_cities)
                                <tr class="border-b">
                                    <td class="py-2 pr-4 font-semibold text-black" style="color:black;font-weight:bold">Preferred
                                        Cities:</td>
                                    <td class="py-2">{{ $jobSeeker->preferred_cities }}</td>
                                </tr>
                            @endif
                            @if($jobSeeker->current_salary)
                                <tr>
                                    <td class="py-2 pr-4 text-black" style="color:black;font-weight:bold">Current Salary:</td>
                                    <td class="py-2">₹ {{ number_format($jobSeeker->current_salary, 2) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('curriculum_vitae', $selectedSections))
                <div class="section">
                    <h2>Curriculum Vitae (CV)</h2>
                    @if($jobSeeker->cv_path)
                        <p>
                            <a href="{{ route('jobseeker.download_cv', ['id' => $jobSeeker->id]) }}" class="cv-button"
                                style="background-color: #030358; color: white;">
                                Download Original CV
                            </a>
                        </p>
                        <p style="font-size: 9pt; color: #777; margin-top: 15px;">
                            URL: {{ route('jobseeker.download_cv', ['id' => $jobSeeker->id]) }}
                        </p>
                    @else
                        <p>No CV uploaded.</p>
                    @endif
                </div>
            @endif






















            @if(in_array('fresher_skill', $selectedSections))
                <div class="section">
                    <h2>Fresher / New Entrant</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Prior Experience</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->no_prior_experience ? 'yes' : 'no' }}">{{ $jobSeeker->no_prior_experience ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Completed Travel Course</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->completed_travel_course ? 'yes' : 'no' }}">{{ $jobSeeker->completed_travel_course ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($jobSeeker->institution_name)
                                        Institution Name: {{ $jobSeeker->institution_name }}<br />
                                    @endif
                                    @if($jobSeeker->institution_city)
                                        Institution City: {{ $jobSeeker->institution_city }}
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif






























            @if(in_array('domestic_travel_skills', $selectedSections))
                <div class="section">
                    <h2>Domestic Travel Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background: #f7f7f7;">
                                <td style="color:black;font-weight:bold">GDS Itinerary</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_gds_itinerary ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_gds_itinerary ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">PNR Adult</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_pnr_adult ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_pnr_adult ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">PNR Child/Infant</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_pnr_child_infant ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_pnr_child_infant ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Senior Citizen Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_senior_citizen_fares ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_senior_citizen_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Student Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_student_fares ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_student_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Youth Special Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_youth_special_fares ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_youth_special_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Fare Mask</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_fare_mask ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_fare_mask ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Ticketing GDS</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_ticketing_gds ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_ticketing_gds ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($jobSeeker->domestic_ticketing_gds)
                                        GDS Type: {{ $jobSeeker->domestic_gds_type ?? 'N/A' }}
                                        @if($jobSeeker->domestic_gds_type == 'Other' && $jobSeeker->domestic_gds_other_name)
                                            ({{ $jobSeeker->domestic_gds_other_name }})
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">LCC Websites</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_lcc_websites ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_lcc_websites ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Supplier Portal</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->domestic_supplier_portal ? 'yes' : 'no' }}">{{ $jobSeeker->domestic_supplier_portal ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($jobSeeker->domestic_supplier_portal && $jobSeeker->domestic_supplier_portal_name)
                                        Portal: {{ $jobSeeker->domestic_supplier_portal_name }}
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('hotel_car_hire_skills', $selectedSections))
                <div class="section">
                    <h2>Hotel & Car Hire Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Hotel Bookings (India)</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->hotel_bookings_india ? 'yes' : 'no' }}">{{ $jobSeeker->hotel_bookings_india ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Contact Hotels Direct</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->hotel_contact_direct ? 'yes' : 'no' }}">{{ $jobSeeker->hotel_contact_direct ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Consolidator Websites</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->hotel_consolidator_websites ? 'yes' : 'no' }}">{{ $jobSeeker->hotel_consolidator_websites ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Local DMC</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->hotel_local_dmc ? 'yes' : 'no' }}">{{ $jobSeeker->hotel_local_dmc ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Car Hire (Current City)</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->car_hire_city ? 'yes' : 'no' }}">{{ $jobSeeker->car_hire_city ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Car Hire (Other Cities)</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->car_hire_other_cities ? 'yes' : 'no' }}">{{ $jobSeeker->car_hire_other_cities ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('international_travel_basic_skills', $selectedSections))
                <div class="section">
                    <h2>International Travel - Basic Skills (Base Positions)</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">GDS Itinerary</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_gds_itinerary ? 'yes' : 'no' }}">{{ $jobSeeker->intl_gds_itinerary ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">PNR Child/Infant</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_pnr_child_infant ? 'yes' : 'no' }}">{{ $jobSeeker->intl_pnr_child_infant ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Senior Citizen Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_senior_citizen_fares ? 'yes' : 'no' }}">{{ $jobSeeker->intl_senior_citizen_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Student Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_student_fares ? 'yes' : 'no' }}">{{ $jobSeeker->intl_student_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Youth Special Fares</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_youth_special_fares ? 'yes' : 'no' }}">{{ $jobSeeker->intl_youth_special_fares ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Fare Mask</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_fare_mask ? 'yes' : 'no' }}">{{ $jobSeeker->intl_fare_mask ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">GDS Ticketing</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_gds_type ? 'yes' : 'no' }}">{{ $jobSeeker->intl_gds_type ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($jobSeeker->intl_gds_type)
                                        GDS Type: {{ $jobSeeker->intl_gds_type ?? 'N/A' }}
                                        @if($jobSeeker->intl_gds_type == 'Other' && $jobSeeker->intl_gds_other_name)
                                            ({{ $jobSeeker->intl_gds_other_name }})
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Queue PNRs</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_queue_pnrs ? 'yes' : 'no' }}">{{ $jobSeeker->intl_queue_pnrs ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('international_travel_advanced_skills', $selectedSections))
                <div class="section">
                    <h2>International Travel - Advanced Skills (Senior Positions)</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">First Reissue</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_first_reissue ? 'yes' : 'no' }}">{{ $jobSeeker->intl_first_reissue ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Subsequent Reissue</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_subsequent_reissue ? 'yes' : 'no' }}">{{ $jobSeeker->intl_subsequent_reissue ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Ticket Refunds</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_ticket_refunds ? 'yes' : 'no' }}">{{ $jobSeeker->intl_ticket_refunds ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">HOTAC Rooms</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_hotac_rooms ? 'yes' : 'no' }}">{{ $jobSeeker->intl_hotac_rooms ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Group PNR</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_group_pnr ? 'yes' : 'no' }}">{{ $jobSeeker->intl_group_pnr ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Issue EMD</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_issue_emd ? 'yes' : 'no' }}">{{ $jobSeeker->intl_issue_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Standalone EMD</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_standalone_emd ? 'yes' : 'no' }}">{{ $jobSeeker->intl_standalone_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Associated EMD</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_associated_emd ? 'yes' : 'no' }}">{{ $jobSeeker->intl_associated_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Manage Queues and Update PNRs</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->intl_mng_queues_upd_pnrs ? 'yes' : 'no' }}">{{ $jobSeeker->intl_mng_queues_upd_pnrs ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('visa_processing_skills', $selectedSections))
                <div class="section">
                    <h2>Visa Processing Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Aware of Visa Procedures</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_aware_procedures ? 'yes' : 'no' }}">{{ $jobSeeker->visa_aware_procedures ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Handled Personally</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_handled_personally ? 'yes' : 'no' }}">{{ $jobSeeker->visa_handled_personally ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">In Department</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_in_department ? 'yes' : 'no' }}">{{ $jobSeeker->visa_in_department ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">USA Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_usa ? 'yes' : 'no' }}">{{ $jobSeeker->visa_usa ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Canada Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_canada ? 'yes' : 'no' }}">{{ $jobSeeker->visa_canada ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Mexico Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_mexico ? 'yes' : 'no' }}">{{ $jobSeeker->visa_mexico ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Brazil Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_brazil ? 'yes' : 'no' }}">{{ $jobSeeker->visa_brazil ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Other South America</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_other_south_america ? 'yes' : 'no' }}">{{ $jobSeeker->visa_other_south_america ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">UK Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_uk ? 'yes' : 'no' }}">{{ $jobSeeker->visa_uk ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Ireland Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_ireland ? 'yes' : 'no' }}">{{ $jobSeeker->visa_ireland ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Haj/Umrah Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_haj_umrah ? 'yes' : 'no' }}">{{ $jobSeeker->visa_haj_umrah ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">UAE Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_uae ? 'yes' : 'no' }}">{{ $jobSeeker->visa_uae ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Schengen Countries</td>
                                <td>{{ $jobSeeker->visa_schengen_countries ?? 'N/A' }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Russia Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_russia ? 'yes' : 'no' }}">{{ $jobSeeker->visa_russia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">China Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_china ? 'yes' : 'no' }}">{{ $jobSeeker->visa_china ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Vietnam Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_vietnam ? 'yes' : 'no' }}">{{ $jobSeeker->visa_vietnam ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Cambodia Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_cambodia ? 'yes' : 'no' }}">{{ $jobSeeker->visa_cambodia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Hongkong Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_hongkong ? 'yes' : 'no' }}">{{ $jobSeeker->visa_hongkong ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Philippines Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_philippines ? 'yes' : 'no' }}">{{ $jobSeeker->visa_philippines ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Singapore Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_singapore ? 'yes' : 'no' }}">{{ $jobSeeker->visa_singapore ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Malaysia Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_malaysia ? 'yes' : 'no' }}">{{ $jobSeeker->visa_malaysia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Australia Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_australia ? 'yes' : 'no' }}">{{ $jobSeeker->visa_australia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">New Zealand Visa</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_newzealand ? 'yes' : 'no' }}">{{ $jobSeeker->visa_newzealand ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Draft Cover Note</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->visa_draft_cover_note ? 'yes' : 'no' }}">{{ $jobSeeker->visa_draft_cover_note ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('tours_packages_skills', $selectedSections))
                <div class="section">
                    <h2>Tours & Packages Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Handled Packages</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->tours_handled_packages ? 'yes' : 'no' }}">{{ $jobSeeker->tours_handled_packages ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($jobSeeker->tours_handled_packages && $jobSeeker->tours_countries)
                                        Countries: {{ $jobSeeker->tours_countries }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Worked on Costing</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->tours_worked_cost ? 'yes' : 'no' }}">{{ $jobSeeker->tours_worked_cost ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Incentive Groups</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->tours_incentive_groups ? 'yes' : 'no' }}">{{ $jobSeeker->tours_incentive_groups ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">MICE Groups</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->tours_mice_groups ? 'yes' : 'no' }}">{{ $jobSeeker->tours_mice_groups ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Cruise Passengers</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->tours_cruise_pax ? 'yes' : 'no' }}">{{ $jobSeeker->tours_cruise_pax ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('accounting_skills', $selectedSections))
                <div class="section">
                    <h2>Accounting Skills</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Record Transactions</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_record_transactions ? 'yes' : 'no' }}">{{ $jobSeeker->acc_record_transactions ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Bank/CC Reconciliation</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_bank_cc_reconciliation ? 'yes' : 'no' }}">{{ $jobSeeker->acc_bank_cc_reconciliation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Corporate Card Reconciliation</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_corporate_card_reconciliation ? 'yes' : 'no' }}">{{ $jobSeeker->acc_corporate_card_reconciliation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Track Commissions</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_track_commissions ? 'yes' : 'no' }}">{{ $jobSeeker->acc_track_commissions ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Submit Invoices</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_submit_invoices ? 'yes' : 'no' }}">{{ $jobSeeker->acc_submit_invoices ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Manage Financial Records</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_manage_financial_records ? 'yes' : 'no' }}">{{ $jobSeeker->acc_manage_financial_records ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Software/Excel Proficient</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_software_excel_proficient ? 'yes' : 'no' }}">{{ $jobSeeker->acc_software_excel_proficient ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Prepare/Analyze Reports</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_prepare_analyze_reports ? 'yes' : 'no' }}">{{ $jobSeeker->acc_prepare_analyze_reports ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Ensure Compliance</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_ensure_compliance ? 'yes' : 'no' }}">{{ $jobSeeker->acc_ensure_compliance ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Manage AP/AR</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_manage_ap_ar ? 'yes' : 'no' }}">{{ $jobSeeker->acc_manage_ap_ar ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Process Payroll/Expenses</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_process_payroll_expenses ? 'yes' : 'no' }}">{{ $jobSeeker->acc_process_payroll_expenses ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Calculate/Pay Taxes</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_calculate_pay_taxes ? 'yes' : 'no' }}">{{ $jobSeeker->acc_calculate_pay_taxes ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Coordinate Auditors</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_coordinate_auditors ? 'yes' : 'no' }}">{{ $jobSeeker->acc_coordinate_auditors ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Monitor Cashflow/Forecast</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_monitor_cashflow_forecast ? 'yes' : 'no' }}">{{ $jobSeeker->acc_monitor_cashflow_forecast ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Reconcile BSP</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->acc_reconcile_bsp ? 'yes' : 'no' }}">{{ $jobSeeker->acc_reconcile_bsp ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            @if(in_array('cargo_handlers', $selectedSections))
                <div class="section">
                    <h2>Cargo Handlers</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:black;font-weight:bold">Customs Documentation Knowledge</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->customs_documentation_knowledge ? 'yes' : 'no' }}">{{ $jobSeeker->customs_documentation_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">IATA DG Certification</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->iata_dg_certification ? 'yes' : 'no' }}">{{ $jobSeeker->iata_dg_certification ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Airline Negotiation</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->airline_negotiation ? 'yes' : 'no' }}">{{ $jobSeeker->airline_negotiation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Air Waybill Execution</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->air_waybill_execution ? 'yes' : 'no' }}">{{ $jobSeeker->air_waybill_execution ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Regulations Compliance</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->regulations_compliance ? 'yes' : 'no' }}">{{ $jobSeeker->regulations_compliance ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Shipping Bill Knowledge</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->shipping_bill_knowledge ? 'yes' : 'no' }}">{{ $jobSeeker->shipping_bill_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Pharma Shipment Handling</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->pharma_shipment_handling ? 'yes' : 'no' }}">{{ $jobSeeker->pharma_shipment_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Live Animal Handling</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->live_animal_handling ? 'yes' : 'no' }}">{{ $jobSeeker->live_animal_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Perishable Shipment Handling</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->perishable_shipment_handling ? 'yes' : 'no' }}">{{ $jobSeeker->perishable_shipment_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="color:black;font-weight:bold">Incoterms Knowledge</td>
                                <td><span
                                        class="yes-no {{ $jobSeeker->incoterms_knowledge ? 'yes' : 'no' }}">{{ $jobSeeker->incoterms_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

        @endif
    </div>
</body>

</html>