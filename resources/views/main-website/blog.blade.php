@extends('layouts.main-layout')
@section('title', 'Artikel')
@section('content')
<section class="breadcrumb-area" style="background-image: url({{ URL::asset('main-website/images/slides/salshi.jpg') }});">
    <div class="banner-curve"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix text-center">
                    <div class="title wow slideInUp animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                       <h2>News Feeds<span class="dotted"></span></h2>
                    </div>
                    <div class="breadcrumb-menu wow slideInDown animated" data-wow-delay="0.3s" data-wow-duration="1500ms">
                        <ul class="clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">News Feeds</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="blog-area" class="blog-style3-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    @if ($articles->isEmpty())
                        <div class="text-center">
                            Belum ada Berita!
                        </div>
                    @else
                        <div class="blog-posts">
                            @foreach ($articles as $item)
                                <div class="single-blog-style2 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="img-holder">
                                        <div class="inner">
                                            <img src="{{ $item['image_header'] }}"
                                                alt="Awesome Image">
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <div class="categories">
                                            <h5>{{ $item['category_name'] }}</h5>
                                        </div>
                                        <h2 class="blog-title">
                                            <a href="blog-single.html">{{ $item['title'] }}.</a>
                                        </h2>
                                        <ul class="meta-info">
                                            <li><span class="icon-eye"></span><a href="#">232 Views</a></li>
                                            <li><span class="icon-chat"></span><a href="#">{{ $item['rating_count'] }} Comments</a></li>
                                            <li><span class="icon-calendar"></span><a href="#">{{ $item['updated_at'] }}</a></li>
                                        </ul>
                                        <div class="text">
                                            <p>{{ $item['content'] }}...</p>
                                        </div>
                                        <div class="bottom-box">
                                            <div class="author">
                                                <div class="image">
                                                    <img src="{{ URL::asset('main-website/images/blog/author-1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="name">
                                                    <h4>by {{ $item['user']['name'] }}</h4>
                                                </div>
                                            </div>
                                            <div class="readmore">
                                                <a href="{{ route('blog.detail', $item['uuid']) }}"><span class="icon-next"></span>Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="styled-pagination clearfix text-center">
                                    @if ($articles->currentPage() > 1)
                                        <li class="prev">
                                            <a href="{{ $articles->previousPageUrl() }}">
                                                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif

                                    @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                                        <li class="{{ $page == $articles->currentPage() ? 'active' : '' }}">
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    @if ($articles->hasMorePages())
                                        <li class="next">
                                            <a href="{{ $articles->nextPageUrl() }}">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endsection
