@extends('master-page.dashboard_main_page')

@section('dashboard_bar')
    About-area List
@endsection

@section('content')
    @if (session('deleted_message'))
    <div class="alert alert-danger">
        {{session('deleted_message')}}
    </div>
    @endif
    <div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="card-title">About-area List</h4>
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
                                <table id="about_table2" class="table table-bordered">
                                    <thead class="table-inverse">
                                        <tr>
                                            <th>Serial NO.</th>
                                            <th>Text</th>
                                            <th>Headline</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Short Description</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deleted_info as $deleted )
                                        <tr>
                                            <td>{{$loop->index +1}}</td>
                                            <td>{{$deleted->text}}</td>
                                            <td>{{$deleted->headline}}</td>
                                            <td>{{$deleted->phone_number}}</td>
                                            <td>{{$deleted->email}}</td>
                                            <td>{{$deleted->short_description}}</td>
                                            <td>
                                                <img src="{{url($deleted->photo)}}" style="width: 100px; height:auto;" alt="Not found">
                                            </td>
                                            <td>
                                                <div class="btn-group mb-2">
                                                    <a href="{{route('about_restore',$deleted->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                    <a href="{{route('about_force_delete',$deleted->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                    <table id="about_table1" class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>Serial NO.</th>
                                <th>Text</th>
                                <th>Headline</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Short Description</th>
                                <th>Photo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($about_info as $about)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$about->text}}</td>
                                    <td>{{$about->headline}}</td>
                                    <td>{{$about->phone_number}}</td>
                                    <td>{{$about->email}}</td>
                                    <td>{{$about->short_description}}</td>
                                    <td>
                                        <img src="{{url($about->photo)}}" style="width: 100px; height:auto;" alt="Not found">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('about_area.edit',$about->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <form action="{{route('about_area.destroy',$about->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
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
    </div>
@endsection

@section('use-js-code')
    {{-- datatable code start here --}}
    <script>
        $(document).ready( function () {
            $('#about_table1').DataTable();
        } );
        $(document).ready( function () {
            $('#about_table2').DataTable();
        } );
    </script>
    {{-- datatable code end here --}}
@endsection
