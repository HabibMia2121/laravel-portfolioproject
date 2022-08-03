<?php

namespace App\Http\Controllers;

use App\Models\Footer_icon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FooterIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deleted_footer_icon=Footer_icon::onlyTrashed()->latest()->get();
        $footer_icon=Footer_icon::latest()->get();
        return view('footer_icon.index',compact('footer_icon','deleted_footer_icon'));
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
            'social_icon'=>"required|unique:footer_icons,social_icon",
            'social_link'=>"required|unique:footer_icons,social_link",
        ]);

        Footer_icon::insert($request->except('_token')+ [
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer_icon  $footer_icon
     * @return \Illuminate\Http\Response
     */
    public function show(Footer_icon $footer_icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer_icon  $footer_icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer_icon $footer_icon)
    {
        return view('footer_icon.edit',compact('footer_icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer_icon  $footer_icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer_icon $footer_icon)
    {
        $request->validate([
            '*'=>'required',
        ]);
        $footer_icon->social_icon=$request->social_icon;
        $footer_icon->social_link=$request->social_link;
        $footer_icon->save();
        return back()->with('update_message','Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer_icon  $footer_icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer_icon $footer_icon)
    {
        $footer_icon->delete();
        return back()->with('delete_message','Delete Complated!');
    }

    // footer icon_link restore & forceDelete code start here
    public function footericon_restore($footer_restore_id)
    {
        Footer_icon::onlyTrashed()->where('id',$footer_restore_id)->restore();
        return back();
    }
    public function footericon_force_delete($footer_forcedelete_id)
    {
        Footer_icon::onlyTrashed()->where('id',$footer_forcedelete_id)->forceDelete();
        return back();
    }
    // footer icon_link restore & forceDelete code end here
}
