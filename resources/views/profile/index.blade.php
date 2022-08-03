{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard Home</a></li>
                <li class="breadcrumb-item active"><a href="{{route('profile.index')}}">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo" style="background: url({{asset('upload-photo-file/cover-photo')}}/{{auth()->user()->cover_photo}});background-size: cover;background-position: center;min-height: 250px;width: 100%;"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{asset('upload-photo-file/profile-photo')}}/{{auth()->user()->profile_photo}}" class="img-fluid rounded-circle" alt="not found">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                    <p>Name</p>
                                </div>
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">
                                        @if (auth()->user()->phone_number)
                                            {{auth()->user()->phone_number}}
                                            @else
                                                N/C
                                        @endif
                                    </h4>
                                    <p>Phone Number</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('success-message'))
                    <div class="alert alert-success">
                        {{session('success-message')}}
                    </div>
                @endif
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="container">
                        <div class="pt-3">
                            <div class="settings-form">
                                <h4 class="text-primary">Account Setting</h4>
                                <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name (<span class="text-danger">*</span>)</label>
                                                    <input type="text" name="name" value="{{auth()->user()->name}}" class="@error('name') is-invalid @enderror form-control" style="border-color:rgb(79, 74, 143)">
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" value="{{auth()->user()->email}}"  class="@error('email') is-invalid @enderror form-control" style="border-color:rgb(79, 74, 143)">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" value="{{auth()->user()->address}}"  class="form-control" style="border-color:rgb(79, 74, 143)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}"  class="form-control" style="border-color:rgb(79, 74, 143)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" class=" form-control" name="old_photo" value="{{auth()->user()->profile_photo}}">
                                                    <label>Old Profile Photo</label>
                                                    <img src="{{asset('upload-photo-file/profile-photo')}}/{{auth()->user()->profile_photo}}" style="width: 150px;height:auto;border-radius:20px" alt="not found">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>New Profile Photo</label>
                                                    <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror mb-2" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                                    <img class="hidden" id="profile_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                                    <small>size:221x232</small><br>
                                                    @error('profile_photo')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" class=" form-control" name="old_cover_photo" value="{{auth()->user()->cover_photo}}">
                                                    <label>Old cover Photo</label>
                                                    <img src="{{asset('upload-photo-file/cover-photo')}}/{{auth()->user()->cover_photo}}" style="width: 150px;height:auto;border-radius:20px" alt="not found">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cover Photo</label>
                                                    <input type="file" name="cover_photo" class="form-control @error('cover_photo') is-invalid @enderror mb-2" style="border-color:rgb(79, 74, 143)" onchange="readURL2(this);">
                                                    <img class="hidden" id="cover_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                                    <small>size:1600x451</small><br>
                                                    @error('cover_photo')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mb-2" type="submit">Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (session('password_success'))
                    <div class="alert alert-success">
                        {{session('password_success')}}
                    </div>
                @endif
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="container">
                        <div class="pt-3">
                            <div class="settings-form">
                                <h4 class="text-primary">Password Setting</h4>
                                <form action="{{route('change_password')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input type="password" name="current_password" placeholder="current password" class="@error('current_password') is-invalid @enderror @error('wrong_password') is-invalid @enderror form-control" style="border-color:rgb(79, 74, 143)">
                                                    @error('current_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    @error('wrong_password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" name="password" placeholder="new password"  class="@error('password') is-invalid @enderror form-control" style="border-color:rgb(79, 74, 143)">
                                                    @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="password_confirmation" placeholder="confirm password" class="@error('password_confirmation') is-invalid @enderror form-control" style="border-color:rgb(79, 74, 143)">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mb-2" type="submit">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-about-me">
                        <div class="pt-4 border-bottom-1 pb-3">
                            <div class="text-right">
                                <a href="{{route('profile.create')}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            </div>
                            <h4 class="text-primary">About Me</h4>
                            @if(auth()->user()->short_description != NULL)
                                <p class="mb-2">{{auth()->user()->short_description}}</p>
                                @else
                                    <div class="col-md-10 m-auto">
                                        <div class="alert alert-danger ">
                                            <p>No data To show</p>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                    <div class="profile-skills mb-5">
                        <h4 class="text-primary mb-2">Skills</h4>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Admin</a>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                    </div>
                    <div class="profile-lang  mb-5">
                        <h4 class="text-primary mb-2">Language</h4>
                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a>
                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                    </div>
                    <div class="profile-personal-info">
                        <h4 class="text-primary mb-4">Personal Information</h4>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-9 col-7"><span>{{auth()->user()->name}}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-9 col-7"><span>{{auth()->user()->email}}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Availability <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-9 col-7">
                                @if(auth()->user()->availability != NULL)
                                    <span>{{auth()->user()->availability}}</span>
                                    @else
                                    <p class="text-danger">No data To show</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-9 col-7">
                                @if(auth()->user()->age != NULL)
                                    <span>{{auth()->user()->age}}</span>
                                    @else
                                    <p class="text-danger">No data To show</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-9 col-7">
                                @if(auth()->user()->address != NULL)
                                    <span>{{auth()->user()->address}}</span>
                                    @else
                                    <p class="text-danger">No data To show</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-3 col-5">
                                <h5 class="f-w-500">Year Experience <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-9 col-7">
                                @if(auth()->user()->year_experience != NULL)
                                    <span>{{auth()->user()->year_experience}}</span>
                                    @else
                                    <p class="text-danger">No data To show</p>
                                @endif
                            </div>
                        </div>
                    </div>
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
                $('#profile_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#profile_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // upload new photo show code end here
    </script>
    <script>
        // upload new cover photo show code start here
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#cover_photo_viewer').attr('src', e.target.result).width(150).height(195);
                };
                $('#cover_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }
        // upload new cover photo show code end here
    </script>
@endsection
