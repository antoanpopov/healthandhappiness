@extends('dashboard.layouts.main')
@section('pageTitle')
    {{trans("dashboard::pages.home.index")}}
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages/dashboard.js')}}"></script>
@endsection
@section('breadcrumbs')
    {!! Breadcrumbs::render('home') !!}
@endsection
@section('content')



@endsection
