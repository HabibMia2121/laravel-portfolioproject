{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Testimonial Area
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- testimonial header area start here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {{-- testimonial header data add here --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h4 class="text-white">Testimonial Header Data</h4>
                            </div>
                            <div class="card-body">
                                @if (session('testimonial_head_update_message'))
                                    <div class="alert alert-success">
                                        {{session('testimonial_head_update_message')}}
                                    </div>
                                @endif
                                <form action="{{route('testimonial.header',$testimonial_header_info->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Header Title</label>
                                                <input type="text" name="header_title" value="{{$testimonial_header_info->header_title}}" class="form-control @error('header_title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                                @error('header_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Header Subtitle</label>
                                                <input type="text" name="header_subtitle" value="{{$testimonial_header_info->header_subtitle}}" class="form-control @error('header_subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                                @error('header_subtitle')
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
        </div>
        {{-- testimonial header area end here --}}

        {{-- testimonial data add here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Testimonial Data Add</h4>
                    </div>
                    <div class="card-body">
                        @if (session('photo_success_message'))
                            <div class="alert alert-success">
                                {{session('photo_success_message')}}
                            </div>
                        @endif
                        <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('subtitle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Description</label>
                                        <textarea name="small_description" class="form-control @error('small_description') is-invalid @enderror" style="border-color:rgb(79, 74, 143)"  rows="4"></textarea>
                                        @error('small_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                        @error('photo')
                                            <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="testimonial_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size:100x101</small><br>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-square" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- testimonial data list here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Testimonial Data list</h4>
                        {{--recycle info code start here --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deleted Testimonial</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deletedTestimonial_table" class="table table-bordered">
                                            <thead class="table-inverse">
                                                <tr>
                                                    <th>Serial NO.</th>
                                                    <th>Title</th>
                                                    <th>Subtitle</th>
                                                    <th>Small Description</th>
                                                    <th>photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($testimonial_delete_all as $testimonial_delete )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$testimonial_delete->title}}</td>
                                                        <td>{{$testimonial_delete->subtitle}}</td>
                                                        <td>{{$testimonial_delete->small_description}}</td>
                                                        <td>
                                                            <img src="{{$testimonial_delete->photo}}" style="width:100px;height:150px" alt="not found">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2">
                                                                <a href="{{route('testimonial_restore',$testimonial_delete->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('force_delete',$testimonial_delete->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr class="text-center text-danger">
                                                        <td colspan="50">No data to show</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--recycle info code end here --}}
                    </div>
                    <div class="card-body">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="testimonialData_table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Small Description</th>
                                        <th>photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimonial_all as $testimonial)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$testimonial->title}}</td>
                                            <td>{{$testimonial->subtitle}}</td>
                                            <td>{{$testimonial->small_description}}</td>
                                            <td>
                                                <img src="{{$testimonial->photo}}" style="width:100px;height:150px" alt="not found">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('testimonial.edit',$testimonial->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <form action="{{route('testimonial.destroy',$testimonial->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="50" class="text-danger">No data to show</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('use-js-code')
    <script>
        // datatable code start here
            $(document).ready( function () {
                $('#testimonialData_table').DataTable();
            });

            $(document).ready( function () {
                $('#deletedTestimonial_table').DataTable();
            });
        //  datatable code end here
        // image show js code use start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#testimonial_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#testimonial_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // image show js code use end here
    </script>
@endsection


