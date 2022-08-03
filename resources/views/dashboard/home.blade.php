{{-- extends here --}}
@extends('master-page.dashboard_main_page')

{{-- head title content here --}}
@section('dashboard_bar')
    Dashboard Home
@endsection

{{-- main content here --}}
@section('content')
   <div class="container">
       <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-success">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">User</p>
                                <h3 class="text-white">{{$total_user}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-info">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-crosshairs" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Total Customer Join</p>
                                <h3 class="text-white">{{$total_customer_contact}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-red">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-shield" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Category</p>
                                <h3 class="text-white">{{$total_category}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-indent" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Subcategory</p>
                                <h3 class="text-white">{{$total_subcategory}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>

       <div class="row">
           <div class="col-lg-12 col-sm-6 mt-3">
               <div class="card">
                   <div class="card-header">
                       <h2>Chart Here</h2>
                   </div>
                   <div class="card-body">
                    <canvas id="myChart" width="400" height="400"></canvas>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('use-js-code')
{{-- chart.js code start here --}}
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['User', 'Customer join', 'Category', 'Subcategory'],
            datasets: [{
                label: '# of Total',
                data: [{{$total_user}}, {{$total_customer_contact}}, {{$total_category}},{{$total_subcategory}}],
                backgroundColor: [
                    '#2BC155',
                    '#1EA7C5',
                    '#EE3232',
                    '#A02CFA',
                ],
                borderColor: [
                    '#2BC155',
                    '#1EA7C5',
                    '#EE3232',
                    '#A02CFA',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
{{-- chart.js code end here --}}
@endsection
