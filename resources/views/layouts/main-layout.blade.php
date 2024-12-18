<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Smartpets Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @include('layouts.main-website-css')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}"
        sizes="32x32">
    <link rel="icon" type="image/png" href="{{ URL::asset('main-website/images/resources/logosmartpetscare.png') }}"
        sizes="16x16">

</head>

<body>
    <div class="boxed_wrapper">
        <div class="preloader"></div>
        @include('components.hidden-bar')
        @if (View::getSection('title') == 'Landing Page')
            @include('components.main-header-landing')
        @else
            @include('components.main-header')
        @endif

        @yield('content')

        @include('components.footer')

        @include('components.modals')
    </div>

    <!-- jequery plugins -->
    @include('layouts.main-website-js')

</body>

</html>
