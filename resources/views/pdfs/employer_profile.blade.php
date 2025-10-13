<!DOCTYPE html>
<html>

<head>
    <title>Employer Profile - {{ $employer->company_name }}</title>
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

        td:first-child {
            width: 50%;
            font-weight: bold;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Employer Profile: {{ $employer->company_name }}</h1>

        <div class="section">
            <h2>Company & Contact Information</h2>
            <table>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 pr-4">Company Name:</td>
                        <td class="py-2">{{ $employer->company_name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 pr-4">Contact Person:</td>
                        <td class="py-2">{{ $employer->contact_person }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 pr-4">Address:</td>
                        <td class="py-2">{{ $employer->address }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 pr-4">Mobile No:</td>
                        <td class="py-2">{{ $employer->contact_mobile }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 pr-4">Contact Email:</td>
                        <td class="py-2">{{ $employer->contact_email }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4">Min. Experience Required:</td>
                        <td class="py-2">{{ $employer->min_travel_trade_experience_years }} Years</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
                                    class="yes-no {{ $employer->no_prior_experience ? 'yes' : 'no' }}">{{ $employer->no_prior_experience ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="color:black;font-weight:bold">Completed Travel Course</td>
                            <td><span
                                    class="yes-no {{ $employer->completed_travel_course ? 'yes' : 'no' }}">{{ $employer->completed_travel_course ? 'Yes' : 'No' }}</span>
                            </td>
                            <td>
                                @if($jobSeeker->institution_name)
                                    Institution Name: {{ $employer->institution_name }}<br />
                                @endif
                                @if($jobSeeker->institution_city)
                                    Institution City: {{ $employer->institution_city }}
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @endif



        @if(in_array('Domestic Travel', $selectedSections))
            <div class="section">
                <h2>Domestic Travel Expertise</h2>
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
                            <td>GDS Itinerary</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_gds_itinerary ? 'yes' : 'no' }}">{{ $employer->domestic_gds_itinerary ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>PNR Adult</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_pnr_adult ? 'yes' : 'no' }}">{{ $employer->domestic_pnr_adult ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>PNR Child/Infant</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_pnr_child_infant ? 'yes' : 'no' }}">{{ $employer->domestic_pnr_child_infant ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Senior Citizen Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_senior_citizen_fares ? 'yes' : 'no' }}">{{ $employer->domestic_senior_citizen_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Student Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_student_fares ? 'yes' : 'no' }}">{{ $employer->domestic_student_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Youth Special Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_youth_special_fares ? 'yes' : 'no' }}">{{ $employer->domestic_youth_special_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fare Mask</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_fare_mask ? 'yes' : 'no' }}">{{ $employer->domestic_fare_mask ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ticketing GDS</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_ticketing_gds ? 'yes' : 'no' }}">{{ $employer->domestic_ticketing_gds ? 'Yes' : 'No' }}</span>
                            </td>
                            <td>
                                @if($employer->domestic_ticketing_gds && $employer->domestic_gds_type)
                                    GDS Type: {{ $employer->domestic_gds_type }}
                                    @if($employer->domestic_gds_type == 'Other' && $employer->domestic_gds_other_name)
                                        ({{ $employer->domestic_gds_other_name }})
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>LCC Websites</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_lcc_websites ? 'yes' : 'no' }}">{{ $employer->domestic_lcc_websites ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Supplier Portal</td>
                            <td><span
                                    class="yes-no {{ $employer->domestic_supplier_portal ? 'yes' : 'no' }}">{{ $employer->domestic_supplier_portal ? 'Yes' : 'No' }}</span>
                            </td>
                            <td>
                                @if($employer->domestic_supplier_portal && $employer->domestic_supplier_portal_name)
                                    Portal: {{ $employer->domestic_supplier_portal_name }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        @if(in_array('Hotel Bookings & Car Hire', $selectedSections))

            <div class="section">
                <h2>Hotel & Car Hire Expertise</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Skill</th>
                            <th>Proficiency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hotel Bookings (India)</td>
                            <td><span
                                    class="yes-no {{ $employer->hotel_bookings_india ? 'yes' : 'no' }}">{{ $employer->hotel_bookings_india ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Contact Hotels Direct</td>
                            <td><span
                                    class="yes-no {{ $employer->hotel_contact_direct ? 'yes' : 'no' }}">{{ $employer->hotel_contact_direct ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Consolidator Websites</td>
                            <td><span
                                    class="yes-no {{ $employer->hotel_consolidator_websites ? 'yes' : 'no' }}">{{ $employer->hotel_consolidator_websites ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Local DMC</td>
                            <td><span
                                    class="yes-no {{ $employer->hotel_local_dmc ? 'yes' : 'no' }}">{{ $employer->hotel_local_dmc ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Car Hire (Current City)</td>
                            <td><span
                                    class="yes-no {{ $employer->car_hire_city ? 'yes' : 'no' }}">{{ $employer->car_hire_city ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Car Hire (Other Cities)</td>
                            <td><span
                                    class="yes-no {{ $employer->car_hire_other_cities ? 'yes' : 'no' }}">{{ $employer->car_hire_other_cities ? 'Yes' : 'No' }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        @if(in_array('International Travel - Basic Skills', $selectedSections))

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
                            <td>GDS Itinerary</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_gds_itinerary ? 'yes' : 'no' }}">{{ $employer->intl_gds_itinerary ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>PNR Child/Infant</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_pnr_child_infant ? 'yes' : 'no' }}">{{ $employer->intl_pnr_child_infant ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Senior Citizen Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_senior_citizen_fares ? 'yes' : 'no' }}">{{ $employer->intl_senior_citizen_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Student Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_student_fares ? 'yes' : 'no' }}">{{ $employer->intl_student_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Youth Special Fares</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_youth_special_fares ? 'yes' : 'no' }}">{{ $employer->intl_youth_special_fares ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fare Mask</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_fare_mask ? 'yes' : 'no' }}">{{ $employer->intl_fare_mask ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>GDS Ticketing</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_gds_type ? 'yes' : 'no' }}">{{ $employer->intl_gds_type ? 'Yes' : 'No' }}</span>
                            </td>
                            <td>
                                @if($employer->intl_gds_type)
                                    GDS Type: {{ $employer->intl_gds_type }}
                                    @if($employer->intl_gds_type == 'Other' && $employer->intl_gds_other_name)
                                        ({{ $employer->intl_gds_other_name }})
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Queue PNRs</td>
                            <td><span
                                    class="yes-no {{ $employer->intl_queue_pnrs ? 'yes' : 'no' }}">{{ $employer->intl_queue_pnrs ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif


              @if(in_array('International Travel - Advanced Skills', $selectedSections))

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
                                <td>First Reissue</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_first_reissue ? 'yes' : 'no' }}">{{ $employer->intl_first_reissue ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Subsequent Reissue</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_subsequent_reissue ? 'yes' : 'no' }}">{{ $employer->intl_subsequent_reissue ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ticket Refunds</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_ticket_refunds ? 'yes' : 'no' }}">{{ $employer->intl_ticket_refunds ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>HOTAC Rooms</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_hotac_rooms ? 'yes' : 'no' }}">{{ $employer->intl_hotac_rooms ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Group PNR</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_group_pnr ? 'yes' : 'no' }}">{{ $employer->intl_group_pnr ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Issue EMD</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_issue_emd ? 'yes' : 'no' }}">{{ $employer->intl_issue_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Standalone EMD</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_standalone_emd ? 'yes' : 'no' }}">{{ $employer->intl_standalone_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Associated EMD</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_associated_emd ? 'yes' : 'no' }}">{{ $employer->intl_associated_emd ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Manage Queues and Update PNRs</td>
                                <td><span
                                        class="yes-no {{ $employer->intl_mng_queues_upd_pnrs ? 'yes' : 'no' }}">{{ $employer->intl_mng_queues_upd_pnrs ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

          @if(in_array('VISA Handling', $selectedSections))

            <div class="section">
                    <h2>Visa Processing Expertise</h2>
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
                                <td>Aware of Visa Procedures</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_aware_procedures ? 'yes' : 'no' }}">{{ $employer->visa_aware_procedures ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Handled Personally</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_handled_personally ? 'yes' : 'no' }}">{{ $employer->visa_handled_personally ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>In Department</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_in_department ? 'yes' : 'no' }}">{{ $employer->visa_in_department ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>USA Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_usa ? 'yes' : 'no' }}">{{ $employer->visa_usa ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Canada Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_canada ? 'yes' : 'no' }}">{{ $employer->visa_canada ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Mexico Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_mexico ? 'yes' : 'no' }}">{{ $employer->visa_mexico ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Brazil Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_brazil ? 'yes' : 'no' }}">{{ $employer->visa_brazil ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Other South America</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_other_south_america ? 'yes' : 'no' }}">{{ $employer->visa_other_south_america ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>UK Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_uk ? 'yes' : 'no' }}">{{ $employer->visa_uk ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ireland Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_ireland ? 'yes' : 'no' }}">{{ $employer->visa_ireland ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Haj/Umrah Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_haj_umrah ? 'yes' : 'no' }}">{{ $employer->visa_haj_umrah ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>UAE Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_uae ? 'yes' : 'no' }}">{{ $employer->visa_uae ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Schengen Countries</td>
                                <td>{{ $employer->visa_schengen_countries ?? 'N/A' }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Russia Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_russia ? 'yes' : 'no' }}">{{ $employer->visa_russia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>China Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_china ? 'yes' : 'no' }}">{{ $employer->visa_china ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Vietnam Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_vietnam ? 'yes' : 'no' }}">{{ $employer->visa_vietnam ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cambodia Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_cambodia ? 'yes' : 'no' }}">{{ $employer->visa_cambodia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Hongkong Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_hongkong ? 'yes' : 'no' }}">{{ $employer->visa_hongkong ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Philippines Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_philippines ? 'yes' : 'no' }}">{{ $employer->visa_philippines ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Singapore Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_singapore ? 'yes' : 'no' }}">{{ $employer->visa_singapore ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Malaysia Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_malaysia ? 'yes' : 'no' }}">{{ $employer->visa_malaysia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Australia Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_australia ? 'yes' : 'no' }}">{{ $employer->visa_australia ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>New Zealand Visa</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_newzealand ? 'yes' : 'no' }}">{{ $employer->visa_newzealand ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Draft Cover Note</td>
                                <td><span
                                        class="yes-no {{ $employer->visa_draft_cover_note ? 'yes' : 'no' }}">{{ $employer->visa_draft_cover_note ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        @endif

      @if(in_array('Tours and Holiday Packages', $selectedSections))

        <div class="section">
                <h2>Tours & Packages Expertise</h2>
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
                            <td>Handled Packages</td>
                            <td><span
                                    class="yes-no {{ $employer->tours_handled_packages ? 'yes' : 'no' }}">{{ $employer->tours_handled_packages ? 'Yes' : 'No' }}</span>
                            </td>
                            <td>
                                @if($employer->tours_handled_packages && $employer->tours_countries)
                                    Countries: {{ $employer->tours_countries }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Worked on Costing</td>
                            <td><span
                                    class="yes-no {{ $employer->tours_worked_cost ? 'yes' : 'no' }}">{{ $employer->tours_worked_cost ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Incentive Groups</td>
                            <td><span
                                    class="yes-no {{ $employer->tours_incentive_groups ? 'yes' : 'no' }}">{{ $employer->tours_incentive_groups ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>MICE Groups</td>
                            <td><span
                                    class="yes-no {{ $employer->tours_mice_groups ? 'yes' : 'no' }}">{{ $employer->tours_mice_groups ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cruise Passengers</td>
                            <td><span
                                    class="yes-no {{ $employer->tours_cruise_pax ? 'yes' : 'no' }}">{{ $employer->tours_cruise_pax ? 'Yes' : 'No' }}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    @endif

        @if(in_array('Accounting', $selectedSections))

            <div class="section">
                    <h2>Accounting Expertise</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Skill</th>
                                <th>Proficiency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Record Transactions</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_record_transactions ? 'yes' : 'no' }}">{{ $employer->acc_record_transactions ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Bank/CC Reconciliation</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_bank_cc_reconciliation ? 'yes' : 'no' }}">{{ $employer->acc_bank_cc_reconciliation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Corporate Card Reconciliation</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_corporate_card_reconciliation ? 'yes' : 'no' }}">{{ $employer->acc_corporate_card_reconciliation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Track Commissions</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_track_commissions ? 'yes' : 'no' }}">{{ $employer->acc_track_commissions ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Submit Invoices</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_submit_invoices ? 'yes' : 'no' }}">{{ $employer->acc_submit_invoices ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Manage Financial Records</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_manage_financial_records ? 'yes' : 'no' }}">{{ $employer->acc_manage_financial_records ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Software/Excel Proficient</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_software_excel_proficient ? 'yes' : 'no' }}">{{ $employer->acc_software_excel_proficient ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Prepare/Analyze Reports</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_prepare_analyze_reports ? 'yes' : 'no' }}">{{ $employer->acc_prepare_analyze_reports ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ensure Compliance</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_ensure_compliance ? 'yes' : 'no' }}">{{ $employer->acc_ensure_compliance ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Manage AP/AR</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_manage_ap_ar ? 'yes' : 'no' }}">{{ $employer->acc_manage_ap_ar ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Process Payroll/Expenses</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_process_payroll_expenses ? 'yes' : 'no' }}">{{ $employer->acc_process_payroll_expenses ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Calculate/Pay Taxes</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_calculate_pay_taxes ? 'yes' : 'no' }}">{{ $employer->acc_calculate_pay_taxes ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Coordinate Auditors</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_coordinate_auditors ? 'yes' : 'no' }}">{{ $employer->acc_coordinate_auditors ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Monitor Cashflow/Forecast</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_monitor_cashflow_forecast ? 'yes' : 'no' }}">{{ $employer->acc_monitor_cashflow_forecast ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Reconcile BSP</td>
                                <td><span
                                        class="yes-no {{ $employer->acc_reconcile_bsp ? 'yes' : 'no' }}">{{ $employer->acc_reconcile_bsp ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        @endif

        @if(in_array('Cargo Handlers', $selectedSections))

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
                                <td>Customs Documentation Knowledge</td>
                                <td><span
                                        class="yes-no {{ $employer->customs_documentation_knowledge ? 'yes' : 'no' }}">{{ $employer->customs_documentation_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>IATA DG Certification</td>
                                <td><span
                                        class="yes-no {{ $employer->iata_dg_certification ? 'yes' : 'no' }}">{{ $employer->iata_dg_certification ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Airline Negotiation</td>
                                <td><span
                                        class="yes-no {{ $employer->airline_negotiation ? 'yes' : 'no' }}">{{ $employer->airline_negotiation ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Air Waybill Execution</td>
                                <td><span
                                        class="yes-no {{ $employer->air_waybill_execution ? 'yes' : 'no' }}">{{ $employer->air_waybill_execution ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Regulations Compliance</td>
                                <td><span
                                        class="yes-no {{ $employer->regulations_compliance ? 'yes' : 'no' }}">{{ $employer->regulations_compliance ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping Bill Knowledge</td>
                                <td><span
                                        class="yes-no {{ $employer->shipping_bill_knowledge ? 'yes' : 'no' }}">{{ $employer->shipping_bill_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Pharma Shipment Handling</td>
                                <td><span
                                        class="yes-no {{ $employer->pharma_shipment_handling ? 'yes' : 'no' }}">{{ $employer->pharma_shipment_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Live Animal Handling</td>
                                <td><span
                                        class="yes-no {{ $employer->live_animal_handling ? 'yes' : 'no' }}">{{ $employer->live_animal_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Perishable Shipment Handling</td>
                                <td><span
                                        class="yes-no {{ $employer->perishable_shipment_handling ? 'yes' : 'no' }}">{{ $employer->perishable_shipment_handling ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Incoterms Knowledge</td>
                                <td><span
                                        class="yes-no {{ $employer->incoterms_knowledge ? 'yes' : 'no' }}">{{ $employer->incoterms_knowledge ? 'Yes' : 'No' }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        @endif

        @if(in_array('Fresher/New Entrant', $selectedSections))

            <div class="section">
                    <h2>Fresher/New Entrant Expertise</h2>
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
                                <td>Prior Experience</td>
                                <td><span
                                        class="yes-no {{ $employer->no_prior_experience ? 'yes' : 'no' }}">{{ $employer->no_prior_experience ? 'Yes' : 'No' }}</span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Completed Travel Course</td>
                                <td><span
                                        class="yes-no {{ $employer->completed_travel_course ? 'yes' : 'no' }}">{{ $employer->completed_travel_course ? 'Yes' : 'No' }}</span>
                                </td>
                                <td>
                                    @if($employer->completed_travel_course)
                                        @if($employer->institution_name)
                                            Institution Name: {{ $employer->institution_name }}<br />
                                        @endif
                                        @if($employer->institution_city)
                                            Institution City: {{ $employer->institution_city }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        @endif
    </div>
</body>

</html>