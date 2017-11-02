@extends('frontend::layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                @foreach($publications as $publication)
                    <article class="blog-post col-md-6 col-xs-12"
                             itemscope="" itemtype="http://schema.org/BlogPosting">
                        <figure>
                            <a href="http://forumzdrave.bg/dieti-i-hranene/klenoviyat-sirop/">
                                <img itemprop="image"
                                     src="http://forumzdrave.bg/wp-content/uploads/2013/11/syrup-bottles-350x231.jpg"
                                     alt="">
                                <div class="article-header" itemprop="headline">
                                    {{ $publication->title }}
                                </div>
                            </a>
                        </figure>
                        <div class="article-content">
                            <div class="article-tags">
                                <a href="#" title="" class="label label-theme">Диети и хранене</a>
                            </div>
                            <div class="">
                            <span class="entry-author">от <a
                                        href="http://forumzdrave.bg/author/jiterziev/"
                                        title="Публикации от Екип Форум Здраве"
                                        rel="author">Д-р Светлана Попова</a></span>
                                Публикувано на
                                <time class="entry-date" datetime="2017-09-27T23:11:56" itemprop="datePublished">
                                    {{ $publication->created_at->format('d/m/Y') }}
                                </time>
                            </div>
                            <div class="article-summary"><p>{{ $publication->abstract }}</p>
                            </div>

                            <a class="read-more" href="{{ route('frontend.publications.detail',['slug'=> $publication->slug]) }}">{{ trans('frontend::buttons.read more') }}</a>
                        </div>
                    </article>
                @endforeach
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
