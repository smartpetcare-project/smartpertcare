@extends('layouts.app')
@section('title')
    Form Repeater
@endsection
@section('content')

    <x-page-title title="Form" subtitle="Reapeater" />

    <!-- Repeater Html Start -->
    <div id="repeater">
        <!-- Repeater Heading -->

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Repeater</h5>
                    <button class="btn btn-primary repeater-add-btn px-4">Add</button>
                </div>
            </div>
        </div>

        <!-- Repeater Items -->
        <div class="items" data-group="test">
            <div class="card">
                <div class="card-body">
                    <!-- Repeater Content -->
                    <div class="item-content">
                        <div class="mb-3">
                            <label for="inputName1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName1" placeholder="Name" data-name="name">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputEmail1" placeholder="Email"
                                data-skip-name="true" data-name="email">
                        </div>
                    </div>
                    <!-- Repeater Remove Btn -->
                    <div class="repeater-remove-btn">
                        <button class="btn btn-danger remove-btn px-4">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="items" data-group="test">

            <div class="card">
                <div class="card-body">
                    <!-- Repeater Content -->
                    <div class="item-content">
                        <div class="mb-3">
                            <label for="inputName2" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName2" placeholder="Name" data-name="name">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail2" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputEmail2" placeholder="Email"
                                data-skip-name="true" data-name="email">
                        </div>
                    </div>
                    <!-- Repeater Remove Btn -->
                    <div class="repeater-remove-btn">
                        <button class="btn btn-danger remove-btn px-4">
                            Remove
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="items" data-group="test">
            <div class="card">
                <div class="card-body">
                    <!-- Repeater Content -->
                    <div class="item-content">
                        <div class="mb-3">
                            <label for="inputName3" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName3" placeholder="Name" data-name="name">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail3" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email"
                                data-skip-name="true" data-name="email">
                        </div>
                    </div>
                    <!-- Repeater Remove Btn -->
                    <div class="repeater-remove-btn">
                        <button class="btn btn-danger remove-btn px-4">
                            Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Repeater End -->

@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/form-repeater/repeater.js') }}"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush