{{-- Team members --}}
<section class="team section" id="{{ $props['section_id'] ?? '' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row flex text-center">
            @foreach ($props['items'] as $item)
                <div class="col-sm-3">
                    <div class="team-member">
                        <div class="member-thumb">
                            <img src="{{ \App\Themes\BlockRegistry::imageUrl($item['image']) }}" alt="">
                            <div class="member-social">
                                @if (! empty($item['facebook']))<a href="{{ $item['facebook'] }}"><i class="fa fa-facebook"></i></a>@endif
                                @if (! empty($item['linkedin']))<a href="{{ $item['linkedin'] }}"><i class="fa fa-linkedin"></i></a>@endif
                                @if (! empty($item['skype']))<a href="{{ $item['skype'] }}"><i class="fa fa-skype"></i></a>@endif
                            </div>
                        </div>
                        <h3 class="member-name">{{ $item['name'] }}</h3>
                        <span class="designation">{{ $item['designation'] }}</span>
                    </div>
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
