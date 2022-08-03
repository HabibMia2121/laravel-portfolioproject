{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    About Setting
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                @if (session('success-message'))
                    <div class="alert alert-success">
                        {{session('success-message')}}
                    </div>
                @endif
                <div class="settings-form">
                    <h4 class="text-primary">About Setting</h4>
                    <form action="{{route('about_setting')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea id="textarea_data_show" name="short_description" rows="4" class="form-control @error('short_description') is-invalid @enderror" style="border-color:rgb(79, 74, 143)"></textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Availability</label>
                                    <input type="text" name="availability" value="{{auth()->user()->availability}}" class="form-control @error('availability') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                    @error('availability')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="text" name="age" value="{{auth()->user()->age}}" class="form-control @error('age') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year Experience</label>
                                    <input type="text" name="year_experience" value="{{auth()->user()->year_experience}}" class="form-control @error('year_experience') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                    @error('year_experience')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('use-js-code')
    <script>
        // textarea_data_show js code use start here
         $(document).ready(function(){
            var textContent = "{{auth()->user()->short_description}}";
            $("#textarea_data_show").val(textContent);
        });
        // textarea_data_show js code use end here
    </script>
@endsection


