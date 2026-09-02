{{-- Donate CTA --}}
<section class="donate section text-center" id="{{ $props['section_id'] ?? '' }}">
    <div class="container">
        <h2>{{ $props['title'] }}</h2>
        <p>{{ $props['text'] }}</p>
        <a href="{{ $props['btn_link'] }}" class="t-btn donate-btn">{{ $props['btn_text'] }}</a>
    </div>
</section>
