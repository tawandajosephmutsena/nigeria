{{-- About (Accordion + Video) --}}
<section class="about section" id="{{ $props['section_id'] ?? 'about' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row">
            <div class="col-lg-6">
                <div class="accordian-wrapper">
                    @foreach ($props['accordion'] as $item)
                        <div class="single-accordian">
                            <h3 class="accordian-head">{{ $item['heading'] }}</h3>
                            <div class="accordian-body">{{ $item['body'] }}</div>
                        </div><!-- .single-accordian -->
                    @endforeach
                </div>
            </div><!-- .col -->
            <div class="col-lg-6">
                <div class="video-section">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="816" height="459" src="{{ $props['video_url'] }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div><!-- .col -->
        </div>
    </div>
</section>
