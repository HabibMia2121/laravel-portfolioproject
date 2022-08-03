{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Education Item Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- award data edit here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Education Data Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{route('educations.update',$educations->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution Name</label>
                                        <input type="text" name="institution_name" class="form-control @error('institution_name') is-invalid @enderror" value="{{$educations->institution_name}}" style="border-color:rgb(79, 74, 143)">
                                        @error('institution_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Qualification Title</label>
                                        <input type="text" name="qualification_title" class="form-control @error('qualification_title') is-invalid @enderror" value="{{$educations->qualification_title}}" style="border-color:rgb(79, 74, 143)">
                                        @error('qualification_title')
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
