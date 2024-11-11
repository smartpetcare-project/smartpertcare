@extends('layouts.app')
@section('title', 'Add Product')

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
    <x-page-title title="Ecommerce" subtitle="Add Product" />
    <form enctype="multipart/form-data" action="{{ route('banners.store') }}">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                        @csrf
                        <div class="mb-4">
                            <h5 class="mb-3">Judul</h5>
                            <input type="text" class="form-control" placeholder="Write title here..." name="title"
                                required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Sub Judul</h5>
                            <input type="text" class="form-control" placeholder="Write title here..." name="subtitle"
                                required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Foto Banner</h5>
                            <div class="file-upload-wrapper">
                                <input id="image_banner" type="file" name="image_banner"
                                    accept=".jpg, .png, image/jpeg, image/png" class="input-file"
                                    onchange="previewImage(this, 'image_banner_preview')">
                                Click to upload an image
                            </div>
                            <div id="image_banner_preview" class="file-preview">
                            </div>
                        </div>                                                
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <button type="button" class="btn btn-outline-danger flex-fill"
                            onclick="resetForm()">Discard</button>
                            <button type="submit" class="btn btn-outline-success flex-fill">Save</button>                        
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </form>
@endsection

@push('script')
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script> --}}
    <script>                
        // Function to handle single image previews for image_preview, image_banner, and image_header
        function previewImage(input, previewId) {
            const previewContainer = document.getElementById(previewId);
            const file = input.files[0];

            if (file) {
                previewContainer.innerHTML = ''; // Clear previous image
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }        

        function resetForm() {
            $('#productForm')[0].reset();
            tinyMCE.get('description').setContent('');
            document.querySelectorAll('.file-preview').forEach(container => container.innerHTML = '');
            currentImageCount = 0;
            document.querySelectorAll('.input-file').forEach(input => input.disabled = false);
        }
    </script>
@endpush
