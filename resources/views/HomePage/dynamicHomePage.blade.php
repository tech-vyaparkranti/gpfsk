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
