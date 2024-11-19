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
                        style="background-image: url('{{ URL::asset('main-website/images/slides/salshi.jpg') }}');">
                    </div>

                    <div class="auto-container">
                        <div class="content">
                            <h5 >//<span >SMARTPETS CARE</span>//</h5>
                            <h2>Eco-Friendly Solutions<br> for Healthier Pets<span class="round"></span></h2>
                            {{-- <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer"
                        style="background-image: url({{ URL::asset('main-website/images/slides/salshi2.jpg') }})">
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <h5 >//<span >SMARTPETS CARE</span>//</h5>
                            <h2>Eco-Friendly Solutions<br> for Healthier Pets<span class="round"></span></h2>
                            {{-- <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer"
                        style="background-image: url({{ URL::asset('main-website/images/slides/salshi3.jpg') }})">
                    </div>
                    <div class="auto-container">
                        <div class="content">
                            <h5 >//<span >SMARTPETS CARE</span>//</h5>
                            <h2>Eco-Friendly Solutions<br> for Healthier Pets<span class="round"></span></h2>
                            {{-- <div class="btns-box">
                                <a class="btn-one" href="#"><span class="txt">Make Appointment</span></a>
                                <a class="btn-one marleft style2" href="#"><span
                                        class="txt">987-876-876-87</span></a>
                            </div> --}}
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
                            style="background-image: url({{ URL::asset('main-website/images/shape/about-style1-image-box-bg.png') }})">
                        </div>
                        <div class="main-image">
                            <img src="{{ URL::asset('main-website/images/about/logosalshi.png') }}" alt="Awesome Image">
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-style1-content-box">
                        <div class="sec-title">
                            <h5 >//<span >About Us</span>//</h5>
                            <h2>Best Company For<br> Your Pet<span class="round-box zoominout" style="background-color: #678748;"></span></h2>
                        </div>
                        <div class="inner-content">
                            <div class="text">
                                <p>SmartPets Care Company merupakan perusahaan yang bergerak dalam
                                    bidang kesehatan hewan dengan produk yang berkualitas, ramah lingkungan, dan
                                    ekonomis.
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="title">
                                                <h5>Mudah Digunakan</h5>
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
                                                <h5>Sustainable</h5>
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
                                                <h5>Mendukung One Health</h5>
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
                                                <h5>Aman dan Ramah Lingkungan</h5>
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
            <img src="{{ URL::asset('main-website/images/shape/shape-1.png') }}" alt="">
        </div>
        <div class="shape2">
            <img src="{{ URL::asset('main-website/images/shape/shape-2.png') }}" alt="">
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
                                    <a href="{{ route('service.detail', $item['uuid']) }}">Read More</a>
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
                        <img src="{{ URL::asset('main-website/images/about/logo.png') }}"
                            alt="">
                        <h2>Get Our<br> Product Here.</h2>
                        <p>Salshi Dry Shampoo Powder adalah solusi inovatif untuk perawatan hewan peliharaan yang praktis dan efisien. Dengan formula khusus, produk ini mampu membersihkan bulu hewan peliharaan Anda tanpa memerlukan air. Sangat cocok untuk digunakan saat bepergian atau saat cuaca tidak memungkinkan untuk mandi basah.</p>
                        <div class="button">
                            <a class="btn-one" href="https://linktr.ee/smartpetscare"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="txt">Shop Now</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="video-holder-box text-center" style="background-image: url({{ URL::asset('main-website/images/resources/produk.jpg') }})">
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="video-popup thm-bgclr" title="CarePress Video Gallery" href="https://cvf.shopee.co.id/file/api/v4/11110107/mms/id-11110107-6ke19-lxil4x1v5c9n39.16000081720545728.mp4">
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
                        style="background-image: url({{ URL::asset('main-website/images/resources/working-hours-box-bg.jpg') }})">
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
                <h2>Our Team<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row justify-content-center">
                <!--Start Single Team Member-->
                <div class="col-md-2">
                    <div class="single-team-member wow animated fadeInUp" data-wow-delay="0.1s">
                        <div class="img-holder">
                            <div class="round-top"></div>
                            <div class="round-bottom"></div>
                            <div class="inner">
                                <img src="{{ URL::asset('main-website/images/team/ceo.jpg') }}"
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
                                <img src="{{ URL::asset('main-website/images/team/cpo.jpg') }}"
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
                                <img src="{{ URL::asset('main-website/images/team/coo.jpg') }}"
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
                                <img src="{{ URL::asset('main-website/images/team/cfo.jpg') }}"
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
                                <img src="{{ URL::asset('main-website/images/team/cmo.jpg') }}"
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
        <div class="image-box1"><img src="{{ URL::asset('main-website/images/testimonial/katamereka.jpg') }}" style="height: 90px; width: auto;" alt=""></div>
        <div class="image-box2"><img src="{{ URL::asset('main-website/images/testimonial/katamereka3.jpg') }}" style="height: 90px; width: auto;" alt=""></div>
        <div class="image-box3 paroller"><img src="{{ URL::asset('main-website/images/testimonial/katamereka2.jpg') }}" style="height: 90px; width: auto;" alt=""></div>
        <div class="image-box4 paroller"><img src="{{ URL::asset('main-website/images/testimonial/katamereka3.jpg') }}" style="height: 90px; width: auto;" alt=""></div>
        <div class="layer-outer" style="background-image: url({{ URL::asset('main-website/images/resources/map.png') }})"></div>
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
                        <div class="single-testimonial-style1  wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ URL::asset('main-website/images/testimonial/katamerekabag1.jpg') }}" alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h2>Smartrens</h2>
                                <span>Customer Salshi Dry Shampoo Powder</span>     
                                <div class="text-box">
                                    <p>"Saya sudah menggunakan Salshi Dry Shampoo Powder selama 3 hari pada kucing saya yang memiliki jamur di tengkuk dan juga punggung. Hasilnya, dalam 3 hari, kucing saya sudah sembuh dari jamur. Salshi Dry Shampoo Powder sangat saya rekomendasikan untuk masalah jamur dan kutu pada anabul atau hewan kalian."</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style1-->
                        <!--Start Single Testimonial Style1-->
                        <div class="single-testimonial-style1  wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ URL::asset('main-website/images/testimonial/katamerekabag2.jpg') }}" alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h2>Smartrens</h2>
                                <span>Customer Salshi Dry Shampoo Powder</span>     
                                <div class="text-box">
                                    <p>"Saya telah menggunakan Salshi Dry Shampoo Powder untuk anjing saya yang terkena jamur parah, dan dalam dua minggu, hasilnya sangat baik. Jamurnya berkurang dan produk ini juga memiliki aroma yang enak. Saya sangat merekomendasikannya kepada teman-teman semuanya untuk membeli produk ini."</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style1-->
                        <!--Start Single Testimonial Style1-->
                        <div class="single-testimonial-style1  wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="{{ URL::asset('main-website/images/testimonial/katamerekabag3.jpg') }}" alt="Awesome Image">
                            </div>
                            <div class="text-holder">
                                <h2>Ardiansyah Perdana Nasution</h2>
                                <span>Owner Rumah Silky</span>     
                                <div class="text-box">
                                    <p>"Saya sangat senang menggunakan Salshi Dry Shampoo Powder karena sangat ampuh membasmi kutu dan jamur. Saya sudah menggunakan produk ini, dan terbukti dalam waktu kurang dari satu jam, kutu pada ayam kesayangan saya rontok. Terima kasih, Salshi."</p>
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
                            <div class="single-blog-style1 wow fadeInLeft item-carousel" data-wow-delay="100ms"
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
                                    <h3 class="blog-title"><a href="{{ route('blog.detail', $item['uuid']) }}">{{ $item['title'] }}<span
                                                class="round-box zoominout"></span></a></h3>
                                </div>
                            </div>
                        @endforeach                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Blog Style1 Area-->
@endsection
