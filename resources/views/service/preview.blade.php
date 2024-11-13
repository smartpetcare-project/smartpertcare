@extends('layouts.app')
@section('title')
    Preview Layanan
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
    <x-page-title title="Smart Pets Care" subtitle="Preview Layanan" />

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

    <div class="col-12 d-flex">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="mb-3 fw-bold">
                    <span class="badge align-items-center bg-grd-primary">{{ $service['category']['name'] }}</span>
                </h5>
                <div class="service-content">
                    <h3 class="fw-bold">{{ $service['title'] }}</h3>
                    <div class="d-flex flex-row gap-4">
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-user"></i>
                            <span class="ms-0">By {{ $service['user']['name'] }}</span>
                        </div>
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-calendar-week"></i>
                            <span class="ms-0">{{ $service['updated_at'] }}</span>
                        </div>
                        <div class="font-14">
                            <i class="fadeIn animated bx bx-comment-detail"></i>
                            <span class="ms-0">{{ $countRating }}</span>
                        </div>
                    </div>
                    @php
                        $imageContent = $service['image_content'];
                        $firstImages = array_slice($imageContent, 0, 2);
                        $lastImages = array_slice($imageContent, 2, 2);

                        $contentParts = explode('</p>', $service['content']);
                        $firstParagraph = $contentParts[0];
                        $middleContent = implode('</p>', array_slice($contentParts, 1, count($contentParts) - 3));
                        $lastParagraph = $contentParts[count($contentParts) - 2];
                    @endphp

                    <div class="mt-4">
                        {!! $firstParagraph !!}

                        @if (!empty($firstImages))
                            <div class="image-gallery d-flex gap-2 mb-3 flex-wrap">
                                @foreach ($firstImages as $image)
                                    <img src="{{ $image }}" alt="{{ $service['title'] }}" class="img-thumbnail">
                                @endforeach
                            </div>
                        @endif

                        {!! $middleContent !!}

                        @if (!empty($lastImages))
                            <div class="image-gallery d-flex gap-2 mb-3 flex-wrap">
                                @foreach ($lastImages as $image)
                                    <img src="{{ $image }}" alt="{{ $service['title'] }}" class="img-thumbnail">
                                @endforeach
                            </div>
                        @endif

                        {!! $lastParagraph !!}
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
    <script>
        const errorMessages = @json(session('error_messages', []));
        const successMessage = @json(session('success', ''));
    </script>
@endpush
