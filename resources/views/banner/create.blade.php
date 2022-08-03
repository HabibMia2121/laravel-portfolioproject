{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Banner
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
                    <h4 class="text-primary">Banner</h4>
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner title</label>
                                    <input type="text" name="banner_headline" class="form-control @error('banner_headline') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                    @error('banner_headline')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Banner Photo</label>
                                    <input type="file" name="banner_photo" class="form-control @error('banner_photo') is-invalid @enderror" style="border-color:rgb(79, 74, 143)" onchange="readURL(this);">
                                    <img class="hidden mt-2" id="banner_photo_viewer" style="width: 100px;height:auto;" src="#" alt="your image" /><br>
                                    <small>size:1920x1095</small><br>

                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-xs btn-square" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>

        @if (session('delete_message'))
            <div class="alert alert-danger">
                {{session('delete_message')}}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title">Banner Data</h4>
                        {{--recycle info code start here --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deleted Feature</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="banner_table2" class="table table-bordered">
                                            <thead class="table-inverse">
                                                <tr>
                                                    <th>Serial NO.</th>
                                                    <th>Banner Headline</th>
                                                    <th>Banner Photo</th>
                                                    <th>Acation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($deleted_banners_data as $deleted_data )
                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{$deleted_data->banner_headline}}</td>
                                                    <td>
                                                        <img src="{{url($deleted_data->banner_photo)}}" style="width: 100px; height:auto;" alt="Not found">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group mb-2">
                                                            <a href="{{route('banner_restore',$deleted_data->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                            <a href="{{route('force_delete',$deleted_data->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
                                                         </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="50">no data no show</td>
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
                        <div class="table-responsive">
                            <table id="banner_table1" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>Banner Headline</th>
                                        <th>Banner Photo</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner_info as $banner)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$banner->banner_headline}}</td>
                                        <td>
                                            <img src="{{url($banner->banner_photo)}}" style="width: 100px; height:auto;" alt="Not found">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <form action="{{route('banner.destroy',$banner->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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

        // datatable code start here
            $(document).ready( function () {
                $('#banner_table1').DataTable();
            } );
            $(document).ready( function () {
                $('#banner_table2').DataTable();
            } );
        //  datatable code end here
    </script>
@endsection


