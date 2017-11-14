<div class="col-xs-12 col-md-3">
    <aside class="">
        {!! Form::open(['url' => route('frontend.publications.index',['search' => request('search'),'category'=> request('category'), 'tag' => request('tag')]), 'method' => 'GET']) !!}
        {!! Form::text('search', old('search'), ['placeholder' => trans('frontend::labels.search placeholder')]) !!}
        @if(request('category'))
            {!! Form::hidden('category', old('category')) !!}
        @endif
        @if(request('tag'))
            {!! Form::hidden('tag', old('tag')) !!}
        @endif
        <button>{{ trans('frontend::buttons.search') }}</button>
        {!! Form::close() !!}
    </aside>
</div>
<div class="widget widget_search">
    <form class="search-form">
        <div class="input-group">
            <input type="text" value="" name="s" class="form-control" placeholder="Search">
            <span class="cy_search_btn">
										<button class="btn btn-search" type="submit"><i class="fa fa-search"
                                                                                        aria-hidden="true"></i></button>
									</span>
        </div>
    </form>
</div>