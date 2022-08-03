{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Award Item Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- award data edit here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Award Data Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('award_update_message'))
                            <div class="alert alert-success">
                                {{session('award_update_message')}}
                            </div>
                        @endif
                        <form action="{{route('award.update',$award->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Award Name</label>
                                        <input type="text" name="awards_name" class="form-control @error('awards_name') is-invalid @enderror" value="{{$award->awards_name}}" style="border-color:rgb(79, 74, 143)">
                                        @error('awards_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Award Subtitle</label>
                                        <input type="text" name="award_subtitle" class="form-control @error('award_subtitle') is-invalid @enderror" value="{{$award->award_subtitle}}" style="border-color:rgb(79, 74, 143)">
                                        @error('award_subtitle')
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
