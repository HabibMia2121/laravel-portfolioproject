<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Skill_Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SkillController extends Controller
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
        return view('skills.index',[
            'skill_all_data'=>Skill::latest()->get(),
            'skill_delete_all'=>Skill::onlyTrashed()->get(),
            'skill_icon_all'=>Skill_Icon::first(),
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
            'skill_name'=>'required|unique:skills',
            'percentage'=>'required|unique:skills',
        ],[
            'skill_name.required'=>'Please enter the skill name then try!',
            'skill_name.unique'=>'Already teken this name please new name take  then try!',
            'percentage.required'=>'Please enter the percentage then try!',
            'percentage.unique'=>'Already teken this number please new number take  then try!',
        ]);
        Skill::insert($request->except('_token')+ [
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'skill_name'=>'required|unique:skills,skill_name,'.$skill->id,
            'percentage'=>'required|unique:skills,percentage,'.$skill->id,
        ],[
            'skill_name.required'=>'Please enter the skill name then try!',
            'skill_name.unique'=>'Already teken this name please new name take  then try!',
            'percentage.required'=>'Please enter the percentage then try!',
            'percentage.unique'=>'Already teken this number please new number take  then try!',
        ]);

        $skill->skill_name=$request->skill_name;
        $skill->percentage=$request->percentage;
        $skill->save();
        return back()->with('skill_update_message','skill item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('skill_delete_message','skill item delete completed!');
    }
    // Skill restore & forceDelete code start here
    public function restore($skill_restore_id)
    {
        Skill::onlyTrashed()->where('id',$skill_restore_id)->restore();
        return back();
    }
    public function force_delete($skill_forcedelete_id)
    {
        Skill::onlyTrashed()->where('id',$skill_forcedelete_id)->forceDelete();
        return back();
    }
    // Skill restore & forceDelete code end here
    // skill icon update code start
    public function skill_icon_update(Request $request ,$skill_icon_id)
    {
        $request->validate([
            'icon'=>'required|unique:skill__icons',
        ],[
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);
        Skill_Icon::find($skill_icon_id)->update([
            'icon'=>$request->icon,
        ]);
        return back()->with('icon_success_message','Icon added Successfully!');
    }
    // skill icon update code end
}
