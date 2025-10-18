<!-- ✅ GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- ✅ FOOTER START -->
<footer class="custom-footer">
    <!-- Decorative Wave -->
    <div class="footer-wave">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="currentColor"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="currentColor"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="currentColor"></path>
        </svg>
    </div>

    <div class="footer-top">
        <div class="footer-col">
            <img src="{{ isset($WebSetting[0]->logo) ? url($WebSetting[0]->logo) : './assets/img/logo2.png' }}"
                alt="Logo" class="footer-logo">
            <p class="footer-about">
                {{ isset($WebSetting[0]->company_name) ? $WebSetting[0]->company_name : 'Our Organization' }} is
                dedicated to empowering communities through education, skill development, and rural upliftment programs.
            </p>
            <!-- Trust Badges -->
            <div class="trust-badges">
                <span class="badge"><i class="fa-solid fa-shield-halved"></i> Secure</span>
                <span class="badge"><i class="fa-solid fa-certificate"></i> Verified</span>
                <span class="badge"><i class="fa-solid fa-award"></i> Trusted</span>
            </div>
        </div>

        <div class="footer-col">
            <h4><i class="fa-solid fa-link"></i> Quick Links</h4>
            <ul class="footer-links">
                <li><a href="/"><i class="fa-solid fa-chevron-right"></i> Home</a></li>
                <li><a href="{{ route('aboutUs') }}"><i class="fa-solid fa-chevron-right"></i> About Us</a></li>
                {{-- <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Our Services</a></li> --}}
                <li><a href="{{ route('contactUs') }}"><i class="fa-solid fa-chevron-right"></i> Contact Us</a></li>
                {{-- <li><a href="#"><i class="fa-solid fa-chevron-right"></i> Terms & Conditions</a></li> --}}
                <li><a href="{{ route('CancellationRefundPolicy') }}"><i class="fa-solid fa-chevron-right"></i>
                        Cancellation & Refund policy</a></li>
                <li><a href="{{ route('privacyPolicy') }}"><i class="fa-solid fa-chevron-right"></i> Privacy policy</a>
                </li>


            </ul>
        </div>

        <div class="footer-col">
            <h4><i class="fa-solid fa-address-book"></i> Contact Information</h4>
            <ul class="footer-contact">
                <li class="contact-item">
                    <span class="contact-label">Company E-mail:</span>
                    <div class="contact-details">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:{{ $WebSetting[0]->email ?? 'info@graminparivarfoundation.in' }}">{{
                            $WebSetting[0]->email ?? 'info@graminparivarfoundation.in' }}</a>
                    </div>
                </li>
                <li class="contact-item">
                    <span class="contact-label">Contact No:</span>
                    <div class="contact-details">
                        <i class="fa-solid fa-phone"></i>
                        <a
                            href="tel:{{ $WebSetting[0]->mobile ?? '01169656604' }}">{{ $WebSetting[0]->mobile ?? '01169656604' }}</a>
                    </div>
                </li>
                <li class="contact-item">
                    <span class="contact-label">Address:</span>
                    <div class="contact-details">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $WebSetting[0]->address ?? 'BISHUN BIGHA PS IMAMGANJ Pakri Guria Gaya Bihar India 824206' }}</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="footer-col social">
            <h4><i class="fa-solid fa-users"></i> Connect With Us</h4>
            <p class="social-subtitle">Follow us on social media for updates</p>
            <div class="social-links">
                <a href="{{ $WebSetting[0]->facebook ?? '#' }}" class="social-btn facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="{{ $WebSetting[0]->twitter ?? '#' }}" class="social-btn twitter">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="{{ $WebSetting[0]->instagram ?? '#' }}" class="social-btn instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="{{ $WebSetting[0]->youtube ?? '#' }}" class="social-btn youtube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
            <div class="social-links mt-3">
                <img src="{{ asset('assets/img/privarlogo1.png') }}" alt="Logo 1">
                <img src="{{ asset('assets/img/parivarlogo2.png') }}" alt="Logo 2">
                <img src="{{ asset('assets/img/parivarlogo3.png') }}" alt="Logo 3">
            </div>
        </div>
    </div>

    <!-- ✅ FOOTER BOTTOM -->
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; {{ date('Y') }} {{ $WebSetting[0]->company_name ?? '' }} - All Rights Reserved.</p>
            <p class="developer-credit">Crafted with <i class="fa-solid fa-heart"></i> for Better Tomorrow</p>
        </div>
    </div>

    <!-- ✅ BACK TO TOP BUTTON -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="back-to-top" id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</footer>

