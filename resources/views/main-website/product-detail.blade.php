@extends('layouts.main-layout')
@section('title', 'Detail Product')
@section('content')

    <style>
        .review-box ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .review-box ul button {
            font-size: 24px;
            color: #ccc;
            /* Default gray color */
            cursor: pointer;
            transition: color 0.3s;
        }

        .review-box ul button.active {
            color: #FFD700;
            /* Gold color for active stars */
        }
    </style>


    <section class="breadcrumb-area"
        style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
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
                                            @foreach ($product['image_content'] as $index => $image)
                                                <li>
                                                    <div class="single-product-slide clearfix">
                                                        <div class="big-image-box">
                                                            <img class="product-image" src="{{ $image }}"
                                                                alt="Product Image {{ $index + 1 }}">
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="slider-pager clearfix">
                                            <div class="row">
                                                @foreach ($product['image_content'] as $index => $thumb)
                                                    <div class="col-4 mb-3">
                                                        <a data-slide-index="{{ $index }}" href="#"
                                                            @if ($index == 0) class="active" @endif>
                                                            <div class="img-holder">
                                                                <img class="product-thumbnail" src="{{ $thumb }}"
                                                                    alt="Thumbnail Image {{ $index + 1 }}"
                                                                    style="max-width: 100%; height: auto;">
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
                                        @php
                                            $averageRating = $product['average_rating'] ?? 0; // Pastikan ada default jika average_rating kosong
                                        @endphp

                                        <div class="review-box">
                                            <ul>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($averageRating))
                                                        <li><i class="fa fa-star"></i></li>
                                                    @elseif (
                                                        $i == ceil($averageRating) &&
                                                            $averageRating - floor($averageRating) >= 0.3 &&
                                                            $averageRating - floor($averageRating) < 0.8)
                                                        <li><i class="fa fa-star-half-o"></i></li>
                                                    @else
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endif
                                                @endfor
                                            </ul>
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
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <div class="input-box">
                                                    <div class="title">
                                                        <h4>Qty</h4>
                                                    </div>
                                                    <div class="quantity-box">
                                                        <input class="quantity-spinner" type="text" value="2"
                                                            name="quantity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-xl-12">
                                                <div class="product-details-button-box">
                                                    <div class="addto-cart-button">
                                                        <a href="https://wa.me/6285779410576?text={{ urlencode('Halo, saya ingin membeli produk berikut: \nNama Produk: ' . $product['name'] . '\nKategori: ' . $product['category_name'] . '\nHarga: Rp' . $product['price'] . '\nJumlah: ' . 1) }}"
                                                            target="_blank" class="btn-one buy-now">
                                                            <span class="txt"><i class="icon-basket"></i> Beli</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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


    <section class="products-details-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product-tab-box tabs-box">

                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#desc" class="tab-btn active-btn"><span>description</span></li>
                            <li data-tab="#comme" class="tab-btn"><span>COMMENTS</span></li>
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
                                <div class="review-box-holder">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="title mb-3">
                                                <h3>Comments</h3>
                                            </div>
                                            @foreach ($product['ratings'] as $item)
                                                <div class="single-review-outer-box">
                                                    <div class="single-review-box">
                                                        <div class="text-holder">
                                                            <div class="top">
                                                                <div class="name">
                                                                    <h3>{{ $item['user']['name'] }} <span> –
                                                                            {{ $item['created_at'] }}:</span></h3>
                                                                </div>
                                                                <div class="review-box">
                                                                    <ul>
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= $item['rating'])
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @else
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $item['review'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('ratings.store') }}" method="POST">
                                    @csrf
                                    <div class="review-form">
                                        <div class="shop-page-title">
                                            <div class="title">Add Your Comments</div>
                                            <p>Your email address will not be published. Required fields are marked <b>*</b>
                                            </p>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="add-rating-box">
                                                    <div class="add-rating-title">
                                                        <p>Your Rating</p>
                                                    </div>
                                                    <div class="review-box">
                                                        <ul id="star-rating">
                                                            <button type="button" class="rating-number w-100"
                                                                value="1"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number w-100"
                                                                value="2"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number w-100"
                                                                value="3"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number w-100"
                                                                value="4"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number w-100"
                                                                value="5"><i class="fa fa-star"></i></button>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="rating" id="rating-value" value="0">
                                        <input type="hidden" name="rateable_type" value="product" id="rateable_type">
                                        <input type="hidden" name="rateable_id" value="{{ $product['id'] }}"
                                            id="rateable_id">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="review" class="form-label fw-bold">Your Review <span
                                                            class="text-danger">*</span></label>
                                                    <textarea id="review" name="review" class="form-control" placeholder="Write your review here..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn-one" type="submit" id="button-submit">
                                                    <span class="txt">Submit<i class="flaticon-next"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('errorMessages'))
                Toastify({
                    text: "{{ session('errorMessages') }}",
                    backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)",
                    close: true,
                    gravity: "top", // top or bottom
                    position: "right", // left, center, or right
                    stopOnFocus: true
                }).showToast();
            @endif

            @if (session('successMessages'))
                Toastify({
                    text: "{{ session('successMessages') }}",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true
                }).showToast();
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Toastify({
                        text: "{{ $error }}",
                        backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)",
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true
                    }).showToast();
                @endforeach
            @endif
        });
    </script>

    <script>
        let rating = 0;
        const ratingButtons = document.querySelectorAll('.rating-number');
        const ratingValue = document.getElementById('rating-value');
        const buttonSubmit = document.getElementById('button-submit');
        ratingValue.value = rating;

        ratingButtons.forEach(button => {
            button.addEventListener('click', () => {
                rating = button.value;
                ratingValue.value = rating;
                ratingButtons.forEach((btn, index) => {
                    if (index < button.value) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            });
        });
    </script>

@endsection
