<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Testimonial_header;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Image;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testimonial-area.index',[
            'testimonial_all'=>Testimonial::latest()->get(),
            'testimonial_delete_all'=>Testimonial::onlyTrashed()->get(),
            'testimonial_header_info'=>Testimonial_header::first(),
        ]);
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
           'title'=>'required',
           'subtitle'=>'required',
           'small_description'=>'required',
           'photo'=>'required',
        ],[
            'title.required'=>'Please enter the title name then try!',
            'subtitle.required'=>'Please enter the subtitle then try!',
            'small_description.required'=>'Please enter the subtitle then try!',
            'photo.required'=>'Please enter the photo then try!',
        ]);
        //photo upload code use start here
            // step:1->testimonial photo name create
            $new_name=Str::random(7).'.'.$request->file('photo')->getClientOriginalExtension();
            // step:2->testimonial photo upload
            $save_link=public_path('upload-photo-file/testimonial-photo/').$new_name;
            Image::make($request->file('photo'))->resize(100,101)->save($save_link);
        // photo upload code use end here

        Testimonial::insert($request->except(['_token','photo'])+[
            'photo'=>'upload-photo-file/testimonial-photo/'.$new_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('photo_success_message','Testimonial photo added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial-area.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'title.required'=>'Please enter the title name then try!',
            'subtitle.required'=>'Please enter the subtitle then try!',
            'small_description.required'=>'Please enter the subtitle then try!',
        ]);
        if($request->new_photo == null){
            $testimonial->title=$request->title;
            $testimonial->subtitle=$request->subtitle;
            $testimonial->small_description=$request->small_description;
            // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink($request->old_photo);
                // step:1->new photo name create
                $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('upload-photo-file/testimonial-photo/').$name;
                Image::make($request->file('new_photo'))->resize(100,101)->save($save_link);
                $testimonial->photo='upload-photo-file/testimonial-photo/'.$name;
            }
            // photo upload code endt here
            $testimonial->save();
            return back()->with('success_message','Update completed!');
        }
        else{
            $status=true;
            if(!in_array($request->new_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
            }
            if($status){
                // photo upload code start here
                if($request->hasFile('new_photo')){
                    unlink($request->old_photo);
                    // step:1->new photo name create
                    $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('upload-photo-file/testimonial-photo/').$name;
                    Image::make($request->file('new_photo'))->resize(100,101)->save($save_link);
                    $testimonial->photo='upload-photo-file/testimonial-photo/'.$name;
                }
                // photo upload code endt here
            }
            else{
                return back()->with('file_format_error','there are one or many unsupported file in your attachment');
            }
            $testimonial->title=$request->title;
            $testimonial->subtitle=$request->subtitle;
            $testimonial->small_description=$request->small_description;
            $testimonial->save();
            return back()->with('success_message','Update completed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('delete_message','testimonial item delete completed!');
    }
    // testimonial restore & forceDelete code start here
    public function restore($testimonial_restore_id)
    {
        Testimonial::onlyTrashed()->where('id',$testimonial_restore_id)->restore();
        return back();
    }
    public function force_delete($testimonial_forcedelete_id)
    {
        unlink(public_path(Testimonial::withTrashed()->find($testimonial_forcedelete_id)->photo));
        Testimonial::onlyTrashed()->where('id',$testimonial_forcedelete_id)->forceDelete();
        return back();
    }
    // testimonial restore & forceDelete code end here

    // testimonial header data area start
    public function testimonial_header(Request $request ,$testimonial_header_id)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'header_title.required'=>'Please enter the header title name then try!',
            'header_subtitle.required'=>'Please enter the header subtitle then try!',
        ]);
        Testimonial_header::find($testimonial_header_id)->update([
            'header_title'=>$request->header_title,
            'header_subtitle'=>$request->header_subtitle,
        ]);
        return back()->with('testimonial_head_update_message','testimonial header data update successfully!');
    }
    // testimonial header data area end
}
