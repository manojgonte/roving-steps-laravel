<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourEnquiry;
use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Session;
use Auth;
use Mail;
use Hash;
use Excel;

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
                ->orWhere('email','like','%'.$q.'%')
                ->orWhere('visa_type','like','%'.$q.'%')
                ->orWhere('address','like','%'.$q.'%')
                ->orWhere('gst_no','like','%'.$q.'%')
                ->orWhere('pan_no','like','%'.$q.'%')
                ->orWhere('aadhar_no','like','%'.$q.'%')
                ->orWhere('address','like','%'.$q.'%')
                ->orWhere('id','like','%'.$q.'%');
            });
        };

        // Passport filters
        if ($request->filter) {
            $today = now();
            $sixMonthsLater = now()->addMonths(6);

            switch ($request->filter) {
                case 'passport_expired':
                    $users = $users->whereNotNull('passport_expiry')
                                   ->where('passport_expiry', '<', $today);
                    break;

                case 'passport_about_to_expire':
                    $users = $users->whereNotNull('passport_expiry')
                                   ->whereBetween('passport_expiry', [$today, $sixMonthsLater]);
                    break;

                case 'valid_passport':
                    $users = $users->whereNotNull('passport_expiry')
                                   ->where('passport_expiry', '>', $sixMonthsLater);
                    break;
            }
        }

        // Date-based filter
        if ($request->dob) {
            $today = now();
            $sixMonthsLater = now()->copy()->addMonths(6);

            $users = $users->whereNotNull('dob')->where(function ($query) use ($today, $sixMonthsLater) {
                $start = $today->format('m-d');
                $end = $sixMonthsLater->format('m-d');

                if ($start <= $end) {
                    // Same year range (e.g., Jul -> Dec)
                    $query->whereRaw("DATE_FORMAT(dob, '%m-%d') BETWEEN ? AND ?", [$start, $end]);
                } else {
                    // Wraps around year (e.g., Nov -> Apr)
                    $query->where(function ($q) use ($start, $end) {
                        $q->whereRaw("DATE_FORMAT(dob, '%m-%d') >= ?", [$start])
                          ->orWhereRaw("DATE_FORMAT(dob, '%m-%d') <= ?", [$end]);
                    });
                }
            });
        }
        if ($request->dob) {
            $today = now();
            $sixMonthsLater = now()->copy()->addMonths(6);

            $users = $users->whereNotNull('dob')->where(function ($query) use ($today, $sixMonthsLater) {
                $start = $today->format('m-d');
                $end = $sixMonthsLater->format('m-d');

                if ($start <= $end) {
                    // Same year range (e.g., Jul -> Dec)
                    $query->whereRaw("DATE_FORMAT(dob, '%m-%d') BETWEEN ? AND ?", [$start, $end]);
                } else {
                    // Wraps around year (e.g., Nov -> Apr)
                    $query->where(function ($q) use ($start, $end) {
                        $q->whereRaw("DATE_FORMAT(dob, '%m-%d') >= ?", [$start])
                          ->orWhereRaw("DATE_FORMAT(dob, '%m-%d') <= ?", [$end]);
                    });
                }
            });
        }
        if ($request->anniversary) {
            $today = now();
            $future = $today->copy()->addMonths(6);

            $users = $users->whereNotNull('anniversary_date')->where(function ($query) use ($today, $future) {
                $start = $today->format('m-d');
                $end = $future->format('m-d');

                if ($start <= $end) {
                    $query->whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') BETWEEN ? AND ?", [$start, $end]);
                } else {
                    $query->where(function ($q) use ($start, $end) {
                        $q->whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') >= ?", [$start])
                          ->orWhereRaw("DATE_FORMAT(anniversary_date, '%m-%d') <= ?", [$end]);
                    });
                }
            });
        }

        $users = $users->paginate(10);
        return view('admin.users.registered-users')->with(compact('users'));
    }

    public function userDetails(Request $request, $user_id){
        $user = User::with('planned_tours')->where('users.id',$user_id)->first();
        if(!$user){
            return redirect('admin/registered-users')->with('flash_message_error','User not found');
        }
        return view('admin.users.user')->with(compact('user'));
    }

    public function usersExport(Request $request){
        $keyword = !empty($request->q) ? $request->q : null;
        
        $users = User::orderBy('id','DESC');
        
        if(!empty($request->q)) {
            $users = $users->where(function($query) use($keyword){
                $query->where('name','like','%'.$keyword.'%')
                ->orWhere('contact','like','%'.$keyword.'%')
                ->orWhere('email','like','%'.$keyword.'%')
                ->orWhere('visa_type','like','%'.$keyword.'%')
                ->orWhere('address','like','%'.$keyword.'%')
                ->orWhere('gst_no','like','%'.$keyword.'%')
                ->orWhere('pan_no','like','%'.$keyword.'%')
                ->orWhere('aadhar_no','like','%'.$keyword.'%')
                ->orWhere('address','like','%'.$keyword.'%')
                ->orWhere('id','like','%'.$keyword.'%');
            });
        }

        // Date-based filter
        if ($request->event === 'dob_4') {
            $users = $users->whereNotNull('dob')->whereRaw("
                DATE_FORMAT(dob, '%m-%d') BETWEEN DATE_FORMAT(NOW(), '%m-%d') 
                AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 6 MONTH), '%m-%d')
            ");
        } elseif ($request->event === 'anniversary_4') {
            $users = $users->whereNotNull('anniversary_date')->whereRaw("
                DATE_FORMAT(anniversary_date, '%m-%d') BETWEEN DATE_FORMAT(NOW(), '%m-%d') 
                AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 6 MONTH), '%m-%d')
            ");
        }

        $users = $users->get();
        return Excel::download(new UsersExport($users),'users-list-'.date('d-M-Y').'.xlsx');
    }

    public function usersImport(Request $request){
        if($request->isMethod('post')) {

            // Validation rules
            $request->validate([
                'import_file' => 'required|file|mimes:xlsx,xls,csv|max:2048', // max:2048 = 2MB
            ]);

            $import = new UsersImport;

            try {
                Excel::import($import, $request->file('import_file'));

                if ($import->failures()->isNotEmpty()) {
                    return redirect()->back()->withErrors($import->failures());
                }

                return redirect()->back()->with('flash_message_success', 'Users Imported Successfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('flash_message_error', 'Import failed: ' . $e->getMessage());
            }
        }
    }

    public function addUser(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $tempUser = User::where(['contact'=>$data['contact'],'email'=>$data['email']])->first();
            if($tempUser) {
                return redirect()->back()->with('flash_message_error','User already exists with same email/phone');
            }

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
            $user->passport_expiry = $data['passport_expiry'] ?? null;
            $user->dob = $data['dob'] ?? null;
            $user->anniversary_date = $data['anniversary_date'] ?? null;
            $user->visa_type = $data['visa_type'] ?? null;
            $user->visa_expiry = $data['visa_expiry'] ?? null;
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
                'passport_expiry' => $data['passport_expiry'],
                'dob' => $data['dob'],
                'anniversary_date' => $data['anniversary_date'],
                'visa_type' => $data['visa_type'] ?? null,
                'visa_expiry' => $data['visa_expiry'],
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
