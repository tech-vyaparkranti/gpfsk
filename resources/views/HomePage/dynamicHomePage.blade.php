@extends('layouts.webSite')
@section('title', 'TravelJobs ')
@section('content')
    @include('include.slider')

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <style>
        /* -------- General Styling -------- */
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f5f8f5;
        }

        .section-wrapper {
            width: 90%;
            max-width: 1200px;
            margin: 60px auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 2rem;
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

        /* -------- Section Card Grid -------- */
        .section-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
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
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .section-card-content p {
            font-size: 0.95rem;
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
        }

        .section-card-content a:hover {
            background-color: #008c4a;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title h2 {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- --------- Our Focus Areas Section --------- -->
    <section class="section-wrapper" data-aos="fade-up">
        <div class="section-title">
            <h2>Our Focus Areas</h2>
            <p>We work across multiple domains to empower communities and create sustainable impact.</p>
        </div>

        <div class="section-grid">

            <!-- Education & Skill Development -->
            <div class="section-card" data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('assets/img/education.jpg') }}" alt="Education & Skill Development">
                <div class="section-card-content">
                    <h3>Education & Skill Development</h3>
                    <p>Providing access to quality education, digital learning, and vocational training for youth.</p>
                    <a href="#">Read More</a>
                </div>
            </div>

            <!-- Women Empowerment -->
            <div class="section-card" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('assets/img/women.jpg') }}" alt="Women Empowerment">
                <div class="section-card-content">
                    <h3>Women Empowerment</h3>
                    <p>Encouraging self-reliance, skill development, and entrepreneurship among women.</p>
                    <a href="#">Read More</a>
                </div>
            </div>

            <!-- Senior Citizen Assistance -->
            <div class="section-card" data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('assets/img/senior.jpg') }}" alt="Senior Citizen Assistance">
                <div class="section-card-content">
                    <h3>Senior Citizen Assistance</h3>
                    <p>Providing health, social, and administrative support to improve senior citizens’ quality of life.</p>
                    <a href="#">Read More</a>
                </div>
            </div>

            <!-- Employment / Entrepreneurship -->
            <div class="section-card" data-aos="zoom-in" data-aos-delay="400">
                <img src="{{ asset('assets/img/employment.jpg') }}" alt="Employment / Entrepreneurship">
                <div class="section-card-content">
                    <h3>Employment / Entrepreneurship</h3>
                    <p>Creating opportunities through business skill training and job placement programs.</p>
                    <a href="#">Read More</a>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== Digital Siksha Sarthi Program Section ===== -->
<section class="dss-section" data-aos="fade-right">
    <div class="dss-content">
        <div class="dss-text">
            <h2>Digital Siksha Sarthi</h2>
            <p>
                Digital Siksha Sarthi is an initiative to promote digital education in government schools. 
                We are currently hiring passionate teaching volunteers and trainers to educate rural and small-town students in basic computer knowledge, internet usage, and digital learning tools.
            </p>
            <p>
                If you believe in empowering youth through digital literacy and want to contribute to building a smarter India, join us now.
            </p>
            <button class="apply-btn" onclick="openApplyForm()">Apply Now</button>
        </div>
        <div class="dss-image">
            <img src="{{ asset('assets/img/digital_siksha.jpg') }}" alt="Digital Siksha Sarthi">
        </div>
    </div>
</section>

