<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssociateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\MailChimpController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\NewsController;

use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\Userlogin;

Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');
    return "cache cleared";
});


// guest user routes
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::match(['get','post'], '/contact-us', [IndexController::class, 'contact'])->name('contact');
Route::get('/about-us', [IndexController::class, 'about'])->name('about');

Route::get('/tours', [IndexController::class, 'tours']);
Route::post('/tours-filter', [IndexController::class, 'filter']);
Route::get('/tour-details/{id?}/{slug?}', [IndexController::class, 'tourDetails']);
Route::post('/tour-enquiry', [IndexController::class, 'tourEnquiry']);
Route::get('/gallery', [IndexController::class, 'gallery']);
Route::get('/blogs', [IndexController::class, 'blogs']);
Route::get('/blog/{id}/{slug?}', [IndexController::class, 'blogDetail']);
Route::get('/like-blog/{id}', [BlogController::class, 'likeBlog']);
Route::post('/save-enquiry', [IndexController::class, 'saveEnquiry'])->name('save.enquiry');
Route::post('/subscribe', [IndexController::class, 'subscribe'])->name('save.subscribe');

Route::get('/flight-booking', [IndexController::class, 'flightBooking']);
Route::get('/flight-listing', [IndexController::class, 'flightListing']);
Route::get('/cruise-booking', [IndexController::class, 'cruiseBooking']);
Route::get('/other-services', [IndexController::class, 'otherServices']);

Route::get('/terms-of-use', [IndexController::class, 'termsOfUse']);
Route::get('/refund-policy', [IndexController::class, 'refundPolicy']);
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy']);

Route::match(['get','post'], '/sign-in', [UserController::class, 'userLogin']);
Route::match(['get','post'], '/sign-up', [UserController::class, 'userRegister']);
Route::match(['get','post'], '/check-user-exist', [UserController::class, 'checkUserExist']);
Route::match(['get','post'], '/forgot-password', [UserController::class, 'forgotPassword']);
Route::match(['get','post'], '/password-reset', [UserController::class, 'resetPassword']);

// user routes
// Route::middleware([Userlogin::class])->group(function () {
Route::group(['middleware'=>'userlogin'],function(){
    Route::get('user/dashboard', [UserController::class, 'dashboard']);
    Route::get('user/logout', [UserController::class, 'userLogout']);
});

