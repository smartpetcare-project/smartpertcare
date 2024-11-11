@extends('layouts.app')
@section('title', 'Edit Kategori')

@push('css')
    <link href="{{ asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
    <style>
        .file-upload-wrapper {
            border: 2px dashed #555;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            color: #ccc;
            margin-top: 10px;
            position: relative;
        }

        .file-upload-wrapper:hover {
            border-color: #888;
            color: #888;
        }

        .file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .file-preview .image-wrapper {
            position: relative;
            display: inline-block;
        }

        .file-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background-color: #ff4d4d;
            color: #fff;
            border-radius: 50%;
            padding: 2px 6px;
        }

        .input-file {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            opacity: 0;
        }

        /* Custom TinyMCE Editor Styles */
        .blue-theme {
            background-color: #1b2430 !important;
            color: #e0e0e0 !important;
        }

        .tox .tox-toolbar,
        .tox .tox-editor-header,
        .tox .tox-statusbar {
            background-color: #1b2430 !important;
            color: #e0e0e0 !important;
            border: none;
        }

        .tox .tox-button,
        .tox .tox-toolbar__primary {
            background-color: #2c3e50 !important;
            color: #e0e0e0 !important;
        }

        .tox .tox-button:hover {
            background-color: #34495e !important;
        }
    </style>
@endpush

@section('content')
    <x-page-title title="Kategori" subtitle="Edit Kategori" />
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="categoryForm" enctype="multipart/form-data" method="POST"
                        action="{{ route('category.update', $category['uuid']) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <h5 class="mb-3">Nama Kategori</h5>
                            <input type="text" class="form-control" placeholder="Write title here..." name="name"
                                required value="{{ $category['name'] }}">
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Tipe</h5>
                            <select name="type" class="form-select" required>
                                <option value="">Pilih Tipe</option>
                                <option value="product" {{ $category['type'] == 'product' ? 'selected' : '' }}>Produk</option>
                                <option value="article" {{ $category['type'] == 'article' ? 'selected' : '' }}>Artikel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-primary flex-fill">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection

@push('script')
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