<!-- ===== Popup Apply Form ===== -->
<!-- ===== Beautiful Registration Popup ===== -->
<!-- ✅ FONT + ICON CDN -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<!-- ✅ POPUP OVERLAY -->
<div id="applyPopup" class="popup-overlay">
  <div class="popup-box">
    <button class="close-btn" onclick="closeApplyForm()">✖</button>
    <h3 class="popup-title"><i class="fa-solid fa-chalkboard-user"></i> Digital Siksha Sarthi – Registration</h3>

    <form id="regForm" enctype="multipart/form-data">
      @csrf
      <div class="grid">

        <!-- First Name -->
        <div class="input-group">
          <label><i class="fa-solid fa-user"></i> First Name *</label>
          <input name="first_name" class="form-input" required>
          <small class="error"></small>
        </div>

        <!-- Father's Name -->
        <div class="input-group">
          <label><i class="fa-solid fa-user-tie"></i> Father's Name</label>
          <input name="fathers_name" class="form-input">
        </div>

        <!-- Last Name -->
        <div class="input-group">
          <label><i class="fa-solid fa-user"></i> Last Name</label>
          <input name="last_name" class="form-input">
        </div>

        <!-- Address -->
        <div class="input-group" style="grid-column: span 2;">
          <label><i class="fa-solid fa-location-dot"></i> Address</label>
          <textarea name="address" class="form-textarea"></textarea>
        </div>

        <!-- City -->
        <div class="input-group">
          <label><i class="fa-solid fa-city"></i> City</label>
          <input name="city" class="form-input">
        </div>

        <!-- State -->
        <div class="input-group">
          <label><i class="fa-solid fa-flag"></i> State</label>
          <input name="state" class="form-input">
        </div>

        <!-- Pin Code -->
        <div class="input-group">
          <label><i class="fa-solid fa-map-pin"></i> Pin Code</label>
          <input name="pin_code" class="form-input">
        </div>

        <!-- Email -->
        <div class="input-group">
          <label><i class="fa-solid fa-envelope"></i> Email</label>
          <input name="email" type="email" class="form-input">
        </div>

        <!-- Mobile -->
        <div class="input-group">
          <label><i class="fa-solid fa-phone"></i> Mobile No *</label>
          <input name="mobile" class="form-input" required>
          <small class="error"></small>
        </div>

        <!-- WhatsApp -->
        <div class="input-group">
          <label><i class="fa-brands fa-whatsapp"></i> WhatsApp No</label>
          <input name="whatsapp" class="form-input">
        </div>

        <!-- Qualification -->
        <div class="input-group">
          <label><i class="fa-solid fa-graduation-cap"></i> Qualification</label>
          <select name="qualification" class="form-input">
            <option value="">Select</option>
            <option>12th</option><option>Graduate</option><option>PG</option><option>Other</option>
          </select>
        </div>

        <!-- Photo Upload -->
        <div class="input-group">
          <label><i class="fa-solid fa-image"></i> Upload Photo *</label>
          <input type="file" name="photo" accept="image/*" class="form-input" id="photoInput" required>
          <img id="photoPreview" class="preview-img" />
        </div>

        <!-- Signature Upload -->
        <div class="input-group">
          <label><i class="fa-solid fa-pen-nib"></i> Upload Signature *</label>
          <input type="file" name="signature" accept="image/*" class="form-input" id="signInput" required>
          <img id="signPreview" class="preview-img" />
        </div>

        <!-- Captcha -->
        <div class="input-group">
          <label><i class="fa-solid fa-shield-halved"></i> Captcha: {{ $captchaA }} + {{ $captchaB }}</label>
          <input name="captcha_answer" class="form-input" required>
        </div>

        <!-- Consent -->
        <div class="input-group" style="grid-column: span 2;">
          <label><input type="checkbox" name="consent" required> I agree to Terms & Conditions</label>
        </div>
      </div>

      <!-- Buttons -->
      <div class="popup-buttons">
        <button type="submit" class="submit-btn"><i class="fa-solid fa-indian-rupee-sign"></i> Apply & Pay ₹{{ env('REG_FEE_INR',199) }}</button>
      </div>
    </form>
  </div>
</div>

<!-- ✅ INLINE CSS -->
<!-- ✅ INLINE CSS -->
<style>
/* ✅ scrollbar clean style */
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

/* ✅ input hover & focus polish */
.form-input:hover {
    border-color: #00a859;
}
.form-input:focus {
    border-color: #00a859;
    box-shadow: 0 0 6px rgba(0,168,89,0.3);
}

/* ✅ button effects */
.submit-btn {
    transition: 0.3s ease-in-out;
    font-weight: 500;
    letter-spacing: .3px;
}
.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(0, 168, 89, 0.4);
}

/* ✅ image preview styling */
.img-preview {
    border: 1px solid #cfcfcf;
    padding: 4px;
    border-radius: 8px;
    margin-top: 6px;
    width: 100%;
    height: 100px;
    object-fit: contain;
    background: #f9f9f9;
}

