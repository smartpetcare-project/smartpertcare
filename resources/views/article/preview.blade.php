@extends('layouts.app')
@section('title')
    Preview Artikel
@endsection
@push('css')
    <style>
        .img-thumbnail {
            max-width: 45%;
            /* Batasi lebar gambar agar lebih kecil */
            height: auto;
            border-radius: 8px;
            /* Tambahkan sedikit border-radius */
        }

        .image-gallery {
            display: flex;
            gap: 10px;
            /* Berikan jarak antar gambar */
            flex-wrap: wrap;
        }
    </style>
@endpush
@section('content')
    <x-page-title title="Smart Pets Care" subtitle="Preview Artikel" />

    <div class="card">
        <div class="card-body">
            <div
                class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    <div class="d-flex flex-row gap-2">
                        <h5 class="fw-bold">{{ $article['title'] }}</h5>
                        <span
                            class="badge d-flex align-items-center {{ $article['is_publish'] == 1 ? 'bg-grd-success' : 'bg-grd-danger' }}">{{ $article['is_publish'] == 1 ? 'Publish' : 'Unpublish' }}</span>
                    </div>
                    <p class="mb-0">Penulis : {{ $article['user']['name'] }} - {{ $article['updated_at'] }}</p>
                    <p class="mb-0">Kategori : {{ $article['category']['name'] }}</p>
                </div>
                <div class="overflow-auto">
                    <div class="btn-group position-static">                        
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button
                                        class="dropdown-item {{ $article['is_publish'] == 1 ? 'text-danger' : 'text-success' }}"
                                        data-id="{{ $article['uuid'] }}"
                                        onclick="changeStatus(this)">{{ $article['is_publish'] == 0 ? 'Publish' : 'Unpublish' }}</button>
                                </li>
                                <li>
                                    <button class="dropdown-item text-danger" data-id="{{ $article['uuid'] }}"
                                        onclick="deleteArticle(this)">Delete</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="mb-3 fw-bold">
                    <span class="badge align-items-center bg-grd-primary">{{ $article['category']['name'] }}</span>
                </h5>
                <div class="article-content">
                    <h3 class="fw-bold">{{ $article['title'] }}</h3>
                    <div class="d-flex flex-row gap-4">
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-user"></i>
                            <span class="ms-0">By {{ $article['user']['name'] }}</span>
                        </div>
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-calendar-week"></i>
                            <span class="ms-0">{{ $article['updated_at'] }}</span>
                        </div>
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-comment-detail"></i>
                            <span class="ms-0">{{ $countRating }}</span>
                        </div>
                    </div>
                    @php                        
                        $contentParts = explode('</p>', $article['content'], 2);
                    @endphp

                    <div class="mt-4">
                        {!! $contentParts[0] !!}</p>
                        
                        @if (!empty($article['image_content']))
                            <div class="image-gallery d-flex gap-2 mb-3 flex-wrap">
                                @foreach ($article['image_content'] as $image)
                                    <img src="{{ $image }}" alt="{{ $article['title'] }}" class="img-thumbnail">
                                @endforeach
                            </div>
                        @endif

                        {!! $contentParts[1] ?? '' !!}
                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
