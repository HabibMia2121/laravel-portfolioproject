<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{env('APP_NAME')}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- ajax x-csrf token use start here --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- ajax x-csrf token use end here --}}

        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('portfolio-css')}}/img/favicon.png">
        <!-- Place favicon.png in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/animate.min.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/themify-icons.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/strock-gap-icons.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/slick.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/default.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/style.css">
        <link rel="stylesheet" href="{{asset('portfolio-css')}}/css/responsive.css">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- preloader -->
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- preloader -->

        <!-- header start -->
        <header id="sticky-header" class="header-area header-transparent pt-10 pb-10 ">
            <div class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a class="navbar-brand" href="index.html">
                                        <h3>{{env('APP_NAME')}}</h3>
                                    </a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#home">Home </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#about">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#service">Service</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#work">Work</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#team">Team</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#blog">Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#contact">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- main content code start here -->
        @yield('content')
        <!-- main content code end here -->


        <!-- footer start -->
        <footer>
            <div class="footer-area black-bg pt-90 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-text text-center wow fadeInUp" data-wow-delay=".3s">
                                <div class="footer-icon mb-20">
                                    @forelse (App\Models\Footer_icon::all() as $footer_data )
                                        <a href="{{$footer_data->social_link}}"><i class="fa {{$footer_data->social_icon}}"></i></a>
                                    @empty
                                        <div class="col-md-10 m-auto">
                                            <span class="text-danger">There are no icons to show!</span>
                                        </div>
                                    @endforelse
                                </div>
                                <p>Copyright- {{date('Y')}} Ahosan Habib, All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->




    <!-- JS here -->
    <script src="{{asset('portfolio-css')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/popper.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/one-page-nav-min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/waypoints.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/slick.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/ajax-form.js"></script>
    <script src="{{asset('portfolio-css')}}/js/wow.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/jquery.scrollUp.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('portfolio-css')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <script src="{{asset('portfolio-css')}}/js/plugins.js"></script>
    <script src="{{asset('portfolio-css')}}/js/main.js"></script>
    <script src="{{asset('portfolio-css')}}/sweetalert2/sweetalert2@11.js"></script>

    <!-- js code start here -->
    @yield('use_for_js_code')
    <!-- js code end here -->
</body>
</html>

