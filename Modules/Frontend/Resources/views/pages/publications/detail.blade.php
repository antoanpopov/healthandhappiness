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
                <aside class="">
                    <h2>Научете още за:</h2>
                    <div class="row">
                        <a href="#" title="">
                            <span class="tag-theme">здраве</span>
                        </a>
                        <a href="#" title="">
                            <span class="tag-theme">щастие</span>
                        </a>
                        <a href="#" title="">
                            <span class="tag-theme">кристал рейки</span>
                        </a>
                        <a href="#" title="">
                            <span class="tag-theme">диета</span>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
