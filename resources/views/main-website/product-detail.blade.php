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
                            <h2>Product Details<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="clearfix">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Shop Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-details-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="shop-details-content">
                        <div class="row">
                            <div class="col-xl-5 col-lg-8">
                                <div class="single-product-image-holder">

                                    <div class="single-product-image-holder">
                                        <ul class="slider-content clearfix bxslider2">
                                            @foreach($product['image_content'] as $index => $image)
                                                <li>
                                                    <div class="single-product-slide clearfix">
                                                        <div class="big-image-box">
                                                            <img class="product-image" src="{{ $image }}" alt="Product Image {{ $index + 1 }}">
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    
                                        <div class="slider-pager clearfix">
                                            <div class="row">
                                                @foreach($product['image_content'] as $index => $thumb)
                                                    <div class="col-4 mb-3">
                                                        <a data-slide-index="{{ $index }}" href="#" @if($index == 0) class="active" @endif>
                                                            <div class="img-holder">
                                                                <img class="product-thumbnail" src="{{ $thumb }}" alt="Thumbnail Image {{ $index + 1 }}" style="max-width: 100%; height: auto;">
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                </div>
                            </div>

                            <div class="col-xl-7 col-lg-12">
                                <div class="single-product-info-box">
                                    <div class="product-title">
                                        <p>{{ $product['category_name'] }}</p>
                                        <h2>{{ $product['name'] }}</h2>
                                    </div>
                                    <div class="product-value">
                                        <h3>
                                            Rp{{ $product['price'] }}
                                            {{-- <del>£399.99</del> --}}
                                        </h3>
                                        <div class="review-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half"></i></li>
                                            </ul>
                                            <span>(25 Customer review)</span>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        {!! $product['description_mini'] !!}
                                        <div class="bottom">
                                            <ul>
                                                {{-- <li><span>Availability:</span> In stock </li> --}}
                                                <li><span>Category:</span>{{ $product['category_name'] }}</li>
                                            </ul>
                                            <ul>
                                                {{-- <li><span>Product Code:</span> #4657</li> --}}
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-cart-box">
                                        <div class="row">
                                            {{-- <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="input-box">
                                                    <div class="title">
                                                        <h4>Color</h4>
                                                    </div>
                                                    <select class="selectpicker" data-width="100%">
                                                        <option selected="selected">Select Color</option>
                                                        <option>Red</option>
                                                        <option>Green</option>
                                                        <option>Blue</option>
                                                        <option>yellow</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="input-box">
                                                    <div class="title">
                                                        <h4>Size</h4>
                                                    </div>
                                                    <select class="selectpicker" data-width="100%">
                                                        <option selected="selected">Select size</option>
                                                        <option>XL</option>
                                                        <option>L</option>
                                                        <option>M</option>
                                                        <option>LG</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="input-box">
                                                    <div class="title">
                                                        <h4>Qty</h4>
                                                    </div>
                                                    <div class="quantity-box">
                                                        <input class="quantity-spinner" type="text" value="2"
                                                            name="quantity">
                                                    </div>
                                                    <div class="clear-selection"><a href="#">Clear Selection</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="product-details-button-box">
                                                    <div class="addto-cart-button">
                                                        <button class="btn-one addtocart" type="submit">
                                                            <span class="txt"><i class="icon-basket"></i>Add To
                                                                Cart</span>
                                                        </button>
                                                    </div>
                                                    <div class="wishlist-button">
                                                        <button class="btn-one wishlist" type="submit">
                                                            <span class="txt"><i class="icon-basket"></i>Add To
                                                                Wishlist</span>
                                                        </button>
                                                    </div>
                                                    <div class="compare-button">
                                                        <button class="btn-one compare" type="submit">
                                                            <span class="txt"><i class="icon-basket"></i>Compare</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="share-products-socials">
                                        <h5>Share This:</h5>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook fb" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter tw" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-pinterest pin"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin lin"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="products-details-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product-tab-box tabs-box">

                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#desc" class="tab-btn active-btn"><span>description</span></li>
                            <li data-tab="#comme" class="tab-btn"><span>COMMENTS</span></li>
                            <li data-tab="#review" class="tab-btn"><span>review</span></li>
                        </ul>

                        <div class="tabs-content">
                            <div class="tab active-tab" id="desc" style="display: block;">
                                <div class="product-descriptions-content">
                                    <div class="text">
                                        {!! $product['description'] !!}
                                    </div>
                                </div>
                            </div>

                            <div class="tab" id="comme">
                                <div class="review-form">
                                    <div class="shop-page-title">
                                        <div class="title">Add Your Comments</div>
                                        <p>Your email address will not be published. Required fields are marked <b>*</b></p>
                                    </div>
                                    <form id="review-form" action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <p>Name<span>*</span></p>
                                                    <input type="text" name="fname" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box">
                                                    <p>Email<span>*</span></p>
                                                    <input type="email" name="email" placeholder="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="add-rating-box">
                                                    <div class="add-rating-title">
                                                        <p>Your Rating</p>
                                                    </div>
                                                    <div class="review-box">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-box">
                                                    <p>Your Review<span>*</span></p>
                                                    <textarea name="review" placeholder="" required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn-one" type="submit">
                                                    <span class="txt">Submit<i class="flaticon-next"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab" id="review">
                                <div class="review-box-holder">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <!--Start single review outer box-->
                                            <div class="single-review-outer-box">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ URL::asset('main-website/images/shop/review-1.png') }}"
                                                            alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Steven Rich <span> – April 10, 2019:</span></h3>
                                                            </div>
                                                            <div class="review-box">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <p>Value for money...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review outer box-->
                                            <!--Start single review outer box-->
                                            <div class="single-review-outer-box">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ URL::asset('main-website/images/shop/review-2.png') }}"
                                                            alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>William Cobus <span>– April 09, 2019:</span></h3>
                                                            </div>
                                                            <div class="review-box">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <p>We denounce with righteous indignation...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review outer box-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
