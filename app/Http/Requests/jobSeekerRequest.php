<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class jobSeekerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'given_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string',
            'mobile_no' => 'required|string|max:20',
            'personal_email' => 'required|email|max:255',
            'total_experience' => 'nullable|integer|min:0',
            'current_city' => 'required|string|max:3',
            'willing_to_relocate' => 'required|in:Yes,No',
            'preferred_cities' => 'nullable|string|max:255',
            'current_salary' => 'nullable|numeric|min:0',
            'cv_upload' => 'required|file|mimes:pdf,doc,docx|max:2048', // Max 2MB
            'not_want_company' => 'required|string|max:255',

            // Validation rules for all your other fields (domestic, international, visa, tours, accounting)
            // For radio buttons (Yes/No), they should be 'in:Yes,No' and then converted
            // 'domestic_gds_itinerary' => 'required|in:Yes,No',
            // 'domestic_pnr_adult' => 'required|in:Yes,No',
            // 'domestic_pnr_child_infant' => 'required|in:Yes,No',
            // 'domestic_senior_citizen_fares' => 'required|in:Yes,No',
            // 'domestic_student_fares' => 'required|in:Yes,No',
            // 'domestic_youth_special_fares' => 'required|in:Yes,No',
            // 'domestic_fare_mask' => 'required|in:Yes,No',
            // 'domestic_ticketing_gds' => 'required|in:Yes,No',
            // 'domestic_gds_type' => 'nullable|string', // Amadeus, Galileo, Sabre, Other
            // 'domestic_gds_other_name' => 'nullable|string|max:255',
            // 'domestic_lcc_websites' => 'required|in:Yes,No',
            // 'domestic_supplier_portal' => 'required|in:Yes,No',
            // 'domestic_supplier_portal_name' => 'nullable|string|max:255',

            // 'hotel_bookings_india' => 'required|in:Yes,No',
            // 'hotel_contact_direct' => 'required|in:Yes,No',
            // 'hotel_consolidator_websites' => 'required|in:Yes,No',
            // 'hotel_local_dmc' => 'required|in:Yes,No',
            // 'car_hire_city' => 'required|in:Yes,No',
            // 'car_hire_other_cities' => 'required|in:Yes,No',

            // 'intl_gds_itinerary' => 'required|in:Yes,No',
            // 'intl_pnr_child_infant' => 'required|in:Yes,No',
            // 'intl_senior_citizen_fares' => 'required|in:Yes,No',
            // 'intl_student_fares' => 'required|in:Yes,No',
            // 'intl_youth_special_fares' => 'required|in:Yes,No',
            // 'intl_fare_mask' => 'required|in:Yes,No',
            // 'intl_gds_type' => 'nullable|string',
            // 'intl_gds_other_name' => 'nullable|string|max:255',
            // 'intl_queue_pnrs' => 'required|in:Yes,No',
            // 'intl_first_reissue' => 'required|in:Yes,No',
            // 'intl_subsequent_reissue' => 'required|in:Yes,No',
            // 'intl_ticket_refunds' => 'required|in:Yes,No',
            // 'intl_hotac_rooms' => 'required|in:Yes,No',
            // 'intl_group_pnr' => 'required|in:Yes,No',
            // 'intl_issue_emd' => 'required|in:Yes,No',
            // 'intl_standalone_emd' => 'required|in:Yes,No',
            // 'intl_associated_emd' => 'required|in:Yes,No',
            // 'intl_mng_queues_upd_pnrs'=>'required|in:Yes,No',

            // 'visa_aware_procedures' => 'required|in:Yes,No',
            // 'visa_handled_personally' => 'nullable|in:Yes,No', // Nullable if conditional
            // 'visa_in_department' => 'nullable|in:Yes,No',       // Nullable if conditional
            // 'visa_usa' => 'nullable|in:Yes,No',
            // 'visa_canada' => 'nullable|in:Yes,No',
            // 'visa_mexico' => 'nullable|in:Yes,No',
            // 'visa_brazil' => 'nullable|in:Yes,No',
            // 'visa_other_south_america' => 'nullable|in:Yes,No',
            // 'visa_uk' => 'nullable|in:Yes,No',
            // 'visa_ireland' => 'nullable|in:Yes,No',
            // 'visa_haj_umrah' => 'nullable|in:Yes,No',
            // 'visa_uae' => 'nullable|in:Yes,No',
            // 'visa_schengen_countries' => 'nullable|string|max:255',
            // 'visa_russia' => 'nullable|in:Yes,No',
            // 'visa_china' => 'nullable|in:Yes,No',
            // 'visa_vietnam' => 'nullable|in:Yes,No',
            // 'visa_cambodia' => 'nullable|in:Yes,No',
            // 'visa_hongkong' => 'nullable|in:Yes,No',
            // 'visa_philippines' => 'nullable|in:Yes,No',
            // 'visa_singapore' => 'nullable|in:Yes,No',
            // 'visa_malaysia' => 'nullable|in:Yes,No',
            // 'visa_australia' => 'nullable|in:Yes,No',
            // 'visa_newzealand' => 'nullable|in:Yes,No',
            // 'visa_draft_cover_note' => 'nullable|in:Yes,No',

            // 'tours_handled_packages' => 'required|in:Yes,No',
            // 'tours_countries' => 'nullable|string|max:255',
            // 'tours_worked_cost' => 'required|in:Yes,No',
            // 'tours_incentive_groups' => 'required|in:Yes,No',
            // 'tours_mice_groups' => 'required|in:Yes,No',
            // 'tours_cruise_pax' => 'required|in:Yes,No',

            // 'acc_record_transactions' => 'required|in:Yes,No',
            // 'acc_bank_cc_reconciliation' => 'required|in:Yes,No',
            // 'acc_corporate_card_reconciliation' => 'required|in:Yes,No',
            // 'acc_track_commissions' => 'required|in:Yes,No',
            // 'acc_submit_invoices' => 'required|in:Yes,No',
            // 'acc_manage_financial_records' => 'required|in:Yes,No',
            // 'acc_software_excel_proficient' => 'required|in:Yes,No',
            // 'acc_prepare_analyze_reports' => 'required|in:Yes,No',
            // 'acc_ensure_compliance' => 'required|in:Yes,No',
            // 'acc_manage_ap_ar' => 'required|in:Yes,No',
            // 'acc_process_payroll_expenses' => 'required|in:Yes,No',
            // 'acc_calculate_pay_taxes' => 'required|in:Yes,No',
            // 'acc_coordinate_auditors' => 'required|in:Yes,No',
            // 'acc_monitor_cashflow_forecast' => 'required|in:Yes,No',
            // 'acc_reconcile_bsp' => 'required|in:Yes,No',


            // 'customs_documentation_knowledge' => 'required|in:Yes,No',
            // 'iata_dg_certification' => 'required|in:Yes,No',
            // 'airline_negotiation' => 'required|in:Yes,No',
            // 'air_waybill_execution' => 'required|in:Yes,No',
            // 'regulations_compliance' => 'required|in:Yes,No',
            // 'shipping_bill_knowledge' => 'required|in:Yes,No',
            // 'pharma_shipment_handling' => 'required|in:Yes,No',
            // 'live_animal_handling' => 'required|in:Yes,No',
            // 'perishable_shipment_handling' => 'required|in:Yes,No',
            // 'incoterms_knowledge' => 'required|in:Yes,No',




            //  'customs_documentation_knowledge' => 'required|in:Yes,No',
            // 'iata_dg_certification' => 'required|in:Yes,No',
            // 'airline_negotiation' => 'required|in:Yes,No',
            // 'air_waybill_execution' => 'required|in:Yes,No',
            // 'regulations_compliance' => 'required|in:Yes,No',
            // 'shipping_bill_knowledge' => 'required|in:Yes,No',
            // 'pharma_shipment_handling' => 'required|in:Yes,No',
            // 'live_animal_handling' => 'required|in:Yes,No',
            // 'perishable_shipment_handling' => 'required|in:Yes,No',
            // 'incoterms_knowledge' => 'required|in:Yes,No',
        ];
    }
}
