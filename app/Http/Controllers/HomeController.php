<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Contact_area;
use App\Models\Dashboard_file_name;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_user=User::count();
        $total_customer_contact=Contact_area::count();
        $total_category=Category::count();
        $total_subcategory=Subcategory::count();
        return view('dashboard.home',compact('total_user','total_customer_contact','total_category','total_subcategory'));
    }
    // dashboard_index code start here
    public function dashboard_index()
    {
        $dashboareda_all_data=Dashboard_file_name::latest()->get();
        return view('dashboard.dashboard_file',compact('dashboareda_all_data'));
    }
    public function file_name_store(Request $request)
    {
        $request->validate([
            '*'=>'required',
        ]);

        Dashboard_file_name::insert([
            'file_name'=>$request->file_name,
            'file_link'=>$request->file_link,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success_message','Added Successfully!');
    }
    function file_delete(Dashboard_file_name $file_id)
    {
        $file_id->delete();
        return back()->with('delete_message','File delete complated!');
    }
    // dashboard_index code end here
}
