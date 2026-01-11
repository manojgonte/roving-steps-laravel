<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterEmail;
use Session;
use Image;

class NewsController extends Controller
{
    public function viewSubscribers(Request $request){
        $emails = NewsletterEmail::orderBy('id','DESC');
        if($request->q){
            $q = $request->q;
            $emails = $emails->where(function($query) use($q){
                $query->where('email','like','%'.$q.'%')
                ->orWhere('id','like','%'.$q.'%');
            });
        };

        $emails = $emails->paginate(10);
        return view('admin.newsletter.subscribers')->with(compact('emails'));
    }

    public function deleteSubscriber(Request $request, $id){
        NewsletterEmail::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Subsciber deleted successfully');
    }
}
