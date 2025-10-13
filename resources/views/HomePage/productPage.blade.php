@extends('layouts.webSite')
@section('title', 'Job Seeker Form')
@section('content')
    <div class="information-page-slider">
        <div class="information-content">
            <h1><a href="{{ url('/') }}">Home</a><span>Job Seeker Form</span></h1>
        </div>
    </div>
    <div id="about">
        <div class="default-content products-page pt-5 pb-3">
            <div class="custom-container">
                <div class="site-title pb-3">
                    <h2 class="text-center">SKILL-SET BY THE JOB SEEKERS</h2>
                </div>
                <div class="midd-content">
                    <div class="container modern-form-container">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('jobseeker.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3 class="form-section-title mb-3 fw-bold" style="color: #030358;">
                                <i class="fa fa-user-circle me-2 logo"></i> PERSONAL INFORMATION
                            </h3>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="given_name" class="form-label">Given Name:</label>
                                    <div class="input-group">
                                        <span class="input-group-text "><i class="fa fa-user logo"></i></span>
                                        <input type="text" class="form-control" id="given_name" name="given_name"
                                            placeholder="Enter given name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="family_name" class="form-label">Family Name:</label>
                                    <div class="input-group">
                                        <span class="input-group-text "><i class="fa fa-users logo"></i></span>
                                        <input type="text" class="form-control" id="family_name" name="family_name"
                                            placeholder="Enter family name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-calendar-alt logo"></i></span>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-map-marker-alt logo"></i></span>
                                    <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="mobile_no" class="form-label">Mobile No:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-phone logo"></i></span>
                                        <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                                            placeholder="Enter mobile number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="personal_email" class="form-label">Personal Email Id:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-envelope logo"></i></span>
                                        <input type="email" class="form-control" id="personal_email" name="personal_email"
                                            placeholder="Enter personal email address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="total_experience" class="form-label">
                                        TOTAL Number of Travel Trade Experience (Years):
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-briefcase logo"></i></span>
                                        <input type="number" class="form-control" id="total_experience"
                                            name="total_experience" min="0" placeholder="e.g., 5" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="current_city" class="form-label">
                                        City of Present Job (3 Letter City Code):
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-city logo"></i></span>
                                        <input type="text" class="form-control" id="current_city" name="current_city"
                                            maxlength="3" placeholder="e.g., DEL" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>If willing to relocate:</label>
                                <div class="radio-group">
                                    <label><input type="radio" name="willing_to_relocate" value="Yes"
                                            onclick="toggleRelocateCities(true)"> Yes</label>
                                    <label><input type="radio" name="willing_to_relocate" value="No"
                                            onclick="toggleRelocateCities(false)"> No</label>
                                </div>
                            </div>
                            <div class="form-group conditional-field" id="preferred_cities_group">
                                <label for="preferred_cities">Preferred Cities (comma-separated, e.g., DEL, MUM,
                                    BLR):</label>
                                <input type="text" id="preferred_cities" name="preferred_cities">
                            </div>
                            <div class="mb-3">
                                <label for="current_salary" class="form-label">CURRENT SALARY (Rs.):</label>
                                <div class="input-group">
                                    <span class="input-group-text logo">₹</span>
                                    <input type="number" class="form-control" id="current_salary" name="current_salary"
                                        min="0" placeholder="Enter current salary">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cv_upload" class="form-label">Attach/Upload your CV/Resume here:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-paperclip logo"></i></span>
                                    <input type="file" class="form-control" id="cv_upload" name="cv_upload"
                                        accept=".pdf,.doc,.docx" required>
                                </div>
                                <!-- ✅ Small helper text -->
                                <small class="form-text text-muted">
                                    Only PDF file are allowed. File size must be less than 2 MB.
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="current_salary" class="form-label">Do you have any Company whom you do not want
                                    to show CV .</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-briefcase logo"></i></span>
                                    <input type="text" class="form-control" id="not_want_company" name="not_want_company"
                                        min="0" placeholder="Enter Company name">
                                </div>
                            </div>
                            <h3 class="form-section-title mb-3 fw-bold" style="color: #030358;">
                                <i class="fa fa-tools me-2 logo"></i> CREATE YOUR SKILL SET
                            </h3>



                            <style>
                                .custom-multiselect {
                                    position: relative;
                                }

                                .multiselect-dropdown {
                                    position: absolute;
                                    top: 100%;
                                    left: 0;
                                    right: 0;
                                    background: white;
                                    border: 1px solid #dee2e6;
                                    border-radius: 0.375rem;
                                    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                                    z-index: 1000;
                                    max-height: 300px;
                                    overflow-y: auto;
                                }

                                .multiselect-option {
                                    padding: 0.5rem 1rem;
                                    cursor: pointer;
                                    transition: background-color 0.15s ease-in-out;
                                }

                                .multiselect-option:hover {
                                    background-color: #f8f9fa;
                                }

                                .multiselect-option.selected {
                                    background-color: #0d6efd;
                                    color: white;
                                }

                                .selected-items {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 0.25rem;
                                    margin-top: 0.5rem;
                                }

                                .selected-item {
                                    background-color: #0d6efd;
                                    color: white;
                                    padding: 0.25rem 0.5rem;
                                    border-radius: 0.25rem;
                                    font-size: 0.875rem;
                                    display: flex;
                                    align-items: center;
                                    gap: 0.25rem;
                                }

                                .remove-item {
                                    cursor: pointer;
                                    background: none;
                                    border: none;
                                    color: white;
                                    font-size: 1rem;
                                    line-height: 1;
                                    padding: 0;
                                }

                                .multiselect-toggle {
                                    width: 100%;
                                    text-align: left;
                                    background: white;
                                    border: 1px solid #dee2e6;
                                    padding: 0.375rem 0.75rem;
                                    border-radius: 0.375rem;
                                    cursor: pointer;
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                }

                                .multiselect-toggle:focus {
                                    border-color: #86b7fe;
                                    outline: 0;
                                    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
                                }

                                .dropdown-arrow {
                                    transition: transform 0.15s ease-in-out;
                                }

                                .dropdown-arrow.rotated {
                                    transform: rotate(180deg);
                                }
                            </style>
                            <div class="mb-3">
                                <label for="job_areas" class="form-label">
                                    <strong style="color:black;">Please specify to which area of the job you are
                                        applying*:</strong>
                                </label>

                                <div class="custom-multiselect">
                                    <button type="button" class="multiselect-toggle" id="multiselectToggle">
                                        <span id="selectedText">Select job areas</span>
                                        <span class="dropdown-arrow">▼</span>
                                    </button>

                                    <div class="multiselect-dropdown d-none" id="multiselectDropdown">
                                        <div class="multiselect-option" data-value="Fresher/New Entrant">Fresher/New Entrant
                                        </div>
                                        <div class="multiselect-option" data-value="Domestic Travel">Domestic Travel</div>
                                        <div class="multiselect-option" data-value="Hotel Bookings & Car Hire">Hotel
                                            Bookings & Car Hire</div>
                                        <div class="multiselect-option" data-value="International Travel - Basic Skills">
                                            International Travel - Basic Skills (Base Positions)</div>
                                        <div class="multiselect-option" data-value="International Travel - Advanced Skills">
                                            International Travel - Advanced Skills (Senior Positions)</div>
                                        <div class="multiselect-option" data-value="VISA Handling">VISA Handling</div>
                                        <div class="multiselect-option" data-value="Tours and Holiday Packages">Tours and
                                            Holiday Packages</div>
                                        <div class="multiselect-option" data-value="Accounting">Accounting</div>
                                        <div class="multiselect-option" data-value="Cargo Handlers">Cargo Handlers</div>
                                    </div>
                                </div>


                                <!-- <input type="hidden" name="job_areas[]" id="jobAreaInput" required> -->

                                <!-- Display selected items -->
                                <div class="selected-items" id="selectedItems"></div>
                            </div>
                            <div id="fresher-section" class="skill-section d-none" data-toggle="Fresher/New Entrant">
                                <div class="form-group radio-group-wrapper">
                                    <label>I want to enter the Travel Industry and have no prior work
                                        experience.</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="no_prior_experience" value="Yes"> Yes</label>
                                        <label><input type="radio" name="no_prior_experience" value="No"> No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Have you completed a Travel & Tourism course?</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="completed_travel_course" value="Yes"
                                                onclick="toggleInstitution(true)"> Yes</label>
                                        <label><input type="radio" name="completed_travel_course" value="No"
                                                onclick="toggleInstitution(false)"> No</label>
                                    </div>
                                </div>
                                <div class="conditional-field" id="preferred_institution">
                                    <div class="form-group">
                                        <label for="institution_name">Name of the Institution:</label>
                                        <input type="text" id="institution_name" name="institution_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="institution_city">Name of the City:</label>
                                        <input type="text" id="institution_city" name="institution_city">
                                    </div>
                                </div>
                            </div>
                            <div id="domestic-travel-section" class="skill-section d-none" data-toggle="Domestic Travel">
                                <h4><span>1. </span>Domestic Travel</h4>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">a. </span>plan/Build an Itinerary on
                                            GDS?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_gds_itinerary" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_gds_itinerary" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">b. </span>PNR Creation for Adult Pax:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_pnr_adult" value="Yes"> Yes</label>
                                            <label><input type="radio" name="domestic_pnr_adult" value="No"> No</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">c. </span>PNR Creation for Children and
                                            Infants?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_pnr_child_infant" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_pnr_child_infant" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">d. </span>Senior Citizen?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_senior_citizen_fares" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_senior_citizen_fares" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">e. </span>Students?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_student_fares" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_student_fares" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">f. </span>Youth & Other Special
                                            Fares?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_youth_special_fares" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_youth_special_fares" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">g. </span>Creation of fare Mask for
                                            Ticketing:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_fare_mask" value="Yes"> Yes</label>
                                            <label><input type="radio" name="domestic_fare_mask" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">h. </span>Ticketing on GDS:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_ticketing_gds" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="domestic_ticketing_gds" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><span style="font-weight:bold">i. </span>GDS:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="domestic_gds_type" value="Amadeus"
                                                onclick="toggleDomesticGdsOther(false)"> Amadeus</label>
                                        <label><input type="radio" name="domestic_gds_type" value="Galileo"
                                                onclick="toggleDomesticGdsOther(false)"> Galileo</label>
                                        <label><input type="radio" name="domestic_gds_type" value="Sabre"
                                                onclick="toggleDomesticGdsOther(false)"> Sabre</label>
                                        <label><input type="radio" name="domestic_gds_type" value="Other"
                                                onclick="toggleDomesticGdsOther(true)"> Other</label>
                                    </div>
                                    <div class="conditional-field" id="domestic_gds_other_name_group">
                                        <label for="domestic_gds_other_name">Specify Other GDS:</label>
                                        <input type="text" id="domestic_gds_other_name" name="domestic_gds_other_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">j. </span>Ticketing experience through direct
                                            log-in to LCC Websites:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_lcc_websites" value="Yes"> Yes</label>
                                            <label><input type="radio" name="domestic_lcc_websites" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">k. </span>Through Suppliers Portal (Make My
                                            Trip, TBO, Akbar, Ria, etc.):</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="domestic_supplier_portal" value="Yes"
                                                    onclick="toggleDomesticSupplierPortalName(true)"> Yes</label>
                                            <label><input type="radio" name="domestic_supplier_portal" value="No"
                                                    onclick="toggleDomesticSupplierPortalName(false)"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group conditional-field" id="domestic_supplier_portal_name_group">
                                    <label for="domestic_supplier_portal_name">Name the portal:</label>
                                    <input type="text" id="domestic_supplier_portal_name"
                                        name="domestic_supplier_portal_name">
                                </div>
                            </div>
                            <div id="hotel-car-hire-section" class="skill-section" data-toggle="Hotel Bookings & Car Hire">

                                <h4><span>2. </span>Hotel Bookings & Car Hire</h4>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">a. </span>Handle Hotel Bookings within
                                            India?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="hotel_bookings_india" value="Yes"> Yes</label>
                                            <label><input type="radio" name="hotel_bookings_india" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">b. </span>Contact the Hotel directly?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="hotel_contact_direct" value="Yes"> Yes</label>
                                            <label><input type="radio" name="hotel_contact_direct" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">c. </span>Book through Hotel Consolidator
                                            Websites like Hotels.com, Etc.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="hotel_consolidator_websites" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="hotel_consolidator_websites" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">d. </span>or through the Local DMC?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="hotel_local_dmc" value="Yes"> Yes</label>
                                            <label><input type="radio" name="hotel_local_dmc" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">e. </span>Handle Car Hire within your
                                            city?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="car_hire_city" value="Yes"> Yes</label>
                                            <label><input type="radio" name="car_hire_city" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">f. </span>Handle Car Hire in other Indian
                                            Cities?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="car_hire_other_cities" value="Yes"> Yes</label>
                                            <label><input type="radio" name="car_hire_other_cities" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="intl-basic-section" class="skill-section"
                                data-toggle="International Travel - Basic Skills">

                                <h4><span>3. </span>International Travel - Basic Skills (Base Positions)</h4>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">a. </span>Plan/build an Itinerary on GDS for
                                            Intl Travel?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_gds_itinerary" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_gds_itinerary" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">b. </span>Inputs for PNR Creation for Children
                                            and Infants?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_pnr_child_infant" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_pnr_child_infant" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">c. </span>Senior Citizen?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_senior_citizen_fares" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="intl_senior_citizen_fares" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">d. </span>Students?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_student_fares" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_student_fares" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">e. </span>Youth & Other Special
                                            Fares?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_youth_special_fares" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="intl_youth_special_fares" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">f. </span>Create a Fare Mask for
                                            Ticketing?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_fare_mask" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_fare_mask" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- Left Side: GDS Radios -->
                                    <div class="col-md-6">
                                        <label><span style="font-weight:bold">g. </span>Have you worked on GDS?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_gds_type" value="Amadeus"
                                                    onclick="toggleIntlGdsOther(false)"> Amadeus</label>
                                            <label><input type="radio" name="intl_gds_type" value="Galileo"
                                                    onclick="toggleIntlGdsOther(false)"> Galileo</label>
                                            <label><input type="radio" name="intl_gds_type" value="Sabre"
                                                    onclick="toggleIntlGdsOther(false)"> Sabre</label>
                                            <label><input type="radio" name="intl_gds_type" value="Other"
                                                    onclick="toggleIntlGdsOther(true)"> Other</label>
                                        </div>
                                        <div class="conditional-field mt-2" id="intl_gds_other_name_group">
                                            <label for="intl_gds_other_name">Specify Other GDS:</label>
                                            <input type="text" id="intl_gds_other_name" name="intl_gds_other_name"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <!-- Right Side: Queue PNRs -->
                                    <div class="col-md-6">
                                        <label><span style="font-weight:bold">h. </span>Queue PNRs to
                                            Consolidators?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_queue_pnrs" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_queue_pnrs" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="intl-advanced-section" class="skill-section"
                                data-toggle="International Travel - Advanced Skills">


                                <h4><span>4.</span>International Travel - Advanced SKILLS (Senior Positions)</h4>

                                <div class="form-row">

                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">a. </span>The formats and procedures for First
                                            reissuing a ticket?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_first_reissue" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_first_reissue" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">b. </span>The formats and procedures for
                                            reissuing a ticket after the First
                                            Reissue?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_subsequent_reissue" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="intl_subsequent_reissue" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">c. </span>The formats and Procedures for
                                            Refunds of a ticket?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_ticket_refunds" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_ticket_refunds" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">d. </span>Can you use the HOTAC option to book
                                            Rooms?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_hotac_rooms" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_hotac_rooms" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">e. </span>Create a PNR for Group
                                            Booking?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_group_pnr" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_group_pnr" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">f. </span>How to issue EMD?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_issue_emd" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_issue_emd" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">g. </span>Do you know Stand Alone
                                            EMD?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_standalone_emd" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_standalone_emd" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">h. </span>Know the Associated EMD Issuance for
                                            EB, Seat, & Seat election?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="intl_associated_emd" value="Yes"> Yes</label>
                                            <label><input type="radio" name="intl_associated_emd" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group radio-group-wrapper">
                                    <label><span style="font-weight:bold">i. </span>To Manage Queues and update
                                        PNRs:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="intl_mng_queues_upd_pnrs" value="Yes"> Yes</label>
                                        <label><input type="radio" name="intl_mng_queues_upd_pnrs" value="No"> No</label>
                                    </div>
                                </div>
                            </div>


                            <div id="visa-handling-section" class="skill-section" data-toggle="VISA Handling">

                                <h4><span>5. </span></span>VISA Handling:</h4>
                                <div class="form-group radio-group-wrapper">
                                    <label><span style="font-weight:bold">a. </span>Are you aware of Visa Handling
                                        Procedures?:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="visa_aware_procedures" value="Yes"
                                                onclick="toggleVisaQuestions(true)"> Yes</label>
                                        <label><input type="radio" name="visa_aware_procedures" value="No"
                                                onclick="toggleVisaQuestions(false)"> No</label>
                                    </div>
                                </div>
                                <div id="visa_handling_questions" class="conditional-field" style="overflow-y: auto;">
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Did you personally handle Visas for your Pax?:</label>
                                            <div class="radio-group">
                                                <label><input type="radio" name="visa_handled_personally" value="Yes">
                                                    Yes</label>
                                                <label><input type="radio" name="visa_handled_personally" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Are you working in your Agency's Visa Handling
                                                Department/Activity?:</label>
                                            <div class="radio-group">
                                                <label><input type="radio" name="visa_in_department" value="Yes">
                                                    Yes</label>
                                                <label><input type="radio" name="visa_in_department" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Did you previously handle Visa Applications for:</h5>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>USA:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_usa" value="Yes">
                                                    Yes</label> <label><input type="radio" name="visa_usa" value="No">
                                                    No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Canada:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_canada"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_canada" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Mexico:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_mexico"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_mexico" value="No"> No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Brazil:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_brazil"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_brazil" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Any other South American Countries:</label>
                                        <div class="radio-group"><label><input type="radio" name="visa_other_south_america"
                                                    value="Yes"> Yes</label>
                                            <label><input type="radio" name="visa_other_south_america" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>UK:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_uk" value="Yes">
                                                    Yes</label> <label><input type="radio" name="visa_uk" value="No">
                                                    No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Ireland:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_ireland"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_ireland" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>HAJ/Umrah:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_haj_umrah"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_haj_umrah" value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>UAE:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_uae" value="Yes">
                                                    Yes</label> <label><input type="radio" name="visa_uae" value="No">
                                                    No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="visa_schengen_countries">(If Yes, Which Schengen Country or
                                            Countries in
                                            Schengen………..?):</label>
                                        <input type="text" id="visa_schengen_countries" name="visa_schengen_countries">
                                    </div>
                                    <h5>Have you handled visas for:</h5>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Russia:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_russia"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_russia" value="No"> No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>China:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_china"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_china" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Vietnam:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_vietnam"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_vietnam" value="No"> No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Cambodia:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_cambodia"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_cambodia" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Hong Kong:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_hongkong"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_hongkong" value="No"> No</label></div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Philippines:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_philippines"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="visa_philippines" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Singapore:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_singapore"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_singapore" value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>Malaysia:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_malaysia"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_malaysia" value="No"> No</label></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group radio-group-wrapper">
                                            <label>Australia:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_australia"
                                                        value="Yes"> Yes</label> <label><input type="radio"
                                                        name="visa_australia" value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group radio-group-wrapper">
                                            <label>New Zealand:</label>
                                            <div class="radio-group"><label><input type="radio" name="visa_newzealand"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="visa_newzealand" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Can you assist PAX to draft a cover note for all types of Visa
                                            applications?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="visa_draft_cover_note" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="visa_draft_cover_note" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tours-holiday-section" class="skill-section" data-toggle="Tours and Holiday Packages">

                                <h4><span>6. </span>TOURS AND HOLIDAY PACKAGES</h4>
                                <div class="form-group radio-group-wrapper">
                                    <label><span style="font-weight:bold">a. </span>Have you handled Tour Packages?:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="tours_handled_packages" value="Yes"
                                                onclick="toggleTourCountries(true)"> Yes</label>
                                        <label><input type="radio" name="tours_handled_packages" value="No"
                                                onclick="toggleTourCountries(false)"> No</label>
                                    </div>
                                </div>
                                <div class="form-group conditional-field" id="tours_countries_group">
                                    <label for="tours_countries">To which countries
                                        did you handled Tour
                                        Packages:</label>
                                    <input type="text" id="tours_countries" name="tours_countries">
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">b. </span>Have you worked out the total cost
                                            of the Tours?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="tours_worked_cost" value="Yes"> Yes</label>
                                            <label><input type="radio" name="tours_worked_cost" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">c. </span>Have you handled Incentive
                                            Groups?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="tours_incentive_groups" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="tours_incentive_groups" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">d. </span>Have you handled MICE
                                            Groups?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="tours_mice_groups" value="Yes"> Yes</label>
                                            <label><input type="radio" name="tours_mice_groups" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label><span style="font-weight:bold">e. </span>Have You handled Cruise
                                            Pax?:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="tours_cruise_pax" value="Yes"> Yes</label>
                                            <label><input type="radio" name="tours_cruise_pax" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div id="accounting-section" class="skill-section" data-toggle="Accounting">

                                <h3 class="form-section-title mb-3 fw-bold" style="color: #030358;">
                                    <i class="fa fa-calculator me-2 logo"></i> ACCOUNTING
                                </h3>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>I CAN… Record the transactions daily, both for revenue and
                                            expenses:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_record_transactions" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_record_transactions" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Periodical Bank Reconciliations and Credit card transactions:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_bank_cc_reconciliation" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_bank_cc_reconciliation" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Reconciliations of corporate travel card activity:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_corporate_card_reconciliation" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_corporate_card_reconciliation" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Tracking of Commissions receivable from Airlines, Insurance
                                            companies:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_track_commissions" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_track_commissions" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Timely submission of Invoices to corporate clients:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_submit_invoices" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_submit_invoices" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Maintaining and managing financial records for the travel
                                            agency.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_manage_financial_records" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_manage_financial_records" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Proficient in accounting software and Microsoft Excel:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_software_excel_proficient" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_software_excel_proficient" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Prepare and analyze financial reports, statements, and budgets.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_prepare_analyze_reports" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_prepare_analyze_reports" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Ensure compliance with financial regulations and standards.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_ensure_compliance" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_ensure_compliance" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Manage accounts payable and receivable.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_manage_ap_ar" value="Yes"> Yes</label>
                                            <label><input type="radio" name="acc_manage_ap_ar" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Process payroll and manage expense reports.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_process_payroll_expenses" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_process_payroll_expenses" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Timely Calculate & Pay: TDS, GST, Advance Tax within the due
                                            dates:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_calculate_pay_taxes" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_calculate_pay_taxes" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group radio-group-wrapper">
                                        <label>Coordinating with auditors to ensure compliance with all
                                            regulations.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_coordinate_auditors" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_coordinate_auditors" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group radio-group-wrapper">
                                        <label>Monitor and manage cash flow and forecast future financial
                                            trends.:</label>
                                        <div class="radio-group">
                                            <label><input type="radio" name="acc_monitor_cashflow_forecast" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="acc_monitor_cashflow_forecast" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group radio-group-wrapper">
                                    <label>Reconcile BSP Invoices Statement with Ledger entries.:</label>
                                    <div class="radio-group">
                                        <label><input type="radio" name="acc_reconcile_bsp" value="Yes"> Yes</label>
                                        <label><input type="radio" name="acc_reconcile_bsp" value="No"> No</label>
                                    </div>
                                </div>

                            </div>

                            <div id="cargo-handlers-section" class="skill-section" data-toggle="Cargo Handlers">

                                <h3 class="form-section-title mb-3 fw-bold"
                                    style="color: #030358; margin:0px; padding:0px;margin-top:40px;">
                                    <i class="fa fa-ship me-2 logo"></i> CARGO HANDLERS
                                </h3>


                                <div class="form-row" style="margin-top:30px;">
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of required paperwork - customs documentation, Air
                                            waybills:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="customs_documentation_knowledge"
                                                    value="Yes"> Yes</label>
                                            <label><input type="radio" name="customs_documentation_knowledge" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>IATA Dangerous Goods Certification:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="iata_dg_certification"
                                                    value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="iata_dg_certification" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Negotiate rates and terms with the airlines and process necessary
                                            bookings:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="airline_negotiation" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="airline_negotiation" value="No"> No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Air Waybill execution</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="air_waybill_execution"
                                                    value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="air_waybill_execution" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Adherence to industry regulations and safety protocols, compliance
                                            checks:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="regulations_compliance"
                                                    value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="regulations_compliance" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of filling Shipping bill for exports and Bill of entry for
                                            imports:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="shipping_bill_knowledge"
                                                    value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="shipping_bill_knowledge" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of handling pharmaceutical shipments:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="pharma_shipment_handling"
                                                    value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="pharma_shipment_handling" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of handling live animals:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="live_animal_handling" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="live_animal_handling" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of handling perishable shipments:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="perishable_shipment_handling"
                                                    value="Yes"> Yes</label>
                                            <label><input type="radio" name="perishable_shipment_handling" value="No">
                                                No</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Knowledge of Incoterms:</label>
                                        <div class="radio-group">
                                            <label class="mr-3"><input type="radio" name="incoterms_knowledge" value="Yes">
                                                Yes</label>
                                            <label><input type="radio" name="incoterms_knowledge" value="No"> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group terms-wrapper">
                                <label>
                                    <input type="checkbox" name="agree_terms" required>
                                    I agree to the <a href="{{ route('termsConditions') }}" target="_blank">Terms &
                                        Conditions</a>.
                                </label>
                            </div>

                            <button type="submit">Submit Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .terms-wrapper {
            margin: 15px 0;
            font-size: 19px;
        }

        .terms-wrapper a {
            color: #ff6b35;
            text-decoration: underline;
        }

        .terms-wrapper a:hover {
            text-decoration: none;
        }

        /* General body and font styling */
        body {
            font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        /* Container for the form */
        .modern-form-container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            padding: 40px 50px;
            /* Increased padding */
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            /* More prominent shadow */
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Headings */
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.4em;
            /* Slightly larger */
            font-weight: 700;
            /* Bolder */
        }

        h3.form-section-title {
            color: #030358;
            padding-bottom: 15px;
            /* More padding */
            margin-top: 45px;
            /* More space above */
            margin-bottom: 30px;
            /* More space below */
            font-size: 2em;
            /* Larger */
            font-weight: 600;
            text-transform: uppercase;
            /* Uppercase for sections */
            letter-spacing: 0.5px;
        }

        .logo {
            color: #030358;
        }

        h4 {
            color: black;
            /* Darker grey */
            margin-top: 35px;
            margin-bottom: 25px;
            font-size: 1.6em;
            /* Larger */
            font-weight: 600;
            border-bottom: 1px dashed #e0e0e0;
            /* Subtle separator */
            padding-bottom: 10px;
        }

        h5 {
            color: #666;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 1.2em;
            /* Slightly larger */
            font-weight: 500;
        }

        /* Form groups and labels */
        .form-group {
            margin-bottom: 25px;
            /* Standardized margin for single input fields and for spacing between form rows/groups */
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
            /* Darker blue-grey for labels */
            font-size: 1.05em;
            /* Slightly larger font */
        }

        /* Input fields and textareas */
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group textarea,
        .form-group select,
        .form-group input[type="file"] {
            width: 100%;
            padding: 14px 18px;
            /* More padding */
            border: 1px solid #dcdcdc;
            /* Lighter border */
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            color: #495057;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fdfdfd;
            /* Slightly off-white background */
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="number"]:focus,
        .form-group input[type="date"]:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.3rem rgba(0, 123, 255, 0.35);
            /* More pronounced shadow on focus */
            outline: none;
        }

        /* Radio button group styling */
        .radio-group-wrapper {
            /* New wrapper to ensure consistent margin-bottom for radio groups */
            margin-bottom: 25px;
            /* Standardized margin */
        }

        .radio-group {
            /* Inner flex container for radio options */
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Space between radio options */
            margin-top: 10px;
            /* Space between label and radio options */
        }

        .radio-group label {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            font-weight: normal;
            color: #333;
            font-size: 1em;
            margin-bottom: 0;
            /* Override default form-group label margin */
        }

        .radio-group input[type="radio"] {
            margin-right: 10px;
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            /* Slightly larger */
            height: 20px;
            /* Slightly larger */
            border: 2px solid #a0a0a0;
            /* Darker grey border */
            border-radius: 50%;
            position: relative;
            outline: none;
            cursor: pointer;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .radio-group input[type="radio"]:hover {
            border-color: #007bff;
        }

        .radio-group input[type="radio"]:checked {
            border-color: #007bff;
            background-color: #e6f2ff;
            /* Light blue background when checked */
        }

        .radio-group input[type="radio"]:checked::before {
            content: '';
            width: 10px;
            height: 10px;
            background-color: #007bff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: radioCheck 0.2s ease-out;
        }

        @keyframes radioCheck {
            from {
                transform: translate(-50%, -50%) scale(0);
                opacity: 0;
            }

            to {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        /* Conditional fields with smooth transition */
        .conditional-field {
            margin-top: 25px;
            /* More space above */
            padding-left: 25px;
            /* More padding */
            border-left: 5px solid #007bff;
            /* Thicker border */
            background-color: #eef7ff;
            /* Lighter blue background */
            padding: 20px 25px;
            /* More padding */
            border-radius: 10px;
            /* Slightly more rounded corners */
            box-shadow: inset 0 0 8px rgba(0, 123, 255, 0.1);
            /* Inner shadow for depth */
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            transition: max-height 0.7s ease-in-out, opacity 0.5s ease-in-out;
        }

        .conditional-field.show {
            max-height: 500px;
            /* Sufficiently large height for content */
            opacity: 1;
        }

        /* Styles for two input fields on one line */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            /* Increased gap between columns */
            margin-bottom: 25px;
            /* Standardized margin between rows of input fields */
        }

        .form-row .form-group {
            flex: 1 1 calc(50% - 15px);
            /* Distribute space for two columns, accounting for gap */
            margin-bottom: 0;
            /* Remove bottom margin from inner form-groups as their parent form-row handles the spacing */
        }

        /* Submit Button */
        button[type="submit"] {
            /* background-color: #28a745; */
            background-color: #030358;
            color: white;
            padding: 15px 35px;
            /* Larger padding */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2em;
            /* Larger font */
            font-weight: 600;
            margin-top: 40px;
            /* More space above */
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 6px 15px rgba(40, 167, 69, 0.3);
            /* More pronounced initial shadow */
        }

        button[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-3px);
            /* More lift on hover */
            box-shadow: 0 9px 20px rgba(40, 167, 69, 0.4);
            /* Stronger shadow on hover */
        }

        button[type="submit"]:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(40, 167, 69, 0.2);
            /* Reduced shadow on click */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modern-form-container {
                padding: 30px;
                /* Reduce padding on smaller screens */
                margin: 20px auto;
            }

            h2 {
                font-size: 2em;
            }

            h3.form-section-title {
                font-size: 1.6em;
                margin-top: 30px;
                margin-bottom: 20px;
            }

            h4 {
                font-size: 1.3em;
                margin-top: 25px;
                margin-bottom: 15px;
            }

            .form-row {
                flex-direction: column;
                /* Stack fields vertically on small screens */
                gap: 0;
                /* Remove gap when stacked */
                margin-bottom: 0;
                /* Handled by individual form-group margin */
            }

            .form-row .form-group {
                flex: 1 1 100%;
                /* Make each form-group take full width */
                margin-bottom: 25px;
                /* Restore standardized bottom margin for stacking */
            }

            .radio-group-wrapper {
                margin-bottom: 25px;
                /* Ensure radio group wrappers maintain consistent spacing */
            }
        }



        #preferred_institution {
            overflow-y: auto;
            width: 100%;
            max-width: 800px;
            /* optional: limit max width on large screens */
            margin: 0 auto;
            /* center on large screens */
        }

        #preferred_institution .form-group {
            width: 100%;
            margin-bottom: 15px;
        }

        #preferred_institution input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            /* ensures padding doesn’t break width */
        }

        @media (max-width: 768px) {
            #preferred_institution {
                padding: 0 10px;
                /* small padding on mobile */
            }
        }
    </style>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    const multiselectToggle = document.getElementById('multiselectToggle');
    const multiselectDropdown = document.getElementById('multiselectDropdown');
    const multiselectOptions = document.querySelectorAll('.multiselect-option');
    const selectedTextSpan = document.getElementById('selectedText');
    const selectedItemsContainer = document.getElementById('selectedItems');
    const skillSections = document.querySelectorAll('.skill-section');

    // Hidden input for backend
    let selectedOptions = [];
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'job_areas';
    multiselectToggle.parentElement.appendChild(hiddenInput);

    // Helper to clear inputs in a section
    const clearSectionInputs = section => {
        const inputs = section.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.removeAttribute('required');
            if (['text','textarea','number','email','date'].includes(input.type)) input.value = '';
            if (['radio','checkbox'].includes(input.type)) input.checked = false;
            if (input.type === 'file') input.value = '';
        });
    };

    // Show/hide sections based on selected options
    const updateFormSections = () => {
        skillSections.forEach(section => {
            const toggleValue = section.dataset.toggle;
            const show = selectedOptions.includes(toggleValue);
            section.classList.toggle('d-none', !show);
            if (!show) clearSectionInputs(section);
        });
    };

    // Update selected text and hidden input
    const updateSelectedText = () => {
        if (selectedOptions.length === 0) {
            selectedTextSpan.textContent = 'Select job areas';
        } else {
            selectedTextSpan.textContent = `${selectedOptions.length} job area${selectedOptions.length > 1 ? 's' : ''} selected`;
        }
        hiddenInput.value = selectedOptions.join(',');
        updateFormSections();
    };

    // Create selected item UI
    const createSelectedItem = value => {
        const item = document.createElement('div');
        item.classList.add('selected-item');
        item.textContent = value;

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.classList.add('remove-item');
        removeBtn.innerHTML = '&times;';
        removeBtn.onclick = () => {
            selectedOptions = selectedOptions.filter(opt => opt !== value);
            item.remove();
            document.querySelector(`.multiselect-option[data-value="${value}"]`)?.classList.remove('selected');
            updateSelectedText();
        };

        item.appendChild(removeBtn);
        selectedItemsContainer.appendChild(item);
    };

    // Initialize selectedOptions if any option is already marked (for single select scenario)
    multiselectOptions.forEach(option => {
        if (option.classList.contains('selected')) {
            const value = option.dataset.value;
            selectedOptions.push(value);
            createSelectedItem(value);
        }
    });
    updateSelectedText();

    // Toggle dropdown
    multiselectToggle.addEventListener('click', () => {
        multiselectDropdown.classList.toggle('d-none');
        multiselectToggle.querySelector('.dropdown-arrow')?.classList.toggle('rotated');
    });

    // Handle option click
    multiselectOptions.forEach(option => {
        option.addEventListener('click', () => {
            const value = option.dataset.value;
            if (selectedOptions.includes(value)) {
                selectedOptions = selectedOptions.filter(opt => opt !== value);
                option.classList.remove('selected');
                selectedItemsContainer.querySelectorAll('.selected-item').forEach(item => {
                    if (item.textContent.includes(value)) item.remove();
                });
            } else {
                selectedOptions.push(value);
                option.classList.add('selected');
                createSelectedItem(value);
            }
            updateSelectedText();
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', e => {
        if (!multiselectToggle.contains(e.target) && !multiselectDropdown.contains(e.target)) {
            multiselectDropdown.classList.add('d-none');
            multiselectToggle.querySelector('.dropdown-arrow')?.classList.remove('rotated');
        }
    });

});

</script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form"); // adjust selector if needed
            const cvInput = document.getElementById("cv_upload");

            form.addEventListener("submit", function (event) {
                let errors = [];

                // Check CV size
                if (cvInput.files.length > 0) {
                    const fileSize = cvInput.files[0].size / 1024 / 1024; // in MB
                    if (fileSize > 2) {
                        errors.push("CV must be less than 2MB.");
                    }
                }

                // Add your other client-side checks here if needed
                // Example: Check if mobile number is only digits
                const mobile = document.querySelector("input[name='mobile_no']");
                if (mobile && !/^\d+$/.test(mobile.value)) {
                    errors.push("Mobile number must contain only digits.");
                }

                if (errors.length > 0) {
                    event.preventDefault(); // Stop form submission
                    alert(errors.join("\n")); // Show error messages
                }
            });
        });
    </script>



@endsection