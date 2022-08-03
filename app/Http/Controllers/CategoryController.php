<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio_head;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // category code use start here
    public function category_index()
    {
        $portfolio_head_data=Portfolio_head::first();
        $category_deleted_info= Category::onlyTrashed()->get();
        $category_data=Category::all();
        return view('portfolio-area.category.index',compact('portfolio_head_data','category_data','category_deleted_info'));
    }
    public function category_insert(Request $request)
    {
        $request->validate([
            'category_name'=>'required|unique:categories',
        ],[
            'category_name.required'=>'Please enter the category name then try!',
            'category_name.unique'=>'Already teken this name please new name take  then try!',
        ]);
        Category::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('category_success_message','category added successfully!');
    }
    public function category_edit($category_edit_id)
    {
        $category_edit_info=Category::find($category_edit_id)->first();
        return view('portfolio-area.category.edit',compact('category_edit_info'));
    }
    public function category_update(Request $request ,$category_update_id)
    {
        Category::find($category_update_id)->update([
            'category_name'=>$request->category_name,
        ]);
        return back()->with('category_update','category name update successfully!');
    }
    public function category_delete($category_id)
    {
        Category::find($category_id)->delete();
        return back()->with('category_delete','category delete completed!');

    }
    // category restore & forceDelete code start here
    public function restore($category_restore_id)
    {
        Category::onlyTrashed()->where('id',$category_restore_id)->restore();
        return back();
    }
    public function force_delete($category_forced_elete_id)
    {
        Category::onlyTrashed()->where('id',$category_forced_elete_id)->forceDelete();
        return back();
    }
    // category restore & forceDelete code end here
    // category code use end here

    // portfolio head code use start here
    public function portfolio_header(Request $request ,$portfolio_id)
    {
        $request->validate([
            '*'=>'required',
        ],[
            'header_title.required'=>'Please enter the header title name then try!',
            'header_subtitle.required'=>'Please enter the header subtitle then try!',
        ]);
        Portfolio_head::find($portfolio_id)->update([
            'header_title'=>$request->header_title,
            'header_subtitle'=>$request->header_subtitle,
        ]);
        return back()->with('portfolio_head_update_message','portfolio header data update successfully!');
    }
    // portfolio head code use end here
}
