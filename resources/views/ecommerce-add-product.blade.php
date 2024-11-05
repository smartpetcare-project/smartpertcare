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
        .file-preview img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .hidden {
            display: none; /* Hide the default file input */
        }
    </style>
@endpush

@section('content')
    <x-page-title title="Ecommerce" subtitle="Add Product" />

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="productForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <h5 class="mb-3">Product Title</h5>
                            <input type="text" class="form-control" placeholder="Write title here..." name="name" required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Product Description</h5>
                            <textarea class="form-control" cols="4" rows="6" placeholder="Write a description here..." name="description" required></textarea>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Product Price</h5>
                            <input type="number" class="form-control" placeholder="100.000" name="price" required>
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Banner Image</h5>
                            <input id="imageBanner" type="file" name="image_banner" accept=".jpg, .png, image/jpeg, image/png">
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Header Image</h5>
                            <input id="imageHeader" type="file" name="image_header" accept=".jpg, .png, image/jpeg, image/png">
                        </div>
                        <div class="mb-4">
                            <h5 class="mb-3">Content Images (Add up to 4 images one by one)</h5>
                            <div id="filePreview" class="file-preview"></div>
                            <button type="button" id="addImageButton" class="btn btn-secondary mt-2" onclick="addImageInput()">Add Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-outline-danger flex-fill">Discard</button>
                        <button type="button" class="btn btn-outline-success flex-fill" onclick="submitForm(0)">Save Draft</button>
                        <button type="button" class="btn btn-outline-primary flex-fill" onclick="submitForm(1)">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection

@push('script')
    <script src="{{ asset('build/js/jquery.min.js') }}"></script>

    <script>
        let currentImageCount = 0; // Track the number of uploaded images
        const maxImages = 4; // Maximum number of images allowed
    
        function addImageInput() {
            if (currentImageCount >= maxImages) {
                alert(`You can upload a maximum of ${maxImages} images.`);
                return;
            }
    
            // Create a new file input element
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'image_content[]';
            newInput.accept = '.jpg, .png, image/jpeg, image/png';
            newInput.classList.add('hidden'); // Hide the input
            newInput.onchange = function () {
                previewImages(newInput);
            };
    
            const wrapper = document.createElement('div');
            wrapper.classList.add('file-upload-wrapper');
            wrapper.onclick = () => newInput.click(); // Trigger file input click
            wrapper.innerText = 'Click to upload an image';
    
            // Append the new input and its wrapper to the preview container
            document.getElementById('filePreview').appendChild(wrapper);
            document.getElementById('filePreview').appendChild(newInput);
    
            currentImageCount++;
    
            // Hide the button if we've reached the max images
            if (currentImageCount >= maxImages) {
                document.getElementById('addImageButton').style.display = 'none';
            }
        }
    
        function previewImages(input) {
            const previewContainer = document.getElementById('filePreview');
            const file = input.files[0];
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }
    
        function submitForm(is_publish) {
            var formData = new FormData($('#productForm')[0]);
            formData.append('is_publish', is_publish);
    
            // Logging FormData
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }
    
            $.ajax({
                url: "{{ route('products.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.message);
                    if (response.success && is_publish) {
                        window.location.href = "{{ route('products.index') }}";
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('An error occurred while saving the product.');
                }
            });
        }
    </script>
@endpush
