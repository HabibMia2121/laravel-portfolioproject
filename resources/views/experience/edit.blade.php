{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Experience Item Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- Experience data edit here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Experience Data Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{route('experience.update',$experience->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Experience Name</label>
                                        <input type="text" name="experience_name" class="form-control @error('experience_name') is-invalid @enderror" value="{{$experience->experience_name}}" style="border-color:rgb(79, 74, 143)">
                                        @error('experience_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Experience Subtitle</label>
                                        <input type="text" name="experience_subtitle" class="form-control @error('experience_subtitle') is-invalid @enderror" value="{{$experience->experience_subtitle}}" style="border-color:rgb(79, 74, 143)">
                                        @error('experience_subtitle')
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
    </div>
@endsection
