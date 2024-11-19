@extends('layouts.main-layout')
@section('title', 'Product')
@section('content')

    <section class="breadcrumb-area"
        style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
        <div class="banner-curve"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix text-center">
                        <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <h2>Product<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Shop Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-style1-area">
        <div class="container">
            <div class="sec-title">
                {{-- <h5>//<span>Insights</span>//</h5> --}}
                <h2>Product<span class="round-box zoominout"></span></h2>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="blog-carousel owl-carousel owl-theme owl-nav-style-one">
                        <!--Start Single blog Style1-->
                        @foreach ($products as $item)
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
                                        {{-- <li><span class="icon-user"></span><a href="#">By
                                                {{ $item['user']['name'] }}</a></li> --}}
                                        <li><span class="icon-tag"></span>{{ $item['category_name'] }}</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="{{ route('product.detail', $item['uuid']) }}">{{ $item['name'] }}<span
                                                class="round-box zoominout"></span></a></h3>
                                </div>
                            </div>
                        @endforeach                                                
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection