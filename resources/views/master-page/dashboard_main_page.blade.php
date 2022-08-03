<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}- @yield('dashboard_bar')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashboard-css')}}/images/favicon.png">
	<link href="{{asset('dashboard-css')}}/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="{{asset('dashboard-css')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{asset('dashboard-css')}}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="{{asset('dashboard-css')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('dashboard-css')}}/css/custom.css" rel="stylesheet">
    <link href="{{asset('dashboard-css')}}/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{asset('dashboard-css')}}/images/logo.png" alt="">
                {{-- <img class="logo-compact" src="{{asset('dashboard-css')}}/images/logo-text.png" alt=""> --}}
                {{-- <img class="brand-title" src="{{asset('dashboard-css')}}/images/logo-text.png" alt=""> --}}
                <h4 class="brand-title">{{env('APP_NAME')}}</h4>
            </a>


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                {{-- dashboard bar start here --}}
								    @yield('dashboard_bar')
                                {{-- dashboard bar end here --}}
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
                                <form action="{{route('search')}}" method="GET">
                                    <div class="input-group search-area d-xl-inline-flex d-none">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                                        </div>
                                        <input type="text"name="search" class="form-control" placeholder="Search here..." required>
                                    </div>
                                </form>
							</li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{asset('upload-photo-file/profile-photo')}}/{{auth()->user()->profile_photo}}" width="20" alt=""/>
									<div class="header-info">
										<span class="text-black"><strong>{{auth()->User()->name}}</strong></span>
										<p class="fs-12 mb-0">Admin</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('profile.index')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{route('index')}}" target="blank" class="dropdown-item ai-icon">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        <span class="ml-2">Visite website</span>
                                    </a>
                                    <a href="{{asset('dashboard-css')}}/page-login.html" class="dropdown-item ai-icon"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">

                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="" href="{{route('home')}}" aria-expanded="false">
                            <i class="fa fa-home" aria-hidden="true"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="" href="{{route('banner.create')}}" aria-expanded="false">
                            <i class="fa fa-cube" aria-hidden="true"></i>
							<span class="nav-text">Banner</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-hdd-o" aria-hidden="true"></i>
							<span class="nav-text">About Area</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('about_area.create')}}">Create Information</a></li>
                            <li><a class="" href="{{route('about_area.index')}}" aria-expanded="false">List</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
							<span class="nav-text">Awards</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('award.index')}}" aria-expanded="false">Award-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
							<span class="nav-text">Education</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('educations.index')}}" aria-expanded="false">Education-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-connectdevelop" aria-hidden="true"></i>
							<span class="nav-text">Experience</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('experience.index')}}" aria-expanded="false">Experience-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
							<span class="nav-text">Skills</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('skills.index')}}" aria-expanded="false">Skill-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
							<span class="nav-text">Services</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('service.index')}}" aria-expanded="false">Service-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-building" aria-hidden="true"></i>
							<span class="nav-text">Counters</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('counter.index')}}" aria-expanded="false">Counter-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-window-restore" aria-hidden="true"></i>
                            <span class="nav-text">Protfolio Area</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('category.index')}}">Category</a></li>
                            <li><a class="" href="{{route('subcategory.index')}}" aria-expanded="false">Subcategory</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
							<span class="nav-text">Teams</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('team.index')}}" aria-expanded="false">Team-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-h-square" aria-hidden="true"></i>
							<span class="nav-text">Hire Area</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('hire.area')}}" aria-expanded="false">Hire-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-superpowers" aria-hidden="true"></i>
							<span class="nav-text">Testimonial</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('testimonial.index')}}" aria-expanded="false">Testimonial-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-th" aria-hidden="true"></i>
							<span class="nav-text">Blog</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('blog.index')}}" aria-expanded="false">Blog-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-phone" aria-hidden="true"></i>
							<span class="nav-text">Contact Area</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('contact.index')}}" aria-expanded="false">Contact-Data-Create</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-futbol-o" aria-hidden="true"></i>
							<span class="nav-text">Footer Icon</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('footer_icon.index')}}" aria-expanded="false">Icon Index</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-folder" aria-hidden="true"></i>
							<span class="nav-text">Dashboard File</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{route('dashboard.index')}}" aria-expanded="false">Index</a>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            {{-- main content start here --}}
                @yield('content')
            {{-- main content end here --}}

        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="{{route('home')}}" target="_blank">Ahosan Habib</a> {{date('Y')}}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('dashboard-css')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('dashboard-css')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{asset('dashboard-css')}}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{asset('dashboard-css')}}/js/custom.min.js"></script>
	<script src="{{asset('dashboard-css')}}/js/deznav-init.js"></script>
	<script src="{{asset('dashboard-css')}}/vendor/owl-carousel/owl.carousel.js"></script>
	<script src="{{asset('dashboard-css')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('dashboard-css')}}/vendor/chart.js/chart.min.js"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('dashboard-css')}}/vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="{{asset('dashboard-css')}}/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('dashboard-css')}}/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});

	</script>
    {{--another page for js code use start here --}}
    @yield('use-js-code')
    {{-- another page for js code use end here  --}}
</body>
</html>
