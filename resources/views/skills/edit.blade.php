{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Skill Item Edit
@endsection

{{-- main content here --}}
@section('content')
    <div class="container">
        {{-- skill data edit here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4 class="text-white">Skill Data Edit</h4>
                    </div>
                    <div class="card-body">
                        @if (session('skill_update_message'))
                            <div class="alert alert-success">
                                {{session('skill_update_message')}}
                            </div>
                        @endif
                        <form action="{{route('skills.update',$skill->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skill Name</label>
                                        <input type="text" name="skill_name" class="form-control @error('skill_name') is-invalid @enderror" value="{{$skill->skill_name}}" style="border-color:rgb(79, 74, 143)">
                                        @error('skill_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Percentage</label>
                                        <div class="range-wrap">
                                            <input type="range" name="percentage" class="range" value="{{$skill->percentage}}">
                                            <output class="bubble"></output>
                                            @error('percentage')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
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
@endsection
@section('use-js-code')
    <script>
        //  percentage range value bubbles code start here
        const allRanges = document.querySelectorAll(".range-wrap");
        allRanges.forEach(wrap => {
        const range = wrap.querySelector(".range");
        const bubble = wrap.querySelector(".bubble");

        range.addEventListener("input", () => {
            setBubble(range, bubble);
        });
        setBubble(range, bubble);
        });

        function setBubble(range, bubble) {
        const val = range.value;
        const min = range.min ? range.min : 0;
        const max = range.max ? range.max : 100;
        const newVal = Number(((val - min) * 100) / (max - min));
        bubble.innerHTML = val;

        // Sorta magic numbers based on size of the native UI thumb
        bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
        }
        //  percentage range value bubbles code start here
    </script>
@endsection

