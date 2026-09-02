{{-- Causes with progress --}}
<section class="cause section" id="{{ $props['section_id'] ?? 'cause' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row flex">
            @foreach ($props['items'] as $item)
                @php
                    $raised = (float) ($item['raised'] ?? 0);
                    $target = (float) ($item['target'] ?? 1);
                    $percent = $target > 0 ? min(100, round($raised / $target * 100)) : 0;
                @endphp
                <div class="col-sm-4">
                    <div class="single-cause">
                        <img src="{{ \App\Themes\BlockRegistry::imageUrl($item['image']) }}" class="cause-thumb" alt="">
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                        <div class="donate-status">
                            <div class="status">
                                <span>RAISED</span>
                                <span>TARGET</span>
                            </div>
                            <div class="status-bar"><div class="wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="0.1s" style="width: {{ $percent }}%"></div></div>
                            <div class="status">
                                <span>{{ number_format($raised) }} $</span>
                                <span>{{ number_format($target) }} $</span>
                            </div>
                        </div><!-- .donate-status -->
                        <a href="{{ $item['link'] }}" class="t-btn t-btn-ex-small">DONATE NOW</a>
                    </div>
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
