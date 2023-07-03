<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            // dd($data);
            $userCount = User::where('email',$data['email'])->count();
            // dd($userCount);
            if($userCount>0){
                return redirect()->back()->with('flash_message_error','Email already exists. Please user another email.'); 
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->phone = $data['phone'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                
                Session::put('userRegister',$user);
                // $userRegister = Session::get('userRegister');
                $mobile = $data['phone'];
                $otp = mt_rand(100000, 999999);
                Session::put('otp', $otp);

                // send otp message
                // $this->usersendOTP($mobile, $otp);

                //send register email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name']];
                // Mail::send('emails.register',$messageData,function($message) use($email){
                //     $message->to($email)->subject('Registration with Giftiyo Account');
                // });
                // dd($user);
                Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1']);
                return redirect('/user/enter-otp');
            }
        }

        $meta_title = 'Sign Up';
        return view('users.register',compact('meta_title'));
    }

    public function userLogout(Request $request){
        Session::forget('userSession');
        Auth::logout();
        return redirect('sign-in');
    }

    public function dashboard(Request $request){
        // dd(Auth::User());
        $meta_title = 'Dashboard | '.config('app.name');
        return view('users.dashboard', compact('meta_title'));
    }
}
