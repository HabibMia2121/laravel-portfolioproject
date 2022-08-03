{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    About-area Eidt
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
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

                <div class="settings-form">
                    <h4 class="text-primary">Edit</h4>
                    <form action="{{route('about_area.update',$about_area->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Text</label>
                                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" value="{{$about_area->text}}" style="border-color:rgb(79, 74, 143)">
                                    @error('text')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Headline</label>
                                    <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" value="{{$about_area->headline}}"  style="border-color:rgb(79, 74, 143)">
                                    @error('headline')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" value="{{$about_area->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('phone_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{$about_area->email}}" class="form-control @error('email') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{$about_area->address}}" class="form-control @error('address') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea id="sD_textarea_data_show" name="short_description" rows="4" class="form-control @error('short_description') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)"></textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class=" form-control" name="old_photo" value="{{$about_area->photo}}">
                                    <label>Old Photo</label>
                                    <img src="{{url($about_area->photo)}}" style="width: 100px;height:auto;" alt="not found">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Photo</label>
                                    <input type="file" name="new_photo" class="form-control @error('new_photo') is-invalid @enderror mb-2"  style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                    @error('new_photo')
                                        <span class="text-danger">{{$message}}</span><br>
                                    @enderror
                                    <img class="hidden" id="about_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                    <small>size:702x837</small><br>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('use-js-code')
    <script>
        // upload new photo show code start here
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#about_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#about_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // upload new photo show code end here

        // textarea_data_show js code use start here
        $(document).ready(function(){
            var textContent = "{{$about_area->short_description}}";
            $("#sD_textarea_data_show").val(textContent);
        });
        // textarea_data_show js code use end here
    </script>
@endsection



