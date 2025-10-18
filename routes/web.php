<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurServicesModelController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\EmployerControllerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApplicationController;


//use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get("comingsoon",[HomePageController::class,function(){
//     return view("HomePage.ComingSoon");
// }]);

Route::controller(HomePageController::class)->group(function () {
    // Route::get("/", "homePage");
    Route::get("/", "homePage")->name("homePage");

    Route::get("comingsoon", "ComingSoon")->name("ComingSoon");
    Route::get("about-us", "aboutUs")->name("aboutUs");
    Route::get("terms-conditions", "termsConditions")->name("termsConditions");
    Route::get("shipping-delivery-policy", "shippingDeliverypolicy")->name("shippingDeliverypolicy");
    Route::get("cancellation-refund-policy", "CancellationRefundPolicy")->name("CancellationRefundPolicy");
    Route::get("privacy-policy", "privacyPolicy")->name("privacyPolicy");
    Route::get("services", "destinations")->name("destinations");
    Route::get("profilesubmission", "productPage")->name("productPage");
    Route::get("employer", "EmployerPage")->name("EmployerPage");
    Route::get("report", "reportPage")->name("reportPage");
    Route::get("event", "galleryPages")->name("galleryPages");
    Route::get("contact-us", "contactUs")->name("contactUs");
    Route::get("blog", "blogPage")->name("blogPage");
    Route::get('refresh-captcha', "refreshCapthca")->name("refreshCaptcha");
});
Route::get('/download-pdf', [PDFController::class, 'download'])->name('download.pdf');
// Route::get('/', [ApplicationController::class, 'home'])->name('home'); // your homepage with popup
Route::get('/career', [ApplicationController::class, 'Career'])->name('career');











// Route::get('/', [ApplicationController::class, 'home'])->name('home'); // your homepage with popup
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');            // create app + RZP order
Route::post('/payment/verify', [ApplicationController::class, 'verify'])->name('applications.verify');             // verify signature
Route::get('/applications/{application}/pdf', [ApplicationController::class, 'pdf'])->name('applications.pdf'); // stream PDF

Route::post('/jobseeker/store', [JobSeekerController::class, 'store'])->name('jobseeker.store');
Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');

Route::get('/checkout', function () {
    $employer = session('employer'); // retrieve from session
    return view('checkout', compact('employer'));
})->name('checkout');

Route::get("get-home-page-dd", [DestinationController::class, "getHomePageDestinations"])->name("getHomePageDestinations");
Route::get("get-home-page-services", [OurServicesModelController::class, "getHomePageServices"])->name("getHomePageServices");
Route::post("contact-us-form", [ContactUsController::class, "saveContactUsDetails"])->name("saveContactUsDetails");
Route::get("get-testimonials-home-page", [TestimonialsController::class, "getHomePageTestimonials"])->name("getHomePageTestimonials");
Route::get('teamdelete', [TeamController::class, 'delete'])->name('team.delete');

Route::get('/download-employers', [EmployerController::class, 'downloadEmployersPdf'])->name('employers.download');

Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
// require __DIR__.'/auth.php';

include_once "adminRoutes.php";