/* ✅ close button polish */
.popup-close {
    color: #555;
    transition: 0.3s;
}
.popup-close:hover {
    color: #00a859;
    transform: rotate(90deg);
}

/* ✅ popup open animation */
.popup-box {
    animation: popIn .35s ease-out;
}
@keyframes popIn {
    from { transform: scale(.9); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

/* ✅ mobile fixes */
@media(max-width: 768px){
    .popup-box {
        width: 95%;
        max-height: 95vh;
    }
    .form-group-grid {
        grid-template-columns: 1fr;
    }
    .submit-btn {
        font-size: 15px;
    }
}
</style>


<!-- ✅ JAVASCRIPT -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
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

  // Form validation & Razorpay
  document.getElementById('regForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = e.target;
    const fd = new FormData(form);
    let valid = true;

    form.querySelectorAll('.error').forEach(el => el.innerText = '');
    form.querySelectorAll('[required]').forEach(input => {
      if (!input.value.trim()) {
        valid = false;
        const err = input.closest('.input-group')?.querySelector('.error');
        if (err) err.innerText = 'This field is required';
      }
    });
    if (!valid) return;

    // Create order
    const res = await fetch("{{ route('applications.store') }}", {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      body: fd
    });

    const data = await res.json();
    if (!data.ok) {
      alert(data.message || 'Error creating application.');
      return;
    }

    // Razorpay checkout
    const options = {
      key: "{{ env('RAZORPAY_KEY') }}",
      amount: data.amount,
      currency: "INR",
      name: "CKKK Gramin Parivar Foundation",
      description: "Digital Siksha Sarthi Registration",
      order_id: data.order_id,
      prefill: { name: data.name || '', email: data.email || '', contact: data.mobile || '' },
      handler: async function(response) {
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
          window.open(vr.pdf_url, "_blank");
          closeApplyForm();
          form.reset();
          document.querySelectorAll('.preview-img').forEach(p => p.style.display = 'none');
        } else {
          alert(vr.message || 'Payment verification failed.');
        }
      },
      theme: { color: '#00a859' }
    };

    const rzp = new Razorpay(options);
    rzp.on('payment.failed', function() {
      alert('Payment failed, please try again.');
    });
    rzp.open();
  });
</script>



<!-- ===== CSS Styling ===== -->
<style>
    .dss-section { background: #fff; padding: 50px 10%; display: flex; justify-content: center; align-items: center; }
    .dss-content { display: flex; gap: 30px; align-items: center; flex-wrap: wrap; }
    .dss-text { flex: 1; min-width: 300px; }
    .dss-text h2 { color: #006633; font-size: 2rem; margin-bottom: 15px; }
    .apply-btn { background: #00a859; color: #fff; border: none; padding: 10px 28px; cursor: pointer; border-radius: 25px; font-weight: 600; transition: .3s; }
    .apply-btn:hover { background: #008c4a; }
    .dss-image img { width: 100%; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); }

    /* Popup styles */
    .popup-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, .6); justify-content: center; align-items: center; z-index: 999; }
    .popup-box { background: white; padding: 20px 30px; border-radius: 8px; width: 400px; max-width: 90%; }
    .popup-box h3 { margin-bottom: 15px; color: #006633; }
    .popup-box input, .popup-box textarea { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 6px; }
    .popup-buttons { display: flex; justify-content: space-between; }
    .submit-btn { background: #00a859; border: none; padding: 10px 20px; color: white; border-radius: 5px; cursor: pointer; }
    .close-btn { background: #444; border: none; padding: 10px 20px; color: white; border-radius: 5px; cursor: pointer; }
</style>

<!-- ===== JS ===== -->
<script>
    function openApplyForm() {
        document.getElementById('applyPopup').style.display = 'flex';
    }
    function closeApplyForm() {
        document.getElementById('applyPopup').style.display = 'none';
    }
</script>


    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    

@endsection

@section('script')
<script>
    let site_url = '{{ url('/') }}';
</script>
@endsection
