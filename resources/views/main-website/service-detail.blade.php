@extends('layouts.main-layout')
@section('title', 'Detail Layanan')
@section('content')

    <section class="breadcrumb-area"
        style="background-image: url({{ URL::asset('main-website/images/breadcrumb/breadcrumb-1.png') }});">
        <div class="banner-curve"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix text-center">
                        <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <h2>{{ $product['name'] }}<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Service Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Service Details Area-->
    <section class="service-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="service-details-content">
                        <div class="service-details-main-image">
                            <img src="{{ $product['image_header'] }}" alt="">
                            <div class="overlay-box">
                                <div class="icon">
                                    <span class="icon-vaccine"></span>
                                </div>
                                <div class="title">
                                    <h3>{{ $product['category_name'] }}</h3>
                                </div>
                            </div>
                        </div>
                        @php
                            $imageContent = $product['image_content'];
                            $firstImages = array_slice($imageContent, 0, 2);
                            $lastImages = array_slice($imageContent, 2, 2);

                            $contentParts = explode('</p>', $product['description']);
                            $firstParagraph = $contentParts[0];
                            $middleContent = implode('</p>', array_slice($contentParts, 1, count($contentParts) - 3));
                            $lastParagraph = $contentParts[count($contentParts) - 2];
                        @endphp
                        <div class="service-details-text-box">
                            <h2>{{ $product['name'] }}<span class="dotted"></span></h2>
                            {!! $firstParagraph !!}
                        </div>
                        @if ($firstImages)
                            <div class="service-details-bottom-image">
                                <div class="row">
                                    @foreach ($firstImages as $item)
                                        <div class="col-xl-6">
                                            <div class="single-image-nox">
                                                <img src="{{ $item }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        @endif
                        <div class="service-details-bottom-text">
                            {!! $middleContent !!}
                        </div>
                        @if ($lastImages)
                            <div class="service-details-bottom-image">
                                <div class="row">
                                    @foreach ($lastImages as $item)
                                        <div class="col-xl-6">
                                            <div class="single-image-nox">
                                                <img src="{{ $item }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="service-details-bottom-text">
                            {!! $lastParagraph !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="service-details-sidebar">
                        <div class="service-details-categories">
                            <div class="title">
                                <h3>Services Category<span class="dotted"></span></h3>
                            </div>
                            <div class="categories-box">
                                <ul class="categories clearfix">
                                    <li><a href="/service">View All Services</a></li>
                                    @php
                                        $products = \App\Models\Product::all();
                                    @endphp
                                    @foreach ($products as $item)
                                        <li><a href="{{ route('service.detail', $item->uuid) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="callto-action-box text-center"
                            style="background-image: url({{ URL::asset('main-website/images/resources/callto-action-box-bg.jpg') }})">
                            <p>Call To Action</p>
                            <h3>Enjoy Your Whole<br> Weekend.</h3>
                            <a class="btn-one" href="#"><span class="txt">Appointment</span></a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="servicedet-prev-next-option">
                        <div class="box prev">
                            <div class="inner">
                                <div class="image">
                                    <img src="{{ URL::asset('main-website/images/services/service-details-prev-1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title">
                                    <p><a href="#">Prev Service</a></p>
                                    <h3><a href="#">Pet Grooming.</a></h3>
                                </div>
                            </div>
                        </div>

                        <div class="box next">
                            <div class="inner-next">
                                <div class="image">
                                    <img src="{{ URL::asset('main-website/images/services/service-details-next-1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title">
                                    <p><a href="#">Next Service</a></p>
                                    <h3><a href="#">Pet Sitting.</a></h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <header class="main-header header-style-two">

        <!--Start Header Top-->
        <div class="header-top style2">
            <div class="outer-container">
                <div class="outer-box clearfix">

                    <div class="header-top-left pull-left">
                        <div class="header-contact-info">
                            <ul>
                                <li><span class="icon-envelope"></span><a
                                        href="mailto:smartpetscareofficial@gmail.com">smartpetscareofficial@gmail.com</a>
                                </li>
                                <li><span class="icon-phone-call"></span><a
                                        href="https://api.whatsapp.com/send?phone=6285212622615">+62 8521-2622-615</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="header-top-right pull-right">
                        <div class="header-social-link">
                            <ul>
                                <li>
                                    <a href="https://instagram.com/smartpetscare.official/"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End header Top-->

        <div class="header style2">
            <div class="outer-container">
                <div class="outer-box clearfix">
                    <!--Start Header Left-->
                    <div class="header-left clearfix pull-left">

                        <div class="logo">
                            <a href="index.html"><img src="{{ URL::asset('main-website/images/resources/logo.png') }}"
                                    alt="Awesome Logo" title=""></a>
                        </div>

                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <div class="inner">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </div>
                            </div>
                            <!-- Main Menu -->
                            <nav class="main-menu style1 navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="about.html">Tentang</a></li>
                                        <li class="dropdown"><a href="#">Layanan</a>
                                            <ul>
                                                <li><a href="/service">View All Services</a></li>
                                                @foreach ($products as $item)
                                                    <li><a
                                                            href="{{ route('service.detail', $item->uuid) }}">{{ $item->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Halaman</a>
                                            <ul>
                                                <li><a href="shop-details.html">Produk Kami</a></li>
                                                <li><a href="team.html">Team Smartpetscare</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">Berita</a></li>
                                        <li><a href="contact.html">Kontak</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>

                    </div>
                    <!--End Header Left-->

                    <!--Start Header Right-->
                    <div class="header-right pull-right clearfix">
                        <div class="hidden-content-button bar-box">
                            <a class="side-nav-toggler nav-toggler hidden-bar-opener" href="#">
                                <ul>
                                    <li class="red2"></li>
                                    <li class="red2"></li>
                                    <li></li>
                                </ul>
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul>
                                    <li class="red2"></li>
                                    <li></li>
                                    <li class="red2"></li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <!--End Header Right-->
                </div>
            </div>
        </div>
        <!--End header -->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <a href="index.html" class="img-responsive"><img
                                src="{{ URL::asset('main-website/images/resources/sticky-logo.png') }}" alt=""
                                title=""></a>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--End Sticky Header-->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img
                            src="{{ URL::asset('main-website/images/resources/mobilemenu-logo.png') }}" alt=""
                            title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <!--Social Links-->
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                        <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                        <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                        <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                        <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Mobile Menu -->
    </header>


    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </button>
@endsection
