<div class="col-md-12 col-sm-12">
    <div class="cy_event_box">
        <div class="cy_event_img">
            @if($event->getFirstMedia('COVER_IMAGE'))
                <img src="{{ $event->getFirstMedia('COVER_IMAGE')->getUrl() }}" alt="" class="img-responsive">
            @else
                <img src="images/event/event1.jpg" alt="" class="img-responsive">
            @endif
            <div class="cy_event_detail">
                <div class="cy_event_time">
                    <ul>
                        <li><i><img src="images/svg/clock.svg"></i>{{ Date::parse($event->start_date)->format('G') }}
                            - {{ Date::parse($event->end_date)->format('G') }}</li>
                        <li><i><img src="images/svg/map.svg"></i>{{ $event->location }}</li>
                    </ul>
                </div>
                <div class="cy_event_date">
                    {{ Date::setLocale('bg') }}
                    <span class="ev_date">{{ Date::parse($event->start_date)->format('d M') }}</span>
                    <span class="ev_yr">{{ $event->start_date->format('Y') }}</span>
                </div>
            </div>
        </div>
        <div class="cy_event_data">
            <h2><a href="event_single.html">{{ $event->title }}</a></h2>
            <p>{{ $event->abstract }}</p>
            <a href="event_single.html" class="cy_button">{{ trans('frontend::buttons.read more') }}</a>
        </div>
    </div>
</div>