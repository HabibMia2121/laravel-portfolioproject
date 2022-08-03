<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class BannerController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('banner.create',[
            'banner_info'=>Banner::latest()->get(),
            'deleted_banners_data'=>Banner::onlyTrashed()->get(),
        ]);
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
            'banner_headline'=>'required|unique:banners',
            'banner_photo'=>'required|Image'
        ],[
            'banner_headline.required'=>'Please enter the banner headline then try!',
            'banner_headline.unique'=>'Already teken this name please new name take  then try!',
            'banner_photo.required'=>'Please enter the photo then try!',
        ]);
        //photo upload code start here
            // new photo name create
            $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('banner_photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload-photo-file/banner-photo/').$new_name;
            Image::make($request->file('banner_photo'))->resize(1920,1095)->save($save_link);
        //photo upload code end here
        Banner::insert([
            'banner_headline'=>$request->banner_headline,
            'banner_photo'=>'upload-photo-file/banner-photo/'.$new_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'banner_headline'=>'required',
        ],[
            'banner_headline.required'=>'Please enter the banner headline then try!',
        ]);
        if($request->new_photo == null){
            $banner->banner_headline=$request->banner_headline;
            // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink($request->old_photo);
                // step:1->new photo name create
                $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('upload-photo-file/banner-photo/').$name;
                Image::make($request->file('new_photo'))->resize(1920,1095)->save($save_link);
                $banner->banner_photo='upload-photo-file/banner-photo/'.$name;
            }
            // photo upload code endt here
            $banner->save();
            return back()->with('success_message','Edit completed!');
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
                    $save_link=public_path('upload-photo-file/banner-photo/').$name;
                    Image::make($request->file('new_photo'))->resize(1920,1095)->save($save_link);
                    $banner->banner_photo='upload-photo-file/banner-photo/'.$name;
                }
                // photo upload code endt here
            }
            else{
                return back()->with('file_format_error','there are one or many unsupported file in your attachment');
            }
            $banner->banner_headline=$request->banner_headline;
            $banner->save();
            return back()->with('success_message','Edit completed!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('delete_message','Deleted Completed!');
    }
    public function bannerRestore($id)
    {
        Banner::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function banner_forcedelete($id)
    {
        unlink(Banner::withTrashed()->find($id)->banner_photo);
        Banner::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
}



