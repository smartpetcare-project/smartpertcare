@extends('layouts.main-layout')
@section('title', 'Detail Layanan')
@section('content')
    <section class="breadcrumb-area"
        style="background-image: url({{ URL::asset('main-website/images/breadcrumb/breadcrumb-1.png') }});">
        <div class="banner-curve-gray"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix text-center">
                        <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <h2>News Details<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">News Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-area" class="blog-single-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-posts">
                        <div class="single-blog-style2">
                            <div class="text-holder">
                                <!--Start Blog Details Single-->
                                <div class="blog-details-single">
                                    <div class="categories">
                                        <h5>{{ $article['category_name'] }}</h5>
                                    </div>
                                    <h2 class="blog-title">{{ $article['title'] }}.</h2>
                                    <ul class="meta-info">
                                        <li><span class="icon-user"></span><a href="#">by
                                                {{ $article['user']['name'] }}</a></li>
                                        <li><span class="icon-calendar"></span><a
                                                href="#">{{ $article['updated_at'] }}</a></li>
                                        <li><span class="icon-chat"></span><a href="#">{{ $article['rating_count'] }}
                                                Comments</a></li>
                                    </ul>
                                    <div class="text">
                                        @php
                                            $imageContent = $article['image_content'];
                                            $firstImages = array_slice($imageContent, 0, 1);
                                            $middleImages = array_slice($imageContent, 1, 2);
                                            $lastImages = array_slice($imageContent, 2, 2);

                                            $contentParts = explode('</p>', $article['content']);
                                            $firstParagraph = $contentParts[0];
                                            $middleContentParts = array_slice(
                                                $contentParts,
                                                1,
                                                count($contentParts) - 4,
                                            );
                                            $beforeLastParagraph = $contentParts[count($contentParts) - 3];
                                            $lastParagraph = $contentParts[count($contentParts) - 2];
                                        @endphp
                                        {!! $firstParagraph !!}

                                        @if ($article['image_content'])
                                            <div class="blog-details-image-1">
                                                <img src="{{ $firstImages[0] }}" alt="">
                                            </div>
                                        @endif


                                        @php
                                            // Inject middle images within middle content paragraphs
                                            $insertedMiddleContent = '';
                                            foreach ($middleContentParts as $index => $part) {
                                                $insertedMiddleContent .= $part . '</p>';
                                                if (isset($middleImages[$index])) {
                                                    $insertedMiddleContent .=
                                                        '<div class="blog-details-image-middle">
                                                            <img src="' .
                                                        $middleImages[$index] .
                                                        '" alt="">
                                                        </div>';
                                                }
                                            }
                                        @endphp
                                    </div>

                                    <div class="blog-details-image-2">
                                        <div class="image-box">
                                            <img src="{{ URL::asset('main-website/images/blog/blog-details-image-2.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="text-box">
                                            {!! $lastParagraph !!}
                                        </div>
                                    </div>

                                    {!! $beforeLastParagraph !!}


                                    <div class="tag-social-share-box">
                                        {{-- <div class="single-box">
                                            <div class="title">
                                                <h3>Releted Tags</h3>
                                            </div>
                                            <ul class="tag-list">
                                                <li><a href="#">Popular</a></li>
                                                <li><a href="#">Desgin</a></li>
                                                <li><a href="#">UI/UX</a></li>
                                            </ul>
                                        </div> --}}
                                        <div class="single-box">
                                            <div class="title right">
                                                <h3>Social Share</h3>
                                            </div>
                                            <ul class="social-share">
                                                <li>
                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="blog-prev-next-option">
                                        <div class="single-box left">
                                            <p><a href="#">Prev Post</a></p>
                                            <h2><a href="#">Tips On Minimalist</a></h2>
                                        </div>
                                        <div class="middle-box">
                                            <div class="icon">
                                                <a href="#"><span class="icon-menu"></span></a>
                                            </div>
                                        </div>
                                        <div class="single-box right">
                                            <p><a href="#">Next Post</a></p>
                                            <h2><a href="#">Less Is More</a></h2>
                                        </div>
                                    </div>

                                </div>
                                <!--End Blog Details Single-->

                            </div>
                        </div>

                        <div class="blog-details-bottom-content">
                            <div class="related-blog-post">
                                <div class="inner-title">
                                    <h3>Releted Post</h3>
                                </div>
                                <div class="row">
                                    <!--Start Single blog Style1-->
                                    <div class="col-xl-6">
                                        <div class="single-blog-style1">
                                            <div class="img-holder">
                                                <div class="inner">
                                                    <img src="{{ URL::asset('main-website/images/blog/related-blog-1.jpg') }}"
                                                        alt="Awesome Image">
                                                </div>
                                            </div>
                                            <div class="text-holder">
                                                <ul class="meta-info">
                                                    <li><span class="icon-calendar"></span><a href="#">24th March
                                                            2019</a></li>
                                                </ul>
                                                <h3 class="blog-title">
                                                    <a href="blog-single.html">A series of iOS 7 inspire vector icons
                                                        sense<span class="round-box zoominout"></span></a>
                                                </h3>
                                                <div class="text">
                                                    <p>Lorem ipsum dolor sit amet, conse ctet ur adipisicing elit, sed
                                                        doing.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End Single blog Style1-->
                                    <div class="col-xl-6">
                                        <div class="single-blog-style1">
                                            <div class="img-holder">
                                                <div class="inner">
                                                    <img src="{{ URL::asset('main-website/images/blog/related-blog-2.jpg') }}"
                                                        alt="Awesome Image">
                                                </div>
                                            </div>
                                            <div class="text-holder">
                                                <ul class="meta-info">
                                                    <li><span class="icon-calendar"></span><a href="#">24th March
                                                            2019</a></li>
                                                </ul>
                                                <h3 class="blog-title">
                                                    <a href="blog-single.html">A series of iOS 7 inspire vector icons
                                                        sense<span class="round-box zoominout"></span></a>
                                                </h3>
                                                <div class="text">
                                                    <p>Lorem ipsum dolor sit amet, conse ctet ur adipisicing elit, sed
                                                        doing.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="author-box-holder">
                                <div class="inner">
                                    <div class="img-box">
                                        <img src="{{ URL::asset('main-website/images/blog/author.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="text-box">
                                        <span>Written by</span>
                                        <h2>Rosalina D. William</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-box">
                                <div class="title">
                                    <h3>Comments</h3>
                                </div>
                                <div class="outer-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-comment">
                                                <div class="single-comment-box">
                                                    <div class="img-holder">
                                                        <img src="{{ URL::asset('main-website/images/blog/comment-1.png') }}"
                                                            alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Rosalina Kelian</h3>
                                                                <h5><span class="icon-calendar"></span>24th March 2019</h5>
                                                            </div>
                                                            <div class="reply">
                                                                <a href="#"><span
                                                                        class="icon-reply"></span>Reply</a>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                                do eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-comment comment-reply">
                                                <div class="single-comment-box">
                                                    <div class="img-holder">
                                                        <img src="{{ URL::asset('main-website/images/blog/comment-2.png') }}"
                                                            alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Rosalina Kelian</h3>
                                                                <h5><span class="icon-calendar"></span>24th March 2019</h5>
                                                            </div>
                                                            <div class="reply">
                                                                <a href="#"><span
                                                                        class="icon-reply"></span>Reply</a>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                                do eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-comment">
                                                <div class="single-comment-box">
                                                    <div class="img-holder">
                                                        <img src="{{ URL::asset('main-website/images/blog/comment-3.png') }}"
                                                            alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Arista Williamson</h3>
                                                                <h5><span class="icon-calendar"></span>24th March 2019</h5>
                                                            </div>
                                                            <div class="reply">
                                                                <a href="#"><span
                                                                        class="icon-reply"></span>Reply</a>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                                do eiusmod tempor incididunt ut labore et dolore magna
                                                                aliqua.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add-comment-box">
                                <div class="title">
                                    <h3>Post Comment</h3>
                                </div>
                                <form id="add-comment-form" action="#">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-box">
                                                <textarea name="message" placeholder="Type your comments...." required=""></textarea>
                                                <div class="icon"><span class="icon-pen"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-box">
                                                <input type="text" name="fname" placeholder="Type your name...."
                                                    required="">
                                                <div class="icon"><span class="icon-user"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-box">
                                                <input type="email" name="femail" placeholder="Type your email...."
                                                    required="">
                                                <div class="icon"><span class="icon-envelope"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-box">
                                                <input type="text" name="fwebsite"
                                                    placeholder="Type your website....">
                                                <div class="icon"><span class="icon-earth-grid-symbol"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="button-box">
                                                <button class="btn-one" type="submit">
                                                    <span class="txt"><i class="icon-chat"></i>Post Comments</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">
                    <div class="sidebar-wrapper">
                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.0s"
                            data-wow-duration="1200ms">
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
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
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

                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.1s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Search Objects</h3>
                            </div>
                            <div class="sidebar-search-box">
                                <form class="search-form" action="#">
                                    <input placeholder="Search your keyword..." type="text">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.2s"
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
                                <li>
                                    <div class="inner">
                                        <div class="img-box">
                                            <img src="{{ URL::asset('main-website/images/sidebar/popular-feeds-3.png') }}"
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
                                            <img src="{{ URL::asset('main-website/images/sidebar/popular-feeds-4.png') }}"
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

                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.3s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Categories</h3>
                            </div>
                            <ul class="categorie-boxs">
                                <li><a href="#">Business <span>26</span></a></li>
                                <li class="active"><a href="#">Consultant <span>30</span></a></li>
                                <li><a href="#">Creative <span>71</span></a></li>
                                <li><a href="#">UI/UX <span>56</span></a></li>
                                <li><a href="#">Technology <span>60</span></a></li>
                            </ul>
                        </div>

                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.4s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Never Miss News</h3>
                            </div>
                            <ul class="sidebar-social-links">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                        <div class="single-sidebar wow fadeInUp animated" data-wow-delay="0.5s"
                            data-wow-duration="1200ms">
                            <div class="title">
                                <h3>Twitter Feeds</h3>
                            </div>
                            <ul class="sidebar-twitter-feeds">
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-twitter"></span>
                                        </div>
                                        <div class="text">
                                            <p>
                                                <a href="#">Rescue - #Gutenberg ready @ wordpress Theme for Creative
                                                    Bloggers available on @ ThemeForest https://t.co/2r1POjOjgVC…
                                                    https://t.co/rDAnPyClu1</a>
                                            </p>
                                            <h5>November 25, 2018</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

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
                                <!-- Repeat for other Instagram images with appropriate URLs -->
                            </ul>
                        </div>

                        <div class="sidebar-add-banner-box"
                            style="background-image: url({{ URL::asset('main-website/images/sidebar/add-banner.jpg') }})">
                            <div class="inner">
                                <h6>350x600</h6>
                                <h3>Add Banner</h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection