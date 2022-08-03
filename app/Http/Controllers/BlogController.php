<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_head;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blog_delete_data=Blog::onlyTrashed()->get();
        $blog_data=Blog::all();
        $blog_head_data=Blog_head::first();
        return view('blog.index',compact('blog_head_data','blog_data','blog_delete_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=>'required',
            'blog_photo'=>'required|unique:blogs'
        ]);
        //photo upload code use start here
            // step:1->blog photo name create
            $name=Str::random(7).'.'.$request->file('blog_photo')->getClientOriginalExtension();
            // step:2->blog photo upload
            $save_link=public_path('upload-photo-file/blog-photo/').$name;
            Image::make($request->file('blog_photo'))->resize(800,570)->save($save_link);
        // photo upload code use end here
        Blog::insert([
            'title'=>$request->title,
            'long_description'=>$request->long_description,
            'blog_photo'=>'upload-photo-file/blog-photo/'.$name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Blog added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            '*'=>'required',
        ]);
        if($request->new_blog_photo == null){
            $blog->title=$request->title;
            $blog->long_description=$request->long_description;
            // photo upload code start here
            if($request->hasFile('new_blog_photo')){
                unlink($request->old_blog_photo);
                // step:1->new photo name create
                $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_blog_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('upload-photo-file/blog-photo/').$name;
                Image::make($request->file('new_blog_photo'))->resize(800,570)->save($save_link);
                $blog->blog_photo='upload-photo-file/blog-photo/'.$name;
            }
            // photo upload code endt here
            $blog->save();
            return back()->with('update_message','blog item update Successfully!');
        }
        else{
            $status=true;
            if(!in_array($request->new_blog_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
            }
            if($status){
                // photo upload code start here
                if($request->hasFile('new_blog_photo')){
                    unlink($request->old_blog_photo);
                    // step:1->new photo name create
                    $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_blog_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('upload-photo-file/blog-photo/').$name;
                    Image::make($request->file('new_blog_photo'))->resize(800,570)->save($save_link);
                    $blog->blog_photo='upload-photo-file/blog-photo/'.$name;
                }
                // photo upload code endt here
            }
            else{
                return back()->with('file_format_error','there are one or many unsupported file in your attachment');
            }
            $blog->title=$request->title;
            $blog->long_description=$request->long_description;
            $blog->save();
            return back()->with('update_message','blog item update Successfully!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('delete_message','Blog item delete completed!');
    }
    // blog header data area start
    public function blog_header(Request $request ,$blog_header_id)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'header_title.required'=>'Please enter the header title name then try!',
            'header_subtitle.required'=>'Please enter the header subtitle then try!',
        ]);
        Blog_head::find($blog_header_id)->update([
            'header_title'=>$request->header_title,
            'header_subtitle'=>$request->header_subtitle,
        ]);
        return back()->with('blog_head_update_message','Blog header data update successfully!');
    }
   // blog header data area end

   // subcategory restore & forceDelete code start here
   public function blog_restore($blog_restore_id)
   {
       Blog::onlyTrashed()->where('id',$blog_restore_id)->restore();
       return back();
   }
   public function blog_force_delete($blog_force_delete_id)
   {
       unlink(public_path(Blog::withTrashed()->find($blog_force_delete_id)->blog_photo));
       Blog::onlyTrashed()->where('id',$blog_force_delete_id)->forceDelete();
       return back();
   }
   // subcategory restore & forceDelete code end here
}
