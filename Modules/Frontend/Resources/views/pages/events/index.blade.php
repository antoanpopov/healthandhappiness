@extends('frontend::layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                @include('frontend::widgets.search-filters')
                @each('frontend::pages.events.list-item',$events,'event','frontend::search.no-results')
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="sidebar">
                    @include('frontend::widgets.search',['route'=>'frontend.events.index'])
                    @include('frontend::widgets.categories',['route'=>'frontend.events.index'])
                    @include('frontend::widgets.tags',['route'=>'frontend.events.index'])
                </div>
            </div>
        </div>
    </div>
@endsection
