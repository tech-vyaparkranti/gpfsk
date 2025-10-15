{{-- resources/views/include/navigation.blade.php --}}
<div class="topbar">
  <div class="wrap">
    <div class="left">
      <a class="flag" href="https://www.india.gov.in" target="_blank" rel="noopener" aria-label="India.gov.in">
        <img src="https://flagcdn.com/w20/in.png" alt="India Flag">
      </a>
      <a class="skip" href="#main-content">Skip to Main Content</a>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    </div>
    <div class="right">
      <a href="javascript:void(0)" onclick="changeFontSize(1)">A+</a>
      <a href="javascript:void(0)" onclick="changeFontSize(-1)">A-</a>
      <span class="sep">|</span>
      <div class="gtranslate_wrapper"></div>

      <!-- <span class="sep">|</span>

            <a href="{{ url('/login') }}">Login</a> -->
    </div>
  </div>
</div>

<header class="site-header">
  <div class="wrap">
    <div class="brand">
      <a href="">
        <img src="{{ asset('assets/img/logo.png') }}" alt="CKKK Gramin Parivar Foundation">
      </a>
    </div>

    <button class="nav-toggle" type="button" aria-label="Toggle Menu" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </button>

    <nav class="mainnav" id="mainnav">
      <ul>
        <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="">Home</a></li>
        <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="">About Us</a></li>
        <li><a class="{{ request()->routeIs('involved') ? 'active' : '' }}" href="">Get Involved</a></li>
        <li><a class="{{ request()->routeIs('media') ? 'active' : '' }}" href="">Media</a></li>
        <li><a class="{{ request()->routeIs('discussions') ? 'active' : '' }}" href="">Discussions</a></li>
        <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="">Contact Us</a></li>
      </ul>

      <div class="mobile-lang">
        <label for="mobileLang">🌐</label>
        <select id="mobileLang" onchange="setLanguage(this.value)">
          <option value="en">English</option>
          <option value="hi">हिंदी</option>
        </select>
      </div>
    </nav>
  </div>
</header>

<div id="google_translate_element" style="display:none;"></div>

<style>
  :root {
    --green: #198754;
    --pink: #d63384;
  }

  * {
    box-sizing: border-box;
  }

  html {
    font-size: 16px;
  }

  body {
    margin: 0;
    font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
  }

  .topbar {
    background: var(--green);
    color: #fff;
    font-size: .875rem;
  }

  .topbar .wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 6px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .topbar a {
    color: #fff;
    text-decoration: none;
    margin-right: 16px;
  }

  .topbar .left {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .topbar .left .flag img {
    display: block;
    width: 20px;
    height: auto;
  }

  .topbar .skip {
    opacity: .95;
  }

  .topbar .right {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .topbar .sep {
    opacity: .6;
  }

  .site-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #fff;
    border-bottom: 1px solid #e5e7eb;
    transition: box-shadow .3s ease;
  }

  .site-header.scrolled {
    box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
  }

  .site-header .wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  .brand {
    line-height: 0;
    display: flex;
    align-items: center;
  }

  .brand img {
    height: 120px;
    width: auto;
    object-fit: contain;
    display: block;
  }

  .nav-toggle {
    display: none;
    background: none;
    border: 0;
    padding: 8px;
    cursor: pointer;
  }

  .nav-toggle span {
    display: block;
    width: 26px;
    height: 3px;
    background: var(--green);
    margin: 4px 0;
    transition: .3s;
  }

  .mainnav {
    display: flex;
    align-items: center;
    gap: 24px;
  }

  .mainnav ul {
    list-style: none;
    display: flex;
    gap: 28px;
    align-items: center;
    margin: 0;
    padding: 0;
  }

  .mainnav a {
    position: relative;
    text-decoration: none;
    color: var(--green);
    font-weight: 600;
    padding: 6px 0;
    transition: color .25s ease;
  }

  .mainnav a::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: -6px;
    height: 2px;
    width: 0;
    margin: auto;
    background: var(--pink);
    transition: width .25s ease;
  }

  .mainnav a:hover {
    color: var(--pink);
  }

  .mainnav a:hover::after {
    width: 100%;
  }

  .mainnav a.active {
    color: var(--pink);
  }

  .mainnav a.active::after {
    width: 100%;
  }

  .mobile-lang {
    display: none;
    align-items: center;
    gap: 8px;
    margin-left: auto;
  }

  .mobile-lang select {
    padding: 6px 8px;
    border: 1px solid var(--green);
    border-radius: 6px;
    background: #fff;
  }

  @media (max-width: 992px) {
    .brand img {
      height: 96px;
    }
  }

  @media (max-width: 768px) {
    .nav-toggle {
      display: block;
    }

    .mainnav {
      position: absolute;
      left: 0;
      top: 100%;
      width: 100%;
      background: #fff;
      border-bottom: 1px solid #e5e7eb;
      flex-direction: column;
      align-items: stretch;
      gap: 0;
      max-height: 0;
      overflow: hidden;
      transition: max-height .3s ease;
    }

    .mainnav.open {
      max-height: 420px;
    }

    .mainnav ul {
      flex-direction: column;
      gap: 0;
    }

    .mainnav ul li {
      border-top: 1px solid #f1f3f5;
    }

    .mainnav ul li a {
      display: block;
      padding: 14px 16px;
      font-size: 1rem;
    }

    .mobile-lang {
      display: flex;
      padding: 12px 16px;
      border-top: 1px solid #f1f3f5;
    }
  }

  /* Hide Google toolbar */
  #google_translate_element select {
    background: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 3px 6px;
    color: #333;
    font-size: 13px;
  }

  .goog-te-banner-frame.skiptranslate {
    display: none !important;
  }
</style>

<script>
  (function () {
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) header.classList.add('scrolled'); else header.classList.remove('scrolled');
    });
  })();

  function toggleMenu() {
    document.getElementById('mainnav').classList.toggle('open');
  }

  let __baseFont = 16;
  function changeFontSize(delta) {
    __baseFont = Math.min(22, Math.max(12, __baseFont + delta));
    document.documentElement.style.fontSize = __baseFont + 'px';
  }

  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,hi',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }

  function setLanguage(lang) {
    const sel = document.querySelector('select.goog-te-combo');
    if (sel) {
      sel.value = lang;
      sel.dispatchEvent(new Event('change'));
    }
  }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
  /* ✅ Fix header height, remove extra space, align logo + menu */
  .site-header .wrap {
    padding: 0 16px !important;
    height: 95px;
    display: flex;
    align-items: center;
  }

  .brand img {
    height: 171px !important;
    display: block;
  }

  .mainnav ul li a {
    line-height: 50px;
    padding: 0 10px !important;
  }

  .topbar {
    margin-bottom: -5px;
  }
</style>