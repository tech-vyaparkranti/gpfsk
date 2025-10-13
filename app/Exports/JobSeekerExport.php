<?php

namespace App\Exports;
use Carbon\Carbon;
use App\Models\JobSeeker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JobSeekerExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return JobSeeker::all();
    }

   public function headings(): array
    {
        return [
            'ID',
            'Given Name',
            'Family Name',
            'Date of Birth',
            'Address',
            'Mobile No',
            'Personal Email',
            'Total Experience (Years)',
            'Current City',
            'Willing to Relocate',
            'Preferred Cities',
            'Current Salary',
            'not_want_company',

            // Domestic Travel Skills
            'Domestic GDS Itinerary',
            'Domestic PNR Adult',
            'Domestic PNR Child/Infant',
            'Domestic Senior Citizen Fares',
            'Domestic Student Fares',
            'Domestic Youth Special Fares',
            'Domestic Fare Mask',
            'Domestic Ticketing GDS',
            'Domestic GDS Type',
            'Domestic GDS Other Name',
            'Domestic LCC Websites',
            'Domestic Supplier Portal',
            'Domestic Supplier Portal Name',

            // Hotel & Car Hire Skills
            'Hotel Bookings India',
            'Hotel Contact Direct',
            'Hotel Consolidator Websites',
            'Hotel Local DMC',
            'Car Hire Current City',
            'Car Hire Other Cities',

            // International Travel Skills
            'Intl GDS Itinerary',
            'Intl PNR Child/Infant',
            'Intl Senior Citizen Fares',
            'Intl Student Fares',
            'Intl Youth Special Fares',
            'Intl Fare Mask',
            'Intl GDS Ticketing',
            'Intl GDS Type (Intl)',
            'Intl GDS Other Name (Intl)',
            'Intl Queue PNRs',
            'Intl First Reissue',
            'Intl Subsequent Reissue',
            'Intl Ticket Refunds',
            'Intl HOTAC Rooms',
            'Intl Group PNR',
            'Intl Issue EMD',
            'Intl Standalone EMD',
            'Intl Associated EMD',
            'intl_mng_queues_upd_pnrs',

            // Visa Processing Skills
            'Visa Aware Procedures',
            'Visa Handled Personally',
            'Visa In Department',
            'Visa USA',
            'Visa Canada',
            'Visa Mexico',
            'Visa Brazil',
            'Visa Other South America',
            'Visa UK',
            'Visa Ireland',
            'Visa Haj/Umrah',
            'Visa UAE',
            'Visa Schengen Countries',
            'Visa Russia',
            'Visa China',
            'Visa Vietnam',
            'Visa Cambodia',
            'Visa Hongkong',
            'Visa Philippines',
            'Visa Singapore',
            'Visa Malaysia',
            'Visa Australia',
            'Visa New Zealand',
            'Visa Draft Cover Note',

            // Tours & Packages Skills
            'Tours Handled Packages',
            'Tours Countries',
            'Tours Worked on Costing',
            'Tours Incentive Groups',
            'Tours MICE Groups',
            'Tours Cruise Passengers',

            // Accounting Skills
            'Acc Record Transactions',
            'Acc Bank/CC Reconciliation',
            'Acc Corporate Card Reconciliation',
            'Acc Track Commissions',
            'Acc Submit Invoices',
            'Acc Manage Financial Records',
            'Acc Software/Excel Proficient',
            'Acc Prepare/Analyze Reports',
            'Acc Ensure Compliance',
            'Acc Manage AP/AR',
            'Acc Process Payroll/Expenses',
            'Acc Calculate/Pay Taxes',
            'Acc Coordinate Auditors',
            'Acc Monitor Cashflow/Forecast',
            'Acc Reconcile BSP',

            // Logistics
            'customs_documentation_knowledge',
            'iata_dg_certification',
            'airline_negotiation',
            'air_waybill_execution',
            'regulations_compliance',
            'shipping_bill_knowledge',
            'pharma_shipment_handling',
            'live_animal_handling',
            'perishable_shipment_handling',
            'incoterms_knowledge',

            'CV Path',
            'Created At',
            'Updated At',
        ];
    }


    public function map($jobSeeker): array
    {
        return [
            $jobSeeker->id,
                    $jobSeeker->given_name,
                    $jobSeeker->family_name,
                    $jobSeeker->dob ? Carbon::parse($jobSeeker->dob)->format('d M, Y') : null,
                    $jobSeeker->address,
                    $jobSeeker->mobile_no,
                    $jobSeeker->personal_email,
                    $jobSeeker->total_experience,
                    $jobSeeker->current_city,
                    $jobSeeker->willing_to_relocate ? 'Yes' : 'No',
                    $jobSeeker->preferred_cities,
                    $jobSeeker->current_salary ? number_format($jobSeeker->current_salary, 2) : null,
                   $jobSeeker->not_want_company,
                    // Domestic Travel Skills
                    $jobSeeker->domestic_gds_itinerary ? 'Yes' : 'No',
                    $jobSeeker->domestic_pnr_adult ? 'Yes' : 'No',
                    $jobSeeker->domestic_pnr_child_infant ? 'Yes' : 'No',
                    $jobSeeker->domestic_senior_citizen_fares ? 'Yes' : 'No',
                    $jobSeeker->domestic_student_fares ? 'Yes' : 'No',
                    $jobSeeker->domestic_youth_special_fares ? 'Yes' : 'No',
                    $jobSeeker->domestic_fare_mask ? 'Yes' : 'No',
                    $jobSeeker->domestic_ticketing_gds ? 'Yes' : 'No',
                    $jobSeeker->domestic_gds_type,
                    $jobSeeker->domestic_gds_other_name,
                    $jobSeeker->domestic_lcc_websites ? 'Yes' : 'No',
                    $jobSeeker->domestic_supplier_portal ? 'Yes' : 'No',
                    $jobSeeker->domestic_supplier_portal_name,

                    // Hotel & Car Hire Skills
                    $jobSeeker->hotel_bookings_india ? 'Yes' : 'No',
                    $jobSeeker->hotel_contact_direct ? 'Yes' : 'No',
                    $jobSeeker->hotel_consolidator_websites ? 'Yes' : 'No',
                    $jobSeeker->hotel_local_dmc ? 'Yes' : 'No',
                    $jobSeeker->car_hire_city ? 'Yes' : 'No',
                    $jobSeeker->car_hire_other_cities ? 'Yes' : 'No',

                    // International Travel Skills
                    $jobSeeker->intl_gds_itinerary ? 'Yes' : 'No',
                    $jobSeeker->intl_pnr_child_infant ? 'Yes' : 'No',
                    $jobSeeker->intl_senior_citizen_fares ? 'Yes' : 'No',
                    $jobSeeker->intl_student_fares ? 'Yes' : 'No',
                    $jobSeeker->intl_youth_special_fares ? 'Yes' : 'No',
                    $jobSeeker->intl_fare_mask ? 'Yes' : 'No',
                    $jobSeeker->intl_gds_type ? 'Yes' : 'No', // This was a boolean check in HTML, but here it's the GDS Type. Revisit if this should be $jobSeeker->intl_gds_ticketing
                    $jobSeeker->intl_gds_type,
                    $jobSeeker->intl_gds_other_name,
                    $jobSeeker->intl_queue_pnrs ? 'Yes' : 'No',
                    $jobSeeker->intl_first_reissue ? 'Yes' : 'No',
                    $jobSeeker->intl_subsequent_reissue ? 'Yes' : 'No',
                    $jobSeeker->intl_ticket_refunds ? 'Yes' : 'No',
                    $jobSeeker->intl_hotac_rooms ? 'Yes' : 'No',
                    $jobSeeker->intl_group_pnr ? 'Yes' : 'No',
                    $jobSeeker->intl_issue_emd ? 'Yes' : 'No',
                    $jobSeeker->intl_standalone_emd ? 'Yes' : 'No',
                    $jobSeeker->intl_associated_emd ? 'Yes' : 'No',
                    $jobSeeker->intl_mng_queues_upd_pnrs ? 'Yes' : 'No',
       
                    // Visa Processing Skills
                    $jobSeeker->visa_aware_procedures ? 'Yes' : 'No',
                    $jobSeeker->visa_handled_personally ? 'Yes' : 'No',
                    $jobSeeker->visa_in_department ? 'Yes' : 'No',
                    $jobSeeker->visa_usa ? 'Yes' : 'No',
                    $jobSeeker->visa_canada ? 'Yes' : 'No',
                    $jobSeeker->visa_mexico ? 'Yes' : 'No',
                    $jobSeeker->visa_brazil ? 'Yes' : 'No',
                    $jobSeeker->visa_other_south_america ? 'Yes' : 'No',
                    $jobSeeker->visa_uk ? 'Yes' : 'No',
                    $jobSeeker->visa_ireland ? 'Yes' : 'No',
                    $jobSeeker->visa_haj_umrah ? 'Yes' : 'No',
                    $jobSeeker->visa_uae ? 'Yes' : 'No',
                    $jobSeeker->visa_schengen_countries,
                    $jobSeeker->visa_russia ? 'Yes' : 'No',
                    $jobSeeker->visa_china ? 'Yes' : 'No',
                    $jobSeeker->visa_vietnam ? 'Yes' : 'No',
                    $jobSeeker->visa_cambodia ? 'Yes' : 'No',
                    $jobSeeker->visa_hongkong ? 'Yes' : 'No',
                    $jobSeeker->visa_philippines ? 'Yes' : 'No',
                    $jobSeeker->visa_singapore ? 'Yes' : 'No',
                    $jobSeeker->visa_malaysia ? 'Yes' : 'No',
                    $jobSeeker->visa_australia ? 'Yes' : 'No',
                    $jobSeeker->visa_newzealand ? 'Yes' : 'No',
                    $jobSeeker->visa_draft_cover_note ? 'Yes' : 'No',

                    // Tours & Packages SkillsA
                    $jobSeeker->tours_handled_packages ? 'Yes' : 'No',
                    $jobSeeker->tours_countries,
                    $jobSeeker->tours_worked_cost ? 'Yes' : 'No',
                    $jobSeeker->tours_incentive_groups ? 'Yes' : 'No',
                    $jobSeeker->tours_mice_groups ? 'Yes' : 'No',
                    $jobSeeker->tours_cruise_pax ? 'Yes' : 'No',

                    // Accounting Skills
                    $jobSeeker->acc_record_transactions ? 'Yes' : 'No',
                    $jobSeeker->acc_bank_cc_reconciliation ? 'Yes' : 'No',
                    $jobSeeker->acc_corporate_card_reconciliation ? 'Yes' : 'No',
                    $jobSeeker->acc_track_commissions ? 'Yes' : 'No',
                    $jobSeeker->acc_submit_invoices ? 'Yes' : 'No',
                    $jobSeeker->acc_manage_financial_records ? 'Yes' : 'No',
                    $jobSeeker->acc_software_excel_proficient ? 'Yes' : 'No',
                    $jobSeeker->acc_prepare_analyze_reports ? 'Yes' : 'No',
                    $jobSeeker->acc_ensure_compliance ? 'Yes' : 'No',
                    $jobSeeker->acc_manage_ap_ar ? 'Yes' : 'No',
                    $jobSeeker->acc_process_payroll_expenses ? 'Yes' : 'No',
                    $jobSeeker->acc_calculate_pay_taxes ? 'Yes' : 'No',
                    $jobSeeker->acc_coordinate_auditors ? 'Yes' : 'No',
                    $jobSeeker->acc_monitor_cashflow_forecast ? 'Yes' : 'No',
                    $jobSeeker->acc_reconcile_bsp ? 'Yes' : 'No',



$jobSeeker->customs_documentation_knowledge ? 'Yes' : 'No',
$jobSeeker->iata_dg_certification ? 'Yes' : 'No',
$jobSeeker->airline_negotiation ? 'Yes' : 'No',
$jobSeeker->air_waybill_execution ? 'Yes' : 'No',
$jobSeeker->regulations_compliance ? 'Yes' : 'No',
$jobSeeker->shipping_bill_knowledge ? 'Yes' : 'No',
$jobSeeker->pharma_shipment_handling ? 'Yes' : 'No',
$jobSeeker->live_animal_handling ? 'Yes' : 'No',
$jobSeeker->perishable_shipment_handling ? 'Yes' : 'No',
$jobSeeker->incoterms_knowledge ? 'Yes' : 'No',







                    $jobSeeker->cv_path,
                    $jobSeeker->created_at ? Carbon::parse($jobSeeker->created_at)->format('d M, Y H:i:s') : null,
                    $jobSeeker->updated_at ? Carbon::parse($jobSeeker->updated_at)->format('d M, Y H:i:s') : null,
        ];
    }
}

