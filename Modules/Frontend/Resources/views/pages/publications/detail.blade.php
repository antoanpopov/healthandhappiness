@extends('frontend::layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                {{ $post->title }}
                {{ $post->content }}
                {{ $post->cover_image_id }}
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="sidebar">
                    @include('frontend::widgets.search',['route'=>'frontend.publications.index'])
                    @include('frontend::widgets.categories',['route'=>'frontend.publications.index'])
                    @include('frontend::widgets.tags',['route'=>'frontend.publications.index'])
                </div>
            </div>
        </div>
    </div>
@endsection
