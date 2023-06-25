<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
                return redirect()->route('adminDashboard')->with('flash_message_error','You are Logged in sucessfully.');
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
                return redirect('/admin-dashboard');
            }else{
                return redirect('/admin-login')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        auth()->guard('admin')->logout();
            Session::flush();
        return view('admin.admin_login')->with('flash_message_success','Logged Out Successfully');
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
    
    // edit specific Client
    public function editClient(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(1111, 99999) . '.' . $extension;
                    $collaborate_path = 'images/backend_images/client/' . $filename;
                    Image::make($image_tmp)->save($collaborate_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }
            Clients::where('id',$id)->update(['title'=>$data['title'],'image'=>$filename]);
            return redirect('admin/view-client')->with('flash_message_success','New record updated successfully');
        }
        $clients = Clients::where('id',$id)->first();
        return view('admin.clients.edit-client')->with(compact('clients'));
    }

     public function viewClient(){
        $clients = Clients::orderBy('id','DESC')->get();
        // dd($newsviewss);
        return view('admin.clients.view-client')->with(compact('clients'));
    }

    public function deleteClient(Request $request, $id){
        Clients::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Data deleted successfully');
    }    


    // Event section

    // add new event
    public function addEvent(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $clients = new Event;
            $clients->title = $data['title'];

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999999) . '.' . $extension;
                    $newsviews_path = 'images/backend_images/event/'.$filename;
                    Image::make($image_tmp)->save($newsviews_path);
                    $clients->image = $filename;
                }
            }
            $clients->save();
            return redirect('admin/view-event')->with('flash_message_success','New record added successfully');
        }
        return view('admin.events.add-event');
    }
    
    // edit specific Event
    public function editEvent(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(1111, 99999) . '.' . $extension;
                    $collaborate_path = 'images/backend_images/event/' . $filename;
                    Image::make($image_tmp)->save($collaborate_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }
            Event::where('id',$id)->update(['title'=>$data['title'],'image'=>$filename]);
            return redirect('admin/view-event')->with('flash_message_success','New record updated successfully');
        }
        $event = Event::where('id',$id)->first();
        return view('admin.events.edit-event')->with(compact('event'));
    }

     public function viewEvent(){
        $event = Event::orderBy('id','DESC')->get();
        // dd($newsviewss);
        return view('admin.events.view-event')->with(compact('event'));
    }

    public function deleteEvent(Request $request, $id){
        Event::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Data deleted successfully');
    }


    // Expo section

    // add new Expo
    public function addExpo(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $expo = new Expo;
            $expo->title = $data['title'];

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999999) . '.' . $extension;
                    $newsviews_path = 'images/backend_images/expo/'.$filename;
                    Image::make($image_tmp)->save($newsviews_path);
                    $expo->image = $filename;
                }
            }
            $expo->save();
            return redirect('admin/view-expo')->with('flash_message_success','New record added successfully');
        }
        return view('admin.events.add-expoevent');
    }
    
    // edit specific Event
    public function editExpo(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(1111, 99999) . '.' . $extension;
                    $collaborate_path = 'images/backend_images/expo/' . $filename;
                    Image::make($image_tmp)->save($collaborate_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }
            Expo::where('id',$id)->update(['title'=>$data['title'],'image'=>$filename]);
            return redirect('admin/view-expo')->with('flash_message_success','New record updated successfully');
        }
        $expo = Expo::where('id',$id)->first();
        return view('admin.events.edit-expoevent')->with(compact('expo'));
    }

     public function viewExpo(){
        $expo = Expo::orderBy('id','DESC')->get();
        // dd($newsviewss);
        return view('admin.events.view-expoevent')->with(compact('expo'));
    }

    public function deleteExpo(Request $request, $id){
        Expo::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Data deleted successfully');
    }
}
