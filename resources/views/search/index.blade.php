{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Search
@endsection

@section('content')
    <div class="container">
        @if($dashboard_file->isNotEmpty())
            @foreach ($dashboard_file as $single_file_name)
                <ul class="metismenu text-center" id="menu">
                    <li><a href="{{$single_file_name->file_link}}" aria-expanded="false">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="text-white">Dashboared file name</h4>
                                </div>
                                <div class="card-body">
                                    <span class="nav-text ">{{$single_file_name->file_name}}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            @endforeach
        @else
            <div>
                <h2>No user found</h2>
            </div>
        @endif
    </div>
@endsection
