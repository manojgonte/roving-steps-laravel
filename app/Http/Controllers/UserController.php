<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourEnquiry;
use App\Models\User;
use Session;
use Auth;
use Mail;
use Hash;

use Illuminate\Support\Str;

class UserController extends Controller
{
    public function userLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            if($user = User::where('email',$data['email'])->first()){
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1'])){
                    // Session::put('userSession',$user->email);
                    // dd(Auth::User());
                    return redirect('/');
                    // return redirect('/user/dashboard');
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
                return redirect('/');
                // return redirect('/user/dashboard');
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

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            if($user = User::select('id','email','name')->where('email',$data['email'])->first()){
                $user->remember_token = rand(100000,999999);
                $user->save();

                $email = $user->email;
                $messageData = [
                    'user' => $user
                ];
                Mail::send('emails.forgot_password_otp',$messageData,function($message) use($email){
                    $message->to($email)->subject('Password Reset Code');
                });

                return redirect('password-reset')->with('flash_message_success','Please enter code received on email'); 
            }else{
                return redirect()->back()->with('flash_message_error','Email address not found'); 
            }
        }
        $meta_title = 'Forgot Password';
        return view('users.forgot_password', compact('meta_title'));
    }

    public function resetPassword(Request $request) {
        if($request->isMethod('post')){
            if (($user = User::where('email', $request->email)->where('remember_token', $request->code)->first()) != null) {
                if ($request->password == $request->confirm_password) {
                    $user->password = Hash::make($request->password);
                    $user->email_verified_at = date('Y-m-d h:m:s');
                    $user->save();
                    auth()->login($user, true);
                    Session::put('userSession',$request->email);
                    return redirect('/');
                    // return redirect('/user/dashboard');
                } else {
                    return redirect()->back()->with("flash_message_error","Password and confirm password didn't match"); 
                }
            } else {
                return redirect()->back()->with("flash_message_error","Verification code mismatch"); 
            }
        }else{
            return view('users.password_reset');
        }
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

    public function viewUsers(Request $request){
        $users = User::orderBy('id','DESC');
        if($request->q){
            $q = $request->q;
            $users = $users->where(function($query) use($q){
                $query->where('name','like','%'.$q.'%')
                ->orWhere('contact','like','%'.$q.'%')
                ->orWhere('email','like','%'.$q.'%');
            });
        };
        $users = $users->paginate(10);
        return view('admin.users.registered-users')->with(compact('users'));
    }

    public function addUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'] ?? null;
            $user->contact = $data['contact'] ?? null;
            $user->contact_alt = $data['contact_alt'] ?? null;
            $user->address = $data['address'] ?? null;
            $user->gst_no = $data['gst_no'] ?? null;
            $user->gst_address = $data['gst_address'] ?? null;
            $user->pan_no = $data['pan_no'] ?? null;
            $user->aadhar_no = $data['aadhar_no'] ?? null;
            $user->passport_no = $data['passport_no'] ?? null;
            $user->password = bcrypt(Str::slug($data['name']));
            $user->status = 1;

            if($request->hasFile('pan_card_file')) {
                $file = $request->file('pan_card_file');
                $pdf = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $pdf);
                $user->pan_card_file=$pdf;
            }

            if($request->hasFile('aadhar_card_file')) {
                $file = $request->file('aadhar_card_file');
                $pdf = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $pdf);
                $user->aadhar_card_file=$pdf;
            }

            if($request->hasFile('passport_file')) {
                $file = $request->file('passport_file');
                $pdf = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $pdf);
                $user->passport_file=$pdf;
            }

            $user->save();
            return redirect('admin/registered-users/')->with('flash_message_success','New user added successfully');
        }
        return view('admin.users.add_user');
    }

    public function editUser(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            // Upload file
            if($request->hasFile('pan_card_file')) {
                $file = $request->file('pan_card_file');
                $pan_card_file = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $pan_card_file);
            }else if(!empty($data['current_pan_file'])){
                $pan_card_file = $data['current_pan_file'];
            }else{
                $pan_card_file = '';
            }
            if($request->hasFile('aadhar_card_file')) {
                $file = $request->file('aadhar_card_file');
                $aadhar_card_file = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $aadhar_card_file);
            }else if(!empty($data['current_aadhar_file'])){
                $aadhar_card_file = $data['current_aadhar_file'];
            }else{
                $aadhar_card_file = '';
            }
            if($request->hasFile('passport_file')) {
                $file = $request->file('passport_file');
                $passport_file = rand(11, 99999) . '.' . $file->getClientOriginalName();
                $file->move(public_path('img/user/'), $passport_file);
            }else if(!empty($data['current_passport_file'])){
                $passport_file = $data['current_passport_file'];
            }else{
                $passport_file = '';
            }

            // detail update
            User::where('id',$id)->update([
                'name'=>$data['name'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'contact_alt' => $data['contact_alt'],
                'address' => $data['address'],
                'gst_no' => $data['gst_no'],
                'gst_address' => $data['gst_address'],
                'pan_no' => $data['pan_no'],
                'aadhar_no' => $data['aadhar_no'],
                'passport_no' => $data['passport_no'],
                'pan_card_file'=>$pan_card_file,
                'aadhar_card_file'=>$aadhar_card_file,
                'passport_file'=>$passport_file,
            ]);
            return redirect('admin/registered-users/')->with('flash_message_success','User details updated successfully');
        }
        $user = User::where('id',$id)->first();
        return view('admin.users.edit_user')->with(compact('user'));
    }

    public function deleteUser(Request $request, $id){
        User::find($id)->delete();
        return redirect()->back()->with('flash_message_success','User deleted');
    }
}
