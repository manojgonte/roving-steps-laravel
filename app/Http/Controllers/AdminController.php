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

    public function postLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            
            // dd($adminCount);
            if(Auth::attempt(['email' => $data['email'],'password'=>md5($data['password'])])){
                return redirect()->route('adminDashboard')->with('flash_message_error','You are logged in sucessfully.');
            }
            else{
                return back()->with('flash_message_error','Invalid Email or Password');
            }
        }
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $adminCount = Admin::where(['email' => $data['email'],'password'=>md5($data['password'])])->count();
            if($adminCount > 0){
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin-login')->with('flash_message_error','Invalid email or password');
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        // auth()->guard('admin')->logout();
        Session::flush('adminSession');
        return view('admin.admin_login')->with('flash_message_success','loggedout successfully');
    }


    public function viewDashboard(Request $request){
        return view('admin.dashboard');
    }


    // newsviews section

    // add new newsviews
    public function addNews(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $newsviews = new News;
            $newsviews->title = $data['title'];
            $newsviews->description = $data['description'];

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999999) . '.' . $extension;
                    $newsviews_path = 'images/backend_images/news/'.$filename;
                    Image::make($image_tmp)->save($newsviews_path);
                    $newsviews->image = $filename;
                }
            }
            $newsviews->save();
            return redirect('admin/view-news')->with('flash_message_success','New record added successfully');
        }
        return view('admin.media.add-news');
    }
    
    // edit specific newsviews
    public function editNews(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(1111, 99999) . '.' . $extension;
                    $collaborate_path = 'images/backend_images/news/' . $filename;
                    Image::make($image_tmp)->save($collaborate_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }
            News::where('id',$id)->update(['title'=>$data['title'],'description'=>$data['description'],'image'=>$filename]);
            return redirect('admin/view-news')->with('flash_message_success','New record updated successfully');
        }
        $newsviews = News::where('id',$id)->first();
        return view('admin.media.edit-news')->with(compact('newsviews'));
    }

     public function viewNews(){
        $newsviews = News::orderBy('id','DESC')->get();
        // dd($newsviewss);
        return view('admin.media.view-news')->with(compact('newsviews'));
    }

    public function deleteNews(Request $request, $id){
        News::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Data deleted successfully');
    }


    // Clients section

    // add new Client
    public function addClient(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $clients = new Clients;
            $clients->title = $data['title'];

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999999) . '.' . $extension;
                    $newsviews_path = 'images/backend_images/client/'.$filename;
                    Image::make($image_tmp)->save($newsviews_path);
                    $clients->image = $filename;
                }
            }
            $clients->save();
            return redirect('admin/view-client')->with('flash_message_success','New record added successfully');
        }
        return view('admin.clients.add-client');
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
    
}
