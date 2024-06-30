<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Rules\Recaptcha;
use App\Models\Destination;
use App\Models\TourEnquiry;
use App\Models\Testimonial;
use App\Models\Enquiry;
use App\Models\Gallery;
use App\Models\Tour;
use Mail;
use Log;

class IndexController extends Controller
{
    public function index(){
        $popularTours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('id','DESC')
            ->where(['status'=>1,'is_popular'=>1,'custom_tour'=>0])
            ->take(10)
            ->get();

        $testimonials = Testimonial::orderBy('id','DESC')->take(12)->get();
        $destinations = Destination::where(['status'=>1,'is_popular'=>1])->take(8)->get();

        $meta_title = config('app.name');
        return view('index',compact('meta_title','popularTours','destinations','testimonials'));
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
        $testimonials = Testimonial::orderBy('id','DESC')->take(40)->get();
        return view('about',compact('meta_title','testimonials'));
    }

    public function tours(Request $request){
        $tours = Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating','special_tour_type')
            ->orderBy('is_popular','DESC')
            ->orderBy('id','DESC')
            ->where(['status'=>'1','custom_tour'=>0]);

        if($request->q){
            $q = $request->q;
            $tours = $tours->where(function($query) use($q){
                $query->where('tour_name','like','%'.$q.'%')
                ->orWhere('description','like','%'.$q.'%')
                ->orWhere('type','like','%'.$q.'%');
            });
        }

        // if($request->special_tour_type){
        //     $tours = $tours->whereIn('special_tour_type', $request->special_tour_type);
        // }

        $destArray = null;
        if($request->dest){
            $destArray = explode("-",$request->dest);
            $tours = $tours->whereIn('dest_id',$destArray);
        }

        $specTourArray = null;
        if($request->special_tour_type){
            $specialTourType  = $request->special_tour_type;
            $specTourArray = explode("-",$request->special_tour_type);
            // $tours = $tours->whereIn('special_tour_type',$specTourArray);
            
            $tours = $tours->where(function ($query) use ($specTourArray) {
                foreach ($specTourArray as $type) {
                    $query->orWhere(function ($query) use ($type) {
                        $query->where('special_tour_type', 'LIKE', '%"'.$type.'"%');
                    });
                }
            });
        }

        $tours = $tours->paginate(12);
        
        $destinations = Destination::where('status',1)->get();
        $meta_title = 'Tours';
        return view('tours')->with(compact('meta_title','tours','destinations','specTourArray','destArray'));
    }

    public function filter(Request $request){
        $data = $request->all();

        $destUrl="";
        if(!empty($data['dest_id'])){
            foreach($data['dest_id'] as $dest){
                if(empty($destUrl)){
                    $destUrl = "&dest=".$dest;
                }else{
                    $destUrl .= "-".$dest;
                }
            }
        }

        $specTourUrl="";
        if(!empty($data['special_tour_type'])){
            foreach($data['special_tour_type'] as $specTour){
                if(empty($specTourUrl)){
                    $specTourUrl = "&special_tour_type=".$specTour;
                }else{
                    $specTourUrl .= "-".$specTour;
                }
            }
        }
        // dd($specTourUrl);
        $finalUrl = "tours/"."?".$destUrl.$specTourUrl;
        return redirect::to($finalUrl);
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
            $enquiry->tour_id = !empty($data['tour_id']) ? $data['tour_id'] : null;
            $enquiry->user_id = !empty($data['user_id']) ? $data['user_id'] : null;
            $enquiry->name = $data['name'];
            $enquiry->email = $data['email'];
            $enquiry->contact = !empty($data['contact']) ? $data['contact'] : null;
            $enquiry->tourist_no = !empty($data['tourist_no']) ? $data['tourist_no'] : null;
            $enquiry->current_city = !empty($data['current_city']) ? $data['current_city'] : null;
            $enquiry->from_date = !empty($data['from_date']) ? $data['from_date'] : null;
            $enquiry->end_date = !empty($data['end_date']) ? $data['end_date'] : null;
            $enquiry->address = !empty($data['address']) ? $data['address'] : null;
            $enquiry->message = !empty($data['message']) ? $data['message'] : null;
            if($enquiry->save()){
                return redirect()->back()->with('success_message','Enquiry submitted successfully.');
            }else{
                return redirect()->back()->with('error_message','Something went wrong, please try again.');
            }
        }
    }

    public function gallery(Request $request){
        $photos = Gallery::where('status',1)->paginate(12);
        $meta_title = 'Gallery';
        return view('gallery',compact('meta_title','photos'));
    }

    public function flightBooking(Request $request){
        $meta_title = 'Flight Booking';
        return view('flight_booking',compact('meta_title'));
    }

    public function flightListing(Request $request){
        $meta_title = 'Flight Listing';
        return view('flight_listing',compact('meta_title'));
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
