@extends('layouts.app')
@section('title')
    Produk
@endsection
@section('content')
    <x-page-title title="Produk" subtitle="views" />

    <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">({{ $countAllProduct }})</span></a>
        <a href="javascript:;"><span class="me-1">Published</span><span
                class="text-secondary">({{ $countProductPublish }})</span></a>
        <a href="javascript:;"><span class="me-1">Drafts</span><span
                class="text-secondary">({{ $countProductUnpublish }})</span></a>
    </div>

    <div class="row g-3 d-flex justify-content-between">
        <div class="col-auto">
            <div class="position-relative">
                {{-- <input class="form-control px-5" type="search" placeholder="Search Products">
                <span
                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span> --}}
            </div>
        </div>        
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                {{-- <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button> --}}
                <button class="btn btn-primary px-4" onclick="window.location.href='{{ route('product.create') }}'">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Produk
                </button>
            </div>
        </div>
    </div><!--end row-->

    <div class="card mt-4">
        <div class="card-body">
            <div class="product-table">
                <div class="table-responsive white-space-nowrap">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>                                
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>                                    
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-box">
                                                <img src="{{ $item['image_preview'] }}" width="70" class="rounded-3"
                                                    alt="">
                                            </div>
                                            <div class="product-info">
                                                <a href="/admin/product/{{ $item['uuid'] }}"
                                                    class="product-title">{{ $item['name'] }}</a>
                                                <p class="mb-0 product-category">Category : {{ $item['category_name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                                    <td>{{ $item['category_name'] }}</td>
                                    <td>
                                        <div class="product-rating">
                                            <i
                                                class="bi bi-star-fill text-warning me-2"></i><span>{{ $item['average_rating'] }}</span>
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
                                                    <button type="button"
                                                        class="dropdown-item {{ $item['is_publish'] == 1 ? 'text-danger' : 'text-success' }}"
                                                        onclick="setChangeStatusForm('product','{{ $item['uuid'] }}', {{ $item['is_publish'] }})">
                                                        {{ $item['is_publish'] == 0 ? 'Publish' : 'Unpublish' }}
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item"
                                                        onclick="window.location.href='{{ route('product.edit', $item['uuid']) }}'">Edit</button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item text-danger"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        onclick="setDeleteForm('product', '{{ $item['uuid'] }}')">
                                                        Delete
                                                    </button>

                                                    <form id="product-delete-form-{{ $item['uuid'] }}"
                                                        action="{{ route('product.destroy', $item['uuid']) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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
    <script>
        const errorMessages = @json(session('error_messages', []));
        const successMessage = @json(session('success', ''));
    </script>
@endpush
