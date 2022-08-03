{{-- extend here --}}
@extends('master-page.frontend_master_page')

{{-- main content here --}}
@section('content')
<!-- slider start -->
@forelse ($banners_all_data as $banner_info)
<div id="home" class="slider-area hero pattern"  style="background-image: url({{url($banner_info->banner_photo)}})">
    <div class="home-arrow">
        <a href="#about" class="smoth-scroll">
            <i class="fa fa-angle-double-down"></i>
        </a>
    </div>
    <div class="single-slider slider-height d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class=" col-xl-8 offset-xl-2 text-center">
                    <div class="silder-content pt-50">
                        <h1 class="white-color mb-35" data-animation="fadeInDown" data-delay=".3s">{{$banner_info->banner_headline}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@empty
<div class="single-slider slider-height d-flex align-items-center">
    <div class="container">
        <div class="col-md-10 m-auto">
            <div class="alert alert-danger">
                <p>No data To show</p>
            </div>
        </div>
    </div>
</div>
@endforelse

<!-- slider end -->

<!-- features-area start -->
<div id="about" class="features-area pt-120 pb-90">
    <div class="container">
        <div class="row">
            @forelse ($about_all_data as $about_info )
                <div class="col-xl-5 col-lg-5">
                    <div class="about-me mb-30">
                        <img src="{{url($about_info->photo)}}" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about-me-info mt-30 mb-30 pl-30">
                        <span>{{$about_info->text}}</span>
                        <h2>{{$about_info->headline}}</h2>
                        <p>{{$about_info->short_description}}</p>
                        <div class="info-me mb-30">
                            <h6><span>Mail</span>: {{$about_info->email}}</h6>
                            <h6><span>Phone</span>: {{$about_info->phone_number}}</h6>
                        </div>
                        <a href="#contact" class="btn smoth-scroll">Hire Me</a>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No data To show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- features-area end -->
<!-- RESUME -->
<div id="resume" class="resume-area gray-bg pt-115 pb-70">
    <div class="container">
        <div class="row">
            <!-- RESUME COLUMN -->
            <div class="col-md-6 col-lg-3">
                <div class="profile wow fadeInUp" data-wow-delay=".3s">
                    <div class="profile-icon">
                        <span>
                            <i class="fa {{$Award_Icon->icon}} " aria-hidden="true"></i>
                        </span>
                    </div>
                    <h3 class="profile-title">Awards</h3>
                    <hr class="divider divider-gross m-b-30">
                    @forelse ($Award_data as $award)
                        <div class="profile-content">
                            <h6>{{$award->awards_name}}</h6>
                            <p>{{$award->award_subtitle}}</p>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /RESUME COLUMN -->

            <!-- RESUME COLUMN -->
            <div class="col-md-6 col-lg-3">
                <div class="profile wow fadeInUp" data-wow-delay=".5s">
                    <div class="profile-icon">
                        <span>
                            <i class="fa {{$education_Icon->icon}} " aria-hidden="true"></i>
                        </span>
                    </div>
                    <h3 class="profile-title">Education</h3>
                    <hr class="divider divider-gross m-b-30">

                    @forelse ($educations_data as $educations)
                        <div class="profile-content">
                            <h6>{{$educations->institution_name}}</h6>
                            <p>{{$educations->qualification_title}}</p>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /RESUME COLUMN -->

            <!-- RESUME COLUMN -->
            <div class="col-md-6 col-lg-3">
                <div class="profile wow fadeInUp" data-wow-delay=".7s">
                    <div class="profile-icon">
                        <span>
                            <i class="fa {{$experience_Icon->icon}} " aria-hidden="true"></i>
                        </span>
                    </div>
                    <h3 class="profile-title">Experience</h3>
                    <hr class="divider divider-gross m-b-30">

                    @forelse ($experience_data as $experience)
                        <div class="profile-content">
                            <h6>{{$experience->experience_name}}</h6>
                            <p>{{$experience->experience_subtitle}}</p>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- /RESUME COLUMN -->

            <!-- RESUME COLUMN -->
            <div class="col-md-6 col-lg-3">
                <div class="profile wow fadeInUp" data-wow-delay=".9s">
                    <div class="profile-icon">
                        <span>
                            <i class="fa {{$skill_Icon->icon}} " aria-hidden="true"></i>
                        </span>
                    </div>
                    <h3 class="profile-title">My Skills</h3>
                    <hr class="divider divider-gross m-b-30">

                    @forelse ($skill_data as $skill)
                        <h6 class="progress-title">{{$skill->skill_name}}</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <span>{{$skill->percentage}}%</span>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>
            <!-- /RESUME COLUMN -->
        </div>
    </div>
</div>
<!-- /RESUME -->
<!-- basic-service-area start -->
<div id="service" class="basic-service-area pt-115 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="area-title text-center mb-70">
                    <h2>{{$service_header->header_title}}</h2>
                    <p>{{$service_header->header_subtitle}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $delay_time=0.1;
            @endphp
            @forelse ($service_data as $service)
                <div class="col-md-6  mb-50">
                    <div class="service-box wow fadeIn" data-wow-delay="{{$delay_time+=0.1}}s">
                        <div class="service-icon">
                            <span>
                                <i class="fa {{$service->icon}} " aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="service-content">
                            <h3>{{$service->title}}</h3>
                            <p>{{$service->small_description}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No data To show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- basic-service-area end -->
<!-- counter-area-start -->
<div class="counter-area pt-150 pb-120" style="background-image:url({{asset('upload-photo-file/counter-bg-photo')}}/{{$counter_bgphoto->background_photo}})">
    <div class="container">
        <div class="row">
            @forelse ($counter_data as $counters )
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-wrapper text-center mb-30 wow fadeInUp" data-wow-delay=".3s">
                        <div class="counter-icon">
                            <span>
                                <i class="fa {{$counters->icon}} " aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="counter-text">
                            <h1 class="counter">{{$counters->count_number}}</h1>
                            <span>{{$counters->count_name}}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No data To show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- counter-area-end -->
<!-- portfolio-area start -->
<div id="work" class="portfolio-area pt-115">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="area-title text-center mb-70">
                    <h2>{{$portfolio_head->header_title}}</h2>
                    <p>{{$portfolio_head->header_subtitle}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="portfolio-menu mb-40 text-center">
                    <button class="active" data-filter="*">ALL</button>
                    @foreach($Category_data as $Category )
                        <button data-filter=".cat{{$Category->id}}">{{$Category->category_name}}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row grid">
            @forelse ($Subcategory_data as $Subcategory )
                <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat{{$Subcategory->category_id}}">
                    <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay=".3s">
                        <div class="portfolio-thumb">
                            <img src="{{$Subcategory->thumbnail_photo}}" alt="not found">
                        </div>
                        <div class="portfolio-content">
                            <h3>
                                <a href="#" data-toggle="modal" data-target="#popup-moda{{$Subcategory->id}}">{{$Subcategory->title}}</a>
                            </h3>
                            <span>{{$Subcategory->subtitle}}</span>
                        </div>
                    </div>
                    <!-- Modal content start -->
                    <div class="modal fade" id="popup-moda{{$Subcategory->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="view-project">
                                    <div class="project-media" style="background-image:url({{$Subcategory->thumbnail_photo}})"></div>
                                    <div class="view-project-content pt-10">
                                        <div class="modal-title">
                                            <h2>{{$Subcategory->title}}</h2>

                                        </div>
                                        <p>{{$Subcategory->Short_description}}</p>
                                        <ul class="project-info-list">
                                            <li class="text-uppercase">
                                                <span>Client</span>{{$Subcategory->client}}</li>
                                            <li class="text-uppercase">
                                                <span>Industry</span>{{$Subcategory->industay}}</li>
                                            <li class="text-uppercase">
                                                <span>Services</span>{{$Subcategory->services}}</li>
                                            <li class="text-uppercase">
                                                <span>Website</span>
                                                <a href="#">{{$Subcategory->website}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal content end -->
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger text-center">
                        <p>Nothing to show</p>
                    </div>
                </div>
            @endforelse


            {{-- <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat1 cat4">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay=".5s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port5.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal5">Redesign Work</a>
                        </h3>
                        <span>Design, Brand</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal5" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port5.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Redesign Work</h2>

                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the system, and expound the actual teachings of
                                        the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,
                                        or avoids pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat3 cat4">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay=".7s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port7.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal7">Beautifully Designed</a>
                        </h3>
                        <span>Design, Web</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal7" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port7.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Beautifully Designed</h2>

                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the system, and expound the actual teachings of
                                        the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,
                                        or avoids pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat1 cat2">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay=".9s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port8.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal8">Creative Shop Work</a>
                        </h3>
                        <span>Fashion, Web</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal8" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port8.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Creative Shop Work</h2>

                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the system, and expound the actual teachings of
                                        the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,
                                        or avoids pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat3 cat4">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay="1.1s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port1.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal">Neleman Cava</a>
                        </h3>
                        <span>Branding, Video</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port1.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Neleman Cava</h2>
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born
                                        and I will give you a complete account of the system, and expound the actual teachings of the great
                                        explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat1 cat4">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay="1.3s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port3.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal3">Jeff Burger</a>
                        </h3>
                        <span>Printing, Branding</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port3.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Jeff Burger</h2>
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born
                                        and I will give you a complete account of the system, and expound the actual teachings of the great
                                        explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat2 cat1">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay="1.5s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port4.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal4">Delirio Tropical</a>
                        </h3>
                        <span>Buildings, Office</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal4" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port4.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Delirio Tropical</h2>

                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born
                                        and I will give you a complete account of the system, and expound the actual teachings of the great
                                        explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                                        pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 grid-item cat2 cat3">
                <div class="portfolio-wrapper mb-30 wow fadeIn" data-wow-delay="1.7s">
                    <div class="portfolio-thumb">
                        <img src="{{asset('portfolio-css')}}/img/portfolio/port2.jpg" alt="">
                    </div>
                    <div class="portfolio-content">
                        <h3>
                            <a href="#" data-toggle="modal" data-target="#popup-modal2">Sweet Lane</a>
                        </h3>
                        <span>Graphic, Printing</span>
                    </div>
                </div>
                <!-- Modal content start -->
                <div class="modal fade" id="popup-modal2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="view-project">
                                <div class="project-media" style="background-image:url({{asset('portfolio-css')}}/img/portfolio/port2.jpg)"></div>
                                <div class="view-project-content pt-10">
                                    <div class="modal-title">
                                        <h2>Sweet Lane</h2>
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born and I will give you a complete account of the system, and expound the actual teachings of
                                        the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,
                                        or avoids pleasure itself, because it is pleasure.</p>
                                    <ul class="project-info-list">
                                        <li class="text-uppercase">
                                            <span>Client</span>Jon Morikas</li>
                                        <li class="text-uppercase">
                                            <span>Industry</span>Adventure / Travel</li>
                                        <li class="text-uppercase">
                                            <span>Services</span>Design, Art Direction, Website</li>
                                        <li class="text-uppercase">
                                            <span>Website</span>
                                            <a href="#">www.project.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal content end -->
            </div> --}}
        </div>
    </div>
</div>
<!-- portfolio-area end -->
<!-- team-area start -->
<div id="team" class="team-area pt-80 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="area-title text-center mb-70">
                    <h2 class="mb-15">{{$team_header->header_title}}</h2>
                    <p>{{$team_header->header_subtitle}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $delay_time=0.3;
            @endphp
            @forelse ($team_data as $team )
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="team-box mb-30 wow fadeInUp" data-wow-delay="{{$delay_time+=0.3}}s">
                        <div class="team-img">
                            <img src="{{$team->photo}}" alt="">
                        </div>
                        <div class="team-content">
                            <div class="team-table">
                                <div class="inner-team">
                                    <div class="title-team">
                                        <h3>{{$team->title}}</h3>
                                    </div>
                                    <div class="sub-title-team">
                                        <span>{{$team->subtitle}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No data To show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- team-area end -->
<!-- basic-hire-area start -->
<div class="basic-hire-area black-bg pt-130 pb-140">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="hire-us text-center wow fadeInUp" data-wow-delay=".3s">
                    <h2>{{$Hire_area->short_description}}</h2>
                    <a href="#contact" class="btn btn-red smoth-scroll">Hire Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- basic-hire-area end -->
<!-- testimonial start -->
<div class="testimonial-area pt-115 pb-120 wow fadeInUp" data-wow-delay=".2s">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="area-title text-center mb-30">
                    <h2 class="mb-15">{{$testimonial_header->header_title}}</h2>
                    <p>{{$testimonial_header->header_subtitle}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="testimonial-active">
                    @forelse ($Testimonial_data as $Testimonial )
                        <div class="testimonial-item">
                            <div class="inner-tesimonial text-center">
                                <p>{{$Testimonial->small_description}}</p>
                                <div class="testimonail-name">
                                    <h6>{{$Testimonial->title}}</h6>
                                    <span>{{$Testimonial->subtitle}}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="testimonial-nav">
                    @forelse ($Testimonial_data as $Testimonial )
                        <div class="testimonial-thumb">
                            <img src="{{$Testimonial->photo}}" alt="not found">
                        </div>
                    @empty
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <p>No data To show</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial end -->
<!-- basic-blog-area -->
<div id="blog" class="basic-blog-area gray-bg pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                <div class="area-title text-center mb-70">
                    <h2>{{$blogHead_all_data->header_title}}</h2>
                    <p>{{$blogHead_all_data->header_subtitle}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($blog_all_data as $blog_data )
                <div class="col-lg-4 blog-item mb-30">
                    <div class="blog-wrapper blog-column">
                        <div class="blog-thumb">
                            <a href="{{route('blog.details',$blog_data->id)}}">
                                <img src="{{$blog_data->blog_photo}}" alt="not found">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">
                                <a href="{{route('blog.details',$blog_data->id)}}">{{$blog_data->title}}</a>
                            </h2>
                            <p>{{substr($blog_data->long_description,0,150)}} </p>
                        </div>
                        <div class="meta-info">
                            <ul>
                                <li class="posts-time">{{$blog_data->created_at->format('M d, Y')}}</li>
                                <li class="comments-count">
                                    <a href="#">4 Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-10 m-auto">
                    <div class="alert alert-danger">
                        <p>No data To show</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- basic-blog-area end -->

<!-- contact-form-area start -->
<div id="contact" class="contact-form-area pt-115 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="area-title mb-40">
                    <h2 class="mb-15">{{$contact_header->head_name_one}}</h2>
                </div>

                <div class="contact-form mb-50 wow fadeInLeft" data-wow-delay=".3s">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="name_id" name="name" type="text" class="mb-1 mt-3" placeholder="Your Name :">
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="col-md-6">
                                <input id="email_id" name="email" type="email" class="mb-1 mt-3" placeholder="Email :">
                                <span class="text-danger" id="emailError"></span>
                            </div>
                            <div class="col-md-12">
                                <input id="number_id" name="number" type="number" class="mb-1 mt-3" placeholder="Phono Number :">
                                <span class="text-danger" id="numberError"></span>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="30" rows="10" class="mb-1 mt-3" placeholder="Your message :"></textarea>
                                <span class="text-danger " id="messageError"></span><br>
                                <div class="btn mt-3" id="click_btn">
                                    Send Message
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="ajax-response"></p>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="area-title mb-40">
                    <h2 class="mb-15">{{$contact_header->head_name_two}}</h2>
                    <p>{{$contact_header->head_title}}</p>
                </div>
                <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s">
                    <ul>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Location</h5>
                                @foreach ($about_all_data as $about_info )
                                    <span>{{$about_info->address}}</span>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-headphone"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Call Us</h5>
                                @foreach ($about_all_data as $about_info )
                                    <span>{{$about_info->phone_number}}</span>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Email Us</h5>
                                @foreach ($about_all_data as $about_info )
                                    <span>{{$about_info->email}}</span>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact-form-area end -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/625e7b977b967b11798b631a/1g10h5ihl';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endsection

@section('use_for_js_code')
    <script>
        $(document).ready(function(){
            $('#click_btn').click(function(){
                var name = $('#name_id').val();
                var email = $('#email_id').val();
                var number = $('#number_id').val();
                var message = $('#message').val();

                // ajax start here
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('contact.store')}}",
                    data:{name:name,email:email,number:number,message:message},

                    success:function(data){
                        $('#name_id').val('');
                        $('#email_id').val('');
                        $('#number_id').val('');
                        $('#message').val('');
                        Swal.fire({
                            icon: 'success',
                            title: 'Added Successfully!',
                            text: "Important!",
                        })
                    },
                    error:function (response) {
                        $('#nameError').text(response.responseJSON.errors.name);
                        $('#emailError').text(response.responseJSON.errors.email);
                        $('#numberError').text(response.responseJSON.errors.number);
                        $('#messageError').text(response.responseJSON.errors.message);
                    }
                });
                // ajax end here
            });
        });
    </script>
@endsection
