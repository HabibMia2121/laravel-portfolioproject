{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Portfolio Category
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- Portfolio header area start here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {{-- Portfolio header data add here --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h4 class="text-white">Portfolio Header Data</h4>
                            </div>
                            <div class="card-body">
                                @if (session('portfolio_head_update_message'))
                                    <div class="alert alert-success">
                                        {{session('portfolio_head_update_message')}}
                                    </div>
                                @endif
                                <form action="{{route('portfolio.header',$portfolio_head_data->id)}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Header Title</label>
                                                <input type="text" name="header_title" value="{{$portfolio_head_data->header_title}}" class="form-control @error('header_title') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                                @error('header_title')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Header Subtitle</label>
                                                <input type="text" name="header_subtitle" value="{{$portfolio_head_data->header_subtitle}}" class="form-control @error('header_subtitle') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                                @error('header_subtitle')
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
            </div>
        </div>
        {{-- Portfolio header area end here --}}

        {{-- Category data add here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Category Data Add</h4>
                    </div>
                    <div class="card-body">
                        @if (session('category_success_message'))
                            <div class="alert alert-success">
                                {{session('category_success_message')}}
                            </div>
                        @endif
                        <form action="{{route('category.insert')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" style="border-color:rgb(79, 74, 143)">
                                        @error('category_name')
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
        {{-- Category data list here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title text-white">Service Data list</h4>
                        {{--recycle info code start here --}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-2x"></i></button>
                        <div class="modal fade" id="exampleModalCenter">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deleted Service</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-black table-responsive">
                                        <table id="deletedCategory_table" class="table table-bordered">
                                            <thead class="table-inverse">
                                                <tr>
                                                    <th>Serial NO.</th>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($category_deleted_info as $category_deleted )
                                                    <tr>
                                                        <td>{{$loop->index +1}}</td>
                                                        <td>{{$category_deleted->category_name}}</td>
                                                        <td>
                                                            <div class="btn-group mb-2">
                                                                <a href="{{route('category_restore',$category_deleted->id)}}" type="button" class="btn btn-success btn-square btn-xs">Restore</a>
                                                                <a href="{{route('force.delete',$category_deleted->id)}}" type="button" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                        @if (session('category_delete'))
                            <div class="alert alert-danger">
                                {{session('category_delete')}}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="categoryData_table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Serial NO.</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category_data as $category)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <form action="{{route('category.delete',$category->id)}}" method="POST">
                                                        @csrf
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
                $('#categoryData_table').DataTable();
            });

            $(document).ready( function () {
                $('#deletedCategory_table').DataTable();
            });
        //  datatable code end here

    </script>
@endsection


