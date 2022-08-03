<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Service_header;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
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
        return view('service-area.index',[
            'service_header_data'=>Service_header::first(),
            'service_all'=>Service::latest()->get(),
            'service_delete_all'=>Service::onlyTrashed()->get(),
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
            'title'=>'required|unique:services',
            'small_description'=>'required|unique:services',
            'icon'=>'required|unique:services',
        ],[
            'title.required'=>'Please enter the title name then try!',
            'title.unique'=>'Already teken this name please new name take  then try!',
            'small_description.required'=>'Please enter the small description then try!',
            'small_description.unique'=>'Already teken this name please new name take  then try!',
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);
        Service::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('service_success_message','service data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service-area.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required|unique:services,title,'.$service->id,
            'small_description'=>'required|unique:services,small_description,'.$service->id,
            'icon'=>'required|unique:services,icon,'.$service->id,
        ],[
            'title.required'=>'Please enter the title name then try!',
            'title.unique'=>'Already teken this name please new name take  then try!',
            'small_description.required'=>'Please enter the small description then try!',
            'small_description.unique'=>'Already teken this name please new name take  then try!',
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);

        $service->title=$request->title;
        $service->small_description=$request->small_description;
        $service->icon=$request->icon;
        $service->save();
        return back()->with('service_update_message','service item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('service_delete_message','service item delete completed!');
    }
    // service header data area start
    public function service_header_area(Request $request ,$service_head_id)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'header_title.required'=>'Please enter the header title name then try!',
            'header_subtitle.required'=>'Please enter the header subtitle then try!',
        ]);
        Service_header::find($service_head_id)->update([
            'header_title'=>$request->header_title,
            'header_subtitle'=>$request->header_subtitle,
        ]);
        return back()->with('service_head_update_message','service header data update successfully!');
    }
    // service header data area end

    // service restore & forceDelete code start here
    public function restore($service_restore_id)
    {
        Service::onlyTrashed()->where('id',$service_restore_id)->restore();
        return back();
    }
    public function force_delete($service_forcedelete_id)
    {
        Service::onlyTrashed()->where('id',$service_forcedelete_id)->forceDelete();
        return back();
    }
    // service restore & forceDelete code end here
}
