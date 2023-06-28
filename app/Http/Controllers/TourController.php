<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourItinerary;
use App\Models\Tour;
use Image;
use Auth;

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
            $tour->dest_id = $data['dest_id'];
            $tour->description = $data['description'];
            $tour->adult_price = $data['adult_price'];
            $tour->child_price = $data['child_price'];
            $tour->from_date = $data['from_date'];
            $tour->end_date = $data['end_date'];
            $tour->days = $data['days'];
            $tour->nights = $data['nights'];
            $tour->amenities = $data['amenities'];
            $tour->inclusions = $data['inclusions'];
            $tour->exclusions = $data['exclusions'];
            $tour->note = $data['note'];
            $tour->is_popular = !empty($data['is_popular']) ? $data['is_popular'] : '0' ;
            $tour->status = '1';

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
            return redirect('itinerary-builder/'.$tour->id)->with('flash_message_success','New tour added successfully');
        }
        return view('admin.tour.add_tour');
    }

    public function editTour(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
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

            Tour::where('id',$id)->update([
                'tour_name'=>$data['tour_name'],
                'image'=>$filename,
                'type' => $data['type'],
                'dest_id' => $data['dest_id'],
                'description' => $data['description'],
                'adult_price' => $data['adult_price'],
                'child_price' => $data['child_price'],
                'from_date' => $data['from_date'],
                'end_date' => $data['end_date'],
                'days' => $data['days'],
                'nights' => $data['nights'],
                'amenities' => $data['amenities'],
                'inclusions' => $data['inclusions'],
                'exclusions' => $data['exclusions'],
                'note' => $data['note'],
                'is_popular' => !empty($data['is_popular']) ? $data['is_popular'] : '0',
            ]);
            return redirect('admin/tours')->with('flash_message_success','New record updated successfully');
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
        $tours = Tour::orderBy('id','DESC');
        if (empty($status) || $status == 'ongoing') {
            $tours = $tours->whereRaw('? between from_date and end_date', [$now]);
        } elseif ($status == 'upcoming') {
            $tours = $tours->where('from_date', '>', $now);
        } elseif ($status == 'completed') {
            $tours = $tours->where('end_date', '<', $now);
        }
        $tours = $tours->paginate(10);
        return view('admin.tour.view_tours')->with(compact('tours'));
    }

    public function tourPlanner(Request $request, $status=null){
        $tours = Tour::orderBy('id','DESC')->paginate(10);
        return view('admin.tour.tour_planner')->with(compact('tours'));
    }

    public function itineraryBuilder(Request $request, $id){
        $tour = Tour::select('tours.*', 'destinations.name as dest_name')
                ->leftJoin('destinations','destinations.id','tours.dest_id')
                ->where('tours.id', $id)
                ->first();
        return view('admin.tour.itinerary_builder')->with(compact('tour'));
    }

    public function addTourItinerary(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            foreach ($data['day'] as $key => $val){
                if(!empty($val)){
                    $itinerary = new TourItinerary;
                    $itinerary->tour_id       = $id;
                    $itinerary->day           = $val;
                    $itinerary->visit_place   = $data['visit_place'][$key];
                    $itinerary->activity      = $data['activity'][$key];
                    $itinerary->travel_option = $data['travel_option'][$key];
                    $itinerary->description   = $data['description'][$key];
                    $itinerary->stay          = $data['stay'][$key];
                    $itinerary->food          = $data['food'][$key];

                    if($request->hasFile('image')) {
                        $image_tmp = $data['image'][$key];
                        $filename = time() . '.' . $image_tmp->clientExtension();
                        if ($image_tmp->isValid()) {
                            $extension = $image_tmp->getClientOriginalExtension();
                            $filename = strtotime("now") . '.' . $extension;
                            $file_path = 'img/tours/tour_itinerary/'.$filename;
                            Image::make($image_tmp)->save($file_path);
                            $itinerary->image = $filename;
                        }
                    }

                    $itinerary->save();
                }
            }
            return redirect()->back()->with('flash_message_success','Tour itinerary added successfully!');
        }
        return redirect('admin/add-tour-itinerary/'.$id);
    }

}
