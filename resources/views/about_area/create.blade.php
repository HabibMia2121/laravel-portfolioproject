{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    About-area create
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

                <div class="settings-form">
                    <h4 class="text-primary">About-area create</h4>
                    <form action="{{route('about_area.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Text</label>
                                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" placeholder="Hi/Hello" style="border-color:rgb(79, 74, 143)">
                                    @error('text')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Headline</label>
                                    <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('headline')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('phone_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"  style="border-color:rgb(79, 74, 143)">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="4"  style="border-color:rgb(79, 74, 143)"></textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror mb-2"  style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                    <img class="hidden" id="about_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                    <small>size:702x837</small><br>
                                    @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info" type="submit">Add</button>
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
    </script>
@endsection

