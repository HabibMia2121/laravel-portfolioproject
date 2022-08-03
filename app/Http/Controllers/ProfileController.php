<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class ProfileController extends Controller
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
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
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
            'name'=>'required',
            'email'=>'required',
        ]);
        User::find(auth()->id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
        ]);

        // photo upload code start here
        if($request->hasFile('profile_photo')){
            // step:3->old profile photo deleted from file
            if(auth()->user()->profile_photo != 'default_profile_photo.jpg'){
                unlink(public_path('upload-photo-file/profile-photo/').auth()->user()->profile_photo);
            }
            // step:1->profile photo name create
            $name=auth()->id().'-'.Str::random(7).'.'.$request->file('profile_photo')->getClientOriginalExtension();
            // step:2->profile photo upload
            $save_link=public_path('upload-photo-file/profile-photo/').$name;
            Image::make($request->file('profile_photo'))->resize(221,232)->save($save_link);
            // photo upload code end here
            User::find(auth()->id())->update([
                'profile_photo'=>$name,
            ]);
        }
        // cover photo upload code start here
        if($request->hasFile('cover_photo')){
            // step:3->old cover photo deleted from file
            if(auth()->user()->cover_photo != 'default_cover_photo.jpg'){
                unlink(public_path('upload-photo-file/cover-photo/').auth()->user()->cover_photo);
            }
            // step:1->cover photo name create
            $name_cover_photo=auth()->id().'-'.Str::random(7).'.'.$request->file('cover_photo')->getClientOriginalExtension();
            // step:2->cover photo upload
            $save_link=public_path('upload-photo-file/cover-photo/').$name_cover_photo;
            Image::make($request->file('cover_photo'))->resize(1600,451)->save($save_link);
            // cover photo upload code end here
            User::where('id',auth()->id())->update([
                'cover_photo'=>$name_cover_photo,
            ]);
        }
        return back()->with('success-message','Change successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|alpha_num|min:8',
            'password_confirmation'=>'required',
        ]);

        if($request->current_password == $request->password){
            return back()->withErrors(['wrong_password'=>'your new password can not same as current password']);
        }
        if(Hash::check($request->current_password,auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('password_success','New password set successfully!');
        }
        else{
            return back()->withErrors(['wrong_password'=>'current password is wrong please try again']);
        }
    }
    public function aboutSetting(Request $request)
    {
        $request->validate([
            'short_description'=>'required',
        ]);
        User::find(auth()->id())->update([
            'short_description'=>$request->short_description,
            'availability'=>$request->availability,
            'age'=>$request->age,
            'year_experience'=>$request->year_experience,
        ]);
        return back()->with('success-message','Update successfuly!');
    }

}

