@php
  $logoPath = $logo ?? public_path('assets/img/logo.png');
@endphp
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Application Slip - {{ $app->application_no }}</title>
  <style>
    @page {
      margin: 15px 100px;
    }

    body {
      font-size: 11px;
      color: #000;
      line-height: 1.4;
      position: relative;
    }

    .header {
      text-align: center;
      margin-bottom: 12px;
      position: relative;
    }

    .header img.logo {
      height: 60px;
      width: 60px;
      vertical-align: middle;
    }

    .header-title {
      display: inline-block;
      vertical-align: middle;
      margin-left: 10px;
      text-align: left;
    }

    .header-title h1 {
      font-size: 18px;
      color: #0d7d3f;
      font-weight: bold;
      margin: 0;
    }

    .header-title .subtitle {
      font-size: 11px;
      color: #0d7d3f;
      margin: 2px 0;
    }

    .header-title .org {
      font-size: 9px;
      color: #666;
      font-style: italic;
    }

    .document-title {
      text-align: center;
      font-weight: bold;
      font-size: 12px;
      margin: 8px 0;
      padding: 4px;
      background: #f5f5f5;
      border: 1px solid #ddd;
    }

    .info-bar {
      display: table;
      width: 100%;
      background: #f9f9f9;
      border: 1px solid #ccc;
      padding: 6px 8px;
      margin-bottom: 10px;
      font-size: 10px;
    }

    .info-bar-left {
      display: table-cell;
      width: 70%;
    }

    .info-bar-right {
      display: table-cell;
      text-align: right;
    }

    .section-title {
      background: #e8f5e9;
      padding: 5px 8px;
      font-weight: bold;
      font-size: 11px;
      margin: 8px 0 4px 0;
      border-left: 3px solid #0d7d3f;
    }

    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 8px;
    }

    .details-table td {
      padding: 5px 8px;
      border: 1px solid #ddd;
      font-size: 10px;
      vertical-align: top;
    }

    .details-table td.label {
      width: 35%;
      background: #fafafa;
      font-weight: 600;
      color: #333;
    }

    .details-table td.value {
      width: 65%;
      color: #000;
    }

    .photo-section {
      position: absolute;
      right: 8px;
      top: 0;
      width: 100px;
      text-align: center;
    }

    .photo-box {
      width: 100px;
      height: 120px;
      border: 1px solid #999;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      margin-bottom: 4px;
    }

    .photo-box img {
      max-width: 98px;
      max-height: 118px;
    }

    .details-with-photo {
      position: relative;
      min-height: 140px;
    }

    .checkbox-section {
      margin: 8px 0;
      font-size: 10px;
    }

    .checkbox-item {
      margin: 4px 0;
      padding-left: 18px;
      position: relative;
    }

    .checkbox-item:before {
      content: "☑";
      position: absolute;
      left: 0;
      color: #0d7d3f;
      font-size: 12px;
    }

    .signature-box {
      border: 1px solid #ccc;
      height: 60px;
      text-align: right;
      padding: 5px;
      background: #fff;
      position: relative;
    }

    .signature-box img {
      max-height: 50px;
      position: absolute;
      right: 10px;
      bottom: 5px;
    }

    .signature-label {
      font-size: 9px;
      color: #666;
      text-align: center;
      margin-top: 2px;
    }

    .footer-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      font-size: 10px;
    }

    .footer-table td {
      border: 1px solid #000;
      padding: 4px 6px;
    }

    .footer-table .footer-label {
      background: #f0f0f0;
      font-weight: 600;
      width: 25%;
    }

    .watermark {
      position: fixed;
      top: 40%;
      left: 40%;
      transform: translate(-50%, -50%);
      opacity: 0.08;
      z-index: -1;
      width: 500px;
      height: 500px;
    }
  </style>
</head>

