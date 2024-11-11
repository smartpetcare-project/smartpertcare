@extends('layouts.main-layout')
@section('title', 'Detail Layanan')
@section('content')

    <section class="breadcrumb-area"
        style="background-image: url({{ $product['image_banner'] }});">
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

    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </button>
@endsection
