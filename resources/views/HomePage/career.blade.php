@extends('layouts.webSite')
@section('title', 'Gramin Parivar Foundation')


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
    <style>
        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 0px;
            border: 3px solid #2d5016;
        }

        .header {
            background: linear-gradient(to bottom, #7cb342 0%, #558b2f 100%);
            padding: 15px 20px;
            border-bottom: 3px solid #2d5016;
        }

        .header h1 {
            color: white;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .ad-numbers {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #e8f5e9;
            border-bottom: 2px solid #2d5016;
        }

        .ad-box {
            padding: 12px 20px;
            border-right: 2px solid #2d5016;
        }

        .ad-box:last-child {
            border-right: none;
        }

        .ad-box strong {
            display: block;
            color: #1b5e20;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .ad-box span {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
        }

        .ad-box a {
            color: #1565c0;
            text-decoration: none;
            font-size: 12px;
        }

        .ad-box a:hover {
            text-decoration: underline;
        }

        .content {
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 2px solid #2d5016;
        }

        tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 12px 20px;
            vertical-align: top;
            border-right: 2px solid #2d5016;
        }

        td:last-child {
            border-right: none;
        }

        .label {
            width: 35%;
            background: #f1f8e9;
            font-weight: 600;
            color: #1b5e20;
            font-size: 14px;
        }

        .value {
            width: 65%;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }

        .value strong {
            color: #1b5e20;
        }
    </style>
    <div class="container">
        <div class="header">
            <h1>Digital Siksha Sarthi Recruitment / डिजिटल शिक्षा सारथी भर्ती - 2025</h1>
        </div>

        <div class="ad-numbers">
            <div class="ad-box">
                <strong>Advt. No. CKKKGPF/DSS/REQ/10/2025</strong>
                <!-- <span>JBSA-RNG/01/2024/P-B</span> -->
                <!-- <a href="#">Download Advertisement (English Version)</a> -->
            </div>
            <!-- <div class="ad-box">
                                                                                        <strong>Raaem No.</strong>
                                                                                        <span>JBSA-RNG/01/2024/P-B</span>
                                                                                        <a href="#">विज्ञापन डाउनलोड (हिंदी संस्करण)</a><br>
                                                                                        <a href="#">आवेदन के लिए यहाँ क्लिक करें</a>
                                                                                    </div> -->
        </div>

        <div class="content">
            <table>
                <tr>
                    <td class="label">Post For<br>पद का नाम</td>
                    <td class="value">Teacher<br>अध्यापक</td>
                </tr>
                <!-- <tr>
                                                                            <td class="label">Post Code<br>पद कोड</td>
                                                                            <td class="value">01</td>
                                                                        </tr> -->
                <tr>
                    <td class="label">Total Post<br>कुल पोस्ट</td>
                    <td class="value">In all school, state- Bihar, Jharkhand, Uttar Pradesh, Chhattisgarh, Delhi, Madhya
                        Pradesh, Haryana</td>
                </tr>
                <tr>
                    <td class="label">Emoluments<br>वेतनमान</td>
                    <td class="value">Rs 15,000/- to Rs 25,500/-<br><strong>रु. 15,000/- से रु. 25,500/-</strong></td>
                </tr>
                <tr>
                    <td class="label">Age Limit<br>आयु सीमा</td>
                    <td class="value">21 Years to 40 Years (As on 01.01.2025)<br><strong>21 वर्ष से 40 वर्ष (01.01.2025
                            तक)</strong></td>
                </tr>
                <tr>
                    <td class="label">Qualification<br>शैक्षणिक योग्यता</td>
                    <td class="value">12th pass to Higher Education</td>
                </tr>
                <!-- <tr>
                                        <td class="label">Experience<br>अनुभव</td>
                                        <td class="value">3-5 years in 40 years (As on 01.01.2025)<br><strong>40 वर्ष में 3-5 वर्ष
                                                (01.01.2025 तक)</strong></td>
                                    </tr> -->
                <!-- <tr>
                                    <td class="label">Job Location<br>कार्य स्थल</td>
                                    <td class="value">Raipur, Chhattisgarh, Korba, Durg, Surguja, Rajnandgaon, Bilaspur, Janjgir-Champa,
                                        Raigarh, Jashpur, Balrampur-Ramanujganj, Koriya, Surajpur, Balod, Bemetara, Baloda Bazar,
                                        Gariaband, Dhamtari, Mahasamund, Kondagaon, Kanker, Bastar, Sukma, Bijapur, Dantewada,
                                        Narayanpur<br>रायपुर, छत्तीसगढ़, कोरबा, दुर्ग, सरगुजा, राजनांदगाँव, बिलासपुर, जांजगीर-चाम्पा,
                                        रायगढ़, जशपुर, बलरामपुर-रामानुजगंज, कोरिया, सूरजपुर, बालोद, बेमेतरा, बलौदा बाजार, गरियाबंद,
                                        धमतरी, महासमुंद, कोंडागाँव, कांकेर, बस्तर, सुकमा, बीजापुर, दंतेवाड़ा, नारायणपुर</td>
                                </tr> -->
                <tr>
                    <td class="label">Selection<br>चयन</td>
                    <td class="value">Selection on Qualification Basis & Interview<br><strong>योग्यता एवं साक्षात्कार के
                            आधार पर चयन</strong></td>
                </tr>
                <tr>
                    <td class="label">Application Fee<br>आवेदन शुल्क</td>
                    <td class="value">Rs.220/-<br><strong>रु. 220/-</strong></td>
                </tr>
                <tr>
                    <td class="label">Application Begins<br>आवेदन आरम्भ</td>
                    <td class="value">20.10.2025<br><strong>20.10.2025</strong></td>
                </tr>
                <tr>
                    <td class="label">Last Date of<br>Application<br>आवेदन की<br>अंतिम तिथि</td>
                    <td class="value">20.11.2025<br><strong>20.11.2025</strong></td>
                </tr>
                {{-- <tr>
                    <td class="label">Last Date till<br>Received<br>प्राप्त होने की<br>अंतिम तिथि</td>
                    <td class="value">27.05.2024<br><strong>27.05.2024</strong></td>
                </tr>
                <tr>
                    <td class="label">Free Age Last<br>Date<br>निःशुल्क आयु अंतिम<br>तिथि</td>
                    <td class="value">31.05.2024<br><strong>31.05.2024</strong></td>
                </tr> --}}
                <tr>
                    <td class="label">Additional<br>Information<br>अतिरिक्त जानकारी</td>
                    <td class="value">Apply Only at the Official Website of Employment<br><strong>केवल रोजगार की
                            आधिकारिक वेबसाइट पर ही आवेदन करें</strong></td>
                </tr>
            </table>
        </div>
    </div>



    <style>
        body {
            min-height: 100vh;
        }

        /* .container {
                                                                                                                                                                                        max-width: 1200px;
                                                                                                                                                                                        margin: 0 auto;
                                                                                                                                                                                        background: white;
                                                                                                                                                                                        border-radius: 16px;
                                                                                                                                                                                        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                                                                                                                                                                                        overflow: hidden;
                                                                                                                                                                                    } */

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .header p {
            font-size: 14px;
            opacity: 0.95;
        }

        .form-content {
            padding: 40px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        label .required {
            color: #e74c3c;
            margin-left: 2px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="file"],
        select {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        .checkbox-group {
            margin: 20px 0;
        }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .checkbox-item:hover {
            border-color: #667eea;
            background: #f0f3ff;
        }

        .checkbox-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            margin-top: 2px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-item label {
            margin: 0;
            font-size: 13px;
            line-height: 1.6;
            cursor: pointer;
            flex: 1;
        }

        .file-info {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-content {
                padding: 30px 20px;
            }

            .header {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 20px;
            }
        }

        #photoPreview, #signaturePreview {
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    object-fit: cover;
}


        .note-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            font-size: 13px;
            color: #856404;
            line-height: 1.6;
        }
    </style>
    <div class="container">
        <div class="header">
            <h1>Digital Siksha Sarthi Teacher Recruitment </h1>
            <p>डिजिटल शिक्षा सारथी भर्ती आवेदन पत्र 2025</p>
        </div>

        <form class="form-content" id="recruitmentForm" enctype="multipart/form-data">
            @csrf
            <div class="section-title">Personal Details</div>

            <div class="form-row">
                <div class="form-group">
                    <label>Candidate's Name (अभ्यर्थी का नाम) <span class="required">*</span></label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Father's Name (पिता का नाम) <span class="required">*</span></label>
                    <input type="text" name="fathers_name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Mother's Name (माता का नाम) <span class="required">*</span></label>
                    <input type="text" name="mother_name" required>
                </div>
                <div class="form-group">
                    <label>Date of Birth (जन्मतिथि) <span class="required">*</span></label>
                    <input type="date" name="dob" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Gender (लिंग) <span class="required">*</span></label>
                    <select name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male (पुरुष)</option>
                        <option value="female">Female (महिला)</option>
                        <option value="other">Other (अन्य)</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nationality (राष्ट्रीयता) <span class="required">*</span></label>
                    <input type="text" name="nationality" value="Indian" required>
                </div>
                <div class="form-group">
                    <label>Category (वर्ग) <span class="required">*</span></label>
                    <select name="category" required>
                        <option value="">Select Category</option>
                        <option value="general">General</option>
                        <option value="obc">OBC</option>
                        <option value="sc">SC</option>
                        <option value="st">ST</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Aadhaar Number (आधार संख्या) <span class="required">*</span></label>
                    <input type="text" name="aadhaar" placeholder="XXXX XXXX XXXX" maxlength="12" required>
                </div>
                <div class="form-group">
                    <label>Pan Number (पैन संख्या)</label>
                    <input type="text" name="pan" placeholder="ABCDE1234F" maxlength="10">
                </div>
            </div>

            <div class="form-row">
    <div class="form-group full-width">
        <label>Attach Photograph (फ़ोटो संलग्न करें) <span class="required">*</span></label>
        <input type="file" name="photo" id="photoInput" accept="image/*" required>
        <div class="file-info">Maximum file size: 2MB. Formats: JPG, PNG</div>
        <img id="photoPreview" src="" alt="Photo Preview" style="margin-top:10px; display:none; width:100px; height:100px; border:2px solid #ddd; border-radius:5px;">
    </div>
</div>

           <div class="form-row">
    <div class="form-group full-width">
        <label>Attach Signature (हस्ताक्षर संलग्न करें) <span class="required">*</span></label>
        <input type="file" name="signature" id="signatureInput" accept="image/*" required>
        <div class="file-info">Maximum file size: 2MB. Formats: JPG, PNG</div>
        <img id="signaturePreview" src="" alt="Signature Preview" style="margin-top:10px; display:none; width:200px; height:80px; border:2px solid #ddd; border-radius:5px;">
    </div>
</div>

            <div class="form-row">
                <div class="form-group">
                    <label>Mobile Number (मोबाइल नंबर) <span class="required">*</span></label>
                    <input type="tel" name="mobile" placeholder="+91 XXXXX XXXXX" required>
                </div>
                <div class="form-group">
                    <label>Email ID (ईमेल आईडी) <span class="required">*</span></label>
                    <input type="email" name="email" placeholder="example@email.com" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label>Permanent Address (स्थायी पता) <span class="required">*</span></label>
                    <input type="text" name="address" placeholder="Village/City, Post Office, District, State, Pincode"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>State (राज्य) <span class="required">*</span></label>
                    <select id="stateSelect" name="state" required>
                        <option value="">Select State</option>
                        <option value="andhra-pradesh">Andhra Pradesh</option>
                        <option value="arunachal-pradesh">Arunachal Pradesh</option>
                        <option value="assam">Assam</option>
                        <option value="bihar">Bihar</option>
                        <option value="chhattisgarh">Chhattisgarh</option>
                        <option value="goa">Goa</option>
                        <option value="gujarat">Gujarat</option>
                        <option value="haryana">Haryana</option>
                        <option value="himachal-pradesh">Himachal Pradesh</option>
                        <option value="jharkhand">Jharkhand</option>
                        <option value="karnataka">Karnataka</option>
                        <option value="kerala">Kerala</option>
                        <option value="madhya-pradesh">Madhya Pradesh</option>
                        <option value="maharashtra">Maharashtra</option>
                        <option value="manipur">Manipur</option>
                        <option value="meghalaya">Meghalaya</option>
                        <option value="mizoram">Mizoram</option>
                        <option value="nagaland">Nagaland</option>
                        <option value="odisha">Odisha</option>
                        <option value="punjab">Punjab</option>
                        <option value="rajasthan">Rajasthan</option>
                        <option value="sikkim">Sikkim</option>
                        <option value="tamil-nadu">Tamil Nadu</option>
                        <option value="telangana">Telangana</option>
                        <option value="tripura">Tripura</option>
                        <option value="uttar-pradesh">Uttar Pradesh</option>
                        <option value="uttarakhand">Uttarakhand</option>
                        <option value="west-bengal">West Bengal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>District (ज़िला) <span class="required">*</span></label>
                    <select id="districtSelect" name="district" required disabled>
                        <option value="">Select State First</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Block (खंड) <span class="required">*</span></label>
                    <input type="text" name="block" required>
                </div>
                <div class="form-group">
                    <label>Panchayat/Ward (पंचायत/वार्ड) <span class="required">*</span></label>
                    <input type="text" name="panchayat" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pincode (पिन कोड) <span class="required">*</span></label>
                    <input type="text" name="pin_code" maxlength="6" required>
                </div>
            </div>

            <div class="section-title" style="margin-top: 40px;">Educational Details</div>

            <div class="form-row">
                <div class="form-group">
                    <label>Highest Qualification (उच्चतम शैक्षणिक योग्यता) <span class="required">*</span></label>
                    <select name="qualification" required>
                        <option value="">Select Qualification</option>
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="graduate">Graduate</option>
                        <option value="postgraduate">Post Graduate</option>
                        <option value="diploma">Diploma</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Board/University (बोर्ड/विश्वविद्यालय) <span class="required">*</span></label>
                    <input type="text" name="board" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Year (वर्ष) <span class="required">*</span></label>
                    <input type="text" name="year" placeholder="e.g., 2020" required>
                </div>
                <div class="form-group">
                    <label>Percentage/CGPA (प्रतिशत/सीजीपीए) <span class="required">*</span></label>
                    <input type="text" name="percentage" placeholder="e.g., 75% or 7.5 CGPA" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label>CAPTCHA <span class="required">*</span></label>
                    <div>
                        <span>{{ $captchaA }} + {{ $captchaB }} = </span>
                        <input type="number" name="captcha_answer" required>
                    </div>
                </div>
            </div>

            <div class="note-box">
                <strong>Important Note:</strong> Please read all the information given in this application form to ensure it
                is the best of my knowledge and belief. If any information is found to be false or not according to the
                required and set audit of rules, I have read and understood all these details carefully.
            </div>

            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" id="consent" name="consent" required>
                    <label for="consent">I hereby certify that all the information given in this application form is correct
                        and verified to the best of my knowledge. If any information is found to be false or misleading, my
                        candidature may be cancelled at any stage.</label>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit & Continue to Payment</button>
        </form>
    </div>

    <Script>
        const stateDistrictData = {
            'uttar-pradesh': [
                'Agra', 'Aligarh', 'Allahabad (Prayagraj)', 'Ambedkar Nagar', 'Amethi', 'Amroha',
                'Auraiya', 'Azamgarh', 'Baghpat', 'Bahraich', 'Ballia', 'Balrampur', 'Banda',
                'Barabanki', 'Bareilly', 'Basti', 'Bijnor', 'Budaun', 'Bulandshahr', 'Chandauli',
                'Chitrakoot', 'Deoria', 'Etah', 'Etawah', 'Faizabad (Ayodhya)', 'Farrukhabad',
                'Fatehpur', 'Firozabad', 'Gautam Buddha Nagar', 'Ghaziabad', 'Ghazipur', 'Gonda',
                'Gorakhpur', 'Hamirpur', 'Hapur', 'Hardoi', 'Hathras', 'Jalaun', 'Jaunpur',
                'Jhansi', 'Kannauj', 'Kanpur Dehat', 'Kanpur Nagar', 'Kasganj', 'Kaushambi',
                'Kheri', 'Kushinagar', 'Lalitpur', 'Lucknow', 'Maharajganj', 'Mahoba', 'Mainpuri',
                'Mathura', 'Mau', 'Meerut', 'Mirzapur', 'Moradabad', 'Muzaffarnagar', 'Pilibhit',
                'Pratapgarh', 'Raebareli', 'Rampur', 'Saharanpur', 'Sambhal', 'Sant Kabir Nagar',
                'Shahjahanpur', 'Shamli', 'Shravasti', 'Siddharthnagar', 'Sitapur', 'Sonbhadra',
                'Sultanpur', 'Unnao', 'Varanasi'
            ],
            'maharashtra': [
                'Ahmednagar', 'Akola', 'Amravati', 'Aurangabad', 'Beed', 'Bhandara', 'Buldhana',
                'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondia', 'Hingoli', 'Jalgaon', 'Jalna',
                'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai Suburban', 'Nagpur', 'Nanded',
                'Nandurbar', 'Nashik', 'Osmanabad', 'Palghar', 'Parbhani', 'Pune', 'Raigad',
                'Ratnagiri', 'Sangli', 'Satara', 'Sindhudurg', 'Solapur', 'Thane', 'Wardha',
                'Washim', 'Yavatmal'
            ],
            'bihar': [
                'Araria', 'Arwal', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur',
                'Buxar', 'Darbhanga', 'East Champaran', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad',
                'Kaimur', 'Katihar', 'Khagaria', 'Kishanganj', 'Lakhisarai', 'Madhepura', 'Madhubani',
                'Munger', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia', 'Rohtas',
                'Saharsa', 'Samastipur', 'Saran', 'Sheikhpura', 'Sheohar', 'Sitamarhi', 'Siwan',
                'Supaul', 'Vaishali', 'West Champaran'
            ],
            'rajasthan': [
                'Ajmer', 'Alwar', 'Banswara', 'Baran', 'Barmer', 'Bharatpur', 'Bhilwara', 'Bikaner',
                'Bundi', 'Chittorgarh', 'Churu', 'Dausa', 'Dholpur', 'Dungarpur', 'Hanumangarh',
                'Jaipur', 'Jaisalmer', 'Jalore', 'Jhalawar', 'Jhunjhunu', 'Jodhpur', 'Karauli',
                'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sawai Madhopur', 'Sikar',
                'Sirohi', 'Sri Ganganagar', 'Tonk', 'Udaipur'
            ],
            'madhya-pradesh': [
                'Agar Malwa', 'Alirajpur', 'Anuppur', 'Ashoknagar', 'Balaghat', 'Barwani', 'Betul',
                'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia',
                'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore',
                'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur',
                'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Raisen', 'Rajgarh', 'Ratlam',
                'Rewa', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur',
                'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'
            ],
            'west-bengal': [
                'Alipurduar', 'Bankura', 'Birbhum', 'Cooch Behar', 'Dakshin Dinajpur', 'Darjeeling',
                'Hooghly', 'Howrah', 'Jalpaiguri', 'Jhargram', 'Kalimpong', 'Kolkata', 'Malda',
                'Murshidabad', 'Nadia', 'North 24 Parganas', 'Paschim Bardhaman', 'Paschim Medinipur',
                'Purba Bardhaman', 'Purba Medinipur', 'Purulia', 'South 24 Parganas', 'Uttar Dinajpur'
            ],
            'karnataka': [
                'Bagalkot', 'Ballari', 'Belagavi', 'Bengaluru Rural', 'Bengaluru Urban', 'Bidar',
                'Chamarajanagar', 'Chikkaballapur', 'Chikkamagaluru', 'Chitradurga', 'Dakshina Kannada',
                'Davanagere', 'Dharwad', 'Gadag', 'Hassan', 'Haveri', 'Kalaburagi', 'Kodagu',
                'Kolar', 'Koppal', 'Mandya', 'Mysuru', 'Raichur', 'Ramanagara', 'Shivamogga',
                'Tumakuru', 'Udupi', 'Uttara Kannada', 'Vijayapura', 'Yadgir'
            ],
            'gujarat': [
                'Ahmedabad', 'Amreli', 'Anand', 'Aravalli', 'Banaskantha', 'Bharuch', 'Bhavnagar',
                'Botad', 'Chhota Udaipur', 'Dahod', 'Dang', 'Devbhoomi Dwarka', 'Gandhinagar',
                'Gir Somnath', 'Jamnagar', 'Junagadh', 'Kheda', 'Kutch', 'Mahisagar', 'Mehsana',
                'Morbi', 'Narmada', 'Navsari', 'Panchmahal', 'Patan', 'Porbandar', 'Rajkot',
                'Sabarkantha', 'Surat', 'Surendranagar', 'Tapi', 'Vadodara', 'Valsad'
            ],
            'tamil-nadu': [
                'Ariyalur', 'Chengalpattu', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri',
                'Dindigul', 'Erode', 'Kallakurichi', 'Kanchipuram', 'Kanyakumari', 'Karur',
                'Krishnagiri', 'Madurai', 'Mayiladuthurai', 'Nagapattinam', 'Namakkal', 'Nilgiris',
                'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Ranipet', 'Salem', 'Sivaganga',
                'Tenkasi', 'Thanjavur', 'Theni', 'Thoothukudi', 'Tiruchirappalli', 'Tirunelveli',
                'Tirupathur', 'Tiruppur', 'Tiruvallur', 'Tiruvannamalai', 'Tiruvarur', 'Vellore',
                'Viluppuram', 'Virudhunagar'
            ],
            'telangana': [
                'Adilabad', 'Bhadradri Kothagudem', 'Hyderabad', 'Jagtial', 'Jangaon', 'Jayashankar',
                'Jogulamba', 'Kamareddy', 'Karimnagar', 'Khammam', 'Kumuram Bheem', 'Mahabubabad',
                'Mahbubnagar', 'Mancherial', 'Medak', 'Medchal', 'Nagarkurnool', 'Nalgonda',
                'Nirmal', 'Nizamabad', 'Peddapalli', 'Rajanna Sircilla', 'Rangareddy', 'Sangareddy',
                'Siddipet', 'Suryapet', 'Vikarabad', 'Wanaparthy', 'Warangal Rural', 'Warangal Urban',
                'Yadadri Bhuvanagiri'
            ],
            'punjab': [
                'Amritsar', 'Barnala', 'Bathinda', 'Faridkot', 'Fatehgarh Sahib', 'Fazilka',
                'Ferozepur', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana',
                'Mansa', 'Moga', 'Mohali', 'Muktsar', 'Pathankot', 'Patiala', 'Rupnagar',
                'Sangrur', 'Shaheed Bhagat Singh Nagar', 'Tarn Taran'
            ],
            'haryana': [
                'Ambala', 'Bhiwani', 'Charkhi Dadri', 'Faridabad', 'Fatehabad', 'Gurugram',
                'Hisar', 'Jhajjar', 'Jind', 'Kaithal', 'Karnal', 'Kurukshetra', 'Mahendragarh',
                'Nuh', 'Palwal', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa',
                'Sonipat', 'Yamunanagar'
            ],
            'kerala': [
                'Alappuzha', 'Ernakulam', 'Idukki', 'Kannur', 'Kasaragod', 'Kollam', 'Kottayam',
                'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thiruvananthapuram',
                'Thrissur', 'Wayanad'
            ],
            'odisha': [
                'Angul', 'Balangir', 'Balasore', 'Bargarh', 'Bhadrak', 'Boudh', 'Cuttack',
                'Deogarh', 'Dhenkanal', 'Gajapati', 'Ganjam', 'Jagatsinghpur', 'Jajpur', 'Jharsuguda',
                'Kalahandi', 'Kandhamal', 'Kendrapara', 'Kendujhar', 'Khordha', 'Koraput',
                'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nayagarh', 'Nuapada', 'Puri',
                'Rayagada', 'Sambalpur', 'Subarnapur', 'Sundargarh'
            ],
            'jharkhand': [
                'Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'East Singhbhum', 'Garhwa',
                'Giridih', 'Godda', 'Gumla', 'Hazaribagh', 'Jamtara', 'Khunti', 'Koderma',
                'Latehar', 'Lohardaga', 'Pakur', 'Palamu', 'Ramgarh', 'Ranchi', 'Sahebganj',
                'Seraikela Kharsawan', 'Simdega', 'West Singhbhum'
            ],
            'chhattisgarh': [
                'Balod', 'Baloda Bazar', 'Balrampur', 'Bastar', 'Bemetara', 'Bijapur', 'Bilaspur',
                'Dantewada', 'Dhamtari', 'Durg', 'Gariaband', 'Janjgir-Champa', 'Jashpur', 'Kabirdham',
                'Kanker', 'Kondagaon', 'Korba', 'Koriya', 'Mahasamund', 'Mungeli', 'Narayanpur',
                'Raigarh', 'Raipur', 'Rajnandgaon', 'Sukma', 'Surajpur', 'Surguja'
            ],
            'assam': [
                'Baksa', 'Barpeta', 'Biswanath', 'Bongaigaon', 'Cachar', 'Charaideo', 'Chirang',
                'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Dima Hasao', 'Goalpara', 'Golaghat',
                'Hailakandi', 'Hojai', 'Jorhat', 'Kamrup', 'Kamrup Metropolitan', 'Karbi Anglong',
                'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Majuli', 'Morigaon', 'Nagaon', 'Nalbari',
                'Sivasagar', 'Sonitpur', 'South Salamara-Mankachar', 'Tinsukia', 'Udalguri',
                'West Karbi Anglong'
            ],
            'uttarakhand': [
                'Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital',
                'Pauri Garhwal', 'Pithoragarh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar',
                'Uttarkashi'
            ],
            'himachal-pradesh': [
                'Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kullu', 'Lahaul and Spiti',
                'Mandi', 'Shimla', 'Sirmaur', 'Solan', 'Una'
            ],
            'goa': ['North Goa', 'South Goa'],
            'manipur': [
                'Bishnupur', 'Chandel', 'Churachandpur', 'Imphal East', 'Imphal West', 'Jiribam',
                'Kakching', 'Kamjong', 'Kangpokpi', 'Noney', 'Pherzawl', 'Senapati', 'Tamenglong',
                'Tengnoupal', 'Thoubal', 'Ukhrul'
            ],
            'meghalaya': [
                'East Garo Hills', 'East Jaintia Hills', 'East Khasi Hills', 'North Garo Hills',
                'Ri Bhoi', 'South Garo Hills', 'South West Garo Hills', 'South West Khasi Hills',
                'West Garo Hills', 'West Jaintia Hills', 'West Khasi Hills'
            ],
            'tripura': [
                'Dhalai', 'Gomati', 'Khowai', 'North Tripura', 'Sepahijala', 'South Tripura',
                'Unakoti', 'West Tripura'
            ],
            'mizoram': [
                'Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha',
                'Serchhip'
            ],
            'nagaland': [
                'Dimapur', 'Kiphire', 'Kohima', 'Longleng', 'Mokokchung', 'Mon', 'Peren',
                'Phek', 'Tuensang', 'Wokha', 'Zunheboto'
            ],
            'sikkim': ['East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'],
            'arunachal-pradesh': [
                'Anjaw', 'Changlang', 'Dibang Valley', 'East Kameng', 'East Siang', 'Kamle',
                'Kra Daadi', 'Kurung Kumey', 'Lepa Rada', 'Lohit', 'Longding', 'Lower Dibang Valley',
                'Lower Siang', 'Lower Subansiri', 'Namsai', 'Pakke Kessang', 'Papum Pare',
                'Shi Yomi', 'Siang', 'Tawang', 'Tirap', 'Upper Siang', 'Upper Subansiri',
                'West Kameng', 'West Siang'
            ],
            'andhra-pradesh': [
                'Anantapur', 'Chittoor', 'East Godavari', 'Guntur', 'Krishna', 'Kurnool',
                'Prakasam', 'Srikakulam', 'Sri Potti Sriramulu Nellore', 'Visakhapatnam',
                'Vizianagaram', 'West Godavari', 'YSR Kadapa'
            ]
        };

        const stateSelect = document.getElementById('stateSelect');
        const districtSelect = document.getElementById('districtSelect');

        // Handle state change
        stateSelect.addEventListener('change', function () {
            const selectedState = this.value;

            // Clear and reset district dropdown
            districtSelect.innerHTML = '<option value="">Select District</option>';

            if (selectedState && stateDistrictData[selectedState]) {
                // Enable district dropdown
                districtSelect.disabled = false;

                // Populate districts
                stateDistrictData[selectedState].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            } else {
                // Disable district dropdown if no state selected
                districtSelect.disabled = true;
            }
        });



        // Aadhaar number formatting
        const aadhaarInput = document.querySelector('input[name="aadhaar"]');
        aadhaarInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });

        // PAN number formatting
        const panInput = document.querySelector('input[name="pan"]');
        panInput.addEventListener('input', (e) => {
            e.target.value = e.target.value.toUpperCase();
        });

        // Mobile number formatting
        const mobileInput = document.querySelector('input[name="mobile"]');
        mobileInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });
    </script>

    <script>
    // Preview Photo
    document.getElementById('photoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('photoPreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });

    // Preview Signature
    document.getElementById('signatureInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('signaturePreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('recruitmentForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            try {
                const response = await fetch('{{ route("applications.store") }}', {
                    method: 'POST',
                    body: formData,
                   headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    'X-Requested-With': 'XMLHttpRequest'
}
                });

                const result = await response.json();

                if (!result.ok) {
                    alert(result.message || 'Something went wrong. Please try again.');
                    return;
                }

                // Initialize Razorpay
                const options = {
                    key: '{{ config("services.razorpay.key") }}',
                    amount: result.amount,
                    currency: 'INR',
                    name: 'Your Organization Name',
                    description: 'Application Fee',
                    order_id: result.order_id,
                    handler: async function (response) {
                        // Verify payment
                        const verifyResponse = await fetch('{{ route("applications.verify") }}', {
                            method: 'POST',
                            body: JSON.stringify({
                                application_id: result.application_id,
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_signature: response.razorpay_signature
                            }),
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        });

                        const verifyResult = await verifyResponse.json();

                        if (verifyResult.ok) {
                            window.location.href = verifyResult.pdf_url;
                        } else {
                            alert(verifyResult.message || 'Payment verification failed.');
                        }
                    },
                    prefill: {
                        name: result.name,
                        email: result.email,
                        contact: result.mobile
                    },
                    theme: {
                        color: '#3399cc'
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            } catch (error) {
                alert('An error occurred. Please try again.');
                console.error(error);
            }
        });
    </script>

@endsection