{{-- Blog / News --}}
@php
    $posts = collect([]);
    if (! empty($props['from_blog'])) {
        $posts = \App\Models\Blog\Post::query()
            ->published()
            ->latest()
            ->limit((int) ($props['post_count'] ?? 2))
            ->get()
            ->map(function ($post) {
                $image = $post->getFirstMediaUrl('cover');
                return [
                    'image' => $image ?: '/themes/nigeria/img/blog-1.jpg',
                    'title' => $post->title,
                    'date' => $post->published_at?->format('j M Y') ?? '—',
                    'author' => $post->author?->name ?? 'Post Admin',
                    'text' => \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 180),
                    'link' => '#blog',
                ];
            });
    }
    $items = $posts->isNotEmpty() ? $posts->all() : $props['items'];
@endphp
<section class="blog home-blog section" id="{{ $props['section_id'] ?? 'blog' }}">
    <div class="container">
        <div class="section-header">
            <h2>{{ $props['heading'] }}</h2>
            <p>{{ $props['subtitle'] }}</p>
        </div><!-- .section-header -->
        <div class="row flex">
            @foreach ($items as $post)
                <div class="col-sm-6">
                    <div class="post">
                        <header class="entry-header">
                            <a href="{{ $post['link'] }}" class="post-thumbnail" target="_blank"><img src="{{ \App\Themes\BlockRegistry::imageUrl($post['image']) }}" alt=""></a>
                            <div class="post-details-wrap">
                                <h2 class="entry-title"><a href="{{ $post['link'] }}" target="_blank">{{ $post['title'] }}</a></h2>
                                <div class="byline">
                                    <span class="author"><a href="#"><i class="fa fa-user"></i> {{ $post['author'] }}</a></span>
                                    <span class="posted-on"><span>{{ $post['date'] }}</span></span>
                                </div>
                            </div><!-- .post-details-wrap -->
                        </header>
                        <div class="entry-content">
                            <p>{{ $post['text'] }}</p>
                            <a href="{{ $post['link'] }}" class="t-btn t-btn-ex-small read-more-btn" target="_blank">Read More</a>
                        </div>
                    </div><!-- .post -->
                </div><!-- .col -->
            @endforeach
        </div>
    </div>
</section>
