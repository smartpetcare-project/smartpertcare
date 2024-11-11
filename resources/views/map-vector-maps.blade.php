@extends('layouts.app')
@section('title')
    Vector Maps
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
@endpush
@section('content')
    <x-page-title title="Components" subtitle="Vector Map" />

    <div class="row">
        <div class="col-12 col-xl-6">
            <h6 class="text-uppercase">World Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="world-map-markers" style="height: 400px"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <h6 class="text-uppercase">India</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="india" style="height: 400px"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <h6 class="text-uppercase">Usa</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="usa" style="height: 400px"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <h6 class="text-uppercase">Australia Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="australia" style="height: 400px"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12">
            <h6 class="text-uppercase">Uk Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="uk" style="height: 400px"></div>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/vectormap/jvectormap.custom.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush