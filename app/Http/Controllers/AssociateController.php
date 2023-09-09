<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourEnquiry;
use App\Models\Associates;
use Session;
use Auth;
use Mail;
use Hash;

class AssociateController extends Controller
{
    public function viewAssociates(Request $request){
        $associates = Associates::orderBy('id','DESC')->paginate(10);
        return view('admin.associates.associated-users')->with(compact('associates'));
    }

    public function addAssociate(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $associate = new Associates();
            $associate->name = $data['associates_name'];
            $associate->email = $data['associates_email'];
            $associate->contact = $data['associates_contact'];
            // $associate->tour_id = $data['tour_id'];
            // $associate->tour_name = $data['tour_name'];

            $associate->save();
            return redirect('admin/associated-users/')->with('flash_message_success','New associated added successfully');
        }
        return view('admin.Associates.add-associate');
    }

    public function editAssociates(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            // detail update
            Associates::where('id',$id)->update([
                'name'=>$data['associates_name'],
                'email'=>$data['associates_email'],
                'contact'=>$data['associates_contact'],
            ]);

            return redirect('admin/associated-users/')->with('flash_message_success','Associated updated successfully');
        }
        $associate = Associates::where('id',$id)->first();
        return view('admin.Associates.edit-associate')->with(compact('associate'));
    }

    public function deleteAssociates(Request $request, $id) {
        Associates::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Associate user deleted successfully');
    }
}