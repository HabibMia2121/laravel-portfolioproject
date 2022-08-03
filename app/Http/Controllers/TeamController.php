<?php

namespace App\Http\Controllers;

use App\Models\Hire_area;
use App\Models\Team;
use App\Models\Team_header;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class TeamController extends Controller
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
        return view('team-area.index',[
            'team_all'=>Team::latest()->get(),
            'team_delete_all'=>Team::onlyTrashed()->get(),
            'team_header_all'=>Team_header::first(),
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
            'title'=>'required|unique:teams',
            'subtitle'=>'required',
            'photo'=>'required|unique:teams',
        ],[
            'title.required'=>'Please enter the title name then try!',
            'title.unique'=>'Already teken this name please new name take  then try!',
            'subtitle.required'=>'Please enter the subtitle then try!',
            'photo.required'=>'Please enter the photo then try!',
            'photo.unique'=>'Already teken this photo please new photo take  then try!',
        ]);
        //photo upload code use start here
            // step:1->team photo name create
            $name=Str::random(7).'.'.$request->file('photo')->getClientOriginalExtension();
            // step:2->team photo upload
            $save_link=public_path('upload-photo-file/team-photo/').$name;
            Image::make($request->file('photo'))->resize(700,892)->save($save_link);
        // photo upload code use end here

        Team::insert([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'photo'=>'upload-photo-file/team-photo/'.$name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('photo_success_message','Team photo added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team-area.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'title.required'=>'Please enter the title name then try!',
            'subtitle.required'=>'Please enter the subtitle then try!',
        ]);
        if($request->new_photo == null){
            $team->title=$request->title;
            $team->subtitle=$request->subtitle;
            // photo upload code start here
            if($request->hasFile('new_photo')){
                unlink($request->old_photo);
                // step:1->new photo name create
                $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_photo')->getClientOriginalExtension();
                // step:2->new photo upload
                $save_link=public_path('upload-photo-file/team-photo/').$name;
                Image::make($request->file('new_photo'))->resize(700,892)->save($save_link);
                $team->photo='upload-photo-file/team-photo/'.$name;
            }
            // photo upload code endt here
            $team->save();
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
                    $save_link=public_path('upload-photo-file/team-photo/').$name;
                    Image::make($request->file('new_photo'))->resize(700,892)->save($save_link);
                    $team->photo='upload-photo-file/team-photo/'.$name;
                }
                // photo upload code endt here
            }
            else{
                return back()->with('file_format_error','there are one or many unsupported file in your attachment');
            }
            $team->title=$request->title;
            $team->subtitle=$request->subtitle;
            $team->save();
            return back()->with('success_message','Update completed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('delete_message','team item delete completed!');
    }
    // team restore & forceDelete code start here
    public function restore($team_restore_id)
    {
        Team::onlyTrashed()->where('id',$team_restore_id)->restore();
        return back();
    }
    public function force_delete($team_forcedelete_id)
    {
        unlink(public_path(Team::withTrashed()->find($team_forcedelete_id)->photo));
        Team::onlyTrashed()->where('id',$team_forcedelete_id)->forceDelete();
        return back();
    }
    // team restore & forceDelete code end here

    // team header data area start
     public function team_header(Request $request ,$team_header_id)
     {
         $request->validate([
             '*'=>'required',
         ],[
             'header_title.required'=>'Please enter the header title name then try!',
             'header_subtitle.required'=>'Please enter the header subtitle then try!',
         ]);
         Team_header::find($team_header_id)->update([
             'header_title'=>$request->header_title,
             'header_subtitle'=>$request->header_subtitle,
         ]);
         return back()->with('team_head_update_message','team header data update successfully!');
     }
    // team header data area end

    // hire area code start here
     public function hire_area()
     {
        $hire_data=Hire_area::first();
        return view('hire-area.index',compact('hire_data'));
     }
     public function hire_update(Request $request,$hire_id)
     {
        $request->validate([
            '*'=>'required',
        ],[
            'short_description.required'=>'Please enter the short description then try!',
        ]);
        Hire_area::find($hire_id)->update([
            'short_description'=>$request->short_description,
        ]);
        return back()->with('hire_update_message','hire data update successfully!');
     }
    // hire area code end here

}
