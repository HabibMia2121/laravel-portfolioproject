{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Contact Area
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- contact header area start here --}}
        <div class="row">
            {{-- contact header data add here --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Contact Header Data</h4>
                    </div>
                    <div class="card-body">
                        @if (session('contact_head_update_message'))
                            <div class="alert alert-success">
                                {{session('contact_head_update_message')}}
                            </div>
                        @endif
                        <form action="{{route('contact.header',$contact_header_data->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Header name one</label>
                                        <input type="text" name="head_name_one" value="{{$contact_header_data->head_name_one}}" class="form-control @error('header_title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('head_name_one')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Header name two</label>
                                        <input type="text" name="head_name_two" value="{{$contact_header_data->head_name_two}}" class="form-control @error('header_title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('head_name_two')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Header Title</label>
                                        <input type="text" name="head_title" value="{{$contact_header_data->head_title}}" class="form-control @error('header_title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('head_title')
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
        {{-- contact header area end here --}}

        {{-- contact data list here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Customer Data Contact list</h4>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Number</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($contact_area_deleted_data as $contact_area_deleted )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$contact_area_deleted->name}}</td>
                                                        <td>{{$contact_area_deleted->email}}</td>
                                                        <td>{{$contact_area_deleted->number}}</td>
                                                        <td>{{$contact_area_deleted->message}}</td>
                                                        <td>
                                                            <div class="btn-group mb-2">
                                                                <a href="{{route('contact_restore',$contact_area_deleted->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('force_delete',$contact_area_deleted->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                            <table id="contactData_table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contact_data_all as $contact_data)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$contact_data->name}}</td>
                                            <td>{{$contact_data->email}}</td>
                                            <td>{{$contact_data->number}}</td>
                                            <td>{{$contact_data->message}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{route('contact.destroy',$contact_data->id)}}" method="POST">
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
                $('#contactData_table').DataTable();
            });

            $(document).ready( function () {
                $('#deletedTestimonial_table').DataTable();
            });
        //  datatable code end here
    </script>
@endsection


