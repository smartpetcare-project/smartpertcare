<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin SmartPets Care</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}" type="image/png">

    @include('layouts.head-css')
</head>

<body>

    @include('layouts.topbar')

    @include('layouts.sidebar')

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            @yield('content')
        </div>
    </main>

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    @include('components.modals')
    @include('layouts.extra')

    @include('layouts.common-scripts')
</body>

</html>
