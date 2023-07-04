<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourEnquiry;
use App\Models\User;
use Session;
use Auth;

class UserController extends Controller
{
    public function userLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            if($user = User::where('email',$data['email'])->first()){
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1'])){
                    Session::put('userSession',$user->email);
                    // dd(Auth::User());
                    return redirect('/user/dashboard');
                }else{
                    return redirect()->back()->with('flash_message_error','Invalid username or password.');
                }
            }else{
                return redirect()->back()->with('flash_message_error','Invalid username or password.');
            }
        }

        $meta_title = 'Sign In | '.config('app.name');
        return view('users.login',compact('meta_title'));
    }

    public function userRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            dd($data);

            if(User::where('email',$data['email'])->first()){
                return redirect()->back()->with('flash_message_error','Account already exists. Please login or use another email.'); 
            }

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->contact = $data['contact'];
            $user->password = bcrypt($data['password']);
            $user->status = 1;
            if($user->save()){
                //send register email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name']];
                // Mail::send('emails.register',$messageData,function($message) use($email){
                //     $message->to($email)->subject('Registration with Roving Steps');
                // });

                Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);
                Session::put('userSession',$data['email']);
                return redirect('/user/dashboard');
            }
            return redirect()->back()->with('flash_message_error','Something went wrong, please try again.');
        }

        $meta_title = 'Sign Up';
        return view('users.register',compact('meta_title'));
    }

    public function checkUserExist(Request $request){
        $data = $request->all();
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            echo "false";
        } else{
            echo "true"; die;
        }
    }

    public function userLogout(Request $request){
        Session::forget('userSession');
        Auth::logout();
        return redirect('sign-in');
    }

    public function dashboard(Request $request){
        $tour_enquiry = TourEnquiry::select('tour_enquiry.*','tours.id as tour_id','tours.tour_name')
            ->leftJoin('tours','tour_enquiry.tour_id','tours.id')
            ->where('tour_enquiry.user_id',Auth::id())
            ->orWhere('tour_enquiry.email',Auth::User()->email)
            ->orderBy('tour_enquiry.id','DESC')
            ->paginate(10);
        $meta_title = 'Dashboard | '.config('app.name');
        return view('users.dashboard', compact('meta_title','tour_enquiry'));
    }
}
