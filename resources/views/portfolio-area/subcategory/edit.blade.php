{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
   Subcategory Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Edit Subcategory</h4>
                    </div>
                    <div class="card-body">
                        @if (session('update_message'))
                            <div class="alert alert-success">
                                {{session('update_message')}}
                            </div>
                        @endif
                        <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="category_id" id="category_dropdwon" value="{{$subcategory->category_id}}" class="form-control @error('category_id') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" id="">
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
                                        <input type="text" name="title" value="{{$subcategory->title}}" class="form-control @error('title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" value="{{$subcategory->subtitle}}"class="form-control @error('subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('subtitle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="Short_description" id="textarea_data_show" value="{{$subcategory->Short_description}}" class="form-control @error('Short_description') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" rows="4"></textarea>
                                        @error('Short_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <input type="text" name="client" value="{{$subcategory->client}}" class="form-control @error('client') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('client')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Industay</label>
                                        <input type="text" name="industay" value="{{$subcategory->industay}}" class="form-control @error('industay') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('industay')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Services</label>
                                        <input type="text" name="services" value="{{$subcategory->services}}" class="form-control @error('services') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('services')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website"  value="{{$subcategory->website}}" class="form-control @error('website') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('website')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="old_thumbnail_photo" value="{{$subcategory->thumbnail_photo}}" class="form-control">
                                        <label>Old Thumbnail Photo</label>
                                        <img src="{{url($subcategory->thumbnail_photo)}}" style="width: 100px;height:auto;" alt="your image" /><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Thumbnail Photo</label>
                                        <input type="file" name="new_thumbnail_photo" class="form-control @error('new_thumbnail_photo') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                        @error('new_thumbnail_photo')
                                            <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="subcategory_photo_viewer_edit" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
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
    </div>
@endsection
@section('use-js-code')
    <script>
        // textarea_data_show js code use start here
        $(document).ready(function(){
            var textContent= "{{$subcategory->Short_description}}";
            $('#textarea_data_show').val(textContent);

        });
        $(document).ready(function(){
            var textContent2= "{{$subcategory->category_id}}";
            $('#category_dropdwon').val(textContent2);

        });
        // textarea_data_show js code use end here

        // image show js code use start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#subcategory_photo_viewer_edit').attr('src', e.target.result).width(150).height(195);
                };
                $('#subcategory_photo_viewer_edit').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // image show js code use end here
    </script>
@endsection

