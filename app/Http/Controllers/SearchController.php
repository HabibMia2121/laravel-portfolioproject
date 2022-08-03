<?php

namespace App\Http\Controllers;

use App\Models\Dashboard_file_name;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->search;
        $dashboard_file = Dashboard_file_name::query()
                    ->where('file_name', 'LIKE', "%{$search}%")
                    ->get();
        return view('search.index',compact('dashboard_file'));
    }
}
