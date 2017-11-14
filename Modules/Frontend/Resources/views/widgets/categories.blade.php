<aside class="">
    <h2>{{ trans('frontend::labels.categories') }}:</h2>
    <div class="row">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('frontend.publications.index',['search' => request('search'), 'category'=>$category->slug, 'tag' => request('tag')]) }}"
                       title="{{ $category->title }}">
                        <span class="tag-theme">{{ $category->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
