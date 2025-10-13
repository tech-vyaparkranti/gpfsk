<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Employer;

class PaymentController extends Controller
{
    // Step 1: Create Razorpay Order
    public function payment(Request $request)
    {
        // Fetch employer by email (passed from checkout page)
        $employer = Employer::where('contact_email', $request->email)->firstOrFail();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt' => 'receipt_'.$employer->id,
            'amount' => 6000 * 100, // Amount in paise
            'currency' => 'INR',
            'payment_capture' => 1,
        ]);

        // Store order_id temporarily if needed (optional)
        $employer->update(['payment_status' => 'pending']);

        return response()->json([
            'order_id' => $order['id'],
            'razorpay_key' => env('RAZORPAY_KEY'),
            'amount' => 6000 * 100,
            'name' => $employer->company_name,
            'email' => $employer->contact_email,
            'contact' => $employer->contact_mobile,
        ]);
    }

    // Step 2: Payment Success Handler
    public function success(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
            'razorpay_signature' => 'required',
        ]);

        // Verify payment signature (optional but recommended)
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);

            // Find employer by email (you can also pass employer_id if safer)
            $employer = Employer::where('contact_email', $request->email)->firstOrFail();

            // Update payment status and store transaction ID
            $employer->update([
                'payment_status' => 'success',
                'transaction_id' => $request->razorpay_payment_id,
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            // Payment failed or signature verification failed
            $employer = Employer::where('contact_email', $request->email)->first();
            if ($employer) {
                $employer->update(['payment_status' => 'failed']);
            }

            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
