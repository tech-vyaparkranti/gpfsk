@extends('layouts.webSite')
@section('title', 'Gramin Parivar Foundation')

@section('content')
  @include('include.slider')

  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    /* -------- General Styling -------- */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: #f5f8f5;
      margin: 0;
      padding: 0;
    }

    .section-wrapper {
      width: 90%;
      max-width: 1300px;
      margin: 60px auto;
      padding: 0 15px;
    }

    .section-title {
      text-align: center;
      margin-bottom: 40px;
    }

    .section-title h2 {
      font-size: clamp(1.5rem, 4vw, 2rem);
      color: #006633;
      margin-bottom: 10px;
      position: relative;
      display: inline-block;
    }

    .section-title h2::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background-color: #00a859;
      border-radius: 3px;
    }

    .section-title p {
      font-size: clamp(0.875rem, 2vw, 1rem);
      color: #555;
      margin-top: 10px;
      padding: 0 10px;
    }

    /* -------- Section Card Grid -------- */
    .section-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(min(100%, 260px), 1fr));
      gap: 25px;
    }

    .section-card {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .section-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .section-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .section-card-content {
      padding: 20px;
      text-align: center;
    }

    .section-card-content h3 {
      color: #006633;
      font-size: clamp(1rem, 3vw, 1.25rem);
      margin-bottom: 10px;
    }

    .section-card-content p {
      font-size: clamp(0.875rem, 2vw, 0.95rem);
      color: #555;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .section-card-content a {
      display: inline-block;
      background-color: #00a859;
      color: #fff;
      padding: 8px 20px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: 500;
      transition: background 0.3s;
      font-size: clamp(0.875rem, 2vw, 1rem);
    }

    .section-card-content a:hover {
      background-color: #008c4a;
    }

    /* -------- DSS Section -------- */
    .dss-section {
      background: #fff;
      padding: 50px 5%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .dss-content {
      display: flex;
      gap: 30px;
      align-items: center;
      flex-wrap: wrap;
      max-width: 1200px;
      width: 100%;
    }

    .dss-text {
      flex: 1;
      min-width: min(100%, 800px);
    }

    .dss-text h2 {
      color: #006633;
      font-size: clamp(1.5rem, 4vw, 2rem);
      margin-bottom: 15px;
    }

    .dss-text p {
      font-size: clamp(0.875rem, 2vw, 1rem);
      color: #555;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .apply-btn {
      background: #00a859;
      color: #fff;
      border: none;
      padding: 10px 28px;
      cursor: pointer;
      border-radius: 25px;
      font-weight: 600;
      transition: background 0.3s;
      font-size: clamp(0.875rem, 2vw, 1rem);
      white-space: nowrap;
    }

    .apply-btn:hover {
      background: #008c4a;
    }

    .dss-image {
      flex: 1;
      min-width: min(100%, 300px);
    }

    .dss-image img {
      width: 100%;
      max-width: 500px;
      border-radius: 8px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    /* -------- Popup Overlay -------- */
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(5px);
      z-index: 9999;
      padding: 20px;
      overflow-y: auto;
      align-items: center;
      justify-content: center;
    }

    body.popup-open {
      overflow: hidden;
    }

    .popup-box {
      background: white;
      border-radius: 12px;
      width: 100%;
      max-width: 900px;
      max-height: 90vh;
      overflow-y: auto;
      position: relative;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      animation: popIn 0.35s ease-out;
      margin: auto;
      padding: 0;
    }

    @keyframes popIn {
      from {
        transform: scale(0.9);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    .popup-box::-webkit-scrollbar {
      width: 6px;
    }

    .popup-box::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    .popup-box::-webkit-scrollbar-thumb {
      background: #00a859;
      border-radius: 10px;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #f44336;
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      font-size: 20px;
      cursor: pointer;
      transition: all 0.3s;
      z-index: 10;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .close-btn:hover {
      transform: rotate(90deg);
      background: #d32f2f;
    }

    .popup-title {
      background: linear-gradient(135deg, #00a859, #00d16f);
      color: white;
      padding: 15px 25px;
      border-radius: 12px 12px 0 0;
      font-size: clamp(1rem, 3vw, 1.25rem);
      text-align: center;
      margin: 0;
      font-weight: 600;
    }

    .popup-title i {
      margin-right: 10px;
    }

    #regForm {
      padding: 25px;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
      gap: 20px;
    }

    .full-width {
      grid-column: 1 / -1;
    }

    /* Input Group with Flexbox */
    .input-group {
      margin-bottom: 15px;
      display: flex;
      align-items: stretch;
      flex-wrap: wrap;
    }

    .input-group label {
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
      font-size: clamp(0.813rem, 2vw, 0.875rem);
      display: block;
      width: 100%;
    }

    .input-group-text {
      background-color: #f8f9fa;
      border: 2px solid #e0e0e0;
      border-right: none;
      border-radius: 8px 0 0 8px;
      padding: 12px 15px;
      color: #00a859;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 50px;
      flex-shrink: 0;
    }

    .form-input,
    .form-textarea,
    select.form-input {
      padding: 12px 15px;
      border: 2px solid #e0e0e0;
      border-radius: 0 8px 8px 0;
      font-size: clamp(0.875rem, 2vw, 0.938rem);
      transition: all 0.3s;
      flex: 1;
      font-family: 'Poppins', sans-serif;
      border-left: none;
      min-width: 0;
    }

    .form-textarea {
      resize: vertical;
      min-height: 80px;
    }

    .form-input:hover,
    .form-textarea:hover {
      border-color: #00a859;
    }

    .form-input:focus,
    .form-textarea:focus {
      outline: none;
      border-color: #00a859;
      box-shadow: 0 0 6px rgba(0, 168, 89, 0.3);
    }

    /* Correct border for inputs without a prepended icon */
    .input-group-file-upload {
      margin-bottom: 15px;
    }

    .input-group-file-upload .form-input {
      border-radius: 8px;
      border-left: 2px solid #e0e0e0;
    }

    .input-group-file-upload .form-input:focus {
      border-left: 2px solid #00a859;
    }

    .error {
      color: #f44336;
      font-size: clamp(0.75rem, 2vw, 0.813rem);
      margin-top: 5px;
      min-height: 18px;
      width: 100%;
    }

    .preview-img {
      display: none;
      border: 1px solid #cfcfcf;
      padding: 4px;
      border-radius: 8px;
      margin-top: 10px;
      width: 100%;
      max-width: 200px;
      height: 120px;
      object-fit: contain;
      background: #f9f9f9;
    }

    .checkbox-label {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: clamp(0.813rem, 2vw, 0.875rem);
      cursor: pointer;
      font-weight: 400 !important;
    }

    .checkbox-label input[type="checkbox"] {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: #00a859;
      flex-shrink: 0;
    }

    .popup-buttons {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }

    .submit-btn {
      background: linear-gradient(135deg, #00a859, #00d16f);
      color: white;
      border: none;
      padding: 15px 40px;
      font-size: clamp(0.875rem, 2vw, 1rem);
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      font-weight: 600;
      letter-spacing: 0.3px;
      box-shadow: 0 4px 15px rgba(0, 168, 89, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      max-width: 400px;
    }

    .submit-btn:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 168, 89, 0.4);
    }

    .submit-btn:active {
      transform: translateY(0);
    }

    .submit-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    /* Captcha Input Container */
    .captcha-container {
      display: flex;
      align-items: center;
      width: 100%;
      flex-wrap: wrap;
    }

    .captcha-container .input-group-text {
      flex-shrink: 0;
    }

    .captcha-container input[disabled] {
      background-color: #f1f1f1;
      border-right: none;
      max-width: 120px;
      flex-shrink: 0;
      pointer-events: none;
    }

    .captcha-container input[name="captcha_answer"] {
      border-left: 2px solid #e0e0e0;
      border-radius: 0 8px 8px 0;
      flex: 1;
      min-width: 0;
    }

    /* -------- Responsive Breakpoints -------- */
    @media (max-width: 1024px) {
      .section-wrapper {
        width: 92%;
        margin: 50px auto;
      }

      .dss-section {
        padding: 40px 5%;
      }
    }

    @media (max-width: 768px) {
      .section-wrapper {
        width: 95%;
        margin: 40px auto;
        padding: 0 10px;
      }

      .section-title {
        margin-bottom: 30px;
      }

      .section-grid {
        gap: 20px;
      }

      .section-card img {
        height: 160px;
      }

      .dss-section {
        padding: 30px 5%;
      }

      .dss-content {
        flex-direction: column;
        gap: 25px;
      }

      .dss-text,
      .dss-image {
        min-width: 100%;
      }

      .dss-image img {
        max-width: 100%;
      }

      .popup-overlay {
        padding: 10px;
      }

      .popup-box {
        max-width: 100%;
        max-height: 95vh;
      }

      #regForm {
        padding: 20px;
      }

      .grid {
        grid-template-columns: 1fr;
        gap: 18px;
      }

      .close-btn {
        width: 36px;
        height: 36px;
        font-size: 18px;
      }

      .input-group-text {
        padding: 10px 12px;
        min-width: 45px;
      }

      .captcha-container {
        gap: 0;
      }
    }

    @media (max-width: 480px) {
      .section-wrapper {
        margin: 30px auto;
      }

      .section-title {
        margin-bottom: 25px;
      }

      .section-grid {
        gap: 15px;
      }

      .section-card img {
        height: 140px;
      }

      .section-card-content {
        padding: 15px;
      }

      .dss-section {
        padding: 25px 3%;
      }

      .popup-overlay {
        padding: 0;
        align-items: flex-start;
      }

      .popup-box {
        width: 100%;
        max-width: 100%;
        max-height: 100vh;
        border-radius: 0;
        margin: 0;
      }

      .popup-title {
        border-radius: 0;
        padding: 12px 15px;
      }

      #regForm {
        padding: 15px;
      }

      .grid {
        gap: 15px;
      }

      .close-btn {
        width: 32px;
        height: 32px;
        font-size: 16px;
        top: 8px;
        right: 8px;
      }

      .form-input,
      .form-textarea {
        padding: 10px 12px;
      }

      .input-group-text {
        padding: 10px;
        min-width: 42px;
      }

      .submit-btn {
        padding: 12px 25px;
        max-width: 100%;
      }

      .preview-img {
        max-width: 150px;
        height: 100px;
      }

      .captcha-container input[disabled] {
        max-width: 100px;
        font-size: 0.875rem;
      }
    }

    @media (max-width: 360px) {
      .section-card img {
        height: 120px;
      }

      .form-input,
      .form-textarea {
        padding: 8px 10px;
      }

      .input-group-text {
        padding: 8px;
        min-width: 40px;
      }

      .submit-btn {
        padding: 10px 20px;
      }

      .preview-img {
        max-width: 120px;
        height: 80px;
      }

      .captcha-container input[disabled] {
        max-width: 90px;
        font-size: 0.813rem;
      }
    }

    /* Swiper container responsiveness */
    .swiper {
      width: 100%;
      height: auto;
    }

    .swiper-slide img {
      width: 100%;
      height: 300px;
      display: block;
    }
  </style>

  <section class="section-wrapper" data-aos="fade-up">
    <div class="section-title">
      <h2>Our Focus Areas</h2>
      <p>We work across multiple domains to empower communities and create sustainable impact.</p>
    </div>

    <div class="section-grid">
      <div class="section-card" data-aos="zoom-in" data-aos-delay="100">
        <img src="{{ asset('assets/img/getour1.png') }}" alt="Education & Skill Development">
        <div class="section-card-content">
          <h3>Education & Skill Development</h3>
          <p style="text-align: justify;"> We provide quality education, digital learning, and vocational training to
            equip youth with practical skills and knowledge. Our goal is to bridge the gap between education and industry,
            preparing them for future
            opportunities.
          </p>
          <!-- <a href="#">Read More</a> -->
        </div>
      </div>

      <div class="section-card" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('assets/img/women.png') }}" alt="Women Empowerment">
        <div class="section-card-content">
          <h3>Women Empowerment</h3>
          <p style="text-align: justify">
            Empowering women through education, vocational training, and entrepreneurial guidance to foster independence
            and confidence.
            Our programs aim to create equal opportunities, promote leadership skills, and support women in achieving
            their personal and professional goals.

          </p>

          </p>
          <!-- <a href="#">Read More</a> -->
        </div>
      </div>

      <div class="section-card" data-aos="zoom-in" data-aos-delay="300">
        <img src="{{ asset('assets/img/senior.png') }}" alt="Senior Citizen Assistance">
        <div class="section-card-content">
          <h3>Senior Citizen Assistance</h3>
          <p style="text-align: justify;">
            Providing comprehensive support to senior citizens through healthcare, social engagement, and administrative
            assistance.
            Our programs aim to enhance their independence, well-being, and overall quality of life.
          </p>

          <!-- <a href="#">Read More</a> -->
        </div>
      </div>

      <div class="section-card" data-aos="zoom-in" data-aos-delay="400">
        <img src="{{ asset('assets/img/employeement.png') }}" alt="Employment / Entrepreneurship">
        <div class="section-card-content">
          <h3>Employment / Entrepreneurship</h3>
          <p style="text-align: justify;">
            Empowering individuals with practical skills, entrepreneurship guidance, and career support to create
            meaningful job opportunities.
            Our programs help people launch businesses or excel in their chosen careers with confidence.
          </p>
          <!-- <a href="#">Read More</a> -->
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <section class="dss-section" data-aos="fade-right">
    <div class="dss-content">
      <div class="dss-text">
        <h2>Digital Siksha Sarthi</h2>
        <p>
          Digital Siksha Sarthi is an initiative to promote digital education in government schools.
          We are currently hiring passionate teaching volunteers and trainers to educate rural and small-town students in
          basic computer knowledge, internet usage, and digital learning tools.
        </p>
        <p>
          If you believe in empowering youth through digital literacy and want to contribute to building a smarter India,
          join us now.
        </p>
        <button class="apply-btn" onclick="openApplyForm()">Apply Now</button>
      </div>
      <div class="dss-image swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="{{ asset('assets/img/formimg1.jpeg') }}" alt="Digital Siksha Sarthi">
          </div>
          <div class="swiper-slide">
            <img src="{{ asset('assets/img/formimg2.jpeg') }}" alt="Digital Siksha Sarthi">
          </div>
          <div class="swiper-slide">
            <img src="{{ asset('assets/img/formimg3.jpeg') }}" alt="Digital Siksha Sarthi">
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    var swiper = new Swiper(".mySwiper", {
      direction: "horizontal",
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    });
  </script>

  {{-- <div id="applyPopup" class="popup-overlay">
    <div class="popup-box">
      <button class="close-btn" onclick="closeApplyForm()">✖</button>
      <h3 class="popup-title"><i class="fa-solid fa-chalkboard-user"></i> Digital Siksha Sarthi – Registration</h3>

      <form id="regForm" enctype="multipart/form-data">
        @csrf
        <div class="grid">
          <div class="input-group">
            <label>First Name <span style="color: red;">*</span></label>
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input name="first_name" class="form-input" placeholder="Enter first name" required>
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>Father's Name</label>
            <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
            <input name="fathers_name" class="form-input" placeholder="Enter father's name">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>Last Name</label>
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input name="last_name" class="form-input" placeholder="Enter last name">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>Mobile Number <span style="color: red;">*</span></label>
            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
            <input name="mobile" class="form-input" placeholder="Enter mobile number" required>
            <small class="error"></small>
          </div>

          <div class="input-group full-width">
            <label>Address</label>
            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
            <textarea name="address" class="form-textarea" placeholder="Enter address"></textarea>
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>City</label>
            <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
            <input name="city" class="form-input" placeholder="Enter city">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>State</label>
            <span class="input-group-text"><i class="fa-solid fa-flag"></i></span>
            <input name="state" class="form-input" placeholder="Enter state">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>Pin Code</label>
            <span class="input-group-text"><i class="fa-solid fa-map-pin"></i></span>
            <input name="pin_code" class="form-input" placeholder="Enter pin code">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>Email</label>
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input name="email" type="email" class="form-input" placeholder="Enter email">
            <small class="error"></small>
          </div>

          <div class="input-group">
            <label>WhatsApp Number</label>
            <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
            <input name="whatsapp" class="form-input" placeholder="Enter WhatsApp number">
            <small class="error"></small>
          </div>

          <div class="input-group full-width">
            <label>Qualification</label>
            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
            <select name="qualification" class="form-input">
              <option value="">Select Qualification</option>
              <option>12th</option>
              <option>Graduate</option>
              <option>PG</option>
              <option>Other</option>
            </select>
            <small class="error"></small>
          </div>

          <div class="input-group input-group-file-upload">
            <label>Upload Photo <span style="color: red;">*</span></label>
            <input type="file" name="photo" accept="image/*" class="form-input" id="photoInput" required>
            <img id="photoPreview" class="preview-img" />
            <small class="error"></small>
          </div>

          <div class="input-group input-group-file-upload">
            <label>Upload Signature <span style="color: red;">*</span></label>
            <input type="file" name="signature" accept="image/*" class="form-input" id="signInput" required>
            <img id="signPreview" class="preview-img" />
            <small class="error"></small>
          </div>

          <div class="input-group full-width">
            <label>Captcha <span style="color: red;">*</span></label>
            <div class="captcha-container">
              <span class="input-group-text"><i class="fa-solid fa-shield-halved"></i></span>
              <input type="text" value="{{ $captchaA }} + {{ $captchaB }} = ?" class="form-input" disabled>
              <input name="captcha_answer" class="form-input" placeholder="Enter answer" required>
            </div>
            <small class="error"></small>
          </div>

          <div class="input-group full-width">
            <label class="checkbox-label">
              <input type="checkbox" name="consent" required> I agree to Terms & Conditions
            </label>
            <small class="error"></small>
          </div>
        </div>

        <div class="popup-buttons">
          <button type="submit" class="submit-btn"><i class="fa-solid fa-indian-rupee-sign"></i> Apply & Pay
            ₹{{ env('REG_FEE_INR', 180) }}</button>
        </div>
      </form>
    </div>
  </div> --}}

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });

    const popup = document.getElementById('applyPopup');

    function openApplyForm() {
      popup.style.display = 'flex';
      document.body.classList.add('popup-open');
    }

    function closeApplyForm() {
      popup.style.display = 'none';
      document.body.classList.remove('popup-open');
    }

    // Preview Photo & Signature
    document.getElementById('photoInput')?.addEventListener('change', e => previewFile(e, 'photoPreview'));
    document.getElementById('signInput')?.addEventListener('change', e => previewFile(e, 'signPreview'));

    function previewFile(event, previewId) {
      const file = event.target.files[0];
      const preview = document.getElementById(previewId);
      if (file) {
        const reader = new FileReader();
        reader.onload = e => {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = '';
        preview.style.display = 'none';
      }
    }

    // Close popup when clicking outside
    popup?.addEventListener('click', function (e) {
      if (e.target === popup) {
        closeApplyForm();
      }
    });

    // Form validation & Razorpay
    document.getElementById('regForm')?.addEventListener('submit', async function (e) {
      e.preventDefault();
      const form = e.target;
      const fd = new FormData(form);
      let valid = true;

      // Simple client-side validation
      form.querySelectorAll('.error').forEach(el => el.innerText = '');
      form.querySelectorAll('[required]').forEach(input => {
        if (input.type === 'checkbox') {
          if (!input.checked) {
            valid = false;
            const err = input.closest('.input-group')?.querySelector('.error');
            if (err) err.innerText = 'You must accept the terms and conditions';
          }
        } else if (input.type === 'file') {
          if (!input.files || input.files.length === 0) {
            valid = false;
            const err = input.closest('.input-group')?.querySelector('.error');
            if (err) err.innerText = 'Please upload a file';
          }
        } else {
          if (!input.value.trim()) {
            valid = false;
            const err = input.closest('.input-group')?.querySelector('.error');
            if (!err) {
              const container = input.closest('.input-group');
              const directErr = container.querySelector('.error');
              if (directErr) directErr.innerText = 'This field is required';
            } else {
              err.innerText = 'This field is required';
            }
          }
        }
      });

      if (!valid) return;

      // Disable button and show loading state
      const submitBtn = form.querySelector('.submit-btn');
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';

      try {
        // 1. Create order
        const res = await fetch("{{ route('applications.store') }}", {
          method: 'POST',
          body: fd
        });

        const data = await res.json();

        if (!res.ok) {
          if (res.status === 422 && data.message) {
            alert(data.message);
            return;
          } else {
            alert(data.message || 'Error creating application. Please check your inputs.');
            return;
          }
        }

        // 2. Razorpay checkout
        const options = {
          key: "{{ env('RAZORPAY_KEY') }}",
          amount: data.amount,
          currency: "INR",
          name: "CKKK Gramin Parivar Foundation",
          description: "Digital Siksha Sarthi Registration",
          order_id: data.order_id,
          prefill: { name: data.name || '', email: data.email || '', contact: data.mobile || '' },
          handler: async function (response) {
            submitBtn.innerHTML = '<i class="fa-solid fa-check"></i> Verifying...';

            try {
              // 3. Verify payment
              const verify = await fetch("{{ route('payment.verify') }}", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                  application_id: data.application_id,
                  razorpay_payment_id: response.razorpay_payment_id,
                  razorpay_order_id: response.razorpay_order_id,
                  razorpay_signature: response.razorpay_signature
                })
              });

              const vr = await verify.json();
              if (vr.ok) {
                alert('Payment Successful! Your application slip will open in a new tab.');
                window.open(vr.pdf_url, "_blank");
                closeApplyForm();
                form.reset();
                document.querySelectorAll('.preview-img').forEach(p => {
                  p.src = '';
                  p.style.display = 'none';
                });
              } else {
                alert(vr.message || 'Payment verification failed.');
              }
            } catch (error) {
              alert('An error occurred during payment verification.');
            } finally {
              submitBtn.disabled = false;
              submitBtn.innerHTML = originalText;
            }
          },
          theme: { color: '#00a859' }
        };

        const rzp = new Razorpay(options);
        rzp.on('payment.failed', function (response) {
          alert('Payment failed, please try again. Reason: ' + response.error.description);
        });
        rzp.open();

      } catch (error) {
        alert('An unexpected error occurred while processing your application.');
      } finally {
        if (submitBtn.disabled) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }
      }
    });
  </script>
@endsection

@section('script')
  <script>
    let site_url = '{{ url('/') }}';
  </script>
@endsection