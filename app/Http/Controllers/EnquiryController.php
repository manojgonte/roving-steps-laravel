<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourItinerary;
use App\Models\Enquiry;
use Image;
use Auth;

class EnquiryController extends Controller
{
    public function tourEnquiries(Request $request, $status=null) {
        $tours = Enquiry::orderBy('id','DESC');
        $tours = $tours->paginate(10);
        return view('admin.tour.view_tours')->with(compact('tours'));
    }
}