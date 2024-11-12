@extends('layouts.app')
@section('title')
    Detail Layanan
@endsection
@section('content')
    <x-page-title title="Smart Pets Care" subtitle="Detail Layanan" />

    <div class="card">
        <div class="card-body">
            <div
                class="d-flex flex-lg-row flex-column align-items-start align-items-lg-center justify-content-between gap-3">
                <div class="flex-grow-1">
                    <div class="d-flex flex-row gap-2">
                        <h5 class="fw-bold">{{ $service['title'] }}</h5>
                        <span
                            class="badge d-flex align-items-center {{ $service['is_publish'] == 1 ? 'bg-grd-success' : 'bg-grd-danger' }}">{{ $service['is_publish'] == 1 ? 'Publish' : 'Unpublish' }}</span>
                    </div>
                    <p class="mb-0">Penulis : {{ $service['user']['name'] }} - {{ $service['updated_at'] }}</p>
                    <p class="mb-0">Kategori : {{ $service['category']['name'] }}</p>
                </div>
                <div class="overflow-auto">
                    <div class="btn-group position-static">
                        <div class="btn-group position-static">
                            <form action="{{ route('service.preview', ['uuid' => $service['uuid']]) }}" method="get">
                                <button type="submit" class="btn btn-outline-primary align-items-center">
                                    <i class="fadeIn animated bx bx-show-alt"></i>
                                    Preview
                                </button>
                            </form>
                        </div>
                        <div class="btn-group position-static">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <button type="button"
                                        class="dropdown-item {{ $service['is_publish'] == 1 ? 'text-danger' : 'text-success' }}"
                                        onclick="setChangeStatusForm('service','{{ $service['uuid'] }}', {{ $service['is_publish'] }})">
                                        {{ $service['is_publish'] == 0 ? 'Publish' : 'Unpublish' }}
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        onclick="setDeleteForm('service', '{{ $service['uuid'] }}')">
                                        Delete
                                    </button>

                                    <form id="service-delete-form-{{ $service['uuid'] }}"
                                        action="{{ route('service.destroy', $service['uuid']) }}" method="POST"
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
                                    @if (empty($service['ratings']))
                                        <tr>
                                            <td colspan="3" class="text-center">Belum ada rating yang diberikan</td>
                                        </tr>
                                    @else
                                        @foreach ($service['ratings'] as $item)
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
                        <p class="mb-0 fw-bold">{{ $service['average_rating'] }}</p>
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
@endpush
