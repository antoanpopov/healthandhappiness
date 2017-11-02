<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet"/>
{{--<link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" />--}}
<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div>
    <!-- START OF HEADER -->
@include('frontend::partials._header')
<!-- END OF HEADER -->
    @if(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::exists(Route::currentRouteName()))
        @yield('breadcrumbs',Breadcrumbs::render(Route::currentRouteName()))
    @endif
    @yield('content')
    @include('frontend::partials._footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
@stack('scripts')
</body>
</html>
