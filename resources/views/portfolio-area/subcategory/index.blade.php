{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Portfolio Subcategory
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- subcategory data add here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Subcategory Data Add</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="category_id" id="category_dropdwon" class="form-control @error('category_id') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" id="">
                                            <option value="">-Select one category-</option>
                                            @foreach ($category_info as $category )
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('subtitle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="Short_description" class="form-control @error('Short_description') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" rows="4"></textarea>
                                        @error('Short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('client')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Industay</label>
                                        <input type="text" name="industay" class="form-control @error('industay') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('industay')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Services</label>
                                        <input type="text" name="services" class="form-control @error('services') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('services')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('website')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Thumbnail Photo</label>
                                        <input type="file" name="thumbnail_photo" class="form-control @error('thumbnail_photo') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                        @error('thumbnail_photo')
                                            <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="subcategory_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size:900x900</small><br>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-square" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- subcategory data list here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Subcategory Data list</h4>
                        {{--recycle info code start here --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deleted Subcategory</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deletedCategory_table" class="table table-bordered">
                                            <thead class="table-inverse">
                                                <tr>
                                                    <th>Serial NO.</th>
                                                    <th>Category Name</th>
                                                    <th>Title</th>
                                                    <th>Subtitle</th>
                                                    <th>Short Description</th>
                                                    <th>Client</th>
                                                    <th>Industay</th>
                                                    <th>Services</th>
                                                    <th>Website</th>
                                                    <th>Thumbnail Photo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($subcategory_deleted_data as $subcategory_deleted )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$subcategory_deleted->relationTocategory->category_name}}</td>
                                                        <td>{{$subcategory_deleted->title}}</td>
                                                        <td>{{$subcategory_deleted->subtitle}}</td>
                                                        <td>{{$subcategory_deleted->Short_description}}</td>
                                                        <td>{{$subcategory_deleted->client}}</td>
                                                        <td>{{$subcategory_deleted->industay}}</td>
                                                        <td>{{$subcategory_deleted->services}}</td>
                                                        <td>{{$subcategory_deleted->website}}</td>
                                                        <td>
                                                            <img src="{{$subcategory_deleted->thumbnail_photo}}" style="width:80px;height:110px" alt="not found">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group mb-2">
                                                                <a href="{{route('subcategory.restore',$subcategory_deleted->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('force.delete',$subcategory_deleted->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                            <table id="categoryData_table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>Category Name</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Short Description</th>
                                        <th>Client</th>
                                        <th>Industay</th>
                                        <th>Services</th>
                                        <th>Website</th>
                                        <th>Thumbnail Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subcategory as $subcategories)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$subcategories->relationTocategory->category_name}}</td>
                                            <td>{{$subcategories->title}}</td>
                                            <td>{{$subcategories->subtitle}}</td>
                                            <td>{{$subcategories->Short_description}}</td>
                                            <td>{{$subcategories->client}}</td>
                                            <td>{{$subcategories->industay}}</td>
                                            <td>{{$subcategories->services}}</td>
                                            <td>{{$subcategories->website}}</td>
                                            <td>
                                                <img src="{{$subcategories->thumbnail_photo}}" style="width:80px;height:110px" alt="not found">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('subcategory.edit',$subcategories->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <form action="{{route('subcategory.destroy',$subcategories->id)}}" method="POST">
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
        // category_dropdwon code start here
        // $(document).ready(function(){
        //     $('#category_dropdwon').c
        // });
        // category_dropdwon code end here

        // datatable code start here
            $(document).ready( function () {
                $('#categoryData_table').DataTable();
            });

            $(document).ready( function () {
                $('#deletedCategory_table').DataTable();
            });
        //  datatable code end here

        // image show js code use start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#subcategory_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#subcategory_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // image show js code use end here

    </script>
@endsection


