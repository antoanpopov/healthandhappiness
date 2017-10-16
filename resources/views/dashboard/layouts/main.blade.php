<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @include("dashboard.layouts._head")
</head>
<body>
<!-- Main navbar -->
@include('dashboard.layouts._navbar_top')
<!-- /main navbar -->
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
    @include('dashboard.layouts._sidebar')
    <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
        @include('dashboard.layouts._header')
        <!-- /page header -->
            <!-- Content area -->
            <div class="content">

                @if (Session::has('success'))
                    <div class="alert bg-success alert-styled-left">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        {!! Session::get('success') !!}
                    </div>
            @endif
            @yield('content')
            <!-- Footer -->
            @include('dashboard.layouts._footer')
            <!-- /footer -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
<!-- Scripts -->
@yield('scripts')
</body>
</html>
