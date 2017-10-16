@if($group->shouldShowHeading())
    <li class="navigation-header">
        <span>{{ $group->getName() }}</span>
        <i class="menu-icon" title="{{ $group->getName() }}"></i>
    </li>
@endif

@foreach($items as $item)
    {!! $item !!}
@endforeach
