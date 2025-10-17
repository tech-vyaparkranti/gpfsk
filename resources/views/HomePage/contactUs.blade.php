@extends('layouts.webSite')
@section('title', 'Contact Us')

@section('content')
<style>
    .contact-section {
        background: #f8f9fa;
        padding: 60px 0;
    }
    .contact-container {
        max-width: 1200px;
        margin: auto;
    }
    .contact-title h2 {
        font-weight: bold;
        color: #E91E63;
    }
    .contact-info-box {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.1);
        border-top: 4px solid #E91E63;
    }
    .contact-info-box h4 {
        font-size: 20px;
        font-weight: bold;
        color: #2ECC71;
    }
    .contact-info-box p, .contact-info-box a {
        color: #444;
        font-size: 15px;
        margin-bottom: 8px;
        display: block;
    }
    .social-icons a {
        display: inline-block;
        margin-right: 10px;
        font-size: 18px;
        color: #E91E63;
    }
    .contact-form {
        background: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.1);
    }
    .input-group-text {
        background: #2ECC71;
        color: white;
    }
    .default-btn {
        background: #E91E63;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 5px;
        font-weight: bold;
    }
    .default-btn:hover {
        background: #c2185b;
    }
</style>

<div class="contact-section">
    <div class="contact-container">
        <div class="text-center contact-title mb-5">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-4 mb-4">
                <div class="contact-info-box">
                    <h4>Get in Touch</h4>
                    <p><strong>CKKK Gramin Parivar Foundation</strong></p>
                    <p><i class="fa fa-map-marker"></i> Gaya, Bihar, India</p>
                    <p><i class="fa fa-phone"></i> 01169656604</p>
                    <p><i class="fa fa-envelope"></i> info@graminparivarfoundation.in</p>
                    <p><i class="fa fa-globe"></i> https://graminparivarfoundation.in</p>

                    {{-- <div class="social-icons mt-3">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div> --}}
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="contact-form">
                    <form method="POST" id="contactUsForm" action="javascript:">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" name="phone_number" required>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label>Message</label>
                                <textarea name="message" rows="3" class="form-control" required></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label>Captcha</label>
                                <div>
                                    <img src="{{ captcha_src() }}" id="captcha_img_id" style="height: 60px;">
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="refreshCapthca('captcha_img_id','captcha')">↻</button>
                                </div>
                                <input type="text" class="form-control mt-2" name="captcha" placeholder="Enter captcha" required>
                            </div>
                        </div>
                        <button class="default-btn" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
