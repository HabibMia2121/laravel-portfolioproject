<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class SubcategoryController extends Controller
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
        $subcategory_deleted_data=Subcategory::onlyTrashed()->get();
        $subcategory=Subcategory::all();
        $category_info=Category::all();
        return view('portfolio-area.subcategory.index',compact('category_info','subcategory','subcategory_deleted_data'));
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
            '*'=>'required',
            'thumbnail_photo'=>'required|unique:subcategories'
        ]);
         //photo upload code use start here
            // step:1->team photo name create
            $name=Str::random(7).'.'.$request->file('thumbnail_photo')->getClientOriginalExtension();
            // step:2->team photo upload
            $save_link=public_path('upload-photo-file/subcategory-photos/').$name;
            Image::make($request->file('thumbnail_photo'))->resize(900,900)->save($save_link);
        // photo upload code use end here
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'Short_description'=>$request->Short_description,
            'client'=>$request->client,
            'industay'=>$request->industay,
            'services'=>$request->services,
            'website'=>$request->website,
            'thumbnail_photo'=>'upload-photo-file/subcategory-photos/'.$name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','subcategory added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $category_info=Category::all();
        return view('portfolio-area.subcategory.edit',compact('subcategory','category_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            '*'=>'required',
        ]);

        $subcategory->category_id=$request->category_id;
        $subcategory->title=$request->title;
        $subcategory->subtitle=$request->subtitle;
        $subcategory->Short_description=$request->Short_description;
        $subcategory->client=$request->client;
        $subcategory->industay=$request->industay;
        $subcategory->services=$request->services;
        $subcategory->website=$request->website;
        // photo upload code start here
        if($request->hasFile('new_thumbnail_photo')){
            unlink($request->old_thumbnail_photo);
            // step:1->new photo name create
            $name=auth()->id().'-'.Str::random(7).'.'.$request->file('new_thumbnail_photo')->getClientOriginalExtension();
            // step:2->new photo upload
            $save_link=public_path('upload-photo-file/subcategory-photos/').$name;
            Image::make($request->file('new_thumbnail_photo'))->resize(900,900)->save($save_link);
            $subcategory->thumbnail_photo='upload-photo-file/subcategory-photos/'.$name;
        }
        // photo upload code endt here
        $subcategory->save();
        return back()->with('update_message','subcategory item update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('delete_message','subcategory items delete completed!');
    }
    // subcategory restore & forceDelete code start here
    public function subcategory_restore($subcategory_restore_id)
    {
        Subcategory::onlyTrashed()->where('id',$subcategory_restore_id)->restore();
        return back();
    }
    public function subcategory_force_delete($subcategory_force_delete_id)
    {
        unlink(public_path(Subcategory::withTrashed()->find($subcategory_force_delete_id)->thumbnail_photo));
        Subcategory::onlyTrashed()->where('id',$subcategory_force_delete_id)->forceDelete();
        return back();
    }
    // subcategory restore & forceDelete code end here

}
