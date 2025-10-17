@extends('layouts.webSite')
@section('title', 'Cancellation & Refund Policy • CKKK Gramin Parivar Foundation')

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
  .hero{
    position:relative;min-height:300px;display:flex;align-items:center;
    background:#0d0d0f url('{{ asset('assets/img/policy-hero.jpg') }}') center/cover no-repeat;
  }
  .hero::after{content:"";position:absolute;inset:0;background:linear-gradient(120deg, rgba(233,30,99,.70), rgba(46,204,113,.55))}
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
  .note{background:#fff7fb;border-left:4px solid var(--brand-pink);padding:12px 14px;border-radius:10px}

  .label{display:inline-block;background:rgba(46,204,113,.12);color:var(--brand-green-dark);
         padding:6px 12px;border-radius:999px;font-weight:600;margin-bottom:6px}
  .cta{background:linear-gradient(120deg,var(--brand-pink),var(--brand-green));color:#fff;border:none;padding:12px 22px;border-radius:10px;font-weight:700}
  .cta:hover{filter:brightness(.95)}
</style>

{{-- HERO --}}
<section class="hero">
  <div class="custom-container wrap">
    <span class="kicker">Policy</span>
    <h1 class="display-6">Cancellation & Refund Policy</h1>
    <p class="mt-2 crumb"><a href="{{ url('/') }}">Home</a> · <span>Cancellation & Refund Policy</span></p>
  </div>
</section>

{{-- INTRO --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Policy Overview · नीति का सार</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <p><strong>CKKK Gramin Parivar Foundation</strong> (“Trust”, “we”, “our”) follows a <strong>Strict No Refund & No Cancellation</strong> policy for all payments made via this website, including donations, membership fees, training/program fees, application/registration charges and any service/processing charges.</p>
      <p class="hi"><strong>ध्यान दें:</strong> यह वेबसाइट <strong>कठोर नो-रिफंड एवं नो-कैंसिलेशन</strong> नीति अपनाती है। वेबसाइट पर किए गए <strong>सभी भुगतान</strong> — जैसे दान, मेंबरशिप शुल्क, ट्रेनिंग/प्रोग्राम फीस, आवेदन/रजिस्ट्रेशन शुल्क, सेवाओं के शुल्क — <strong>अपरिवर्तनीय</strong> और <strong>वापसी योग्य नहीं</strong> हैं।</p>
      <div class="note mt-2"><strong>Why:</strong> As a public-interest Trust, funds are allocated immediately to field activities, beneficiaries and operational commitments; reversing transactions can jeopardize ongoing work.</div>
    </div>
  </div>
</section>

{{-- SCOPE --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <span class="label">Scope · लागू क्षेत्र</span>
    <h2 class="h2">Payments Covered · शामिल भुगतान</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>Donations / दान</li>
        <li>Membership / सदस्यता शुल्क</li>
        <li>Training / Program Fees · प्रशिक्षण / कार्यक्रम शुल्क</li>
        <li>Application / Registration Charges · आवेदन / पंजीकरण शुल्क</li>
        <li>Service / Processing Charges · सेवा / प्रसंस्करण शुल्क</li>
        <li>Any other charges shown on our website · वेबसाइट पर दर्शाए गए अन्य सभी शुल्क</li>
      </ul>
    </div>
  </div>
</section>

{{-- NO CANCELLATION / NO REFUND --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">No Cancellation · No Refund · कोई रद्दीकरण नहीं · कोई वापसी नहीं</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li><strong>No Cancellation:</strong> Once a payment is completed, it <strong>cannot be cancelled</strong> for any reason.</li>
        <li class="hi"><strong>कोई रद्दीकरण नहीं:</strong> भुगतान पूरा होते ही <strong>रद्द नहीं किया जा सकता</strong>।</li>

        <li class="mt-2"><strong>No Refund:</strong> All payments are <strong>final and non-refundable</strong>, including partial or full amounts.</li>
        <li class="hi"><strong>कोई वापसी नहीं:</strong> सभी भुगतान <strong>अंतिम</strong> हैं और <strong>वापसी योग्य नहीं</strong> हैं।</li>
      </ul>
    </div>
  </div>
</section>

{{-- ERRORS / DUPLICATE / UNAUTHORISED --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Transaction Errors & Chargebacks · लेन-देन त्रुटि</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li><strong>Duplicate / Erroneous charges:</strong> If you believe you were charged by mistake or twice, please write to us with proof of transaction (UTR/Txn ID). We will review and respond.</li>
        <li class="hi"><strong>डुप्लीकेट / गलती से कटौती:</strong> यदि गलती से या दो बार राशि कट गई हो, तो <em>UTR/Txn ID</em> के साथ हमें लिखें। हम जाँचकर उत्तर देंगे।</li>

        <li class="mt-1"><strong>Unauthorised use:</strong> For suspected unauthorised transactions, contact your bank immediately and inform us.</li>
        <li class="hi"><strong>अनधिकृत लेन-देन:</strong> संदिग्ध लेन-देन की स्थिति में तुरंत अपने बैंक से संपर्क करें और हमें भी सूचित करें।</li>

        <li class="mt-1"><strong>Chargebacks:</strong> We reserve the right to contest chargebacks with supporting evidence, since services/allocations begin immediately after receipt.</li>
        <li class="hi"><strong>चार्जबैक:</strong> निधि प्राप्त होते ही कार्य प्रारम्भ हो जाने के कारण, ट्रस्ट वैध प्रमाणों के साथ चार्जबैक को चुनौती देने का अधिकार रखता है।</li>
      </ul>
    </div>
  </div>
</section>

{{-- TAX RECEIPTS / INVOICES --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Receipts & Records · रसीदें</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li>Official receipts/invoices will be issued for eligible payments made via our website or notified channels.</li>
        <li class="hi">वेबसाइट अथवा अधिकृत माध्यमों से किए गए भुगतान के लिए आधिकारिक रसीद/इनवॉइस जारी किए जाएंगे।</li>
      </ul>
    </div>
  </div>
</section>

{{-- MODIFICATIONS / GOVERNING LAW --}}
<section class="section alt">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Policy Changes & Jurisdiction · नीति परिवर्तन व अधिकार क्षेत्र</h2>
    <div class="hr"></div>
    <div class="card-lite">
      <ul class="list">
        <li><strong>Modifications:</strong> The Trust may update this policy at any time. Updates will be posted on this page.</li>
        <li class="hi"><strong>परिवर्तन:</strong> ट्रस्ट किसी भी समय इस नीति को अद्यतन कर सकता है; परिवर्तन इसी पृष्ठ पर प्रकाशित किए जाएंगे।</li>

        <li class="mt-1"><strong>Governing Law:</strong> This policy is governed by the laws of India. Disputes, if any, shall be subject to the competent courts/jurisdiction of our registered location.</li>
        <li class="hi"><strong>अधिकार क्षेत्र:</strong> यह नीति भारत के विधि के अधीन है; प्रासंगिक विवाद हमारे पंजीकृत स्थान के न्याय क्षेत्राधिकार में होंगे।</li>
      </ul>
    </div>
  </div>
</section>

{{-- CONTACT --}}
<section class="section">
  <div class="custom-container" data-aos="fade-up">
    <h2 class="h2">Contact for Policy Queries · संपर्क</h2>
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
