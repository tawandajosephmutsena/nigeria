{{-- Hero Slider --}}
<section class="hero text-center" id="{{ $props['section_id'] ?? 'home' }}"
    @if (! empty($props['bg_color'])) style="background-color: {{ $props['bg_color'] }};" @endif>
    @foreach ($props['slides'] as $slide)
        <div class="single-slide">
            <div class="container">
                <h1>{{ $slide['title_part1'] }} <span>{{ $slide['title_highlight'] }}</span> {{ $slide['title_part2'] }}</h1>
                <h3>{{ $slide['small_title'] }}</h3>
                <h5>{{ $slide['subtitle'] }}</h5>
                <div class="hero-btn-group">
                    <a href="{{ $slide['btn1_link'] }}" class="t-btn hero-btn-1">{{ $slide['btn1_text'] }}</a>
                    <a href="{{ $slide['btn2_link'] }}" class="t-btn hero-btn-2">{{ $slide['btn2_text'] }}</a>
                </div>
            </div>
        </div><!-- .single-slide -->
    @endforeach
    <div class="hero-slider owl-carousel">
        @foreach ($props['slides'] as $slide)
            <img src="{{ \App\Themes\BlockRegistry::imageUrl($slide['image']) }}" alt="">
        @endforeach
    </div>
</section>
