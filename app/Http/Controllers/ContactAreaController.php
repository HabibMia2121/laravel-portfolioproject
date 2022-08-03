<?php

namespace App\Http\Controllers;

use App\Models\Contact_area;
use App\Models\Contact_header;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ContactAreaController extends Controller
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
        $contact_area_deleted_data= Contact_area::onlyTrashed()->get();
        $contact_header_data=Contact_header::first();
        $contact_data_all=Contact_area::latest()->get();
        return view('contact-area.index',compact('contact_data_all','contact_header_data','contact_area_deleted_data'));
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
            'name'=> 'required',
            'email'=> 'required|unique:contact_areas,email',
            'number'=> 'required|digits:11',
            'message'=> 'required',
        ]);
        Contact_area::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return response()->json();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact_area  $contact_area
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_area $contact_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact_area  $contact_area
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_area $contact_area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact_area  $contact_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_area $contact_area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_area  $contact_area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact_area::find($id)->delete();
        return back()->with('delete_message','Delete completed!');
    }
    //contact_header code start here
    public function contact_header(Request $request ,$contact_header_id)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'head_name_one.required'=>'Please enter the name then try!',
            'head_name_two.required'=>'Please enter the name then try!',
            'head_title.required'=>'Please enter the head title then try!',
        ]);
        Contact_header::find($contact_header_id)->update([
            'head_name_one'=>$request->head_name_one,
            'head_name_two'=>$request->head_name_two,
            'head_title'=>$request->head_title,
        ]);
        return back()->with('contact_head_update_message','contact header data update successfully!');
    }
    //contact_header code end here

    // contact restore & forceDelete code start here
    public function restore($contact_restore_id)
    {
        Contact_area::onlyTrashed()->where('id',$contact_restore_id)->restore();
        return back();
    }
    public function force_delete($contact_forcedelete_id)
    {
        Contact_area::onlyTrashed()->where('id',$contact_forcedelete_id)->forceDelete();
        return back();
    }
    // contact restore & forceDelete code end here


}
