@extends('layouts.main-layout')
@section('title', 'Detail Artikel')
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
    <section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
        <div class="banner-curve"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix text-center">
                        <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                           <h2>News Details<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
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
                                        <li><span class="icon-user"></span>by
                                                {{ $article['user']['name'] }}</li>
                                        <li><span class="icon-calendar"></span>{{ $article['updated_at'] }}</li>
                                        <li><span class="icon-chat">{{ $article['rating_count'] }} Comments</li>
                                    </ul>
                                    <div class="text">
                                        @php
                                            $imageContent = $article['image_content'] ?? [];
                                            $contentParts = explode('</p>', $article['content'] ?? '');

                                            // Default values
                                            $firstParagraph = $contentParts[0] ?? '';
                                            $middleContentParts = [];
                                            $beforeLastParagraph = '';
                                            $lastParagraph = '';

                                            // Handle paragraphs based on count
                                            if (count($contentParts) > 3) {
                                                $middleContentParts = array_slice(
                                                    $contentParts,
                                                    1,
                                                    count($contentParts) - 4,
                                                );
                                                $beforeLastParagraph = $contentParts[count($contentParts) - 3];
                                                $lastParagraph = $contentParts[count($contentParts) - 2];
                                            } elseif (count($contentParts) === 2) {
                                                $lastParagraph = $contentParts[1];
                                            }

                                            // Handle images
                                            $firstImages = array_slice($imageContent, 0, 1);
                                            $middleImages = array_slice($imageContent, 1, 2);
                                            $lastImages = array_slice($imageContent, 2, 1);

                                            $insertedMiddleContent = '';
                                            if (!empty($middleContentParts)) {
                                                $middleContentLength = count($middleContentParts);
                                                $randomPosition = rand(0, $middleContentLength - 1);
                                                $imagesInserted = false;

                                                foreach ($middleContentParts as $index => $part) {
                                                    $insertedMiddleContent .= $part . '</p>';

                                                    if (
                                                        $index == $randomPosition &&
                                                        !$imagesInserted &&
                                                        !empty($middleImages)
                                                    ) {
                                                        $insertedMiddleContent .= '<div class="row">';
                                                        foreach ($middleImages as $image) {
                                                            $insertedMiddleContent .=
                                                                '
                                                                    <div class="col-xl-6">
                                                                        <div class="single-image-nox">
                                                                            <img src="' . $image . '" alt="">
                                                                        </div>
                                                                    </div>';
                                                                }
                                                        $insertedMiddleContent .= '</div>';
                                                        $imagesInserted = true;
                                                    }
                                                }
                                            }
                                        @endphp

                                        {!! $firstParagraph !!}

                                        @if (!empty($firstImages))
                                            <div class="blog-details-image-1">
                                                <img src="{{ $firstImages[0] }}" alt="">
                                            </div>
                                        @endif

                                        {!! $insertedMiddleContent !!}

                                        @if (!empty($lastImages))
                                            <div class="blog-details-image-2">
                                                <div class="image-box">
                                                    <img src="{{ $lastImages[0] }}" alt="">
                                                </div>
                                                <div class="text-box">
                                                    {!! $lastParagraph !!}
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($beforeLastParagraph))
                                            {!! $beforeLastParagraph !!}
                                        @endif

                                    </div>
                                </div>
                                <!--End Blog Details Single-->
                            </div>
                        </div>

                        <div class="blog-details-bottom-content">
                            <div class="comment-box">
                                <div class="title">
                                    <h3>Comments</h3>
                                </div>
                                <div class="outer-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach ($article['ratings'] as $item)
                                                <div class="single-comment">
                                                    <div class="single-comment-box">
                                                        <div class="img-holder">
                                                            <img src="{{ URL::asset('main-website/images/blog/comment-1.png') }}"
                                                                alt="Awesome Image">
                                                        </div>
                                                        <div class="text-holder">
                                                            <div class="top">
                                                                <div class="name">
                                                                    <h3>{{ $item['user']['name'] }}</h3>
                                                                    <h5><span
                                                                            class="icon-calendar"></span>{{ $item['created_at'] }}
                                                                    </h5>
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
                                                                {{-- <div class="reply">
                                                                    <a href="#"><span
                                                                            class="icon-reply"></span>Reply</a>
                                                                </div> --}}
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $item['review'] }}.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab" id="comme">
                                <form action="{{ route('ratings.store') }}" method="POST">
                                    @csrf
                                    <div class="review-form">
                                        <div class="shop-page-title">
                                            <div class="title">
                                                <h3>Comments</h3>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="add-rating-box">
                                                    <div class="add-rating-title">
                                                        <p>Your Rating</p>
                                                    </div>
                                                    <div class="review-box">
                                                        <ul id="star-rating">
                                                            <button type="button" class="rating-number mr-2"
                                                                value="1"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="2"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="3"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="4"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number"
                                                                value="5"><i class="fa fa-star"></i></button>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="rating" id="rating-value" value="0">
                                        <input type="hidden" name="rateable_type" value="article" id="rateable_type">
                                        <input type="hidden" name="rateable_id" value="{{ $article['id'] }}"
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
@extends('layouts.main-layout')
@section('title', 'Detail Artikel')
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
    <section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
        <div class="banner-curve"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix text-center">
                        <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                           <h2>News Details<span class="dotted"></span></h2>
                        </div>
                        <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
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
                                        <li><span class="icon-user"></span>by
                                                {{ $article['user']['name'] }}</li>
                                        <li><span class="icon-calendar"></span>{{ $article['updated_at'] }}</li>
                                        <li><span class="icon-chat">{{ $article['rating_count'] }} Comments</li>
                                    </ul>
                                    <div class="text">
                                        @php
                                            $imageContent = $article['image_content'] ?? [];
                                            $contentParts = explode('</p>', $article['content'] ?? '');

                                            // Default values
                                            $firstParagraph = $contentParts[0] ?? '';
                                            $middleContentParts = [];
                                            $beforeLastParagraph = '';
                                            $lastParagraph = '';

                                            // Handle paragraphs based on count
                                            if (count($contentParts) > 3) {
                                                $middleContentParts = array_slice(
                                                    $contentParts,
                                                    1,
                                                    count($contentParts) - 4,
                                                );
                                                $beforeLastParagraph = $contentParts[count($contentParts) - 3];
                                                $lastParagraph = $contentParts[count($contentParts) - 2];
                                            } elseif (count($contentParts) === 2) {
                                                $lastParagraph = $contentParts[1];
                                            }

                                            // Handle images
                                            $firstImages = array_slice($imageContent, 0, 1);
                                            $middleImages = array_slice($imageContent, 1, 2);
                                            $lastImages = array_slice($imageContent, 2, 1);

                                            $insertedMiddleContent = '';
                                            if (!empty($middleContentParts)) {
                                                $middleContentLength = count($middleContentParts);
                                                $randomPosition = rand(0, $middleContentLength - 1);
                                                $imagesInserted = false;

                                                foreach ($middleContentParts as $index => $part) {
                                                    $insertedMiddleContent .= $part . '</p>';

                                                    if (
                                                        $index == $randomPosition &&
                                                        !$imagesInserted &&
                                                        !empty($middleImages)
                                                    ) {
                                                        $insertedMiddleContent .= '<div class="row">';
                                                        foreach ($middleImages as $image) {
                                                            $insertedMiddleContent .=
                                                                '
                                                                    <div class="col-xl-6">
                                                                        <div class="single-image-nox">
                                                                            <img src="' . $image . '" alt="">
                                                                        </div>
                                                                    </div>';
                                                                }
                                                        $insertedMiddleContent .= '</div>';
                                                        $imagesInserted = true;
                                                    }
                                                }
                                            }
                                        @endphp

                                        {!! $firstParagraph !!}

                                        @if (!empty($firstImages))
                                            <div class="blog-details-image-1">
                                                <img src="{{ $firstImages[0] }}" alt="">
                                            </div>
                                        @endif

                                        {!! $insertedMiddleContent !!}

                                        @if (!empty($lastImages))
                                            <div class="blog-details-image-2">
                                                <div class="image-box">
                                                    <img src="{{ $lastImages[0] }}" alt="">
                                                </div>
                                                <div class="text-box">
                                                    {!! $lastParagraph !!}
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($beforeLastParagraph))
                                            {!! $beforeLastParagraph !!}
                                        @endif

                                    </div>
                                </div>
                                <!--End Blog Details Single-->
                            </div>
                        </div>

                        <div class="blog-details-bottom-content">
                            <div class="comment-box">
                                <div class="title">
                                    <h3>Comments</h3>
                                </div>
                                <div class="outer-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach ($article['ratings'] as $item)
                                                <div class="single-comment">
                                                    <div class="single-comment-box">
                                                        <div class="img-holder">
                                                            <img src="{{ URL::asset('main-website/images/blog/comment-1.png') }}"
                                                                alt="Awesome Image">
                                                        </div>
                                                        <div class="text-holder">
                                                            <div class="top">
                                                                <div class="name">
                                                                    <h3>{{ $item['user']['name'] }}</h3>
                                                                    <h5><span
                                                                            class="icon-calendar"></span>{{ $item['created_at'] }}
                                                                    </h5>
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
                                                                {{-- <div class="reply">
                                                                    <a href="#"><span
                                                                            class="icon-reply"></span>Reply</a>
                                                                </div> --}}
                                                            </div>
                                                            <div class="text">
                                                                <p>{{ $item['review'] }}.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab" id="comme">
                                <form action="{{ route('ratings.store') }}" method="POST">
                                    @csrf
                                    <div class="review-form">
                                        <div class="shop-page-title">
                                            <div class="title">
                                                <h3>Comments</h3>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="add-rating-box">
                                                    <div class="add-rating-title">
                                                        <p>Your Rating</p>
                                                    </div>
                                                    <div class="review-box">
                                                        <ul id="star-rating">
                                                            <button type="button" class="rating-number mr-2"
                                                                value="1"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="2"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="3"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number mr-2"
                                                                value="4"><i class="fa fa-star"></i></button>
                                                            <button type="button" class="rating-number"
                                                                value="5"><i class="fa fa-star"></i></button>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="rating" id="rating-value" value="0">
                                        <input type="hidden" name="rateable_type" value="article" id="rateable_type">
                                        <input type="hidden" name="rateable_id" value="{{ $article['id'] }}"
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
