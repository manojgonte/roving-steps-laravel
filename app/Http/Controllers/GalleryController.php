<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Image;

class GalleryController extends Controller
{
    public function viewPhotos() {
        $photos = Gallery::orderBy('id','DESC')->paginate(12);
        return view('admin.gallery.view_gallery')->with(compact('photos'));
    }

    public function addPhotos(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();

            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new Gallery;
                    $filename = strtotime("now").'-'. $file->getClientOriginalName();
                    $file_path = 'img/gallery/'.$filename;
                    Image::make($file)->save($file_path);
                    $image->image = $filename;
                    $image->save();
                }   
            }
            return redirect('admin/gallery/')->with('flash_message_success','Photos added successfully');
        }
    }

    public function editPhoto(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);

            $photo = Gallery::select('id','image')->where('id',$data['id'])->first();
            if(file_exists('img/gallery/'.$photo->image)){
                unlink('img/gallery/'.$photo->image);
            }

            // image save in folder
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = strtotime("now").'-'. $file->getClientOriginalName();
                $file_path = 'img/gallery/'.$filename;
                Image::make($file)->save($file_path);
            }

            // detail update
            Gallery::where('id',$data['id'])->update([
                'image'=>$filename,
            ]);
            
            return redirect()->back()->with('flash_message_success','Photo updated successfully');
        }
    }

    public function deletePhoto(Request $request, $id) {
        $photo = Gallery::select('id','image')->where('id',$id)->first();
        if(file_exists('img/gallery/'.$photo->image)){
            unlink('img/gallery/'.$photo->image);
        }
        Gallery::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Photo deleted successfully');
    }

    public function getGalleryImages(Request $request) {
        $galleryImages = Gallery::orderBy('id', 'DESC')->paginate(12);
        return view('admin.gallery_images_partial', compact('galleryImages'))->render();
    }
}