<!-- ✅ FOOTER STYLES -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .custom-footer {
        background: linear-gradient(135deg, #0a3d0a 0%, #002200 100%);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        margin-top: 60px;
        position: relative;
        overflow: hidden;
    }

    /* Decorative Wave */
    .footer-wave {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .footer-wave svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
        color: #00e676;
        opacity: 0.15;
    }

    .footer-top {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 80px 5% 40px;
        position: relative;
        z-index: 1;
        max-width: 1400px;
        margin: 0 auto;
    }

    .footer-col {
        animation: fadeInUp 0.6s ease-out;
        max-width: 300px;
        margin-top: 20px;
    }

    .footer-col.social {
        width: 500px;
        /* Fixed width for social column */
        max-width: 500px;
        /* Ensure it doesn't exceed 500px */
        flex-shrink: 0;
        /* Prevent shrinking in grid */
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .footer-logo {
        max-width: 180px;
        margin-bottom: 20px;
        filter: drop-shadow(0 4px 8px rgba(0, 230, 118, 0.3));
        transition: transform 0.3s ease;
    }

    .footer-logo:hover {
        transform: scale(1.05);
    }

    .footer-about {
        color: #c5e8c7;
        font-size: 14px;
        line-height: 24px;
        margin-bottom: 20px;
        overflow-wrap: break-word;
    }

    /* Trust Badges */
    .trust-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }

    .trust-badges .badge {
        background: rgba(0, 230, 118, 0.1);
        border: 1px solid rgba(0, 230, 118, 0.3);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
        color: #00ff88;
        transition: all 0.3s ease;
    }

    .trust-badges .badge:hover {
        background: rgba(0, 230, 118, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 230, 118, 0.3);
    }

    .footer-col h4 {
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: 600;
        color: #00ff88;
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        padding-bottom: 12px;
    }

    .footer-col h4::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #00e676, transparent);
        border-radius: 3px;
    }

    .footer-links {
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }

    .footer-links li:hover {
        transform: translateX(5px);
    }

    .footer-links a {
        text-decoration: none;
        color: #c5e8c7;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        position: relative;
    }

    .footer-links a i {
        font-size: 10px;
        color: #00e676;
        transition: transform 0.3s ease;
    }

    .footer-links a:hover {
        color: #00ff88;
    }

    .footer-links a:hover i {
        transform: translateX(3px);
    }

    /* Enhanced Contact Section */
    .footer-contact {
        list-style: none;
    }

    .contact-item {
        margin-bottom: 18px;
    }

    .contact-item:last-child {
        margin-bottom: 0;
    }

    .contact-label {
        display: block;
        font-size: 15px;
        font-weight: 600;
        color: #00ff88;
        margin-bottom: 6px;
        text-transform: capitalize;
    }

    .contact-details {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: #c5e8c7;
        font-size: 14px;
        padding-left: 5px;
    }

    .contact-details i {
        color: #00e676;
        font-size: 16px;
        min-width: 20px;
        margin-top: 2px;
    }

    .contact-details a {
        color: #e8f5e9;
        text-decoration: none;
        transition: all 0.3s ease;
        word-break: break-word;
    }

    .contact-details a:hover {
        color: #00ff88;
        padding-left: 5px;
    }

    .contact-details span {
        color: #e8f5e9;
        line-height: 1.6;
        overflow-wrap: break-word;
    }

    /* Enhanced Social Links */
    .social-subtitle {
        color: #c5e8c7;
        font-size: 13px;
        margin-bottom: 15px;
    }

    .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .social-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 10px;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        flex: 0.1;
    }

    .social-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transition: left 0.3s ease;
    }

    .social-btn:hover::before {
        left: 0;
    }

    .social-btn i {
        font-size: 18px;
    }

    .facebook {
        background: linear-gradient(135deg, #1877f2, #0d5dbf);
    }

    .facebook:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(24, 119, 242, 0.4);
    }

    .twitter {
        background: linear-gradient(135deg, #1da1f2, #0d8bd9);
    }

    .twitter:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(29, 161, 242, 0.4);
    }

    .instagram {
        background: linear-gradient(135deg, #e1306c, #c13584, #833ab4);
    }

    .instagram:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(225, 48, 108, 0.4);
    }

    .youtube {
        background: linear-gradient(135deg, #ff0000, #cc0000);
    }

    .youtube:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 0, 0, 0.4);
    }

    .social-links img {
        max-width: 100px;
        height: auto;
        margin: 5px;
    }

    /* Footer Bottom */
    .footer-bottom {
        background: rgba(0, 0, 0, 0.3);
        padding: 10px 8%;
        border-top: 1px solid rgba(0, 230, 118, 0.1);
    }

    .footer-bottom-content {
        text-align: center;
    }

    .footer-bottom-content p {
        font-size: 14px;
        color: #c5e8c7;
        margin: 5px 0;
    }

    .developer-credit {
        font-size: 13px !important;
        opacity: 0.8;
    }

    .developer-credit i {
        color: #ff4757;
        animation: heartbeat 1.5s infinite;
    }

    @keyframes heartbeat {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 130px;
        right: 30px;
        background: linear-gradient(135deg, #00e676, #00ff88);
        color: #003300;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 230, 118, 0.4);
        opacity: 0;
        visibility: hidden;
        z-index: 999;
    }

    .back-to-top.show {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 230, 118, 0.6);
    }

    /* ✅ Responsive */
    @media(max-width: 768px) {
        .footer-top {
            grid-template-columns: 1fr;
            padding: 50px 5% 30px;
        }

        .footer-col {
            text-align: left;
            max-width: 100%;
            margin-top: 20px;
        }

        .footer-col.social {
            width: 100%;
            /* Reset to full width on mobile */
            max-width: 100%;
        }

        .footer-wave svg {
            height: 40px;
        }

        .trust-badges {
            justify-content: flex-start;
        }

        .social-links {
            flex-direction: row;
        }

        .back-to-top {
            bottom: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
        }
    }

    /* Hide Google Translate elements */
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

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

<!-- Back to Top Button Script -->
<script>
    // Show/Hide Back to Top button
    window.addEventListener('scroll', function () {
        const backToTop = document.getElementById('backToTop');
        if (window.scrollY > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
</script>
<!-- ✅ FOOTER END -->