{{-- resources/views/pdf/application-slip.blade.php --}}
@php
  $logoPath = $logo ?? public_path('assets/img/logo.png');
@endphp
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>{{ $app->application_no }}</title>
  <style>
    * {
      font-family: DejaVu Sans, sans-serif;
    }

    @page {
      margin-top: 0;
    }

    body {
      font-size: 12px;
      color: #111;

    }

    .head {
      text-align: center;
      margin: 0px !important;
    }



    .title {
      font-size: 16px;
      font-weight: 700;
      color: #0a7a3b;
      margin-top: 6px;
    }

    .sub {
      font-size: 12px;
      color: #666
    }

    .bar {
      background: #e6f4ec;
      padding: 6px 10px;
      margin: 10px 0;
      border: 1px solid #cfe7da;
      font-weight: 600
    }

    table {
      width: 100%;
      border-collapse: collapse
    }

    td,
    th {
      padding: 6px;
      border: 1px solid #dcdcdc;
      vertical-align: top
    }

    .label {
      width: 28%;
      background: #fafafa;
      font-weight: 600
    }

    .photo {
      width: 120px;
      border: 1px solid #ccc;
      margin-left: auto
    }

    .mt8 {
      margin-top: 8px
    }

    .note {
      font-size: 11px;
      color: #444;
    }

    .sig {
      height: 50px;
    }

    .flex {
      display: flex;
      gap: 12px
    }
  </style>
</head>

<body>
  <div class="head">
    <img src="{{ $logoPath }}" style="height:200px;width:200px" alt="logo">
    <div class="title">DIGITAL SIKSHA SARTHI – APPLICATION SLIP</div>
    <div class="sub">CKKK Gramin Parivar Foundation</div>
  </div>

  <div class="bar">
    Application No: <strong>{{ $app->application_no }}</strong> &nbsp;&nbsp; |
    Date: <strong>{{ $app->created_at->format('d/m/Y') }}</strong> &nbsp;&nbsp; |
    Payment Status: <strong>{{ strtoupper($app->payment_status) }}</strong>
  </div>

  <table>
    <tr>
      <td class="label">First Name</td>
      <td>{{ $app->first_name }}</td>
      <td rowspan="6" style="width:140px">
        @if($app->photo_path)
          <img class="photo" src="{{ public_path('storage/' . $app->photo_path) }}">
        @endif
      </td>
    </tr>
    <tr>
      <td class="label">Father's Name</td>
      <td>{{ $app->fathers_name }}</td>
    </tr>
    <tr>
      <td class="label">Last Name</td>
      <td>{{ $app->last_name }}</td>
    </tr>
    <tr>
      <td class="label">Email</td>
      <td>{{ $app->email }}</td>
    </tr>
    <tr>
      <td class="label">Mobile</td>
      <td>{{ $app->mobile }}</td>
    </tr>
    <tr>
      <td class="label">WhatsApp</td>
      <td>{{ $app->whatsapp }}</td>
    </tr>
    <tr>
      <td class="label">Address</td>
      <td colspan="2">{{ $app->address }}</td>
    </tr>
    <tr>
      <td class="label">City / State / PIN</td>
      <td colspan="2">{{ $app->city }}, {{ $app->state }} - {{ $app->pin_code }}</td>
    </tr>
    <tr>
      <td class="label">Qualification</td>
      <td colspan="2">{{ $app->qualification }}</td>
    </tr>
  </table>

  <div class="mt8 note">
    <p>✔ I have read and agree to the Terms and Conditions.</p>
    <p>✔ I declare that the information provided is true and correct to the best of my knowledge.</p>
  </div>

  <table class="mt8">
    <tr>
      <td class="label">Applicant Signature</td>
      <td>
        @if($app->signature_path)
          <img class="sig" src="{{ public_path('storage/' . $app->signature_path) }}">
        @endif
      </td>
    </tr>
  </table>

  <table class="mt8">
    <tr>
      <td class="label">Razorpay Order ID</td>
      <td>{{ $app->rzp_order_id }}</td>
      <td class="label">Razorpay Payment ID</td>
      <td>{{ $app->rzp_payment_id }}</td>
    </tr>
  </table>
</body>

</html>