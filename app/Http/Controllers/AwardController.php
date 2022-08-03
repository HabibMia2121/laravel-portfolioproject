<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Award_Icon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class AwardController extends Controller
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
        return view('awards.index',[
            'award_all_data'=>Award::latest()->get(),
            'award_icon_all'=>Award_Icon::first(),
            'award_delete_all'=>Award::onlyTrashed()->get(),
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
            'awards_name'=>'required|unique:awards',
            'award_subtitle'=>'required|unique:awards',
        ],[
            'awards_name.required'=>'Please enter the awards name then try!',
            'awards_name.unique'=>'Already teken this name please new name take  then try!',
            'award_subtitle.required'=>'Please enter the award subtitle then try!',
            'award_subtitle.unique'=>'Already teken this name please new name take  then try!',
        ]);
        Award::insert($request->except('_token')+ [
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view('awards.edit',compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $request->validate([
            'awards_name'=>'required|unique:awards,awards_name,'.$award->id,
            'award_subtitle'=>'required|unique:awards,award_subtitle,'.$award->id,
        ],[
            'awards_name.required'=>'Please enter the awards name then try!',
            'awards_name.unique'=>'Already teken this name please new name take  then try!',
            'award_subtitle.required'=>'Please enter the award subtitle then try!',
            'award_subtitle.unique'=>'Already teken this name please new name take  then try!',
        ]);
        $award->updated([
            'awards_name'=>$request->awards_name,
            'award_subtitle'=>$request->award_subtitle,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('award_update_message','award item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        $award->delete();
        return back()->with('award_delete_message','award item delete completed!');
    }
    // award icon update code start
    public function awardiconUpdate(Request $request ,$award_icon_id)
    {

        $request->validate([
            'icon'=>'required',
        ],[
            'icon.required'=>'Please enter the icon then try!',
        ]);
        Award_Icon::find($award_icon_id)->update([
            'icon'=>$request->icon,
        ]);
        return back()->with('icon_success_message','Icon added Successfully!');
    }
    // award icon update code end
    // award restore & forceDelete code start here
    public function award_restore($award_restore_id)
    {
        Award::onlyTrashed()->where('id',$award_restore_id)->restore();
        return back();
    }
    public function forceDelete($award_forcedelete_id)
    {
        Award::onlyTrashed()->where('id',$award_forcedelete_id)->forceDelete();
        return back();
    }
    // award restore & forceDelete code end here
}
