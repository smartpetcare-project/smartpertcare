@extends('layouts.main-layout')
@section('title', 'Team')
@section('content')
<section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
    <div class="banner-curve"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix text-center">
                    <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                       <h2>Our Team<span class="dotted"></span></h2>
                    </div>
                    <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Team</li>
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

@endsection
