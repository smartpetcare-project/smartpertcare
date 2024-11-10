@extends('layouts.main-layout')
@section('title', 'Landing Page')
@section('content')
    <!-- Start Main Slider -->
    <section class="main-slider style1">
        <div class="slider-box">
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer"
                        style="background-image: url('{{ URL::asset('build/main-website/images/slides/slide-v1-1.jpg') }}');">
                    </div>

                    <div class="auto-container">
                        <div class="content">
                            <h5>//<span>Enjoy Your Holiday</span>//</h5>
                            <h2>We Keep Them<br> Happy Anytime<span class="round"></span></h2>
                            <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer"
                        style="background-image: url({{ URL::asset('build/main-website/images/slides/slide-v1-2.jpg') }})">
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <h5>//<span>Enjoy Your Holiday</span>//</h5>
                            <h2>We Keep Them<br> Happy Anytime<span class="round"></span></h2>
                            <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer"
                        style="background-image: url({{ URL::asset('build/main-website/images/slides/slide-v1-3.jpg') }})">
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <h5>//<span>Enjoy Your Holiday</span>//</h5>
                            <h2>We Keep Them<br> Happy Anytime<span class="round"></span></h2>
                            <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Main Slider paroller -->

    <!--Start Featured Area-->
    <section class="featured-area">
        <div class="container">
            <div class="row">
                <!--Start Single Featured Box-->
                <div class="col-xl-4">
                    <div class="single-featured-box">
                        <div class="inner">
                            <div class="icon">
                                <span class="icon-dog"></span>
                            </div>
                            <div class="text">
                                <h3>Dog Boarding</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Featured Box-->
                <!--Start Single Featured Box-->
                <div class="col-xl-4">
                    <div class="single-featured-box">
                        <div class="inner">
                            <div class="icon">
                                <span class="icon-dog-food clr2"></span>
                            </div>
                            <div class="text">
                                <h3>Dog Boarding</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Featured Box-->
                <!--Start Single Featured Box-->
                <div class="col-xl-4">
                    <div class="single-featured-box">
                        <div class="inner">
                            <div class="icon">
                                <span class="icon-pet-bowl clr3"></span>
                            </div>
                            <div class="text">
                                <h3>Pet Adoption</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single Featured Box-->
            </div>
        </div>
    </section>
    <!--End Featured Area-->

    <!--Start About Style1 Area-->
    <section class="about-style1-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="about-style1-image-box">
                        <div class="about-style1-image-box-bg"
                            style="background-image: url({{ URL::asset('build/main-website/images/shape/about-style1-image-box-bg.png') }})">
                        </div>
                        <div class="main-image">
                            <img src="{{ URL::asset('build/main-website/images/about/about-1.png') }}" alt="Awesome Image">
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-style1-content-box">
                        <div class="sec-title">
                            <h5>//<span>Tentang Kami</span>//</h5>
                            <h2>Best Agency For<br> Your Pet<span class="round-box zoominout"></span></h2>
                        </div>
                        <div class="inner-content">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit.</p>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="title">
                                                <h5>Certified Groomer</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="title">
                                                <h5>Animal Lover</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="title">
                                                <h5>14+ Years Experience</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="title">
                                                <h5>Pet Parent Of 3 Dogs</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style1 Area-->

    <!-- Start Service Style1 Area -->
    <section class="service-style1-area">
        <div class="shape1">
            <img src="{{ URL::asset('build/main-website/images/shape/shape-1.png') }}" alt="">
        </div>
        <div class="shape2">
            <img src="{{ URL::asset('build/main-website/images/shape/shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="icon">
                    <i class="icon-bone"></i>
                </div>
                <h2>What We Do<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="single-service-style1">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ $item['image_preview'] }}" alt="">
                                </div>
                            </div>
                            <div class="text-holder">
                                <h3><a href="#">{{ $item['name'] }}</a></h3>
                                <p>{{ $item['description'] }}</p>
                                <div class="button">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Service Style1 Area -->

    <!--Start Video Gallery Area-->
    <section class="video-gallery-area">
        <div class="container-fullwidth">
            <div class="row">
                <div class="col-xl-6">
                    <div class="video-gallery-content-box text-center">
                        <img src="{{ URL::asset('build/main-website/images/resources/video-gallery-image.png') }}"
                            alt="">
                        <h2>Get Every Pet<br> Food & Toods Here.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip.</p>
                        <div class="button">
                            <a class="btn-one" href="#"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><span class="txt">Shop Now</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="video-holder-box text-center"
                        style="background-image: url({{ URL::asset('build/main-website/images/resources/video-gallery-bg.jpg') }})">
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup thm-bgclr" title="CarePress Video Gallery"
                                href="https://www.youtube.com/watch?v=p25gICT63ek">
                                <span class="icon-play-button"></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Video Gallery Area-->

    <!--Start Feautres Area-->
    <section class="feautres-area">
        <div class="container">
            <div class="row">

                <div class="col-xl-6">
                    <div class="working-hours-box"
                        style="background-image: url({{ URL::asset('build/main-website/images/resources/working-hours-box-bg.jpg') }})">
                        <div class="inner-content">
                            <div class="title">
                                <h3>Working Hours<span></span></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt.</p>
                            </div>
                            <ul>
                                <li><span class="left">Monday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Thuesday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Wednesday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Thursday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Friday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Saturday</span> <span class="right">08AM - 10PM</span></li>
                                <li><span class="left">Sunday</span> <span class="right holiday">Holiday</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="feautres-content-box">
                        <div class="sec-title">
                            <h5>//<span>Feautres</span>//</h5>
                            <h2>Core Level Features<span class="round-box zoominout"></span></h2>
                        </div>
                        <div class="inner-content">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            <ul class="top">
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-vet"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Pet Care</h3>
                                            <p>Get a solid solution</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-injection"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Pet Medicine</h3>
                                            <p>Get a solid solution</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="bottom">
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-veterinary"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Grooming</h3>
                                            <p>Get a solid solution</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon">
                                            <span class="icon-vaccine"></span>
                                        </div>
                                        <div class="title">
                                            <h3>Monthly Care</h3>
                                            <p>Get a solid solution</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Feautres Area-->

    <!--Start Team Area-->
    <section class="team-area">
        <div class="container">
            <div class="sec-title text-center">
                <div class="icon">
                    <i class="icon-bone"></i>
                </div>
                <h2>Our Groomers<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row justify-content-center">
                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.1s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('build/main-website/images/team/team-v1-1.png') }}"
                                    alt="Awesome Image">
                                <div class="overlay-style-one bg1"></div>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h5>CEO</h5>
                            <h3><a href="#">Muhammad Rifky Rachman</a></h3>
                        </div>
                    </div>
                </div>
                <!--End Single Team Member-->

                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.3s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('build/main-website/images/team/team-v1-2.png') }}"
                                    alt="Awesome Image">
                                <div class="overlay-style-one bg2"></div>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h5>CPO</h5>
                            <h3><a href="#">Muhamad Yusuf Firdaus</a></h3>
                        </div>
                    </div>
                </div>
                <!--End Single Team Member-->

                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.5s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('build/main-website/images/team/team-v1-3.png') }}"
                                    alt="Awesome Image">
                                <div class="overlay-style-one bg2"></div>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h5>COO</h5>
                            <h3><a href="#">Thoifatul Munawwaroh</a></h3>
                        </div>
                    </div>
                </div>
                <!--End Single Team Member-->

                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.7s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('build/main-website/images/team/team-v1-4.png') }}"
                                    alt="Awesome Image">
                                <div class="overlay-style-one bg2"></div>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h5>CFO</h5>
                            <h3><a href="#">Akhmad Imam Firjatullah</a></h3>
                        </div>
                    </div>
                </div>
                <!--End Single Team Member-->

                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.9s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('build/main-website/images/team/team-v1-4.png') }}"
                                    alt="Awesome Image">
                                <div class="overlay-style-one bg2"></div>
                            </div>
                        </div>
                        <div class="title-holder text-center">
                            <h5>CMO</h5>
                            <h3><a href="#">Muhammad Haikal Adhim</a></h3>
                        </div>
                    </div>
                </div>
                <!--End Single Team Member-->
            </div>
        </div>
    </section>
    <!--End Team Area-->

    <!--Start Testimonial style1 Area-->
    <section class="testimonial-style1-area">
        <div class="image-box1"><img
                src="{{ URL::asset('build/main-website/images/testimonial/testimonial-image-1.png') }}" alt="">
        </div>
        <div class="image-box2"><img
                src="{{ URL::asset('build/main-website/images/testimonial/testimonial-image-2.png') }}" alt="">
        </div>
        <div class="image-box3 paroller"><img
                src="{{ URL::asset('build/main-website/images/testimonial/testimonial-image-3.png') }}" alt="">
        </div>
        <div class="image-box4 paroller"><img
                src="{{ URL::asset('build/main-website/images/testimonial/testimonial-image-4.png') }}" alt="">
        </div>
        <div class="layer-outer"
            style="background-image: url({{ URL::asset('build/main-website/images/resources/map.png') }})"></div>
        <div class="container">
            <div class="sec-title text-center">
                <div class="icon">
                    <i class="icon-bone"></i>
                </div>
                <h2>Clients Feedback<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        <!--Start Single Testimonial Style1-->
                        <div class="single-testimonial-style1  wow fadeInUp" data-wow-delay="100ms"
                            data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ URL::asset('build/main-website/images/testimonial/tes-v1-1.png') }}"
                                    alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h2>Miranda H. Halim</h2>
                                <span>Founder, Miranda Family</span>
                                <div class="text-box">
                                    <p>One thing is clear though: taking a proactive approach to collecting customer
                                        feedback ensures you never stray too far from the needs of your community, even
                                        as those needs evolve.</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style1-->
                        <!--Start Single Testimonial Style1-->
                        <div class="single-testimonial-style1  wow fadeInUp" data-wow-delay="100ms"
                            data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ URL::asset('build/main-website/images/testimonial/tes-v1-1.png') }}"
                                    alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h2>Miranda H. Halim</h2>
                                <span>Founder, Miranda Family</span>
                                <div class="text-box">
                                    <p>One thing is clear though: taking a proactive approach to collecting customer
                                        feedback ensures you never stray too far from the needs of your community, even
                                        as those needs evolve.</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style1-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Style1 Area-->

    <!--Start Blog Style1 Area-->
    <section class="blog-style1-area">
        <div class="container">
            <div class="sec-title">
                <h5>//<span>Insights</span>//</h5>
                <h2>News & Feeds<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="blog-carousel owl-carousel owl-theme owl-nav-style-one">
                        <!--Start Single blog Style1-->
                        @foreach ($articles as $item)
                            <div class="single-blog-style1 wow fadeInLeft" data-wow-delay="100ms"
                                data-wow-duration="1500ms">
                                <div class="img-holder">
                                    <div class="date-box">
                                        <h5>{{ $item['updated_at'] }}</h5>
                                    </div>
                                    <div class="inner">
                                        <img src="{{ $item['image_preview'] }}" alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="text-holder">
                                    <ul class="meta-info">
                                        <li><span class="icon-user"></span><a href="#">By
                                                {{ $item['user']['name'] }}</a></li>
                                        <li><span class="icon-tag"></span><a
                                                href="#">{{ $item['category_name'] }}e</a></li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-single.html">{{ $item['title'] }}<span
                                                class="round-box zoominout"></span></a></h3>
                                </div>
                            </div>
                        @endforeach
                        <!--End Single blog Style1-->
                        <!--Start Single blog Style1-->
                        <div class="single-blog-style1 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <div class="date-box">
                                    <h5>24th June 2020</h5>
                                </div>
                                <div class="inner">
                                    <img src="{{ URL::asset('build/main-website/images/blog/blog-v1-3.jpg') }}"
                                        alt="Awesome Image">
                                </div>
                            </div>
                            <div class="text-holder">
                                <ul class="meta-info">
                                    <li><span class="icon-user"></span><a href="#">By Admin</a></li>
                                    <li><span class="icon-tag"></span><a href="#">Pet, Care, Medicine</a></li>
                                </ul>
                                <h3 class="blog-title"><a href="blog-single.html">Share five inspirational Quotes of
                                        the Day with friends<span class="round-box zoominout"></span></a></h3>
                            </div>
                        </div>
                        <!--End Single blog Style1-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Style1 Area-->

    <!--Start footer area-->
    <footer class="footer-area">
        <div class="footer-bg"
            style="background-image: url({{ URL::asset('build/main-website/images/shape/footer-bg.png') }})"></div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="index.html"><img
                                        src="{{ URL::asset('build/main-website/images/footer/footer-logo.png') }}"
                                        alt="Awesome Footer Logo" title="Logo"></a>
                            </div>
                            <div class="copy-right">
                                <p>Copyright By</p>
                                <h4>Smartpetscare - 2024</h4>
                            </div>
                        </div>
                        <div class="footer-contact-info">
                            <div class="single-box">
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="title">
                                    <span>Emergency Call</span>
                                    <h3><a href="https://api.whatsapp.com/send?phone=6285212622615">+62
                                            8521-2622-615</a></h3>
                                </div>
                            </div>
                            <div class="single-box">
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="title">
                                    <span>Support Email</span>
                                    <h3><a
                                            href="mailto:smartpetscareofficial@gmail.com">smartpetscareofficial@gmail.com</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="single-box">
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="title">
                                    <span>Address</span>
                                    <h3>Jalan Lodaya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End footer area-->

    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </button>
@endsection
