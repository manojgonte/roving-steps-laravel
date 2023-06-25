<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Rules\Recaptcha;
use Log;

class IndexController extends Controller
{
    public function index(){
        $meta_title = config('app.name');
        return view('index',compact('meta_title'));
    }
    
    public function contact(Request $request){
        if($request->isMethod('post')){

            $this -> validate($request, [
                'g-recaptcha-response' => ['required', new Recaptcha()]
            ]);

            $data = $request->all();
            Log::info($data);
            // dd($data);

            // $enquiry = new Enquiry;
            // $enquiry->name = $data['name'];
            // $enquiry->email = $data['email'];
            // $enquiry->phone = $data['phone'];
            // $enquiry->subject = $data['subject'];
            // $enquiry->organization = $data['organization'];
            // $enquiry->country = $data['country'];
            // $enquiry->comment = $data['comment'];
            // $enquiry->save();

            $email = ['manoj@ycstech.in','shubham@ycstech.in','amey@ycstech.in'];
            $messageData = [
                'data' => $data,
            ];
            Mail::send('emails.enquiry',$messageData,function($message) use($email){
                $message->to($email)->subject('New enquiry received from website');
            });
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
        $meta_title = 'Tours';
        return view('tours',compact('meta_title'));
    }

    public function tourDetails(Request $request, $id=null){
        $meta_title = 'Tour Details';
        return view('tour_details',compact('meta_title'));
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
        $meta_title = 'Blog';
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
