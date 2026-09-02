{{-- Client logos --}}
<div class="client section" id="{{ $props['section_id'] ?? '' }}">
    <div class="container">
        <div class="client-logo">
            @foreach ($props['items'] as $item)
                <a href="{{ $item['link'] }}"><img src="{{ \App\Themes\BlockRegistry::imageUrl($item['logo']) }}" alt=""></a>
            @endforeach
        </div>
    </div>
</div>
