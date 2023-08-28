<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssociateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\GalleryController;
use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\Userlogin;

Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});

// client routes
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::match(['get','post'], '/contact-us', [IndexController::class, 'contact'])->name('contact');
Route::get('/about-us', [IndexController::class, 'about'])->name('about');

Route::get('/tours', [IndexController::class, 'tours']);
Route::post('/tours-filter', [IndexController::class, 'filter']);
Route::get('/tour-details/{id?}/{slug?}', [IndexController::class, 'tourDetails']);
Route::post('/tour-enquiry', [IndexController::class, 'tourEnquiry']);
Route::get('/gallery', [IndexController::class, 'gallery']);

Route::get('/flight-booking', [IndexController::class, 'flightBooking']);
Route::get('/cruise-booking', [IndexController::class, 'cruiseBooking']);
Route::get('/other-services', [IndexController::class, 'otherServices']);

Route::match(['get','post'], '/sign-in', [UserController::class, 'userLogin']);
Route::match(['get','post'], '/sign-up', [UserController::class, 'userRegister']);
Route::match(['get','post'], '/check-user-exist', [UserController::class, 'checkUserExist']);
Route::match(['get','post'], '/forgot-password', [UserController::class, 'forgotPassword']);
Route::match(['get','post'], '/password-reset', [UserController::class, 'resetPassword']);

Route::middleware([Userlogin::class])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard']);
    Route::get('user/logout', [UserController::class, 'userLogout']);
});

// Admin Routes
Auth::routes();
Route::get('/admin', function () { return view('admin/admin_login'); });
// Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
// Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
Auth::routes();
Route::middleware([AdminAuthenticated::class])->group(function () {
    //Dashboard
    Route::match(['get','post'], '/admin/dashboard', [AdminController::class, 'viewDashboard']);
    //Admin-Setting
    Route::match(['get','post'], 'admin/admin-setting/', [AdminController::class, 'setting']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::match(['get','post'], '/admin/add-admin/', [AdminController::class, 'addAdmin']);
    Route::get('/admin/view-admin', [AdminController::class, 'viewAdmin']);
    Route::match(['get','post'], '/change-admin-status-zero/{id}', [AdminController::class, 'chnageAdminStatusZero']);
    Route::match(['get','post'], '/change-admin-status-one/{id}', [AdminController::class, 'chnageAdminStatusOne']);
    Route::match(['get','post'], '/admin/delete-admin/{id}', [AdminController::class, 'deleteAdmin']);

    // tour
    Route::match(['get','post'], 'admin/tours/{status?}', [TourController::class, 'viewTours']);

    Route::match(['get','post'], 'admin/tour-planner/{status?}', [TourController::class, 'tourPlanner']);
    Route::match(['get','post'], 'admin/add-tour/', [TourController::class, 'addTour'])->name('addTour');
    Route::match(['get','post'], 'admin/edit-tour/{id}', [TourController::class, 'editTour']);
    Route::get('admin/delete-tour/{id}', [TourController::class,'deleteTour']);
    Route::match(['get','post'], 'admin/update-tour-status/{id}', [TourController::class,'updateTourStatus']);
    // itinerary
    Route::match(['get','post'], 'admin/itinerary-builder/{id}', [TourController::class, 'itineraryBuilder']);
    Route::match(['get','post'], 'admin/add-tour-itinerary/{id}', [TourController::class, 'addTourItinerary']);
    Route::match(['get','post'], 'admin/edit-tour-itinerary/{id}', [TourController::class, 'editTourItinerary']);
    Route::get('admin/delete-itinerary/{id}', [TourController::class,'deleteItinerary']);
    
    Route::match(['get','post'], 'admin/share-tour/', [TourController::class,'shareTour']);
    
    Route::match(['get','post'], 'admin/enquiries', [TourController::class,'enquiries']);
    Route::match(['get','post'], 'admin/tour-enquiries', [TourController::class,'tourEnquiries']);

    // Destinations
    Route::match(['get','post'], 'admin/edit-destination/{id}', [TourController::class, 'editDestination']);
    Route::match(['get','post'], 'admin/view-destinations/', [TourController::class, 'viewDestinations']);
    Route::match(['get','post'], 'admin/add-destination/', [TourController::class, 'addDestination']);
    Route::match(['get','post'], 'admin/delete-destination/{id}', [TourController::class,'deleteDestination']);

    // Registered Users
    Route::match(['get','post'], 'admin/registered-users/', [UserController::class, 'viewUsers']);

    // Associated Users
    Route::match(['get','post'], 'admin/associated-users/', [AssociateController::class, 'viewAssociates']);
    Route::match(['get','post'], 'admin/add-associate/', [AssociateController::class, 'addAssociate']);
    Route::match(['get','post'], 'admin/edit-associate/{id}', [AssociateController::class, 'editAssociates']);
    Route::match(['get','post'], 'admin/delete-associate/{id}', [AssociateController::class, 'deleteAssociates']);

    // Associated Users
    Route::get('admin/gallery/', [GalleryController::class, 'viewPhotos']);
    Route::post('admin/add-photos/', [GalleryController::class, 'addPhotos']);
    Route::post('admin/edit-photo/', [GalleryController::class, 'editPhoto']);
    Route::get('admin/delete-photo/{id}', [GalleryController::class, 'deletePhoto']);

    // testimonial
    Route::match(['get','post'], 'admin/edit-testimonial/{id}', [AdminController::class, 'editTestimonial']);
    Route::match(['get','post'], 'admin/testimonials/', [AdminController::class, 'viewTestimonials']);
    Route::match(['get','post'], 'admin/add-testimonial/', [AdminController::class, 'addTestimonial']);
    Route::match(['get','post'], 'admin/delete-testimonial/{id}', [AdminController::class,'deleteTestimonial']);
});


//ADMIN AUTH ROUTES
Route::match(['get','post'], '/admin-login-check', [AdminController::class, 'login']);
Route::post('/admin-reset-password', [AdminController::class, 'resetPassword']);

Route::get('/admin-forgot-password', function () {
    return view('admin/admin-forgot-password');
});

Route::get('/admin-login', function () {
    return view('admin/admin_login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
