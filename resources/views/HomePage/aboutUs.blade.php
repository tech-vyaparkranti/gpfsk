@extends('layouts.webSite')
@section('title', 'About Us • CKKK Gramin Parivar Foundation')

@section('content')
{{-- Google Font + AOS --}}
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
  :root{
    --brand-pink:#E91E63; --brand-pink-dark:#c2185b;
    --brand-green:#2ECC71; --brand-green-dark:#1e8f4e;
    --ink:#222; --muted:#616161; --bg:#f6f7fb;
  }
  body { font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
  .about-hero{
    position:relative;min-height:360px;display:flex;align-items:center;
    background:#0d0d0f url('{{ asset('assets/img/about-hero.jpg') }}') center/cover no-repeat
  }
  .about-hero::after{content:"";position:absolute;inset:0;background:linear-gradient(120deg, rgba(233,30,99,.72), rgba(46,204,113,.55))}
  .about-hero .wrap{position:relative;z-index:1;color:#fff;padding:72px 0}
  .about-hero .kicker{display:inline-block;background:#fff;color:#111;padding:6px 14px;border-radius:999px;font-weight:700;font-size:.85rem}
  .about-hero h1{font-weight:800;letter-spacing:.2px;margin-top:10px}
  .tagline{font-weight:600;margin-top:6px}
  .crumb a{color:#fff;text-decoration:underline}

  .section{padding:64px 0;background:#fff}
  .section.alt{background:var(--bg)}
  .kicker2{color:var(--brand-green);font-weight:800;letter-spacing:.12rem;text-transform:uppercase;font-size:.85rem}
  .h2{font-weight:800;color:var(--ink)}
  .lead{color:var(--muted);font-size:1.05rem}
  .hr{height:3px;width:74px;background:var(--brand-pink);border-radius:2px;margin:14px 0 26px}

  .card-lite{background:#fff;border-radius:14px;box-shadow:0 10px 28px rgba(0,0,0,.08);padding:24px}
  .pill{display:inline-block;background:rgba(46,204,113,.12);color:var(--brand-green-dark);padding:6px 12px;border-radius:999px;font-weight:600;margin:4px 8px 0 0}
  .icon-dot{height:44px;width:44px;border-radius:50%;display:inline-grid;place-items:center;background:rgba(233,30,99,.12);color:var(--brand-pink)}

  .focus-card{background:#fff;border-radius:14px;box-shadow:0 10px 26px rgba(0,0,0,.08);padding:18px;height:100%;transition:transform .2s ease, box-shadow .2s ease}
  .focus-card:hover{transform:translateY(-4px);box-shadow:0 14px 32px rgba(0,0,0,.12)}
  .focus-card img{border-radius:10px;height:140px;object-fit:cover;width:100%}
  .focus-card h5{margin:10px 0 4px;font-weight:700}
  .focus-card small{color:var(--muted)}

  .list-check{list-style:none;padding-left:0;margin:0}
  .list-check li{margin:10px 0;display:flex;align-items:flex-start}
  .list-check i{color:var(--brand-green);margin-right:10px;line-height:1.6}

  .cta{background:linear-gradient(120deg,var(--brand-pink),var(--brand-green));color:#fff;border:none;padding:12px 22px;border-radius:10px;font-weight:700}
  .cta:hover{filter:brightness(.95)}
  .cta-outline{background:#fff;color:var(--brand-pink);border:2px solid var(--brand-pink);padding:10px 18px;border-radius:10px;font-weight:700}
  .cta-outline:hover{background:var(--brand-pink);color:#fff}

  .mb-6{margin-bottom:2.25rem}
  .mt-6{margin-top:2.25rem}

  /* bilingual helpers */
  .hi{font-weight:500}
</style>

{{-- HERO --}}
<section class="about-hero">
  <div class="custom-container wrap">
    <span class="kicker">Skill, Employment & Women Empowerment Trust</span>
    <h1 class="display-6">About CKKK Gramin Parivar Foundation</h1>
    <div class="tagline">“सहयोग से सफलता तक”</div>
    <p class="mt-2 crumb"><a href="{{ url('/') }}">Home</a> · <span>About Us</span></p>
  </div>
</section>

{{-- WHO WE ARE (Hindi + English) --}}
<section class="section" id="who-we-are">
  <div class="custom-container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4" data-aos="fade-up">
        <span class="kicker2">हम कौन हैं · Who we are</span>
        <h2 class="h2">Skills • Livelihoods • Dignity</h2>
        <div class="hr"></div>

        <p class="lead hi">
          CKKKK ग्रामीण परिवार फाउंडेशन एक गैर-लाभकारी ट्रस्ट है जो ग्रामीण भारत के
          वंचित परिवारों के जीवन में सकारात्मक और स्थायी बदलाव लाने के लिए काम करता है।
          हमारा काम मुख्य रूप से <b>गया (बिहार)</b> और आसपास के गाँवों पर केंद्रित है,
          जहाँ हम शिक्षा, कौशल और आजीविका के माध्यम से समुदायों को आत्मनिर्भर और सशक्त बनाते हैं।
        </p>
        <p class="lead">
          CKKK Gramin Parivar Foundation is a people-first <strong>Trust</strong> enabling
          families in rural India—especially around <strong>Gaya, Bihar</strong>—to move
          from vulnerability to stability through <strong>skill development, women
          empowerment, employment support</strong> and <strong>rural upliftment</strong>.
          We keep programs simple, practical and community-led.
        </p>

        <div class="mt-2">
          <span class="pill">Skill Development</span>
          <span class="pill">Women Empowerment</span>
          <span class="pill">Self-Help Groups</span>
          <span class="pill">Employment Support</span>
          <span class="pill">Rural Development</span>
          <span class="pill">Youth Guidance</span>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card-lite">
          <img src="{{ asset('assets/img/about-collage-1.jpg') }}" alt="Community program" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>
</section>

{{-- MISSION & VISION (Hindi + English) --}}
<section class="section alt" id="mission-vision">
  <div class="custom-container">
    <div class="row g-4">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="card-lite h-100">
          <div class="icon-dot mb-2"><i class="fa fa-bullseye"></i></div>
          <h3 class="h5 fw-bold">मिशन · Our Mission</h3>
          <p class="mb-1 hi">
            ग्रामीण समुदायों को आवश्यक ज्ञान, कौशल और अवसर प्रदान कर उन्हें
            बेरोज़गारी, अशिक्षा और सामाजिक विषमताओं से बाहर निकालना—ताकि
            वे सम्मानपूर्वक, गरिमापूर्ण जीवन जी सकें।
          </p>
          <p class="mb-0">
            To equip women and youth with <strong>skills, guidance and real opportunities</strong>
            so they can start earning, grow in confidence and lead change at home and in the community.
          </p>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card-lite h-100">
          <div class="icon-dot mb-2" style="background:rgba(46,204,113,.12);color:var(--brand-green);">
            <i class="fa fa-eye"></i>
          </div>
          <h3 class="h5 fw-bold">दृष्टिकोण · Our Vision</h3>
          <p class="mb-1 hi">
            ऐसा ग्रामीण भारत जहाँ हर बच्चा गुणवत्तापूर्ण शिक्षा पाए, हर महिला
            आर्थिक रूप से स्वतंत्र हो, और हर परिवार आत्मनिर्भर बने।
          </p>
          <p class="mb-0">
            A confident, self-reliant rural India where <strong>every person can learn, work and thrive</strong>
            with dignity—especially across villages around Gaya, Bihar.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- FOCUS AREAS (your six) --}}
<section class="section" id="focus-areas">
  <div class="custom-container">
    <span class="kicker2">कार्य क्षेत्र · Focus Areas</span>
    <h2 class="h2">Where we act</h2>
    <div class="hr"></div>

    <div class="row g-4">
      <div class="col-md-4 col-sm-6" data-aos="fade-up">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-skills.jpg') }}" alt="Skill Development">
          <h5>कौशल विकास · Skill Development & Training</h5>
          <small>Hands-on courses, digital literacy, vocational training</small>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="80">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-women.jpg') }}" alt="Women Empowerment">
          <h5>महिला सशक्तिकरण · Women Empowerment</h5>
          <small>Entrepreneurship, leadership, financial literacy</small>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="160">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-shg.jpg') }}" alt="SHGs">
          <h5>स्वयं सहायता समूह · Self-Help Groups (SHGs)</h5>
          <small>Collective savings, micro-enterprise, peer learning</small>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-employment.jpg') }}" alt="Employment">
          <h5>रोज़गार सृजन · Employment Generation</h5>
          <small>Job-linkage, placement support, career pathways</small>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="80">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-rural.jpg') }}" alt="Rural Development">
          <h5>ग्रामीण विकास · Rural Development</h5>
          <small>Livelihoods, community assets, local entrepreneurs</small>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="160">
        <div class="focus-card">
          <img src="{{ asset('assets/img/focus-youth.jpg') }}" alt="Youth Guidance">
          <h5>युवा मार्गदर्शन · Youth Guidance & Motivation</h5>
          <small>Workshops, mentoring, life & career skills</small>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- APPROACH / METHODOLOGY (from client content; no healthcare section) --}}
<section class="section alt" id="approach-impact">
  <div class="custom-container">
    <span class="kicker2">हमारी कार्यप्रणाली · Our Approach</span>
    <h2 class="h2">Community-led. Practical. Accountable.</h2>
    <div class="hr"></div>

    <div class="row g-4">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="card-lite h-100">
          <h5 class="fw-bold mb-2">समुदाय आधारित · Community-based</h5>
          <ul class="list-check">
            <li><i class="fa fa-check"></i><span class="hi">स्थानीय सहभागिता और पारदर्शिता के साथ सभी परियोजनाएँ चलाई जाती हैं।</span></li>
            <li><i class="fa fa-check"></i>Programs co-designed with village leaders, women groups and youth.</li>
          </ul>

          <h5 class="fw-bold mt-4 mb-2">स्थायी समाधान · Long-term solutions</h5>
          <ul class="list-check">
            <li><i class="fa fa-check"></i><span class="hi">अस्थायी नहीं, बल्कि आजीविका और कौशल पर आधारित टिकाऊ परिवर्तन।</span></li>
            <li><i class="fa fa-check"></i>Start small, validate, then scale across nearby villages around Gaya.</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card-lite h-100">
          <h5 class="fw-bold mb-2">जवाबदेही · Accountability</h5>
          <ul class="list-check">
            <li><i class="fa fa-check"></i><span class="hi">दानदाताओं और लाभार्थियों के प्रति स्पष्ट जवाबदेही; प्रभाव का नियमित आकलन।</span></li>
            <li><i class="fa fa-check"></i>Transparent reporting, measurable outcomes, and community feedback loops.</li>
          </ul>

          <h5 class="fw-bold mt-4 mb-2">शिक्षा का सहयोग · Education Support (light)</h5>
          <ul class="list-check">
            <li><i class="fa fa-check"></i><span class="hi">जरूरतमंद छात्रों के लिए रेमेडियल सपोर्ट, डिजिटल साक्षरता और प्रेरक सत्र।</span></li>
            <li><i class="fa fa-check"></i>Scholarship linkages & mentorship where relevant to livelihoods.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- CTA (no donate) --}}
<section class="section">
  <div class="custom-container text-center">
    <h2 class="h2">Join our mission from Gaya to every village</h2>
    <p class="lead">Partner with us, volunteer or start a skills program in your community.</p>
    <div class="d-flex gap-3 justify-content-center mt-3">
      <a href="{{ route('contactUs') }}" class="cta">Contact Us</a>
      {{-- <a href="{{ url('/programs') }}" class="cta-outline">Explore Programs</a> --}}
    </div>
  </div>
</section>

{{-- AOS --}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>try{AOS.init({ once:true, duration:800, easing:'ease-in-out' });}catch(e){}</script>
@endsection
