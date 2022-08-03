{{-- extend here --}}
@extends('master-page.frontend_master_page')

{{-- main content here --}}
@section('content')
    <!-- page title start -->
    @foreach ($banners_all_data as $banners_data )
        <div class="page-title-area" data-overlay="5" style="background-image:url({{asset($banners_data->banner_photo)}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title z-index text-center">
                            <h1>Blog Details</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item">
                                            <a href="{{url()->previous()}}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                                    </ol>
                                </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- page title end -->

    <!-- blog-area start -->
    <div class="blog-area gray-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-post-items">
                    <div class="blog-wrapper blog-details">
                        <div class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset($blog_details_data->blog_photo)}}" alt="not found">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title">{{$blog_details_data->title}}</h2>
                            <div class="meta-info meta-details">
                                <ul>
                                    <li class="posts-author">by
                                        <a title="Author" href="#">Author</a>
                                    </li>
                                    <li class="posts-time">{{$blog_details_data->created_at->format('M d, M')}}</li>
                                    <li class="comments-count">
                                        <a href="#">4 Comments</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-social">
                                <a class="facebook" href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                                <a class="twitter" href="#">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                                <a class="instagram" href="#">
                                    <i class="ti-instagram"></i>
                                </a>
                                <a class="googleplus" href="#">
                                    <i class="ti-google"></i>
                                </a>
                                <a class="linkedin" href="#">
                                    <i class="ti-vimeo-alt"></i>
                                </a>
                            </div>
                            {{-- <p>Wooded direct two men indeed income sister. Impression up admiration he by partiality is. Instantly
                                immediate his saw one day perceived. Old blushes respect but offices hearted minutes effects.
                                Written parties winding oh as in without on started. Residence gentleman yet preserved few convinced...
                                </p> --}}
                            <blockquote>Well, duh. USA's Mr. Robot is probably the most accurate and detailed dramatic portrayal ever made
                                of current hacking practices and hacker culture. Its depiction of the cybersecurity community
                                and its broader meditation on the relationship!</blockquote>
                            <h2 class="blog-title blog-title-sm">Selecting the Right Movie</h2>
                            <p>{{substr($blog_details_data->long_description,0,250)}}</p>
                            <div class="blob-post-gallery">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset($blog_details_data->blog_photo)}}" alt="not found">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset($blog_details_data->blog_photo)}}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p>{{substr($blog_details_data->long_description,250)}}</p>
                        </div>
                        <div class="blog-more-info">
                            <div class="comments mt-60">
                                <h2 class="blog-section-title">3 Comments</h2>
                                <!-- COMMENT 1 -->
                                <div id="comment-1" class="comment">
                                    <div class="comment-avatar">
                                        <img src="{{asset('portfolio-css')}}/img/blog/avatar/1.jpg" alt="">
                                    </div>
                                    <div class="comment-tools">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="October 24, 2015">
                                            <i class="ti-timer"></i>
                                        </a>
                                        <a href="#comment-form" class="smoothscroll" data-toggle="tooltip" title="" data-original-title="Reply">
                                            <i class="ti-comment"></i>
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <h5>
                                            <a href="#">Jon DOe</a>
                                        </h5>
                                        <p>Well, duh. USA's Mr. Robot is probably the most accurate and detailed dramatic portrayal
                                            ever made of current hacking practices and hacker culture.</p>
                                    </div>
                                </div>
                                <!-- END COMMENT 1 -->

                                <!-- COMMENT 2: COMMENT-REPLY -->
                                <div id="comment-2" class="comment comment-reply">
                                    <div class="comment-avatar">
                                        <img src="{{asset('portfolio-css')}}/img/blog/avatar/2.jpg" alt="">
                                    </div>
                                    <div class="comment-tools">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="October 24, 2015">
                                            <i class="ti-timer"></i>
                                        </a>
                                        <a href="#comment-form" class="smoothscroll" data-toggle="tooltip" title="" data-original-title="Reply">
                                            <i class="ti-comment"></i>
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <h5>
                                            <a href="#">Son Hai</a>
                                        </h5>
                                        <p>The story of whistleblower Edward Snowden is the most dramatic spy story of the decade.
                                            An Oliver Stone biopic was inevitable.</p>
                                    </div>
                                </div>
                                <!-- END COMMENT 2: COMMENT-REPLY -->

                                <!-- COMMENT 3 -->
                                <div id="comment-3" class="comment">
                                    <div class="comment-avatar">
                                        <img src="{{asset('portfolio-css')}}/img/blog/avatar/3.jpg" alt="">
                                    </div>
                                    <div class="comment-tools">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="October 24, 2015">
                                            <i class="ti-timer"></i>
                                        </a>
                                        <a href="#comment-form" class="smoothscroll" data-toggle="tooltip" title="" data-original-title="Reply">
                                            <i class="ti-comment"></i>
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <h5>
                                            <a href="#">Jon doe</a>
                                        </h5>
                                        <p>It's important to stay detail oriented with every project we tackle. Staying focused
                                            allows us to turn</p>
                                    </div>
                                </div>
                                <!-- END COMMENT 3 -->
                            </div>
                            <div class="comments-form">
                                <h2 class="blog-section-title">Leave a Reply</h2>
                                <form action="#">
                                    <label for="comment">Comment *</label>
                                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                                    <label for="name">Name *</label>
                                    <input id="name" type="text" />
                                    <label for="email">Email *</label>
                                    <input id="email" type="email" />
                                    <div>
                                        <button type="submit">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-blog">
                    <div class="widget">
                        <h4 class="widget-title">Search here</h4>
                        <div class="sidebar-form">
                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Recent Posts</h4>
                        <div class="sidebar-rc-post">
                            <ul>
                                <li>
                                    <div class="rc-post-thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('portfolio-css')}}/img/blog/rcp-1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <h4>
                                            <a href="blog-details.html">Wooded direct two men indeed income sister</a>
                                        </h4>
                                        <div class="widget-date">December 10, 2016</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rc-post-thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('portfolio-css')}}/img/blog/rcp-2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <h4>
                                            <a href="blog-details.html">Wooded direct two men indeed income sister</a>
                                        </h4>
                                        <div class="widget-date">December 10, 2016</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rc-post-thumb">
                                        <a href="blog-details.html">
                                            <img src="{{asset('portfolio-css')}}/img/blog/rcp-3.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <h4>
                                            <a href="blog-details.html">Wooded direct two men indeed income sister</a>
                                        </h4>
                                        <div class="widget-date">December 10, 2016</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">My Social link</h4>
                        <div class="widget-social">
                            <a class="facebook" href="#">
                                <i class="ti-facebook"></i>
                            </a>
                            <a class="twitter" href="#">
                                <i class="ti-twitter-alt"></i>
                            </a>
                            <a class="instagram" href="#">
                                <i class="ti-instagram"></i>
                            </a>
                            <a class="googleplus" href="#">
                                <i class="ti-google"></i>
                            </a>
                            <a class="linkedin" href="#">
                                <i class="ti-vimeo-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>
                        <div class="widget-tags">
                            <ul class="sidebar-tad">
                                @foreach ($skill_data as $skill )
                                    <li>
                                        <a href="">{{$skill->skill_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->
@endsection
