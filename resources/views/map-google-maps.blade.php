@extends('layouts.app')
@section('title')
    Google Maps
@endsection
@section('content')
    <x-page-title title="Components" subtitle="Google Maps" />

    <div class="row">
        <div class="col-xl-12">
            <h6 class="text-uppercase">Simple Basic Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="simple-map" class="gmaps"></div>
                </div>
            </div>
            <h6 class="text-uppercase">Map With Marker</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="marker-map" class="gmaps"></div>
                </div>
            </div>
            <h6 class="text-uppercase">Over Layer Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="overlay-map" class="gmaps"></div>
                </div>
            </div>
            <h6 class="text-uppercase">Polygonal Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="polygons-map" class="gmaps"></div>
                </div>
            </div>
            <h6 class="text-uppercase">Styled Map</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div id="style-map" class="gmaps"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection
@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async
        defer></script>
    <script src="{{ URL::asset('build/plugins/gmaps/map-custom-script.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