// Admin Routes
Auth::routes();
Route::get('/admin', function () { return view('admin/admin_login'); });
Auth::routes();
Route::group(['middleware'=>'admin_auth'],function(){
    //Dashboard
    Route::match(['get','post'], '/admin/dashboard', [AdminController::class, 'viewDashboard'])->name('dashboard');
    //Admin-Setting
    Route::match(['get','post'], 'admin/setting/', [AdminController::class, 'setting']);
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
    Route::match(['get','post'], 'admin/update-custom-tour-status/{id}', [TourController::class,'updateCustomTourStatus']);
    
    Route::match(['get','post'], 'admin/plan-tour/', [TourController::class, 'planTour']);
    Route::match(['get','post'], 'admin/edit-plan-tour/{id}', [TourController::class, 'editPlanTour']);
    Route::get('admin/delete-plan-tour/{id}', [TourController::class,'deletePlanTour']);

    // itinerary
    Route::match(['get','post'], 'admin/itinerary-builder/{id}', [TourController::class, 'itineraryBuilder']);
    Route::match(['get','post'], 'admin/add-tour-itinerary/{id}', [TourController::class, 'addTourItinerary']);
    Route::match(['get','post'], 'admin/edit-tour-itinerary/{id}', [TourController::class, 'editTourItinerary']);
    Route::get('admin/delete-itinerary/{id}', [TourController::class,'deleteItinerary']);
    Route::get('admin/get-itinerary-details/{place}', [TourController::class,'getItineraryDetails']);

    Route::match(['get','post'], 'admin/share-tour/', [TourController::class,'shareTour']);
    Route::match(['get','post'], 'admin/download-tour/{id}', [TourController::class,'downloadTour']);

    // enquiries routes 
    Route::match(['get','post'], 'admin/enquiries', [TourController::class,'enquiries']);
    Route::match(['get','post'], 'admin/delete-enquiry/{id}', [TourController::class,'deleteEnquiry']);
    Route::match(['get','post'], 'admin/tour-enquiries', [TourController::class,'tourEnquiries']);
    Route::match(['get','post'], 'admin/new-enquiry', [TourController::class,'addEnquiry']);
    Route::match(['get','post'], 'admin/edit-tour-enquiry/{id}', [TourController::class,'editTourEnquiry']);
    Route::match(['get','post'], 'admin/delete-tour-enquiry/{id}', [TourController::class,'deleteTourEnquiry']);
    Route::match(['get','post'], 'admin/create-estimation/{id}', [TourController::class,'createEstimation']);
    Route::match(['get','post'], 'admin/sent-estimations', [TourController::class,'viewEstimations']);
    Route::match(['get','post'], 'admin/create-invoice/{id}', [TourController::class,'createEstInvoice']);

    // Destinations
    Route::match(['get','post'], 'admin/edit-destination/{id}', [TourController::class, 'editDestination']);
    Route::match(['get','post'], 'admin/view-destinations/', [TourController::class, 'viewDestinations']);
    Route::match(['get','post'], 'admin/add-destination/{slug?}', [TourController::class, 'addDestination']);
    Route::match(['get','post'], 'admin/delete-destination/{id}', [TourController::class,'deleteDestination']);
    Route::match(['get','post'], 'admin/destination/places/{id}/{slug?}', [TourController::class,'viewDestinationPlaces']);

    // Registered Users
    Route::match(['get','post'], 'admin/registered-users/', [UserController::class, 'viewUsers']);
    Route::match(['get','post'], 'admin/user/{user_id}', [UserController::class, 'userDetails']);
    Route::match(['get','post'], 'admin/users-export/', [UserController::class, 'usersExport']);
    Route::match(['get','post'], 'admin/users-import/', [UserController::class, 'usersImport']);
    Route::match(['get','post'], 'admin/add-user/', [UserController::class, 'addUser']);
    Route::match(['get','post'], 'admin/edit-user/{id}', [UserController::class, 'editUser']);
    Route::match(['get','post'], 'admin/delete-user/{id}', [UserController::class, 'deleteUser']);

    // blogs
    Route::match(['get','post'], 'admin/blogs/', [BlogController::class, 'viewBlogs']);
    Route::match(['get','post'], 'admin/add-blog/', [BlogController::class, 'addBlog']);
    Route::match(['get','post'], 'admin/edit-blog/{id}', [BlogController::class, 'editBlog']);
    Route::match(['get','post'], 'admin/delete-blog/{id}', [BlogController::class, 'deleteBlog']);

    // newsletter
    Route::match(['get','post'], 'admin/newsletter-subscribers', [NewsController::class, 'viewSubscribers']);
    Route::match(['get','post'], 'admin/delete-subscriber/{id}', [NewsController::class, 'deleteSubscriber']);
    
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
    Route::get('/admin/gallery-images', [GalleryController::class, 'getGalleryImages']);

    // testimonial
    Route::match(['get','post'], 'admin/edit-testimonial/{id}', [AdminController::class, 'editTestimonial']);
    Route::match(['get','post'], 'admin/testimonials/', [AdminController::class, 'viewTestimonials']);
    Route::match(['get','post'], 'admin/add-testimonial/', [AdminController::class, 'addTestimonial']);
    Route::match(['get','post'], 'admin/delete-testimonial/{id}', [AdminController::class,'deleteTestimonial']);

    // MAILCHIMP ROUTES
    Route::match(['get','post'], 'admin/manageMailChimp', [MailChimpController::class, 'manageMailChimp']);
    Route::match(['get','post'], 'admin/subscribe', [MailChimpController::class, 'subscribe'])->name('subscribe');
    Route::match(['get','post'], 'admin/sendCompaign', [MailChimpController::class, 'sendCompaign'])->name('sendCompaign');

    // Billing & invoices
    Route::match(['get','post'], 'admin/invoice-billing', [BillingController::class, 'invoiceBilling']);
    Route::match(['get','post'], 'admin/create-invoice', [BillingController::class, 'createInvoice'])->name('createInvoice');
    Route::match(['get','post'], 'admin/invoice-details/{id}', [BillingController::class, 'invoiceDetails']);

    Route::match(['get','post'], 'admin/edit-invoice/{id}', [BillingController::class, 'editInvoice'])->name('editInvoice');
    Route::match(['get','post'], 'admin/edit-invoice-details/{id}', [BillingController::class, 'editInvoiceDetails'])->name('editInvoiceDetails');
    Route::match(['get','post'], 'admin/get-invoice-details', [BillingController::class, 'getInvoiceDetails']);
    Route::match(['get','post'], 'admin/edit-payment/{id}', [BillingController::class, 'editPayment']);
    
    Route::match(['get','post'], 'admin/invoice-payments/{id}', [BillingController::class, 'invoicePayments']);
    Route::match(['get','post'], 'admin/add-invoice-payment/{id}', [BillingController::class, 'addInvoicePayment']);
    Route::match(['get','post'], 'admin/update-payment-details/{id}', [BillingController::class, 'updatePayDetails']);
    Route::match(['get','post'], 'admin/get-payment-details/', [BillingController::class, 'getPayDetails']);
    Route::match(['get','post'], 'admin/del-invoice-payment/{id}', [BillingController::class, 'deleteInvoicePayment']);

    Route::match(['get','post'], 'admin/delete-invoice/{id}', [BillingController::class, 'deleteInvoice']);
    Route::match(['get','post'], 'admin/invoice-actions/{id}', [BillingController::class, 'invoiceActions']);
    
    Route::get('admin/view-staff', [AdminController::class, 'viewStaff']);
    Route::match(['get','post'], 'admin/add-staff', [AdminController::class, 'addStaff']);
    Route::match(['get','post'], 'admin/edit-staff/{id}', [AdminController::class, 'editStaff']);
    Route::match(['get','post'], 'admin/delete-staff/{id}', [AdminController::class, 'deleteStaff']);
});


//ADMIN AUTH ROUTES
Route::match(['get','post'], '/admin', [AdminController::class, 'login']);
Route::match(['get','post'], '/admin/forgot-password', [AdminController::class, 'forgotPassword']);
Route::match(['get','post'], 'admin/password-reset', [AdminController::class, 'resetPassword']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
