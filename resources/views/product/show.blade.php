@extends('layouts.app')
@section('title')
    Detail Produk
@endsection
@section('content')
    <x-page-title title="Smart Pets Care" subtitle="Detail Artikel" />

    <div class="card">
        <div class="card-body">
            <div
                class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    <div class="d-flex flex-row gap-2">
                        <h5 class="fw-bold">{{ $product['name'] }}</h5>
                        <span
                            class="badge d-flex align-items-center {{ $product['is_publish'] == 1 ? 'bg-grd-success' : 'bg-grd-danger' }}">{{ $product['is_publish'] == 1 ? 'Publish' : 'Unpublish' }}</span>
                    </div>
                    <p class="mb-0">Kategori : {{ $product['category']['name'] }}</p>
                    <p class="mb-0">Harga : Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                </div>
                <div class="overflow-auto">
                    <div class="btn-group position-static">
                        {{-- <div class="btn-group position-static">
                            <form action="{{ route('product.preview', ['uuid' => $product['uuid']]) }}" method="get">
                                <button type="submit" class="btn btn-outline-primary align-items-center">
                                    <i class="fadeIn animated bx bx-show-alt"></i>
                                    Preview
                                </button>
                            </form>
                        </div> --}}
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button type="button"
                                        class="dropdown-item {{ $product['is_publish'] == 1 ? 'text-danger' : 'text-success' }}"
                                        onclick="setChangeStatusForm('product','{{ $product['uuid'] }}', {{ $product['is_publish'] }})">
                                        {{ $product['is_publish'] == 0 ? 'Publish' : 'Unpublish' }}
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item"
                                        onclick="window.location.href='{{ route('product.edit', $item['uuid']) }}'">Edit</button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        onclick="setDeleteForm('product', '{{ $product['uuid'] }}')">
                                        Delete
                                    </button>

                                    <form id="product-delete-form-{{ $product['uuid'] }}"
                                        action="{{ route('product.destroy', $product['uuid']) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3 fw-bold">Ratings<span class="fw-light ms-2">({{ $countRating }})</span></h5>
                    <div class="product-table">
                        <div class="table-responsive white-space-nowrap">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama User</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (empty($product['ratings']))
                                        <tr>
                                            <td colspan="3" class="text-center">Belum ada rating yang diberikan</td>
                                        </tr>
                                    @else
                                        @foreach ($product['ratings'] as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="product-box">
                                                            <img src="https://placehold.co/200x150/png" width="70"
                                                                class="rounded-3" alt="">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="javascript:;"
                                                                class="product-title">{{ $item['user']['name'] }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item['rating'] }}</td>
                                                <td>{{ $item['review'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fw-bold">Rata-rata penilaian :</p>
                        <p class="mb-0 fw-bold">{{ $product['average_rating'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
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
