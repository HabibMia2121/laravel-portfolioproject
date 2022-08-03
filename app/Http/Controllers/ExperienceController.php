<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Experience_Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExperienceController extends Controller
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
        return view('experience.index',[
            'experience_all_data'=>Experience::latest()->get(),
            'experience_delete_all'=>Experience::onlyTrashed()->get(),
            'experience_Icon_all'=>Experience_Icon::first(),
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
            'experience_name'=>'required|unique:experiences',
            'experience_subtitle'=>'required|unique:experiences',
        ],[
            'experience_name.required'=>'Please enter the experience name then try!',
            'experience_name.unique'=>'Already teken this name please new name take  then try!',
            'experience_subtitle.required'=>'Please enter the experience subtitle then try!',
            'experience_subtitle.unique'=>'Already teken this name please new name take  then try!',
        ]);
        Experience::insert($request->except('_token')+ [
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('experience.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'experience_name'=>'required|unique:experiences,experience_name,'.$experience->id,
            'experience_subtitle'=>'required|unique:experiences,experience_subtitle,'.$experience->id,
        ],[
            'experience_name.required'=>'Please enter the experience name then try!',
            'experience_name.unique'=>'Already teken this name please new name take  then try!',
            'experience_subtitle.required'=>'Please enter the experience subtitle then try!',
            'experience_subtitle.unique'=>'Already teken this name please new name take  then try!',
        ]);
        $experience->experience_name=$request->experience_name;
        $experience->experience_subtitle=$request->experience_subtitle;
        $experience->save();
        return back()->with('success_message','experience item update successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('experience_delete_message','experience item delete completed!');
    }
    // experience restore & forceDelete code start here
    public function experience_restore($experience_restore_id)
    {
        Experience::onlyTrashed()->where('id',$experience_restore_id)->restore();
        return back();
    }
    public function forceDelete($experience_forcedelete_id)
    {
        Experience::onlyTrashed()->where('id',$experience_forcedelete_id)->forceDelete();
        return back();
    }
    // experience restore & forceDelete code end here
     // Experience icon update code start
     public function experience_icon_update(Request $request ,$experience_icon_id)
     {
         $request->validate([
             'icon'=>'required|unique:award__icons',
         ],[
             'icon.required'=>'Please enter the icon then try!',
             'icon.unique'=>'Already teken this icon please new icon take  then try!',
         ]);
         Experience_Icon::find($experience_icon_id)->update([
             'icon'=>$request->icon,
         ]);
         return back()->with('icon_success_message','Icon added Successfully!');
     }
     // Experience icon update code end
}
