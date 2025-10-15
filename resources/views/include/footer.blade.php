<!-- ✅ GOOGLE FONT -->
{{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet"> --}}

<!-- ✅ FOOTER START -->
<footer class="custom-footer">
    <div class="footer-top">
        <div class="footer-col">
            <img src="{{ isset($WebSetting[0]->logo) ? url($WebSetting[0]->logo) : './assets/img/logo4.png' }}" alt="Logo" class="footer-logo">
            <p class="footer-about">
                {{ isset($WebSetting[0]->company_name) ? $WebSetting[0]->company_name : 'Our Organization' }} is dedicated to empowering communities 
                through education, skill development, and rural upliftment programs.
            </p>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                <li><a href="{{ route('destinations') }}">Our Services</a></li>
                <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                <li><a href="{{ url('/terms-conditions') }}">Terms & Conditions</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact Info</h4>
            <ul class="footer-contact">
                <li><i class="fa-regular fa-envelope"></i> <a href="mailto:{{ $WebSetting[0]->email ?? '' }}">{{ $WebSetting[0]->email ?? '' }}</a></li>
                <li><i class="fa-regular fa-phone"></i> <a href="tel:{{ $WebSetting[0]->mobile ?? '' }}">{{ $WebSetting[0]->mobile ?? '' }}</a></li>
                <li><i class="fa-regular fa-location-dot"></i> {{ $WebSetting[0]->address ?? '' }}</li>
            </ul>
        </div>

        <div class="footer-col social">
            <h4>Follow Us</h4>
            <div class="social-links">
                <a href="{{ $WebSetting[0]->facebook ?? '#' }}"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ $WebSetting[0]->twitter ?? '#' }}"><i class="fa-brands fa-twitter"></i></a>
                <a href="{{ $WebSetting[0]->instagram ?? '#' }}"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{ $WebSetting[0]->youtube ?? '#' }}"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- ✅ TRUST BAR -->
    <div class="trust-bar">
        <p>✅ Secure Website &nbsp; | &nbsp; ✅ Trusted Organization &nbsp; | &nbsp; ✅ Verified Registration</p>
    </div>

    <!-- ✅ COPYRIGHT -->
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ $WebSetting[0]->company_name ?? '' }} - All Rights Reserved.</p>
    </div>

    <!-- ✅ BACK TO TOP BUTTON -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="back-to-top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</footer>

<style>
    .goog-te-banner-frame,
    .goog-te-gadget,
    #google_translate_element,
    .goog-logo-link,
    .goog-te-balloon-frame,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd {
        display: none !important;
        visibility: hidden !important;
    }
    body {
        top: 0 !important;
    }
</style>

<!-- ✅ FOOTER STYLES -->
<style>
.custom-footer{background:#003300;color:#fff;font-family:'Open Sans',sans-serif;margin-top:40px;}
.footer-top{display:flex;flex-wrap:wrap;gap:30px;justify-content:space-between;padding:40px 8%;border-bottom:1px solid #044a04;}
.footer-col{flex:1;min-width:220px;}
.footer-logo{max-width:200px;margin-bottom:10px;}
.footer-about{color:#ddd;font-size:14px;line-height:22px;}
.footer-col h4{margin-bottom:12px;font-size:18px;border-left:4px solid #00e676;padding-left:8px;}
.footer-links li{list-style:none;margin-bottom:6px;}
.footer-links a{text-decoration:none;color:#fff;font-size:14px;transition:0.3s;}
.footer-links a:hover{color:#00e676;padding-left:5px;}
.footer-contact li{margin-bottom:6px;font-size:14px;color:#ddd;}
.footer-contact i{margin-right:8px;color:#00e676;}
.social-links a{display:inline-flex;width:38px;height:38px;border-radius:50%;align-items:center;justify-content:center;background:#005500;margin-right:8px;color:#fff;font-size:16px;transition:0.3s;}
.social-links a:hover{background:#00e676;color:#003300;}
.trust-bar{text-align:center;background:#002200;padding:8px;font-size:14px;color:#cfcfcf;}
.footer-bottom{text-align:center;padding:12px;background:#001a00;font-size:14px;color:#ccc;}
.back-to-top{position:fixed;bottom:20px;right:20px;background:#00e676;color:#003300;border:none;width:40px;height:40px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:0.3s;}
.back-to-top:hover{background:#00ff88;}

/* ✅ Responsive */
@media(max-width:768px){
    .footer-top{flex-direction:column;text-align:center}
    .social-links{justify-content:center}
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<!-- ✅ FOOTER END -->
