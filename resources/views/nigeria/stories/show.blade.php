<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $story->title }} — UNFINISHED Campaign Nigeria</title>
    <meta name="description" content="{{ $story->excerpt }}">

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:title" content="{{ $story->title }}">
    <meta property="og:description" content="{{ $story->excerpt }}">
    <meta property="og:url" content="{{ $shareLinks['url'] }}">
    <meta property="og:type" content="article">
    @if($story->image)
    <meta property="og:image" content="{{ Storage::url($story->image) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $story->title }}">
    <meta name="twitter:description" content="{{ $story->excerpt }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'MarkPro';
            src: url("{{ asset('themes/nigeria/fonts/MarkPro-Black.otf') }}") format('opentype');
            font-weight: 900;
            font-style: normal;
        }
        :root {
            --emerald-500: #149865; --emerald-400: #47d399; --emerald-600: #0f7a51;
            --dark-bg: #07120c; --dark-surface: #0f1c14; --dark-card: #14241b;
            --cream: #fbfbfa; --warm-white: #f6f6f2; --charcoal: #0e1410; --text-muted: #64748b;
            --font-headline: 'Anton', 'MarkPro', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
            --radius-md: 18px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--font-body); background: var(--cream); color: var(--charcoal); -webkit-font-smoothing: antialiased; line-height: 1.7; }
        a { text-decoration: none; color: inherit; }

        .site-header {
            position: sticky; top: 0; z-index: 1000;
            background: rgba(7, 18, 12, 0.9); backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08); padding: 0 28px;
        }
        .header-inner { max-width: 1320px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; height: 74px; }
        .logo-brand { display: flex; align-items: center; gap: 8px; font-family: var(--font-headline); font-size: 1.8rem; color: white; text-transform: uppercase; }
        .logo-dot { width: 8px; height: 8px; background: var(--emerald-400); border-radius: 50%; }
        .back-link { display: flex; align-items: center; gap: 8px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.8); transition: color 0.2s; }
        .back-link:hover { color: var(--emerald-400); }

        .story-wrapper { max-width: 820px; margin: 0 auto; padding: 60px 24px 80px; }
        .story-category { display: inline-block; background: #eafaf1; color: var(--emerald-600); font-size: 0.75rem; font-weight: 800; padding: 6px 14px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; }
        .story-title { font-family: var(--font-headline); font-size: clamp(2.2rem, 4.5vw, 3.4rem); line-height: 1.15; text-transform: uppercase; margin-bottom: 20px; color: var(--charcoal); }
        .story-meta { font-size: 0.88rem; color: var(--text-muted); margin-bottom: 32px; display: flex; flex-wrap: wrap; gap: 16px; align-items: center; }
        .story-cover { width: 100%; height: 440px; object-fit: cover; border-radius: var(--radius-md); margin-bottom: 40px; }
        .story-body { font-size: 1.12rem; line-height: 1.85; color: #334155; }
        .story-body p { margin-bottom: 24px; }

        .share-card { background: white; border-radius: var(--radius-md); border: 1px solid rgba(0,0,0,0.06); padding: 32px; margin-top: 48px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); text-align: center; }
        .share-btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; border-radius: 50px; color: white; font-weight: 700; font-size: .85rem; text-transform: uppercase; margin: 6px; }

        footer.site-footer { padding: 60px 28px; background: #050b07; color: white; text-align: center; font-size: .88rem; }
    </style>
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a href="/" class="logo-brand">
            <span>unfinished</span>
            <span class="logo-dot"></span>
        </a>
        <a href="{{ route('stories.index') }}" class="back-link">← All Community Stories</a>
    </div>
</header>

<main class="story-wrapper">
    @if($story->category)
        <span class="story-category">{{ $story->category }}</span>
    @endif

    <h1 class="story-title">{{ $story->title }}</h1>

    <div class="story-meta">
        <span>Shared by <strong>{{ $story->author_name ?? 'Anonymous Supporter' }}</strong></span>
        <span>•</span>
        <span>{{ $story->created_at->format('F d, Y') }}</span>
        @if($story->author_location)
        <span>•</span>
        <span>📍 {{ $story->author_location }}</span>
        @endif
    </div>

    @if($story->image)
        <img src="{{ Storage::url($story->image) }}" alt="{{ $story->title }}" class="story-cover">
    @endif

    <div class="story-body">
        {!! nl2br(e($story->content)) !!}
    </div>

    <div class="share-card">
        <h3 style="font-family:var(--font-headline);font-size:1.4rem;text-transform:uppercase;margin-bottom:10px;">Help Amplify This Story</h3>
        <p style="color:var(--text-muted);margin-bottom:20px;font-size:.95rem;">Share this story to build public support for completing Nigeria's maternal healthcare laws.</p>
        <div>
            <a href="{{ $shareLinks['whatsapp'] }}" target="_blank" class="share-btn" style="background:#25d366;">Share on WhatsApp</a>
            <a href="{{ $shareLinks['twitter'] }}" target="_blank" class="share-btn" style="background:#000;">Share on X</a>
            <a href="{{ $shareLinks['facebook'] }}" target="_blank" class="share-btn" style="background:#1877f2;">Share on Facebook</a>
        </div>
    </div>
</main>

<footer class="site-footer">
    <p>© {{ date('Y') }} unfinished — Abortion Law Reform Campaign Nigeria. Finish the law. Protect her future.</p>
</footer>

</body>
</html>
