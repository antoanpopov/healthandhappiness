<aside class="">
    <h2>{{ trans('frontend::labels.learn more about') }}:</h2>
    <div class="row">
        @foreach($tags as $tag)
            <a href="{{ route('frontend.publications.index',['category'=> request('category'),'tag'=>$tag->slug]) }}"
               title="{{ $tag->name }}">
                <span class="tag-theme">{{ $tag->name }}</span>
            </a>
        @endforeach
    </div>
</aside>
