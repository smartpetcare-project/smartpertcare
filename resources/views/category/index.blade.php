@extends('layouts.app')
@section('title')
    Kategori
@endsection
@section('content')
    <x-page-title title="Kategori" subtitle="Views" />

    {{-- <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
        <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">()</span></a>
        <a href="javascript:;"><span class="me-1">Published</span><span class="text-secondary">()</span></a>
        <a href="javascript:;"><span class="me-1">Drafts</span><span class="text-secondary">()</span></a>
    </div> --}}

    <div class="row g-3 d-flex justify-content-between">
        <div class="col-auto">
            <div class="position-relative">
                <input class="form-control px-5" type="search" placeholder="Search Products">
                <span
                    class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button>
                <button class="btn btn-primary px-4" onclick="window.location.href='{{ route('category.create') }}'"><i class="bi bi-plus-lg me-2"></i>Tambah Kategori</button>
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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>                                    
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['type'] == 'product' ? 'Produk' : 'Artikel' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('category.edit', $item['uuid']) }}">edit</a></li>
                                                <li>
                                                    <button type="button" class="dropdown-item text-danger"
                                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                        onclick="setDeleteForm('category', '{{ $item['uuid'] }}')">
                                                        Delete
                                                    </button>

                                                    <form id="category-delete-form-{{ $item['uuid'] }}"
                                                        action="{{ route('category.destroy', $item['uuid']) }}"
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
