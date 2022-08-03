{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Dashboard file
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- dashboard file add here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">File Add</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{session('success_message')}}
                            </div>
                        @endif
                        <form action="{{route('file_name.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Name</label>
                                        <input type="text" name="file_name" class="form-control @error('file_name') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('file_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Link</label>
                                        <input type="text" name="file_link" class="form-control @error('file_link') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('file_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-square" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- dashboard file list here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Dashboard file Data list</h4>
                    </div>
                    <div class="card-body">
                        @if (session('delete_message'))
                            <div class="alert alert-danger">
                                {{session('delete_message')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="dashboard_fileData_table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>File Name</th>
                                        <th>File Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dashboareda_all_data as $dashboareda_data)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$dashboareda_data->file_name}}</td>
                                            <td>{{$dashboareda_data->file_link}}</td>
                                            <td>
                                                <form action="{{route('file.delete',$dashboareda_data->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
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
                $('#dashboard_fileData_table').DataTable();
            });
        //  datatable code end here
    </script>
@endsection


