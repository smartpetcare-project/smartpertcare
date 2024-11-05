@extends('layouts.app')
@section('title')
    Article
@endsection
@section('content')
    <x-page-title title="eCommerce" subtitle="Article" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">({{ $countAllArticle }})</span></a>
        <a href="javascript:;"><span class="me-1">Published</span><span
                class="text-secondary">({{ $countArticlePublish }})</span></a>
        <a href="javascript:;"><span class="me-1">Drafts</span><span
                class="text-secondary">({{ $countArticleUnpublish }})</span></a>
    </div>

    <div class="row g-3">
        <div class="col-auto">
            <div class="position-relative">
                <input class="form-control px-5" type="search" placeholder="Search Products">
                <span
                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
        </div>
        <div class="col-auto flex-grow-1 overflow-auto">
            <div class="btn-group position-static">
                <div class="btn-group position-static">
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div class="btn-group position-static">
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Vendor
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div class="btn-group position-static">
                    <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Collection
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button>
                <button class="btn btn-primary px-4" onclick="{{ route('articles.create') }}"><i class="bi bi-plus-lg me-2"></i>Add Product</button>
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle pb-5">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <input class="form-check-input" type="checkbox">
                                </th>
                                <th>Judul Artikel</th>                                
                                <th>Kategori</th>                                
                                <th>Rating</th>                                
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $item)
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box">
                                                <img src="{{ $item['image_preview'] }}" width="70" class="rounded-3"
                                                    alt="">
                                            </div>
                                            <div class="product-info">
                                                <a href="/article/{{ $item['uuid'] }}" class="product-title">{{ $item['title'] }}</a>
                                                <p class="mb-0 product-category">Category : {{ $item['category_name'] }}</p>
                                            </div>
                                        </div>
                                    </td>                                    
                                    <td>{{ $item['category_name'] }}</td>                                    
                                    <td>
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill text-warning me-2"></i><span>{{ $item['average_rating'] }}</span>
                                        </div>
                                    </td>                                    
                                    <td>
                                        {{ $item['updated_at'] }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <button
                                                        class="dropdown-item {{ $item['is_publish'] == 1 ? 'text-danger' : 'text-success' }}"
                                                        data-id="{{ $item['uuid'] }}"
                                                        onclick="changeStatus(this)">{{ $item['is_publish'] == 0 ? 'Publish' : 'Unpublish' }}</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-id="{{ $item['uuid'] }}"
                                                        onclick="deleteArticle(this)">Delete</button>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
