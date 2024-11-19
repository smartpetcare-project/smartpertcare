@extends('layouts.main-layout')
@section('title', 'About')
@section('content')

<section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
    <div class="banner-curve"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix text-center">
                    <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                       <h2>About Us<span class="dotted"></span></h2>
                    </div>
                    <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">About</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-style2-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="about-style1-content-box style1instyle2">
                    <div class="sec-title">
                        <h5>//<span>About Us</span>//</h5>
                        <h2>Best Company For<br> Your Pet<span class="round-box zoominout"></span></h2>
                    </div> 
                    <div class="inner-content">
                        <div class="text">
                            <p>SmartPets Care Company merupakan perusahaan yang bergerak dalam bidang kesehatan hewan dengan produk yang berkualitas, ramah lingkungan, dan ekonomis.</p>
                        </div>
                        <div>
                            <p>
                                Visi SmartPetsCare Company adalah menjadi usaha inovatif yang menyediakan produk perawatan hewan aman dan ramah lingkungan, mendukung konsep One Health, serta berkomitmen pada keberlanjutan. Dengan bahan alami, SmartPetsCare berupaya meningkatkan kesadaran kesehatan hewan, menyediakan solusi perawatan praktis, dan menjaga hubungan baik dengan pelanggan melalui layanan responsif dan edukatif.
                            </p>
                        </div>
                    </div>   
                </div> 
            </div>
            
            <div class="col-xl-7">
                <div class="video-holder-box style2 text-center" style="background-image: url({{ URL::asset('main-website/images/resources/produk.jpg') }});">
                    <div class="icon">
                        <a class="video-popup" title="CarePress" href="https://cvf.shopee.co.id/file/api/v4/11110107/mms/id-11110107-6ke19-lxil4x1v5c9n39.16000081720545728.mp4">
                            <span class="icon-play-button"></span>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="showcase-area">
    <div class="container">
        <div class="sec-title text-center">
            <h5>//<span>Showcase</span>//</h5>
            <h2>Photo Showcase<span class="round-box zoominout"></span></h2>
        </div>
        <div class="row masonary-layout">
            <!--Start Single Showcase box-->
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-showcase-box">
                    <div class="img-holder">
                        <img src="{{ URL::asset('main-website/images/resources/produk2.jpg') }}" alt=""/>
                    </div> 
                </div>
            </div>
            <!--End Single Showcase box-->
            <!--Start Single Showcase box-->
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="single-showcase-box">
                    <div class="img-holder">
                        <img src="{{ URL::asset('main-website/images/resources/produk.jpg') }}" alt=""/>
                    </div> 
                </div>
            </div>
            <!--End Single Showcase box-->
            <!--Start Single Showcase box-->
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-showcase-box">
                    <div class="img-holder">
                        <img src="{{ URL::asset('main-website/images/resources/produk2.jpg') }}" alt=""/>
                    </div> 
                </div>
            </div>
            <!--End Single Showcase box-->
            
            <!--Start Single Showcase box-->
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-showcase-box">
                    <div class="img-holder">
                        <img src="{{ URL::asset('main-website/images/resources/produk2.jpg') }}" alt=""/>
                    </div> 
                </div>
            </div>
            <!--End Single Showcase box-->
            <!--Start Single Showcase box-->
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-showcase-box">
                    <div class="img-holder">
                        <img src="{{ URL::asset('main-website/images/resources/produk2.jpg') }}" alt=""/>
                    </div> 
                </div>
            </div>
            <!--End Single Showcase box-->
        </div>
    </div>
</section>

@endsection