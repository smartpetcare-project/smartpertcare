@extends('layouts.app')
@section('title', 'Tambah Layanan')

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
    <x-page-title title="Layanan" subtitle="Tambah Layanan" />
    <form id="serviceForm" enctype="multipart/form-data" method="POST" action="{{ route('service.store') }}">
        <div class="row">
            @csrf
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="mb-3">Nama Layanan</h5>
                            <input type="text" class="form-control" placeholder="Tuliskan nama layanan..." name="title" required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Kategori</h5>
                            <select name="category_id" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach (['image_preview' => 'Preview Image', 'image_header' => 'Header Image'] as $name => $label)
                            <div class="mb-4">
                                <h5 class="mb-3">{{ $label }}</h5>
                                <div class="file-upload-wrapper">
                                    <input id="{{ $name }}" type="file" name="{{ $name }}"
                                        accept=".jpg, .png, image/jpeg, image/png" class="input-file"
                                        onchange="previewImage(this, '{{ $name }}_preview')">
                                    Klik untuk upload gambar
                                </div>
                                <div id="{{ $name }}_preview" class="file-preview"></div>
                            </div>
                        @endforeach
                        <div class="mb-4">
                            <h5 class="mb-3">Deskripsi Layanan</h5>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Gambar Konten (Maksimal 4 gambar)</h5>
                            <div class="file-upload-wrapper">
                                <input type="file" name="image_content[]" accept=".jpg, .png, image/jpeg, image/png"
                                    class="input-file" multiple onchange="previewImages(this)">
                                Klik untuk upload gambar
                            </div>
                            <div id="filePreview" class="file-preview"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3">
                            <button type="reset" class="btn btn-outline-danger flex-fill">Hapus</button>
                            <button type="submit" class="btn btn-outline-success flex-fill" name="is_publish" value="0">Simpan Draft</button>
                            <button type="submit" class="btn btn-outline-primary flex-fill" name="is_publish" value="1">Publikasikan</button>
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
    <script src="https://cdn.tiny.cloud/1/39mhw15dyz85o6gol7097io76086ixkfl5d54wyzb7i908i9/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            height: 300,
            skin: 'oxide-dark',
            content_css: 'dark',
            plugins: 'lists',
            toolbar: 'undo redo | formatselect | bold italic | bullist numlist | alignleft aligncenter alignright alignjustify | outdent indent',
            setup: function(editor) {
                editor.on('init', function() {
                    editor.getBody().style.backgroundColor = '#1b2430';
                    editor.getBody().style.color = '#e0e0e0';
                });
            },
        });
    </script>
    <script>
        document.getElementById('serviceForm').addEventListener('submit', function(event) {
            var content = tinymce.get('content').getContent();
            document.getElementById('content').value = content;
        });
    </script>
@endpush
