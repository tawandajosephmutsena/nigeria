{{-- Events --}}
<section class="event section" id="{{ $props['section_id'] ?? 'event' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row flex">
            @foreach ($props['items'] as $item)
                <div class="col-lg-6">
                    <div class="single-event">
                        <div class="event-thumb"><img src="{{ \App\Themes\BlockRegistry::imageUrl($item['image']) }}" alt=""></div>
                        <div class="event-details">
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                            <div class="event-location">
                                <span><i class="icofont icofont-ui-calendar"></i>{{ $item['date'] }}</span>
                                <span><i class="icofont icofont-location-pin"></i>{{ $item['location'] }}</span>
                            </div>
                            <div class="event-btn-group">
                                <a href="{{ $item['join_link'] }}" class="t-btn t-btn-ex-small event-btn-1">Join Now</a>
                                <a href="{{ $item['details_link'] }}" class="t-btn t-btn-ex-small event-btn-2">Details</a>
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