<body>
  {{-- Watermark using logo --}}
  @if(isset($logoPath) && file_exists($logoPath))
    <img src="{{ $logoPath }}" class="watermark" alt="watermark">
  @endif

  {{-- Header --}}
  <div class="header">
    <img src="{{ $logoPath }}" class="logo" alt="logo">
    <div class="header-title">
      <h1>Digital Siksha Sarthi Recruitment</h1>
      <div class="subtitle">A Project Of CKKK Gramin Parivar Foundation</div>
      <!-- <div class="org">(HRDB is Division of Social welfare organization "NAC India")</div> -->
    </div>
  </div>

  {{-- Document Title --}}
  <div class="document-title">
    Digital Siksha Sarthi Recruitment / डिजिटल शिक्षा सारथी भर्ती - 2025

  </div>

  {{-- Info Bar --}}
  <div class="info-bar">
    <div class="info-bar-left">
      <strong>Advt. No. : CKKKGPF/DSS/REQ/10/2025</strong>
    </div>
    <div class="info-bar-right">
      <strong>Date : {{ $app->created_at->format('d/m/Y') }}</strong>
    </div>
  </div>

  <div style="margin-bottom: 8px;">
    <strong style="color: #0d7d3f;">Post Applied for : Block Supervisor Cum Panchayat Executive Recruitment</strong>
    <div style="float: right; color: #0066cc; font-weight: 600;">
      Application No. : {{ $app->application_no }}
    </div>
    <div style="clear: both;"></div>
  </div>

  {{-- Personal Details Section --}}
  <div class="section-title">Personal Details</div>

  <div class="details-with-photo">
    {{-- Photo Section --}}
    <div class="photo-section">
      <div class="photo-box">
        @if(isset($app->photo_path) && $app->photo_path)
          <img src="{{ public_path('storage/' . $app->photo_path) }}" alt="photo">
        @endif
      </div>
    </div>

    {{-- Details Table --}}
    <table class="details-table" style="width: calc(100% - 110px);">
      <tr>
        <td class="label">NAME :</td>
        <td class="value">{{ $app->name ?? $app->first_name . ' ' . $app->last_name }}</td>
      </tr>
      <tr>
        <td class="label">FATHER'S NAME :</td>
        <td class="value">{{ $app->fathers_name }}</td>
      </tr>
      <tr>
        <td class="label">MOTHER'S NAME :</td>
        <td class="value">{{ $app->mother_name ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">DATE OF BIRTH :</td>
        <td class="value">
          {{ $app->dob ?? ($app->date_of_birth ? date('Y-m-d', strtotime($app->date_of_birth)) : 'N/A') }}
        </td>
      </tr>
      <tr>
        <td class="label">GENDER :</td>
        <td class="value">{{ ucfirst($app->gender) }}</td>
      </tr>
      <tr>
        <td class="label">NATIONALITY :</td>
        <td class="value">{{ $app->nationality ?? 'Indian' }}</td>
      </tr>
      <tr>
        <td class="label">CATEGORY :</td>
        <td class="value">{{ $app->category ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">AADHAR NUMBER :</td>
        <td class="value">{{ $app->aadhaar ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">PAN NUMBER :</td>
        <td class="value">{{ $app->pan ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">MOBILE NUMBER :</td>
        <td class="value">{{ $app->mobile }}</td>
      </tr>
      <tr>
        <td class="label">EMAIL ID :</td>
        <td class="value">{{ $app->email }}</td>
      </tr>
      <tr>
        <td class="label">PERMANENT ADDRESS :</td>
        <td class="value">{{ $app->address }}</td>
      </tr>
      <tr>
        <td class="label">BLOCK :</td>
        <td class="value">{{ $app->block ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">PANCHAYAT :</td>
        <td class="value">{{ $app->panchayat ?? 'N/A' }}</td>
      </tr>
      <tr>
        <td class="label">DISTRICT :</td>
        <td class="value">{{ $app->district ?? $app->city }}</td>
      </tr>
      <tr>
        <td class="label">STATE :</td>
        <td class="value">{{ $app->state }}</td>
      </tr>
      <tr>
        <td class="label">PINCODE :</td>
        <td class="value">{{ $app->pin_code }}</td>
      </tr>
    </table>
  </div>

  {{-- Educational Details Section --}}
  <div class="section-title">Educational Details</div>
  <table class="details-table">
    <tr>
      <td class="label">HIGHER EDUCATION :</td>
      <td class="value">{{ $app->qualification ?? 'N/A' }}</td>
    </tr>
    <tr>
      <td class="label">BOARD/UNIVERSITY :</td>
      <td class="value">{{ $app->board ?? 'N/A' }}</td>
    </tr>
    <tr>
      <td class="label">Year :</td>
      <td class="value">{{ $app->year ?? 'N/A' }}</td>
    </tr>
    <tr>
      <td class="label">MARKS IN PERCENTAGE :</td>
      <td class="value">{{ $app->percentage ?? 'N/A' }}</td>
    </tr>
  </table>

  {{-- Declaration --}}
  <!-- <div class="checkbox-section">
    <div class="checkbox-item">
      I have read and agree to the Terms and Conditions.
    </div>
    <div class="checkbox-item">
      I declare that the information given in this application form is correct to the best of my knowledge and belief.
      If any information provided by me is found false, my candidature may be rejected at any point of time. I have read
      all the terms and conditions which I will abide at all times. I have given the above declaration in my full
      consequences without any pressure.
    </div>
  </div> -->

  {{-- Signature --}}
  <div style="margin: 10px 0;">
    <div class="signature-box">
      @if(isset($app->signature_path) && $app->signature_path)
        <img src="{{ public_path('storage/' . $app->signature_path) }}" alt="signature">
      @endif
    </div>
    <div class="signature-label">Candidate's Signature</div>
  </div>

  {{-- Footer Table --}}
  <table class="footer-table">
    <tr>
      <td class="footer-label">Application No.:</td>
      <td>{{ $app->application_no }}</td>
      <td class="footer-label">Email:</td>
      <td>{{ $app->email }}</td>
    </tr>
    <tr>
      <td class="footer-label">Payment Status:</td>
      <td>{{ ucfirst($app->payment_status) }}</td>
      <td class="footer-label">Date:</td>
      <td>{{ $app->created_at->format('d/m/Y h:i A') }}</td>
    </tr>
  </table>

</body>

</html>