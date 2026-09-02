{{-- Fun Facts counters --}}
<section class="fun-factor section text-center" id="{{ $props['section_id'] ?? '' }}"
    @if (! empty($props['bg_image'])) style="background-image: url('{{ \App\Themes\BlockRegistry::imageUrl($props['bg_image']) }}'); background-size: cover;" @endif>
    <div class="container">
        <div class="row flex">
            @foreach ($props['items'] as $item)
                <div class="col-sm-3">
                    <div class="single-factor">
                        <i class="icofont {{ $item['icon'] }}"></i>
                        <h3 class="counter">{{ $item['count'] }}</h3>
                        <h2>{{ $item['label'] }}</h2>
                    </div>
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
