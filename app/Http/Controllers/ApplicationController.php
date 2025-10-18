<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use App\Models\Recruitment;
use PDF;

class ApplicationController extends Controller
{
    public function home(Request $request)
    {
        $a = rand(2, 9);
        $b = rand(2, 9);
        $request->session()->put('captcha_sum', $a + $b);
        $slider = \App\Models\Slider::where('status', 1)->get();
        \Log::info('Slider Data:', $slider->toArray());

        return view('HomePage.dynamicHomePage', [
            'captchaA' => $a,
            'captchaB' => $b,
            'slider' => $slider
        ]);
    }

    public function Career(Request $request)
    {
        $a = rand(2, 9);
        $b = rand(2, 9);
        $request->session()->put('captcha_sum', $a + $b);

        return view('HomePage.career', [
            'captchaA' => $a,
            'captchaB' => $b
        ]);
    }

    public function store(Request $r)
    {
        $r->validate([
            'first_name' => 'required|string|max:100',
            'fathers_name' => 'nullable|string|max:150',
            'last_name' => 'nullable|string|max:100',
            'mother_name' => 'required|string|max:100',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'nationality' => 'required|string|max:50',
            'category' => 'required|in:general,obc,sc,st',
            'aadhaar' => 'required|string|size:12',
            'pan' => 'nullable|string|size:10',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:120',
            'state' => 'required|string|max:120',
            'district' => 'required|string|max:120',
            'block' => 'required|string|max:120',
            'panchayat' => 'required|string|max:120',
            'pin_code' => 'required|string|max:10',
            'email' => 'nullable|email',
            'mobile' => 'required|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'qualification' => 'required|string|max:50',
            'board' => 'required|string|max:100',
            'year' => 'required|string|size:4',
            'percentage' => 'required|string|max:10',
            'consent' => 'accepted',
            'photo' => 'required|image|max:2048',
            'signature' => 'required|image|max:2048',
            'captcha_answer' => 'required|numeric'
        ]);

        if ((int) $r->captcha_answer !== (int) $r->session()->get('captcha_sum')) {
            return response()->json(['ok' => false, 'message' => 'Invalid CAPTCHA. Please try again.'], 422);
        }

        $year = now()->format('Y');
        $last = Recruitment::whereYear('created_at', $year)->max('id') + 1;
        $applicationNo = sprintf('DSS-%s-%04d', $year, $last);

        $photoPath = $r->file('photo')->store('application/photo', 'public');
        $signPath = $r->file('signature')->store('application/signature', 'public');

        $app = Recruitment::create([
            'application_no' => $applicationNo,
            'first_name' => $r->first_name,
            'fathers_name' => $r->fathers_name,
            'last_name' => $r->last_name,
            'mother_name' => $r->mother_name,
            'dob' => $r->dob,
            'gender' => $r->gender,
            'nationality' => $r->nationality,
            'category' => $r->category,
            'aadhaar' => $r->aadhaar,
            'pan' => $r->pan,
            'address' => $r->address,
            'city' => $r->city,
            'state' => $r->state,
            'district' => $r->district,
            'block' => $r->block,
            'panchayat' => $r->panchayat,
            'pin_code' => $r->pin_code,
            'email' => $r->email,
            'mobile' => $r->mobile,
            'whatsapp' => $r->whatsapp,
            'qualification' => $r->qualification,
            'board' => $r->board,
            'year' => $r->year,
            'percentage' => $r->percentage,
            'consent' => true,
            'photo_path' => $photoPath,
            'signature_path' => $signPath
        ]);

        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $amountPaise = (int) (config('services.razorpay.reg_fee_inr', env('REG_FEE_INR', 180)) * 100);
        $order = $api->order->create([
            'receipt' => $app->application_no,
            'amount' => $amountPaise,
            'currency' => 'INR',
            'payment_capture' => 1
        ]);

        $app->update(['rzp_order_id' => $order['id']]);

        return response()->json([
            'ok' => true,
            'application_id' => $app->id,
            'application_no' => $app->application_no,
            'order_id' => $order['id'],
            'amount' => $amountPaise,
            'name' => $app->first_name,
            'email' => $app->email,
            'mobile' => $app->mobile
        ]);
    }

    public function verify(Request $r)
    {
        $r->validate([
            'application_id' => 'required|integer',
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string'
        ]);

        $app = Recruitment::findOrFail($r->application_id);

        $generated = hash_hmac('sha256', $r->razorpay_order_id . '|' . $r->razorpay_payment_id, env('RAZORPAY_SECRET'));
        if (!hash_equals($generated, $r->razorpay_signature)) {
            $app->update(['payment_status' => 'failed']);
            return response()->json(['ok' => false, 'message' => 'Payment verification failed.'], 400);
        }

        $app->update([
            'rzp_payment_id' => $r->razorpay_payment_id,
            'rzp_signature' => $r->razorpay_signature,
            'payment_status' => 'paid'
        ]);

        $pdfUrl = route('applications.pdf', $app->id) . '?open=1';
        return response()->json(['ok' => true, 'pdf_url' => $pdfUrl]);
    }

    public function pdf(Recruitment $application)
    {
        abort_unless($application->payment_status === 'paid', 403, 'PDF available after payment.');

        $pdf = PDF::loadView('pdfs.application-slip', [
            'app' => $application,
            'logo' => public_path('assets/img/logo.png'),
        ])->setPaper('a4');

        return $pdf->stream($application->application_no . '.pdf');
    }
}