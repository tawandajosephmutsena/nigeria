{{-- Feature Cards --}}
<section class="feature section black-bg text-center" id="{{ $props['section_id'] ?? '' }}">
    <div class="container">
        <div class="row flex">
            @foreach ($props['items'] as $item)
                <div class="col-sm-4">
                    <div class="single-feature">
                        <i class="icofont {{ $item['icon'] }}"></i>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                        <a href="{{ $item['link'] }}">See More <i class="icofont icofont-arrow-right"></i></a>
                    </div>
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
