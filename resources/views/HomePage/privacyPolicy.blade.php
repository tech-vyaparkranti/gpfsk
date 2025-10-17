@extends('layouts.webSite')
@section('title', 'Privacy Policy • CKKK Gramin Parivar Foundation')

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
  body{font-family:'Poppins',system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif}
  .hero{position:relative;min-height:300px;display:flex;align-items:center;background:#0d0d0f url('{{ asset('assets/img/policy-hero.jpg') }}') center/cover no-repeat}
  .hero::after{content:"";position:absolute;inset:0;background:linear-gradient(120deg,rgba(233,30,99,.7),rgba(46,204,113,.55))}
  .hero .wrap{position:relative;z-index:1;color:#fff;padding:64px 0}
  .hero .kicker{display:inline-block;background:#fff;color:#111;padding:6px 14px;border-radius:999px;font-weight:700;font-size:.85rem}
  .hero h1{font-weight:800;letter-spacing:.2px;margin-top:10px}
  .crumb a{color:#fff;text-decoration:underline}

  .section{padding:56px 0;background:#fff}
  .section.alt{background:var(--bg)}
  .h2{font-weight:800;color:var(--ink)}
  .hr{height:3px;width:74px;background:var(--brand-pink);border-radius:2px;margin:14px 0 26px}

  .card-lite{background:#fff;border-radius:14px;box-shadow:0 10px 28px rgba(0,0,0,.08);padding:24px}
  .list{margin:0;padding-left:18px}
  .list li{margin:8px 0}
  .label{display:inline-block;background:rgba(46,204,113,.12);color:var(--brand-green-dark);padding:6px 12px;border-radius:999px;font-weight:600;margin-bottom:6px}
  .note{background:#fff7fb;border-left:4px solid var(--brand-pink);padding:12px 14px;border-radius:10px}
  .cta{background:linear-gradient(120deg,var(--brand-pink),var(--brand-green));color:#fff;border:none;padding:12px 22px;border-radius:10px;font-weight:700}
  .cta:hover{filter:brightness(.95)}
</style>

{{-- HERO --}}
<section class="hero">
  <div class="custom-container wrap">
    <span class="kicker">Policy</span>
    <h1 class="display-6">Privacy Policy</h1>
    <p class="mt-2 crumb"><a href="{{ url('/') }}">Home</a> · <span>Privacy Policy</span></p>
  </div>
</section>

{{-- INTRO --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Overview · गोपनीयता का सार</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p><strong>CKKK Gramin Parivar Foundation</strong> (“Trust”, “we”, “our”) respects your privacy. This Privacy Policy explains what data we collect, why we collect it, how we use it and your choices.</p>
      <p class="hi"><strong>हम आपकी गोपनीयता का सम्मान करते हैं।</strong> यह नीति बताती है कि हम कौन-सा डेटा एकत्र करते हैं, क्यों करते हैं, उसका उपयोग कैसे होता है, और आपके अधिकार क्या हैं।</p>
      <div class="note mt-2">This policy applies to our website, contact/job forms, and job application fee payments processed via Razorpay.</div>
    </div>
  </div>
</section>

{{-- DATA WE COLLECT --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <span class="label">What we collect · हम क्या एकत्र करते हैं</span>
    <h2 class="h2">Personal Data</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li><strong>Contact Form:</strong> Name, Email, Phone, Message.</li>
        <li class="hi"><strong>संपर्क फॉर्म:</strong> नाम, ईमेल, मोबाइल नंबर, संदेश।</li>

        <li class="mt-1"><strong>Job Application / Payment:</strong> Name, Email, Phone, Address (if asked), resume details (if provided). Payment instrument details are handled by <strong>Razorpay</strong>; we receive only payment status, reference IDs, amounts, and timestamps.</li>
        <li class="hi"><strong>जॉब आवेदन / भुगतान:</strong> नाम, ईमेल, मोबाइल, पता (यदि पूछा गया), रिज़्यूमे विवरण (यदि दिया गया)। भुगतान की संवेदनशील जानकारी <strong>Razorpay</strong> द्वारा संभाली जाती है; हमें केवल भुगतान स्थिति, संदर्भ आईडी, राशि और समय मिलता है।</li>
      </ul>
    </div>
  </div>
</section>

{{-- HOW & WHY --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">How we use data · डेटा का उपयोग</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>To respond to your queries and provide requested information.</li>
        <li>To process job-related forms and fees, send confirmations, receipts, and important updates.</li>
        <li>To improve our services, prevent fraud, and ensure platform security.</li>

        <li class="hi">आपके प्रश्नों का उत्तर देने, जॉब-फॉर्म और फीस को संसाधित करने, रसीद/पुष्टिकरण भेजने तथा सुरक्षा सुनिश्चित करने के लिए।</li>
      </ul>
    </div>
  </div>
</section>

{{-- LEGAL BASIS / CONSENT --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Consent & Lawful Use · सहमति और वैध उपयोग</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>By submitting forms or making a payment, you <strong>consent</strong> to our processing of your information as described here.</li>
        <li class="hi">किसी भी फॉर्म/भुगतान को सबमिट करके आप यहां वर्णित तरीके से अपने डेटा के उपयोग हेतु <strong>सहमति</strong> देते हैं।</li>
      </ul>
    </div>
  </div>
</section>

{{-- PAYMENTS / RAZORPAY --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <span class="label">Payments · Razorpay</span>
    <h2 class="h2">Payment Security & Data</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>Payments are processed by <strong>Razorpay</strong>. Your card/UPI/bank details are collected and stored by Razorpay as per their security standards (PCI-DSS). We do not store your full payment instrument details on our servers.</li>
        <li class="hi">भुगतान <strong>Razorpay</strong> के माध्यम से होता है। कार्ड/UPI/बैंक विवरण Razorpay के सुरक्षा मानकों (PCI-DSS) के अनुसार संभाले जाते हैं। हम अपने सर्वर पर आपके पूर्ण भुगतान विवरण सुरक्षित नहीं रखते।</li>
      </ul>
      <div class="note mt-2">In case of payment issues (duplicate/failed), please contact us with the transaction reference. (Refunds are governed by our separate <a href="{{ route('CancellationRefundPolicy') }}">Cancellation & Refund Policy</a>.)</div>
    </div>
  </div>
</section>

{{-- COOKIES --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Cookies & Analytics · कुकीज़</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p>We currently do not use advanced tracking cookies. If analytics (e.g., Google Analytics) are enabled in the future, we will update this section and provide controls where applicable.</p>
      <p class="hi">वर्तमान में उन्नत ट्रैकिंग कुकीज़ का उपयोग नहीं किया जाता। भविष्य में एनालिटिक्स सक्षम होने पर यह अनुभाग अद्यतन किया जाएगा।</p>
    </div>
  </div>
</section>

{{-- DATA RETENTION --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Data Retention · डेटा संरक्षण अवधि</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>We retain form and transaction records for as long as needed for legal, accounting or operational purposes.</li>
        <li class="hi">कानूनी/लेखा/संचालन आवश्यकताओं हेतु रिकॉर्ड उतनी अवधि तक सुरक्षित रखे जाते हैं जितनी आवश्यकता हो।</li>
      </ul>
    </div>
  </div>
</section>

{{-- SHARING --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Sharing & Third Parties · डेटा साझा करना</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>We do not sell your personal data. We may share minimal data with service providers (e.g., Razorpay, hosting, email) strictly to operate our services.</li>
        <li>We may disclose information if required by law, regulation, or court order.</li>

        <li class="hi">हम आपका डेटा नहीं बेचते। सेवा संचालन हेतु आवश्यक होने पर सीमित जानकारी विश्वसनीय सेवा प्रदाताओं के साथ साझा की जा सकती है।</li>
      </ul>
    </div>
  </div>
</section>

{{-- YOUR RIGHTS --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Your Rights · आपके अधिकार</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>Request access, correction, or deletion of your personal data (subject to lawful limits).</li>
        <li>Withdraw consent where processing is based on consent (may impact service availability).</li>

        <li class="hi">आप अपने डेटा तक पहुँच/सुधार/हटाने का अनुरोध कर सकते हैं (कानूनी सीमाओं के अधीन)। सहमति-आधारित प्रक्रियाओं से सहमति वापस ले सकते हैं।</li>
      </ul>
    </div>
  </div>
</section>

{{-- CHILDREN --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Children’s Privacy · बाल गोपनीयता</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p>Our website is intended for general audiences. We do not knowingly collect personal data from children under applicable age limits. If you believe a child has provided data, please contact us for removal.</p>
      <p class="hi">हम बच्चों से जानबूझकर डेटा एकत्र नहीं करते। यदि किसी बालक/बालिका के डेटा का संज्ञान हो, तो कृपया हटाने हेतु हमसे संपर्क करें।</p>
    </div>
  </div>
</section>

{{-- CHANGES --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Policy Updates · नीति अद्यतन</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated “Last Updated” date.</p>
      <p class="hi">यह नीति समय-समय पर अद्यतन की जा सकती है। परिवर्तन इसी पृष्ठ पर “Last Updated” के साथ प्रकाशित होंगे।</p>
      <p class="mt-2"><strong>Last Updated:</strong> {{ date('F d, Y') }}</p>
    </div>
  </div>
</section>

{{-- CONTACT --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Contact · संपर्क</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p><strong>CKKK Gramin Parivar Foundation (Trust)</strong></p>
      <p><strong>Address:</strong> <em>BISHUN BIGHA PS IMAMGANJ Pakri Guria Gaya Bihar India 824206</em></p>
      <p><strong>Email:</strong> <em>info@graminparivarfoundation.in</em> &nbsp; | &nbsp; <strong>Phone:</strong> <em>01169656604</em></p>
      <div class="mt-3">
        <a href="{{ route('contactUs') }}" class="cta">Contact Us</a>
      </div>
    </div>
  </div>
</section>

{{-- AOS --}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>try{AOS.init({ once:true, duration:800, easing:'ease-in-out' });}catch(e){}</script>
@endsection
