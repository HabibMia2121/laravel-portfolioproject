<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Counter_bgphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Image;

class CounterController extends Controller
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
        return view('counter-area.index',[
            'counter_all'=>Counter::latest()->get(),
            'counter_delete_info'=>Counter::onlyTrashed()->get(),
            'counter_photos'=>Counter_bgphoto::first(),
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
            'count_name'=>'required|unique:counters',
            'count_number'=>'required|unique:counters',
            'icon'=>'required|unique:counters',
        ],[
            'count_name.required'=>'Please enter the count name then try!',
            'count_name.unique'=>'Already teken this name please new name take  then try!',
            'count_number.required'=>'Please enter the count number then try!',
            'count_number.unique'=>'Already teken this number please new number take  then try!',
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);
        Counter::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('counter_success_message','counter data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('counter-area.edit',compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $request->validate([
            'count_name'=>'required|unique:counters,count_name,'.$counter->id,
            'count_number'=>'required|unique:counters,count_number,'.$counter->id,
            'icon'=>'required|unique:counters,icon,'.$counter->id,
        ],[
            'count_name.required'=>'Please enter the count name then try!',
            'count_name.unique'=>'Already teken this name please new name take  then try!',
            'count_number.required'=>'Please enter the count number then try!',
            'count_number.unique'=>'Already teken this number please new number take  then try!',
            'icon.required'=>'Please enter the icon then try!',
            'icon.unique'=>'Already teken this icon please new icon take  then try!',
        ]);
        $counter->count_name=$request->count_name;
        $counter->count_number=$request->count_number;
        $counter->icon=$request->icon;
        $counter->save();
        return back()->with('counter_update_message','counter item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
        return back()->with('counter_delete_message','counter item delete completed!');
    }
     // counter restore & forceDelete code start here
     public function restore($counter_restore_id)
     {
         Counter::onlyTrashed()->where('id',$counter_restore_id)->restore();
         return back();
     }
     public function force_delete($counter_forcedelete_id)
     {
         Counter::onlyTrashed()->where('id',$counter_forcedelete_id)->forceDelete();
         return back();
     }
     // counter restore & forceDelete code end here

     // counter background photo code start here
     public function counter_bg_photo(Request $request,$counter_photo_id)
     {
        $request->validate([
            'background_photo'=>'required',

        ],[
            'background_photo.required'=>'Please enter the photo then try!',
        ]);
        $status=true;
        if(!in_array($request->background_photo->getClientOriginalExtension(),['png','jpg','webp'])){
            $status=false;
        }
        if($status){
            $couner_bgphoto=Counter_bgphoto::where('id',$counter_photo_id)->first();
            // photo upload code start here
            if($request->hasFile('background_photo')){
                // step:3->old profile photo deleted from file
                if($couner_bgphoto->background_photo != 'default_background_photo.jpg'){
                    unlink(public_path('upload-photo-file/counter-bg-photo/').$couner_bgphoto->background_photo);
                }

                // step:1->background photo name create
                $name=Str::random(7).'.'.$request->file('background_photo')->getClientOriginalExtension();
                // step:2->background photo upload
                $save_link=public_path('upload-photo-file/counter-bg-photo/').$name;
                Image::make($request->file('background_photo'))->resize(1920,774)->save($save_link);
                // photo upload code end here
                Counter_bgphoto::find($counter_photo_id)->update([
                    'background_photo'=>$name,
                ]);
            }
        }
        else{
            return back()->with('file_format_error','there are one or many unsupported file in your attachment');
        }
        return back()->with('photo_success_message','Background photo added successfully!');
     }
     // counter background photo code end here
}
