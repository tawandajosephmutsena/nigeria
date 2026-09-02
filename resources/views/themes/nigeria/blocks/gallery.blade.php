{{-- Gallery with lightbox --}}
<section class="gallery section" id="{{ $props['section_id'] ?? 'gallery' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="portfolio zoom-gallery gutter-less">
            <div class="grid-sizer"></div>
            @foreach ($props['items'] as $item)
                <div class="portfolio-item">
                    <a href="{{ \App\Themes\BlockRegistry::imageUrl($item['full']) }}" class="gallery-item">
                        <img src="{{ \App\Themes\BlockRegistry::imageUrl($item['thumb']) }}" alt="">
                    </a>
                </div><!-- .portfolio-item -->
            @endforeach
        </div><!-- .portfolio -->
    </div><!-- .container -->
</section>
