{{-- Services Grid --}}
<section class="service section black-bg" id="{{ $props['section_id'] ?? 'service' }}">
    <div class="container">
        <div class="section-header white">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row flex text-center">
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
