{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Hire Area
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- hire area start here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Hire Area Data</h4>
                    </div>
                    <div class="card-body">
                        @if (session('hire_update_message'))
                            <div class="alert alert-success">
                                {{session('hire_update_message')}}
                            </div>
                        @endif
                        <form action="{{route('hire.update',$hire_data->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input type="text" name="short_description" value="{{$hire_data->short_description}}" class="form-control @error('short_description') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-square" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- hire area area end here --}}
    </div>
@endsection


