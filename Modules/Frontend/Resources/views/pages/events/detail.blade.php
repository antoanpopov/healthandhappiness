@extends('frontend::layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                {{ $event->title }}
                {{ $event->content }}
                {{ $event->cover_image_id }}
            </div>
            <div class="col-xs-12 col-md-3">
                @include('frontend::widgets.categories')
                @include('frontend::widgets.tags')
            </div>
        </div>
    </div>
@endsection
