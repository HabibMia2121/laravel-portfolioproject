{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Testimonial Item Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- testimonial data edit here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Testimonial Data Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        @if (session('file_format_error'))
                            <div class="alert alert-danger">
                                {{session('file_format_error')}}
                            </div>
                        @endif
                        <form action="{{route('testimonial.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$testimonial->title}}" class="form-control @error('title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" value="{{$testimonial->subtitle}}" class="form-control @error('subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('subtitle')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Small Description</label>
                                        <textarea id="textarea_data_show" name="small_description" class="form-control @error('small_description') is-invalid @enderror"style="border-color:rgb(79, 74, 143)" rows="2"></textarea>
                                        @error('small_description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="old_photo" value="{{$testimonial->photo}}" class="form-control">
                                        <label>Old Photo</label>
                                        <img src="{{url($testimonial->photo)}}" style="width: 100px;height:auto;" alt="your image" /><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Photo</label>
                                        <input type="file" name="new_photo" class="form-control @error('new_photo') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                        @error('new_photo')
                                            <span class="text-danger">{{$message}}</span><br>
                                        @enderror
                                        <img class="hidden mt-2" id="testimonial_edit_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                        <small>size:100x101</small><br>
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
@section('use-js-code')
    <script>
        // textarea_data_show js code use start here
        $(document).ready(function(){
            var textContent= "{{$testimonial->small_description}}";
            $('#textarea_data_show').val(textContent);

        });
        // textarea_data_show js code use end here

        // image show js code use start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#testimonial_edit_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#testimonial_edit_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // image show js code use end here
    </script>
@endsection
