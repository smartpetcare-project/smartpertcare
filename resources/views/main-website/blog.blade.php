@extends('layouts.main-layout')
@section('title', 'Detail Layanan')
@section('content')
<section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
    <div class="banner-curve"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix text-center">
                    <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                       <h2>News Feeds<span class="dotted"></span></h2>
                    </div>
                    <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">News Feeds</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="blog-area" class="blog-style3-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    @if ($articles->isEmpty())
                        <div class="text-center">
                            Data not found!
                        </div>                        
                    @else
                        <div class="blog-posts">   
                            @foreach ($articles as $item)
                                <div class="single-blog-style2 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="img-holder">
                                        <div class="inner">
                                            <img src="{{ $item['image_header'] }}"
                                                alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="categories">
                                            <h5>{{ $item['category_name'] }}</h5>
                                        </div>
                                        <h2 class="blog-title">
                                            <a href="blog-single.html">{{ $item['title'] }}.</a>
                                        </h2>
                                        <ul class="meta-info">
                                            <li><span class="icon-eye"></span><a href="#">232 Views</a></li>
                                            <li><span class="icon-chat"></span><a href="#">{{ $item['rating_count'] }} Comments</a></li>
                                            <li><span class="icon-calendar"></span><a href="#">{{ $item['updated_at'] }}</a></li>
                                        </ul>
                                        <div class="text">
                                            <p>{{ $item['content'] }}...</p>
                                        </div>
                                        <div class="bottom-box">
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{ URL::asset('main-website/images/blog/author-1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="name">
                                                    <h4>by {{ $item['user']['name'] }}</h4>
                                                </div>
                                            </div>
                                            <div class="readmore">
                                                <a href="{{ route('blog.detail', $item['uuid']) }}"><span class="icon-next"></span>Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="styled-pagination clearfix text-center">
                                    @if ($articles->currentPage() > 1)
                                        <li class="prev">
                                            <a href="{{ $articles->previousPageUrl() }}">
                                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                        
                                    @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                                        <li class="{{ $page == $articles->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                        
                                    @if ($articles->hasMorePages())
                                        <li class="next">
                                            <a href="{{ $articles->nextPageUrl() }}">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif                    
                    
                </div>

                <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.0s" data-wow-duration="1200ms">
                            <div class="sidebar-about-me-box text-center">
                                <div class="title">
                                    <h3>About Me</h3>
                                </div>
                                <div class="image-box">
                                    <img src="{{ URL::asset('main-website/images/blog/sidebar-me-box-1.png') }}"
                                        alt="Awesome Image" />
                                </div>
                                <div class="text-holder">
                                    <h3>Rosalina D. Willaimson</h3>
                                    <p>Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore.</p>
                                    <div class="sidebar-social-link">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Start single sidebar-->
                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.1s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Popular Feeds</h3>
                            </div>
                            <ul class="popular-feeds">
                                <li>
                                    <div class="inner">
                                        <div class="img-box">
                                            <img src="{{ URL::asset('main-website/images/sidebar/popular-feeds-1.png') }}"
                                                alt="Awesome Image">
                                            <div class="overlay-content">
                                                <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="title-box">
                                            <h4><a href="#">Lorem ipsum dolor sit<br> cing elit, sed do.</a></h4>
                                            <h6><span class="icon-calendar-1"></span>24th March 2019</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="img-box">
                                            <img src="{{ URL::asset('main-website/images/sidebar/popular-feeds-2.png') }}"
                                                alt="Awesome Image">
                                            <div class="overlay-content">
                                                <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="title-box">
                                            <h4><a href="#">Lorem ipsum dolor sit<br> cing elit, sed do.</a></h4>
                                            <h6><span class="icon-calendar-1"></span>24th March 2019</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End single sidebar-->

                        <!--Start Single Sidebar -->
                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.6s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Instagram Feeds</h3>
                            </div>
                            <ul class="instagram">
                                <li>
                                    <div class="img-box">
                                        <img src="{{ URL::asset('main-website/images/sidebar/instagram-1.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-content">
                                            <a class="lightbox-image" data-fancybox="gallery"
                                                href="{{ URL::asset('main-website/images/sidebar/instagram-1.jpg') }}">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="img-box">
                                        <img src="{{ URL::asset('main-website/images/sidebar/instagram-2.jpg') }}"
                                            alt="Awesome Image">
                                        <div class="overlay-content">
                                            <a class="lightbox-image" data-fancybox="gallery"
                                                href="{{ URL::asset('main-website/images/sidebar/instagram-2.jpg') }}">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--End Single Sidebar -->
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
