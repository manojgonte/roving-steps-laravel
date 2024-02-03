<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TourItinerary;
use App\Models\Tour;
use App\Models\PlannedTour;
use App\Models\Enquiry;
use App\Models\TourEnquiry;
use App\Services\MailchimpService;
use Image;
use Auth;
use Mail;
use PDF;
use Illuminate\Support\Facades\View;

class TourController extends Controller
{

    // admin methods
    public function addTour(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $tour = new Tour;
            $tour->tour_name = $data['tour_name'];
            $tour->type = $data['type'];
            $tour->special_tour_type = !empty($data['special_tour_type']) ? request('special_tour_type') : null;
            $tour->dest_id = $data['dest_id'];
            $tour->rating = $data['rating'];
            $tour->description = !empty($data['description']) ? $data['description'] : null;
            $tour->adult_price = $data['adult_price'];
            $tour->child_price = !empty($data['child_price']) ? $data['child_price'] : null;
            $tour->from_date = !empty($data['from_date']) ? $data['from_date'] : null;
            $tour->end_date = !empty($data['end_date']) ? $data['end_date'] : null;
            $tour->days = $data['days'];
            $tour->nights = $data['nights'];
            $tour->amenities = $data['amenities'];
            $tour->inclusions = !empty($data['inclusions']) ? $data['inclusions'] : null;;
            $tour->exclusions = !empty($data['exclusions']) ? $data['exclusions'] : null;;
            $tour->note = !empty($data['note']) ? $data['note'] : null;
            $tour->is_popular = !empty($data['is_popular']) ? $data['is_popular'] : '0' ;
            $tour->status = '0';

            // image save in folder
            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'img/tours/'.$filename;
                    Image::make($image_tmp)->save($file_path);
                    $tour->image = $filename;
                }
            }
            $tour->save();
            return redirect('admin/itinerary-builder/'.$tour->id)->with('flash_message_success','New tour added successfully');
        }
        return view('admin.tour.add_tour');
    }

    public function editTour(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            // image save in folder
            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'img/tours/' . $filename;
                    Image::make($image_tmp)->save($file_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }

            // detail update
            Tour::where('id',$id)->update([
                'tour_name'=>$data['tour_name'],
                'image'=>$filename,
                'type' => $data['type'],
                'special_tour_type' => !empty($data['special_tour_type']) ? $data['special_tour_type'] : null,
                'rating' => $data['rating'],
                'dest_id' => $data['dest_id'],
                'description' => $data['description'],
                'adult_price' => $data['adult_price'],
                'child_price' => !empty($data['child_price']) ? $data['child_price'] : null,
                'from_date' => !empty($data['from_date']) ? $data['from_date'] : null,
                'end_date' => !empty($data['end_date']) ? $data['end_date'] : null,
                'days' => $data['days'],
                'nights' => $data['nights'],
                'amenities' => $data['amenities'],
                'inclusions' => $data['inclusions'],
                'exclusions' => $data['exclusions'],
                'note' => !empty($data['note']) ? $data['note'] : null,
                'is_popular' => !empty($data['is_popular']) ? $data['is_popular'] : '0',
            ]);
            return redirect('admin/itinerary-builder/'.$id)->with('flash_message_success','Tour details updated successfully');
        }
        $tour = Tour::where('id',$id)->first();
        return view('admin.tour.edit_tour')->with(compact('tour'));
    }

    public function deleteTour(Request $request, $id){
        Tour::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Tour deleted successfully');
    }

    public function viewTours(Request $request, $status=null){
        $now = date('Y-m-d');
        $tours = PlannedTour::with('tour')->orderBy('id','DESC');

        // filters
        if($request->dest_id){
            $tours = $tours->whereHas('tour', function($query) use ($request) {
                $query->where('dest_id', $request->dest_id);
            });
        }

        if($request->type){
            $tours = $tours->whereHas('tour', function($query) use ($request) {
                $query->where('type', $request->type);
            });
        }

        if ($request->q) {
            $q = $request->q;
            $tours = $tours->where(function ($query) use ($q) {
                $query->where('from_date', 'like', '%' . $q . '%')
                    ->orWhere('end_date', 'like', '%' . $q . '%')
                    ->orWhereHas('tour', function ($subquery) use ($q) {
                        $subquery->where('tour_name', 'like', '%' . $q . '%')
                            ->orWhere('description', 'like', '%' . $q . '%');
                    });
            });
        }

        if (empty($status) || $status == 'draft') {
            $tours = $tours->where('status',0);
        }elseif ($status == 'ongoing') {
            $tours = $tours->where('status',1)->whereRaw('? between from_date and end_date', [$now]);
        } elseif ($status == 'upcoming') {
            $tours = $tours->where('status',1)->where('from_date', '>', $now);
        } elseif ($status == 'completed') {
            $tours = $tours->where('status',1)->where('end_date', '<', $now);
        }
        $tours = $tours->paginate(10);

        $destinations = Tour::select('tours.id','tours.dest_id','destinations.name as destination')
            ->leftJoin('destinations','destinations.id','tours.dest_id')
            ->orderBy('destinations.name','ASC')
            ->groupBy('tours.dest_id')
            ->get();
        return view('admin.tour.view_tours')->with(compact('tours','destinations'));
    }

    public function tourPlanner(Request $request, $status=null){
        $status = (empty($status) || $status == 0) ? 0 : 1;
        $tours = Tour::select('tours.id','tours.tour_name','tours.type','tours.dest_id','tours.from_date','tours.end_date','tours.days','tours.nights','tours.status','tours.updated_at','destinations.name as destination')
            ->leftJoin('destinations','destinations.id','tours.dest_id')
            ->orderBy('tours.id','DESC')
            ->where('tours.status',$status);

        if($request->dest_id){
            $tours = $tours->where('tours.dest_id', $request->dest_id);
        }
        if($request->type){
            $tours = $tours->where('tours.type', $request->type);
        }
        if($request->q){
            $q = $request->q;
            $tours = $tours->where(function($query) use($q){
                $query->where('tours.tour_name','like','%'.$q.'%')
                ->orWhere('tours.description','like','%'.$q.'%');
            });
        }
        $tours = $tours->paginate(10);

        $destinations = Tour::select('tours.id','tours.dest_id','destinations.name as destination')
            ->leftJoin('destinations','destinations.id','tours.dest_id')
            ->orderBy('destinations.name','ASC')
            ->groupBy('tours.dest_id')
            ->get();

        return view('admin.tour.tour_planner')->with(compact('tours','destinations'));
    }

    public function planTour(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $tour = new PlannedTour;
            $tour->tour_id = $data['tour_id'];
            $tour->customer_name = $data['customer_name'];
            $tour->tourist_count = $data['tourist_count'];
            $tour->from_date = !empty($data['from_date']) ? $data['from_date'] : null;
            $tour->end_date = !empty($data['end_date']) ? $data['end_date'] : null;
            $tour->status = !empty($data['status']) ? $data['status'] : 0;

            $tour->save();
            return redirect('admin/tours/')->with('flash_message_success','Tour added successfully');
        }
        return view('admin.tour.plan_tour');
    }

    public function editPlanTour(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            // detail update
            PlannedTour::where('id',$id)->update([
                'tour_id'=>$data['tour_id'],
                'customer_name'=>$data['customer_name'],
                'tourist_count' => $data['tourist_count'],
                'from_date' => !empty($data['from_date']) ? $data['from_date'] : null,
                'end_date' => !empty($data['end_date']) ? $data['end_date'] : null,
                'status' => !empty($data['status']) ? $data['status'] : 0
            ]);
            return redirect('admin/tours')->with('flash_message_success','Tour details updated successfully');
        }
        $tour = PlannedTour::where('id',$id)->first();
        return view('admin.tour.edit_plan_tour')->with(compact('tour'));
    }

    public function updateCustomTourStatus(Request $request, $id){
        if($request->status == '1'){
            $status='1';
        }else{
            $status='0';
        }
        PlannedTour::where(['id'=>$id])->update(['status'=>$status]);
        return redirect()->back();
    }

    public function deletePlanTour(Request $request, $id){
        PlannedTour::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Tour deleted successfully');
    }

    public function updateTourStatus(Request $request, $id){
        if($request->status == '1'){
            $status='1';
        }else{
            $status='0';
        }
        Tour::where(['id'=>$id])->update(['status'=>$status]);
        return redirect()->back();
    }

    public function itineraryBuilder(Request $request, $id){
        $tour = Tour::with('itinerary')
                ->select('tours.*', 'destinations.name as dest_name', 'special_tours.title as special_tour')
                ->leftJoin('destinations','destinations.id','tours.dest_id')
                ->leftJoin('special_tours','special_tours.id','tours.special_tour_type')
                ->where('tours.id', $id)
                ->first();
        return view('admin.tour.itinerary_builder')->with(compact('tour'));
    }

    public function addTourItinerary(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            $itinerary = new TourItinerary;
            $itinerary->tour_id       = $id;
            $itinerary->day           = $data['day'];
            $itinerary->visit_place   = $data['visit_place'];
            $itinerary->activity      = $data['activity'];
            $itinerary->travel_option = $data['travel_option'];
            $itinerary->description   = $data['description'];
            $itinerary->stay          = $data['stay'];
            $itinerary->food          = $data['food'];

            if($request->hasFile('image')) {
                $image_tmp = $data['image'];
                if ($image_tmp->isValid()) {
                    $filename = strtotime("now").'-'. $image_tmp->getClientOriginalName();
                    $file_path = 'img/tours/tour_itinerary/'.$filename;
                    Image::make($image_tmp)->save($file_path);
                    $itinerary->image = $filename;
                }
            }

            $itinerary->save();
            return redirect()->back()->with('flash_message_success','Tour itinerary added successfully!');
        }
        return redirect('admin/add-tour-itinerary/'.$id);
    }

    public function editTourItinerary(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            $visit_place   = $data['visit_place'];
            $activity      = $data['activity'];
            $travel_option = $data['travel_option'];
            $description   = $data['description'];
            $stay          = $data['stay'];
            $food          = $data['food'];

            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                if ($image_tmp->isValid()) {
                    $filename = strtotime("now").'-'. $image_tmp->getClientOriginalName();
                    $file_path = 'img/tours/tour_itinerary/' . $filename;
                    Image::make($image_tmp)->save($file_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }

            // detail update
            TourItinerary::where(['id'=>$id])->update([
                'visit_place' => $visit_place,
                'activity' => $activity,
                'travel_option' => $travel_option,
                'description' => $description,
                'stay' => $stay,
                'food' => $food,
                'image'=>$filename,
            ]);
            return redirect('admin/itinerary-builder/'.$data['tour_id'])->with('flash_message_success','Itinerary updated successfully!');
        }

        $itinerary = TourItinerary::where('id', $id)->first();
        return view('admin.tour.edit_itinerary_builder', ['id' => $id, 'itinerary' => $itinerary]);
    }

    public function deleteItinerary(Request $request, $id){
        $itinerary = TourItinerary::select('id','image')->where('id',$id)->first();
        if(file_exists('img/tours/tour_itinerary/'.$itinerary->image)){
            unlink('img/tours/tour_itinerary/'.$itinerary->image);
        }

        TourItinerary::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Itinerary deleted successfully');
    }

    public function enquiries(Request $request, $status=null){
        $enquiry = Enquiry::orderBy('id','DESC')->paginate(10);
        return view('admin.enquiries.enquiries')->with(compact('enquiry'));
    }

    public function deleteEnquiry(Request $request, $id){
        $enquiry = Enquiry::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Enquiry deleted');
    }

    public function tourEnquiries(Request $request, $status=null){
        $tour_enquiry = TourEnquiry::select('tour_enquiry.*','tours.id as tour_id','tours.tour_name')
            ->leftJoin('tours','tour_enquiry.tour_id','tours.id')
            ->orderBy('tour_enquiry.id','DESC');

        if($request->tour_id){
            $tour_enquiry = $tour_enquiry->where('tour_enquiry.tour_id', $request->tour_id);
        }
        if($request->q){
            $q = $request->q;
            $tour_enquiry = $tour_enquiry->where(function($query) use($q){
                $query->where('tour_enquiry.name','like','%'.$q.'%')
                ->orWhere('tour_enquiry.contact','like','%'.$q.'%')
                ->orWhere('tour_enquiry.email','like','%'.$q.'%')
                ->orWhere('tour_enquiry.message','like','%'.$q.'%');
            });
        }
        $tour_enquiry = $tour_enquiry->paginate(10);

        $tours = TourEnquiry::select('tour_enquiry.id','tour_enquiry.tour_id','tours.tour_name')
            ->leftJoin('tours','tours.id','tour_enquiry.tour_id')
            ->orderBy('tour_enquiry.id','DESC')
            ->groupBy('tour_enquiry.tour_id')
            ->get();
        return view('admin.tour.tour-enquiries')->with(compact('tour_enquiry','tours'));
    }

    public function shareTour(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $email = $data['email'];
            $subject = $data['subject'];

            $tour = Tour::with('itinerary')->select('tours.*','destinations.name as dest_name')
                ->leftJoin('destinations','destinations.id','tours.dest_id')
                ->where('tours.id', $data['tour_id'])
                ->orderBy('tours.id','DESC')
                ->first();
                // dd($tour);
            $tourname = Str::slug($tour->tour_name);

            $pdf = PDF::loadView('emails.share_tour_attachment', compact('data','tour'));
            $pdf = $pdf->output();
            // return $pdf->stream();

            $email = [$email];
            $messageData = [
                'data' => $data,
                'tour' => $tour
            ];

            Mail::send('emails.share_tour',$messageData,function($message) use($email,$subject,$pdf,$tourname){
                $message->to($email)->subject($subject . ' | '. config('app.name'));
                $message->attachData($pdf, $tourname.'-tour-details.pdf');
            });
            
            return redirect()->back()->with('flash_message_success','Mail sent');
        }
        return redirect()->back();
    }

    public function downloadTour(Request $request, $id){
            $tour = Tour::with('itinerary')->select('tours.*','destinations.name as dest_name')
                ->leftJoin('destinations','destinations.id','tours.dest_id')
                ->where('tours.id', $id)
                ->orderBy('tours.id','DESC')
                ->first();
            $tour->image_path = public_path('img/tours/'.$tour->image);
            $tourname = Str::slug($tour->tour_name);
            // return view('emails.share_tour_attachment')->with(compact('tour'));
            $pdf = PDF::setOptions([
                'images' => true,
            ])->loadView('emails.share_tour_attachment', compact('tour'))->setPaper('a4', 'portrait');
            return $pdf->download($tourname.'-tour-details.pdf');
            // return $pdf->stream($tourname.'-tour-details.pdf');
            $pdf = $pdf->output();
            // return view('emails.share_tour_attachment')->with(compact('tour'));
    }

    public function viewDestinations(Request $request) {
        $destinations = Destination::orderBy('name','ASC');

        if($request->status){
            $status = (empty($request->status) || $request->status == 'inactive') ? 0 : 1;
            $destinations = $destinations->where('status', $status);
        }
        if($request->type){
            $destinations = $destinations->where('type', $request->type);
        }
        if($request->q){
            $q = $request->q;
            $destinations = $destinations->where(function($query) use($q){
                $query->where('name','like','%'.$q.'%')
                ->orWhere('description','like','%'.$q.'%');
            });
        }
        $destinations = $destinations->paginate(10);
        return view('admin.destinations.view-destinations')->with(compact('destinations'));
    }

    public function addDestination(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $destination = new Destination;
            $destination->name = $data['destination_name'];
            $destination->description = !empty($data['description']) ? $data['description'] : null;
            $destination->type = $data['type'];
            $destination->is_popular = !empty($data['is_popular']) ? $data['is_popular'] : '0' ;
            $destination->status = !empty($data['status']) ? $data['status'] : '0' ;

            // image save in folder
            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'img/destinations/'.$filename;
                    Image::make($image_tmp)->save($file_path);
                    $destination->image = $filename;
                }
            }
            $destination->save();
            return redirect('admin/view-destinations/')->with('flash_message_success','New destination added successfully');
        }
        return view('admin.destinations.add-destination');
    }

    public function editDestination(Request $request, $id) {
        if($request->isMethod('post')){
            $data = $request->all();
            // image save in folder
            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                $filename = time() . '.' . $image_tmp->clientExtension();
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'img/destinations/' . $filename;
                    Image::make($image_tmp)->save($file_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }

            // detail update
            Destination::where('id',$id)->update([
                'name'=>$data['destination_name'],
                'image'=>$filename,
                'description'=>!empty($data['description']) ? $data['description'] : null,
                'type'=>$data['type'],
                'status'=>!empty($data['status']) ? $data['status'] : '0',
                'is_popular' => !empty($data['is_popular']) ? $data['is_popular'] : '0'
            ]);

            return redirect('admin/view-destinations')->with('flash_message_success','Destination details updated successfully');
        }
        $destination = Destination::where('id',$id)->first();
        return view('admin.destinations.edit-destination')->with(compact('destination'));
    }

    public function deleteDestination(Request $request, $id) {
        Destination::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Destionation deleted successfully');
    }
}
