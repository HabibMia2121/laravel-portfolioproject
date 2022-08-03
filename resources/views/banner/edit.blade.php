{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Banner Eidt
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                @if(session('success_message'))
                    <div class="alert alert-success">
                        {{session('success_message')}}
                    </div>
                @endif
                @if(session('file_format_error'))
                    <div class="alert alert-danger">
                        {{session('file_format_error')}}
                    </div>
                @endif

                <div class="settings-form">
                    <h4 class="text-primary">Edit</h4>
                    <form action="{{route('banner.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner title</label>
                                    <input type="text" name="banner_headline" value="{{$banner->banner_headline}}" class="form-control @error('banner_headline') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                    @error('banner_headline')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" class=" form-control" name="old_photo" value="{{$banner->banner_photo}}">
                                    <label>Old Photo</label>
                                    <img src="{{url($banner->banner_photo)}}" style="width: 150px;height:auto;" alt="not found">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Photo</label>
                                    <input type="file" name="new_photo" class="form-control @error('new_photo') is-invalid @enderror mb-2"  style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                    @error('new_photo')
                                        <span class="text-danger">{{$message}}</span><br>
                                    @enderror
                                    <img class="hidden" id="banner_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                    <small>size:1920x1095</small><br>
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
                $('#banner_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#banner_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // upload new photo show code end here
    </script>
@endsection


