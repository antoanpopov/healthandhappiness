@extends('frontend::layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                @include('frontend::widgets.search-filters')
                @each('frontend::pages.publications.list-item',$publications,'publication','frontend::search.no-results')
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="sidebar">
                    @include('frontend::widgets.search')
                    @include('frontend::widgets.categories')
                    @include('frontend::widgets.tags')
                </div>
            </div>
        </div>
    </div>
@endsection
