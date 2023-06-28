<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Recaptcha;
use App\Models\Enquiry;
use App\Models\Tour;
use Mail;
use Log;

class IndexController extends Controller
{
    public function index(){
        $meta_title = config('app.name');
        return view('index',compact('meta_title'));
    }
    
    public function contact(Request $request){
        if($request->isMethod('post')){

            // $this -> validate($request, [
            //     'g-recaptcha-response' => ['required', new Recaptcha()]
            // ]);

            $data = $request->all();
            Log::info($data);
            // dd($data);

            $enquiry = new Enquiry;
            $enquiry->name = $data['name'];
            $enquiry->email = $data['email'];
            $enquiry->address = $data['address'];
            $enquiry->contact = $data['contact'];
            $enquiry->message = $data['message'];
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
        $tours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights')
            ->orderBy('id','DESC')
            ->paginate(9);

        $meta_title = 'Tours';
        return view('tours')->with(compact('meta_title','tours'));
    }

    public function tourDetails(Request $request, $id=null){
        $tour = Tour::with('itinerary')->select('tours.*','destinations.name as dest_name')
            ->leftJoin('destinations','destinations.id','tours.dest_id')
            ->where('tours.id', $id)
            ->orderBy('tours.id','DESC')
            ->first();
        // dd($tour->itinerary);
        $meta_title = $tour->tour_name . ' | ' . config('app.name');
        return view('tour_details',compact('meta_title','tour'));
    }

    public function tourEnquiry(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            dd($data);
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

    public function userLogin(Request $request){
        $meta_title = 'Sign In';
        return view('login',compact('meta_title'));
    }

    public function userRegister(Request $request){
        $meta_title = 'Sign Up';
        return view('register',compact('meta_title'));
    }
    
}
