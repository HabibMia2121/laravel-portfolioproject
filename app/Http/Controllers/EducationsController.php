<?php

namespace App\Http\Controllers;

use App\Models\Education_Icon;
use App\Models\Educations;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EducationsController extends Controller
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
        return view('educations.index',[
            'education_all_data'=>Educations::latest()->get(),
            'education_icon_all'=>Education_Icon::first(),
            'education_delete_all'=>Educations::onlyTrashed()->get(),
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
            'institution_name'=>'required|unique:educations',
            'qualification_title'=>'required|unique:educations',
        ],[
            'institution_name.required'=>'Please enter the institution name then try!',
            'institution_name.unique'=>'Already teken this name please new name take  then try!',
            'qualification_title.required'=>'Please enter the qualification title then try!',
            'qualification_title.unique'=>'Already teken this name please new name take  then try!',
        ]);
        Educations::insert($request->except('_token')+ [
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Educations  $educations
     * @return \Illuminate\Http\Response
     */
    public function show(Educations $educations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Educations  $educations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educations=Educations::find($id)->where('id',$id)->first();
        return view('educations.edit',compact('educations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Educations  $educations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'institution_name'=>'required',
            'qualification_title'=>'required|',
        ],[
            'institution_name.required'=>'Please enter the institution name then try!',
            'institution_name.unique'=>'Already teken this name please new name take  then try!',
            'qualification_title.required'=>'Please enter the qualification title then try!',
            'qualification_title.unique'=>'Already teken this name please new name take  then try!',
        ]);
        Educations::find($id)->update([
            'institution_name'=>$request->institution_name,
            'qualification_title'=>$request->qualification_title,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','education item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Educations  $educations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Educations::find($id)->delete();
        return back()->with('education_delete_message','education item delete completed!');
    }
    // education icon update start here
    public function education_iconUpdate(Request $request, $education_icon_id)
    {
        $request->validate([
            'icon'=>'required|unique:education__icons',
        ],[
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);
        Education_Icon::find($education_icon_id)->update([
            'icon'=>$request->icon,
        ]);
        return back()->with('icon_success_message','Icon added Successfully!');
    }
    // education icon updated end here
    // education restore & forceDelete code start here
    public function education_restore($education_restore_id)
    {
        Educations::onlyTrashed()->where('id',$education_restore_id)->restore();
        return back();
    }
    public function forceDelete($education_forcedelete_id)
    {
        Educations::onlyTrashed()->where('id',$education_forcedelete_id)->forceDelete();
        return back();
    }
    // education restore & forceDelete code end here
}
