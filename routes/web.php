<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\EnquiryController;
use App\Http\Middleware\AdminAuthenticated;

Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});

// client routes
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::match(['get','post'], '/contact-us', [IndexController::class, 'contact'])->name('contact');
Route::get('/about-us', [IndexController::class, 'about'])->name('about');

Route::get('/tours', [IndexController::class, 'tours']);
Route::get('/tour-details/{id?}/{slug?}', [IndexController::class, 'tourDetails']);
Route::post('/tour-enquiry', [IndexController::class, 'tourEnquiry']);
Route::get('/gallery', [IndexController::class, 'gallery']);

Route::get('/flight-booking', [IndexController::class, 'flightBooking']);
Route::get('/cruise-booking', [IndexController::class, 'cruiseBooking']);
Route::get('/other-services', [IndexController::class, 'otherServices']);

Route::get('/sign-in', [IndexController::class, 'userLogin']);
Route::get('/sign-up', [IndexController::class, 'userRegister']);

// Admin Routes
Auth::routes();
Route::get('/admin', function () { return view('admin/admin_login'); });
Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
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

    Route::match(['get','post'], 'admin/tour-planner/', [TourController::class, 'tourPlanner']);
    Route::match(['get','post'], 'admin/add-tour/', [TourController::class, 'addTour'])->name('addTour');
    Route::match(['get','post'], 'admin/itinerary-builder/{id}', [TourController::class, 'itineraryBuilder']);
    Route::match(['get','post'], 'admin/add-tour-itinerary/{id}', [TourController::class, 'addTourItinerary']);
    Route::match(['get','post'], 'admin/edit-tour/{id}', [TourController::class, 'editTour']);
    Route::match(['get','post'], 'admin/delete-tour/{id}', [TourController::class,'deleteTour']);
    Route::match(['get','post'], 'admin/update-tour-status/{id}', [TourController::class,'updateTourStatus']);
    
    Route::match(['get','post'], 'admin/share-tour/', [TourController::class,'shareTour']);
    
    Route::match(['get','post'], 'admin/enquiries', [TourController::class,'enquiries']);
    Route::match(['get','post'], 'admin/tour-enquiries', [TourController::class,'tourEnquiries']);

    // Destinations
    Route::match(['get','post'], 'admin/edit-destination/{id}', [TourController::class, 'editDestination']);
    Route::match(['get','post'], 'admin/view-destinations/', [TourController::class, 'viewDestinations']);
    Route::match(['get','post'], 'admin/add-destination/', [TourController::class, 'addDestination']);
    Route::match(['get','post'], 'admin/delete-destination/{id}', [TourController::class,'deleteDestination']);

    // Clients
    Route::match(['get','post'], 'admin/edit-client/{id}', [AdminController::class, 'editClient']);
    Route::match(['get','post'], 'admin/view-client/', [AdminController::class, 'viewClient']);
    Route::match(['get','post'], 'admin/add-client/', [AdminController::class, 'addClient']);
    Route::match(['get','post'], 'admin/delete-client/{id}', [AdminController::class,'deleteClient']);    

    // Events
    Route::match(['get','post'], 'admin/edit-event/{id}', [AdminController::class, 'editEvent']);
    Route::match(['get','post'], 'admin/view-event/', [AdminController::class, 'viewEvent']);
    Route::match(['get','post'], 'admin/add-event/', [AdminController::class, 'addEvent']);
    Route::match(['get','post'], 'admin/delete-event/{id}', [AdminController::class,'deleteEvent']);

    // Expo
    Route::match(['get','post'], 'admin/edit-expo/{id}', [AdminController::class, 'editExpo']);
    Route::match(['get','post'], 'admin/view-expo/', [AdminController::class, 'viewExpo']);
    Route::match(['get','post'], 'admin/add-expo/', [AdminController::class, 'addExpo']);
    Route::match(['get','post'], 'admin/delete-expo/{id}', [AdminController::class,'deleteExpo']);
});


//OTHER ROUTES
Route::match(['get','post'], '/admin-login-check', [AdminController::class, 'login']);
Route::post('/admin-reset-password', [AdminController::class, 'resetPassword']);

Route::get('/admin-forgot-password', function () {
    return view('admin/admin-forgot-password');
});

Route::get('/admin-login', function () {
    return view('admin/admin_login');
});
