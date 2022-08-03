<?php

namespace App\Http\Controllers;

use App\Models\About_area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class AboutAreaController extends Controller
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
        return view('about_area.index',[
            'about_info'=>About_area::latest()->get(),
            'deleted_info'=>About_area::onlyTrashed()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about_area.create');
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
            'text'=>'required|max:15',
            'headline'=>'required',
            'phone_number'=>'required',
            'email'=>'required|unique:about_areas',
            'address'=>'required',
            'short_description'=>'required',
            'photo'=>'required|Image'
        ],[
            'text.required'=>'Please enter the text then try!',
            'text.max'=>"Don't bring more than 15 characters here",
            'headline.required'=>'Please enter the headline then try!',
            'phone_number.required'=>'Please enter the phone_number then try!',
            'email.required'=>'Please enter the email then try!',
            'email.unique'=>'this email already taken please new email take then try!',
            'address.required'=>'Please enter the address then try!',
            'short_description.required'=>'Please enter the short_description then try!',
            'photo.required'=>'Please enter the photo then try!',
        ]);
        //photo upload code start here
            // new photo name create
            $new_name=auth()->id().'-'.Str::random(7).'.'.$request->file('photo')->getClientOriginalExtension();
            // new photo upload
            $save_link=public_path('upload-photo-file/about-photos/').$new_name;
            Image::make($request->file('photo'))->resize(702,837)->save($save_link);
        //photo upload code end here
        About_area::insert([
            'text'=>$request->text,
            'headline'=>$request->headline,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'address'=>$request->address,
            'short_description'=>$request->short_description,
            'photo'=>'upload-photo-file/about-photos/'.$new_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_message','Add Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About_area  $about_area
     * @return \Illuminate\Http\Response
     */
    public function show(About_area $about_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About_area  $about_area
     * @return \Illuminate\Http\Response
     */
    public function edit(About_area $about_area)
    {
        return view('about_area.edit',compact('about_area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About_area  $about_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About_area $about_area)
    {
        $request->validate([
            'text'=>'required',
            'headline'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'address'=>'required',
            'short_description'=>'required',
        ],[
            'text.required'=>'Please enter the text then try!',
            'headline.required'=>'Please enter the headline then try!',
            'phone_number.required'=>'Please enter the phone_number then try!',
            'email.required'=>'Please enter the email then try!',
            'address.required'=>'Please enter the address then try!',
            'short_description.required'=>'Please enter the short_description then try!',
        ]);
        if($request->new_photo == null){
            $about_area->text=$request->text;
            $about_area->headline=$request->headline;
            $about_area->phone_number=$request->phone_number;
            $about_area->email=$request->email;
            $about_area->address=$request->address;
            $about_area->short_description=$request->short_description;
            // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink($request->old_photo);
                // step:1->new photo name create
                $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('upload-photo-file/about-photos/').$name;
                Image::make($request->file('new_photo'))->resize(702,837)->save($save_link);
                $about_area->photo='upload-photo-file/about-photos/'.$name;
            }
            // photo upload code endt here
            $about_area->save();
            return back()->with('success_message','Edit completed!');
        }
        else{
            $status=true;
            if(!in_array($request->new_photo->getClientOriginalExtension(),['png','jpg','webp'])){
                $status=false;
            }
            if($status){
                if($request->hasFile('new_photo')){
                    unlink($request->old_photo);
                    // step:1->new photo name create
                    $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                    // step:2->new photo upload
                    $save_link=public_path('upload-photo-file/about-photos/').$name;
                    Image::make($request->file('new_photo'))->resize(702,837)->save($save_link);
                    $about_area->photo='upload-photo-file/about-photos/'.$name;
                }
            }
            else{
                return back()->with('file_format_error','there are one or many unsupported file in your attachment');
            }
            $about_area->text=$request->text;
            $about_area->headline=$request->headline;
            $about_area->phone_number=$request->phone_number;
            $about_area->email=$request->email;
            $about_area->address=$request->address;
            $about_area->short_description=$request->short_description;
            $about_area->save();
            return back()->with('success_message','Edit completed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About_area  $about_area
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_area $about_area)
    {
        $about_area->delete();
        return back()->with('deleted_message','Deleted Completed!');
    }
    public function aboutRestore($id)
    {
        About_area::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function about_forcedelete($id)
    {
        unlink(About_area::withTrashed()->find($id)->photo);
        About_area::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }
}
