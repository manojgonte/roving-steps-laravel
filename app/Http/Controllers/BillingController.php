<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TourItinerary;
use App\Models\Tour;
use App\Models\Enquiry;
use App\Models\TourEnquiry;
use App\Models\Testimonial;
use App\Services\MailchimpService;
use Image;
use Auth;
use Mail;
use PDF;
use Illuminate\Support\Facades\View;

class BillingController extends Controller
{
    public function viewRecords() {
        $popularTours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('id','DESC')
            ->where(['status'=>1,'is_popular'=>1])
            ->take(10)
            ->get();

        $testimonials = Testimonial::orderBy('id','DESC')->take(12)->get();
        $destinations = Destination::where(['status'=>1,'is_popular'=>1])->take(8)->get();

        // dd("Hiiii");
        $meta_title = config('app.name');
        return view('admin.billing.invoice-dashboard',compact('meta_title','popularTours','destinations','testimonials'));
    }

    public function createInvoice() {
        return view('admin.billing.create-invoice');
    }

    public function invoicePreview() {
        return view('admin.billing.invoice-preview');
    }


}
