{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- Edit category content here --}}
@section('dashboard_bar')
    Edit Category
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- category edit start here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('category_update'))
                            <div class="alert alert-success">
                                {{session('category_update')}}
                            </div>
                        @endif
                        <form action="{{route('category.update',$category_edit_info->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{$category_edit_info->category_name}}" style="border-color:rgb(79, 74, 143)">
                                        @error('category_name')
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
        {{-- category edit end here --}}

    </div>
@endsection


