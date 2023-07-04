<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Recaptcha;
use App\Models\Destination;
use App\Models\TourEnquiry;
use App\Models\Enquiry;
use App\Models\Tour;
use Mail;
use Log;

class IndexController extends Controller
{
    public function index(){
        $popularTours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('id','DESC')
            ->where(['status'=>1,'is_popular'=>1])
            ->take(10)
            ->get();
        $meta_title = config('app.name');
        return view('index',compact('meta_title','popularTours'));
    }
    
    public function contact(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            Log::info($data);

            $enquiry = new Enquiry;
            $enquiry->name = $data['name'];
            $enquiry->email = $data['email'];
            $enquiry->address = !empty($data['address']) ? $data['address'] : null;
            $enquiry->contact = !empty($data['contact']) ? $data['contact'] : null;
            $enquiry->message = !empty($data['message']) ? $data['message'] : null;
            $enquiry->save();

            return redirect()->back()->with('success_message','Form submitted successfully.');
        }
        $meta_title = 'Contact Us | '. config('app.name');
        return view('contact',compact('meta_title'));
    }

    public function about(Request $request){
        $meta_title = 'About Us';
        return view('about',compact('meta_title'));
    }

    public function tours(Request $request){
        $tours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('is_popular','DESC')
            ->orderBy('id','DESC')
            ->where('status','1');
        
        if($request->dest_id){
            $tours = $tours->where('dest_id', $request->dest_id);
        }
        if($request->special_tour_type){
            $tours = $tours->where('special_tour_type', $request->special_tour_type);
        }

        $tours = $tours->paginate(9);

        $destinations = Destination::where('status',1)->get();
        $meta_title = 'Tours';
        return view('tours')->with(compact('meta_title','tours','destinations'));
    }

    public function tourDetails(Request $request, $id=null){
        $tour = Tour::with('itinerary')->select('tours.*','destinations.name as dest_name')
            ->leftJoin('destinations','destinations.id','tours.dest_id')
            ->where('tours.id', $id)
            ->orderBy('tours.id','DESC')
            ->first();
        
        $meta_title = $tour->tour_name . ' | ' . config('app.name');
        return view('tour_details',compact('meta_title','tour'));
    }

    public function tourEnquiry(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            Log::info($data);

            $enquiry = new TourEnquiry;
            $enquiry->tour_id = $data['tour_id'];
            $enquiry->name = $data['name'];
            $enquiry->email = $data['email'];
            $enquiry->contact = $data['contact'];
            $enquiry->tourist_no = $data['tourist_no'];
            $enquiry->current_city = $data['current_city'];
            $enquiry->from_date = $data['from_date'];
            $enquiry->end_date = $data['end_date'];
            $enquiry->message = $data['message'];
            if($enquiry->save()){
                return redirect()->back()->with('success_message','Tour enquiry submitted successfully.');
            }else{
                return redirect()->back()->with('error_message','Something went wrong, please try again.');
            }
        }
    }

    public function gallery(Request $request){
        $meta_title = 'gallery';
        return view('gallery',compact('meta_title'));
    }

    public function flightBooking(Request $request){
        $meta_title = 'Flight Booking';
        return view('flight_booking',compact('meta_title'));
    }

    public function cruiseBooking(Request $request){
        $meta_title = 'Cruise Booking';
        return view('cruise_booking',compact('meta_title'));
    }

    public function otherServices(Request $request){
        $meta_title = 'Other Services';
        return view('other_services',compact('meta_title'));
    }

    public function blogsListing(Request $request){
        $meta_title = 'Blogs';
        return view('blog_listing',compact('meta_title'));
    }

    public function blogDetail(Request $request, $id=null){
        $meta_title = 'Blog Detail';
        return view('blog_detail',compact('meta_title'));
    }
    
}
