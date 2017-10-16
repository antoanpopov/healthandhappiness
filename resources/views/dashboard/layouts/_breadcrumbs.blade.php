@if (count($breadcrumbs))
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}" title="{{ $breadcrumb->title }}">
                        @if(isset($breadcrumb->icon))
                            <i class="{{ $breadcrumb->icon }} position-left"></i>
                        @endif{{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="active">
                    @if(isset($breadcrumb->icon))
                        <i class="{{ $breadcrumb->icon }} position-left"></i>
                    @endif{!! $breadcrumb->title !!}
                </li>
            @endif
        @endforeach
    </ul>
@endif
