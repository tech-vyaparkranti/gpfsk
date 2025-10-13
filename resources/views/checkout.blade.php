@extends('layouts.webSite')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Checkout Header --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold">Checkout</h2>
                <p class="text-muted">Complete your subscription to access the services</p>
            </div>

            {{-- Employer Details --}}
            @if($employer)
                <div class="card shadow-sm mb-4 border-0">
                    <div class="card-header bg-primary text-white fw-bold">Your Details</div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr><th>Company Name:</th><td>{{ $employer->company_name }}</td></tr>
                            <tr><th>Contact Person:</th><td>{{ $employer->contact_person }}</td></tr>
                            <tr><th>Email:</th><td>{{ $employer->contact_email }}</td></tr>
                            <tr><th>Phone:</th><td>{{ $employer->contact_mobile }}</td></tr>
                            <tr><th>Address:</th><td>{{ $employer->address }}</td></tr>
                            <tr><th>Total Experience:</th><td>{{ $employer->min_travel_trade_experience_years ?? 'N/A' }} years</td></tr>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">No employer data found.</div>
            @endif

            {{-- Subscription Summary --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold">Subscription Summary</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fs-5">Annual Services Subscription</span>
                        <span class="fw-bold fs-5">₹6000</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5 fw-bold">Total</span>
                        <span class="fw-bold fs-5 text-success">₹6000</span>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button id="payButton" class="btn btn-lg btn-success w-100 shadow-sm">
                        <i class="bi bi-credit-card me-2"></i> Pay Now
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Payment Success Modal --}}
<div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="paymentSuccessModalLabel">Payment Successful</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Thank you for your payment! Here are your payment details:</p>
        <ul>
            <li><strong>Transaction ID:</strong> <span id="txn_id"></span></li>
            <li><strong>Order ID:</strong> <span id="order_id"></span></li>
            <li><strong>Amount:</strong> ₹<span id="amount_paid"></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- Razorpay Script --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('payButton').onclick = function(e){
    e.preventDefault();

    console.log("Initializing payment...");

    fetch("{{ route('payment') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: "{{ $employer->contact_email ?? '' }}",
            mobile: "{{ $employer->contact_mobile ?? '' }}"
        })
    })
    .then(res => {
        console.log("Payment API status:", res.status);
        return res.json();
    })
    .then(data => {
        console.log("Payment API response:", data);

        if(!data || !data.razorpay_key){
            alert("Payment initialization failed!");
            console.error("Invalid payment data:", data);
            return;
        }

        var options = {
            "key": data.razorpay_key,
            "amount": data.amount,
            "currency": "INR",
            "name": data.name,
            "description": "Annual Subscription",
            "order_id": data.order_id,
            "handler": function (response){
                console.log("Razorpay handler response:", response);

                fetch("{{ route('payment.success') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        ...response,
                        email: data.email
                    })
                })
                .then(res => {
                    console.log("Success API status:", res.status);
                    return res.json();
                })
                .then(result => {
                    console.log("Success API response:", result);

                    if(result.status === "success"){
                        document.getElementById('txn_id').textContent = response.razorpay_payment_id;
                        document.getElementById('order_id').textContent = response.razorpay_order_id;
                        document.getElementById('amount_paid').textContent = (data.amount/100).toFixed(2);

                        var paymentModal = new bootstrap.Modal(document.getElementById('paymentSuccessModal'));
                        paymentModal.show();
                    } else {
                        alert("Payment verification failed: " + (result.message || 'Unknown error'));
                        console.error("Verification failed:", result);
                    }
                })
                .catch(err => {
                    console.error("Payment success fetch error:", err);
                    alert("Something went wrong while verifying payment.");
                });
            },
            "prefill": {
                "email": data.email,
                "contact": data.contact
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    })
    .catch(err => {
        console.error("Fetch error:", err);
        alert("Something went wrong. Check console.");
    });
}
</script>
@endsection
