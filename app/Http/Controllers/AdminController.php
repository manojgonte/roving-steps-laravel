<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Testimonial;
use App\Models\Admin;
use App\Models\News;
use App\Models\Clients;
use App\Models\Event;
use App\Models\Expo;
use Auth;
use Image;

class AdminController extends Controller
{
    public function getLogin(){        
        return view('admin.auth.login');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $user = Admin::where('email',$data['email'])->first();
            
            // check user status
            if($user && $user->status == 0){
                return redirect()->back()->with('flash_message_error','Account is disbaled by admin, please contact admin.');
            }

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                // dd('Welcome '.Auth::guard('admin')->User()->name);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        // Session::flush('adminSession');
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged Out Successfully');
    }


    public function viewDashboard(Request $request){
        return view('admin.dashboard');
    }


    public function viewTestimonials(Request $request) {
        $testimonials = Testimonial::orderBy('id','DESC')->paginate(10);
        return view('admin.testimonials.view_testimonials')->with(compact('testimonials'));
    }

    public function addTestimonial(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $destination = new Testimonial;
            $destination->user_name = $data['user_name'];
            $destination->testimonial = $data['testimonial'];
            $destination->save();
            return redirect('admin/testimonials/')->with('flash_message_success','Testimonial added successfully');
        }
        return view('admin.testimonials.add_testimonial');
    }

    public function editTestimonial(Request $request, $id) {
        if($request->isMethod('post')){
            $data = $request->all();
          
            Testimonial::where('id',$id)->update([
                'user_name'=>$data['user_name'],
                'testimonial'=>$data['testimonial']
            ]);
            
            return redirect('admin/testimonials')->with('flash_message_success','Testimonial updated successfully');
        }
        $testimonial = Testimonial::where('id',$id)->first();
        return view('admin.testimonials.edit_testimonial')->with(compact('testimonial'));
    }

    public function deleteTestimonial(Request $request, $id) {
        Testimonial::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Testimonial deleted successfully');
    }
    
    public function viewStaff(Request $request) {
        $users = Admin::select('admins.*')->orderBy('name','ASC');
        if($request->status != null){
            $users = $users->where('admins.status',$request->status);
        }
        if($request->name != null) {
            $users = $users->where('admins.name','LIKE',"%".$request->name."%")->orWhere('admins.email','LIKE',"%".$request->name."%");
            $name = $request->name;
        }
        $users = $users->paginate(10);
        return view('admin.users.view_staff', compact('users'));
    }

    public function addStaff(Request $request){
        if($request->isMethod('post')){

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:6',
                'roles' => 'required'
            ]);

            $data = $request->all();
            // dd($data);
            
            $user = new Admin;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->status = empty($data['status']) ? 0 : 1;
            
            $user->roles = $data['roles'];
            $user->save();

            return redirect('admin/view-staff')->with('success_message','User added successfully');
        }
        return view('admin.users.add_staff');
    }

    public function editStaff(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'roles' => 'required'
            ]);
            
            $user = Admin::find($id);
            $user->update([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'status'    => $request->has('status') ? 1 : 0,
                'roles'     => $data['roles'],
                'password' => (!empty($data['password'])) ? bcrypt($data['password']) : $user->password,
            ]);

            return redirect('admin/view-staff')->with('flash_message_success','User details updated successfully');
        }
        $user = Admin::find($id);
        return view('admin.users.edit_staff',with(compact('user')));
    }
    
    public function deleteStaff(Request $request, $id){
        Admin::find($id)->delete();
        return redirect()->back()->with('flash_message_success','User deleted successfully');
    }
}
