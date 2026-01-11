<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogLike;
use Session;
use Auth;
use Image;

class BlogController extends Controller
{
    
    public function viewBlogs(Request $request){
        $blogs = Blog::with('likes')->orderBy('id','DESC');
        if($request->q){
            $q = $request->q;
            $blogs = $blogs->where(function($query) use($q){
                $query->where('title','like','%'.$q.'%')
                ->orWhere('blog_content','like','%'.$q.'%')
                ->orWhere('author','like','%'.$q.'%')
                ->orWhere('thumbnail','like','%'.$q.'%')
                ->orWhere('id','like','%'.$q.'%');
            });
        };

        $blogs = $blogs->paginate(10);
        return view('admin.blog.blogs')->with(compact('blogs'));
    }

    public function addBlog(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $blog = new Blog;

            if ($request->hasFile('thumbnail')) {
                $image_tmp = $data['thumbnail'];
                if ($image_tmp->isValid()) {
                    $filename = strtotime("now") . '-' . $image_tmp->getClientOriginalName();
                    $file_path = 'img/blogs/' . $filename;
                    Image::make($image_tmp)->save($file_path);
                    $blog->thumbnail = $filename;
                }
            }

            $blog->title = $data['title'];
            $blog->blog_content = $data['blog_content'];
            $blog->author = $data['author'] ?? null;
            $blog->status = isset($data['status']) ? 1 : 0;

            $blog->save();
            return redirect('admin/blogs/')->with('flash_message_success','New blog added successfully');
        }
        return view('admin.blog.add_blog');
    }

    public function editBlog(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $image_tmp = $request->thumbnail;
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalName();
                    $filename = strtotime("now").'.'. $extension;
                    $collaborate_path = 'img/blogs/' . $filename;
                    Image::make($image_tmp)->save($collaborate_path);
                }
            } else if (!empty($data['current_thumbnail'])) {
                $filename = $data['current_thumbnail'];
            } else {
                $filename = null;
            }

            // detail update
            Blog::where('id',$id)->update([
                'title'=>$data['title'],
                'blog_content' => $data['blog_content'],
                'author' => $data['author'],
                'status' => isset($data['status']) ? 1 : 0,
                'thumbnail'=>$filename,
            ]);
            return redirect('admin/blogs/')->with('flash_message_success','Blog updated successfully');
        }
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.edit_blog')->with(compact('blog'));
    }

    public function deleteBlog(Request $request, $id){
        Blog::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Blog deleted successfully');
    }

    public function likeBlog(Request $request, $id) {
        $liked = BlogLike::where(['blog_id'=>$id,'user_ip'=>$request->ip()])->first();
        if($liked){
            BlogLike::where(['blog_id'=>$id,'user_ip'=>$request->ip()])->delete();
            return redirect()->back();
        }
        else{
            $bloglike = new BlogLike;
            $bloglike->blog_id = $id;
            $bloglike->user_ip = $request->ip();
            $bloglike->save();
            return redirect()->back();
        }
    }
}
