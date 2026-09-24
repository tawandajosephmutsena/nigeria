<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voices & Stories — UNFINISHED Campaign Nigeria</title>
    <meta name="description" content="Real stories and voices of Nigerian women, families, and healthcare workers advocating for maternal healthcare and law reform.">
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
                :root {
            --orange-500: #f71089; --orange-400: #ff2a9d; --orange-600: #db0c77;
            --dark-bg: #120a16; --dark-surface: #1a0f20; --dark-card: #23142c;
            --cream: #fbfbfa; --warm-white: #f6f6f2; --charcoal: #140e0e; --text-muted: #64748b;
            --font-headline: 'Anton', 'MarkPro', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
            --radius-md: 18px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--font-body); background: var(--cream); color: var(--charcoal); -webkit-font-smoothing: antialiased; line-height: 1.6; }
        a { text-decoration: none; color: inherit; }

        /* Header */
        .site-header {
            position: sticky; top: 0; z-index: 1000;
            background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(247, 16, 137, 0.12); padding: 0 28px;
        }
        .header-inner { max-width: 1320px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; height: 74px; }
        .logo-brand { display: flex; align-items: center; gap: 8px; font-family: var(--font-headline); font-size: 1.8rem; color: white; text-transform: uppercase; }
        .logo-dot { width: 8px; height: 8px; background: var(--orange-400); border-radius: 50%; }
        .nav-links { display: flex; align-items: center; gap: 10px; list-style: none; }
        .nav-link { font-size: .82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #1e293b; padding: 8px 14px; border-radius: 8px; transition: all .2s ease; }
        .nav-link:hover { color: white; background: rgba(255,255,255,0.08); }
        .btn-submit { background: var(--orange-500); color: #fff; padding: 10px 22px; border-radius: 50px; font-weight: 800; font-size: .8rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.2s; }
        .btn-submit:hover { background: var(--orange-400); color: var(--dark-bg); transform: translateY(-2px); }

        /* Hero */
        .stories-hero {
            background: linear-gradient(135deg, #1c0a1a 0%, #2e0c24 100%);
            padding: 90px 28px 70px; text-align: center; color: white;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .stories-badge { display: inline-block; background: rgba(247, 16, 137, 0.18); color: #ff60be; font-size: .75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; padding: 6px 18px; border-radius: 30px; margin-bottom: 18px; border: 1px solid rgba(247, 16, 137, 0.35); }
        .stories-hero h1 { font-family: var(--font-headline); font-size: clamp(2.4rem, 5.5vw, 4.2rem); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 16px; }
        .stories-hero p { font-size: 1.1rem; color: #1e293b; max-width: 680px; margin: 0 auto 32px; }

        /* Grid */
        .stories-section { max-width: 1320px; margin: 0 auto; padding: 70px 28px; }
        .stories-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 32px; }
        .story-card {
            background: #fff; border-radius: var(--radius-md); overflow: hidden;
            border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            transition: all 0.3s ease; display: flex; flex-direction: column;
        }
        .story-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,0.1); border-color: var(--orange-400); }
        .story-card-image { width: 100%; height: 230px; object-fit: cover; }
        .story-card-image-placeholder { width: 100%; height: 230px; background: linear-gradient(135deg, #2b170f, #4d2314); display: flex; align-items: center; justify-content: center; color: var(--orange-300); font-family: var(--font-headline); font-size: 2.2rem; }
        .story-card-body { padding: 28px; flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
        .story-badge { display: inline-block; background: #fff0f7; color: var(--orange-600); border: 1px solid #fbcfe8; font-size: 0.72rem; font-weight: 800; padding: 4px 12px; border-radius: 50px; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em; width: fit-content; }
        .story-card-title { font-family: var(--font-headline); font-size: 1.35rem; text-transform: uppercase; margin-bottom: 10px; line-height: 1.25; color: var(--charcoal); }
        .story-card-excerpt { font-size: 0.92rem; color: var(--text-muted); line-height: 1.65; margin-bottom: 18px; }
        .story-card-meta { font-size: 0.8rem; color: #94a3b8; margin-bottom: 16px; }
        .btn-read { display: inline-flex; align-items: center; gap: 6px; color: var(--orange-600); font-weight: 800; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; transition: gap 0.2s; margin-top: auto; }
        .btn-read:hover { gap: 10px; color: var(--orange-500); }

        /* Empty */
        .empty-state { text-align: center; padding: 80px 24px; color: var(--text-muted); }
        .empty-state h2 { font-family: var(--font-headline); font-size: 1.8rem; text-transform: uppercase; margin-bottom: 12px; color: var(--charcoal); }

        /* Footer */
        footer.site-footer { padding: 60px 28px; background: #100814; border-top: 1px solid rgba(247, 16, 137, 0.15); color: white; text-align: center; font-size: .88rem; } }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .stories-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <a href="/" class="logo-brand">
            <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED" style="height:42px;width:auto;display:block;">
        </a>
        <ul class="nav-links">
            <li><a href="/" class="nav-link">Home</a></li>
            <li><a href="/#about" class="nav-link">About</a></li>
            <li><a href="/#pillars" class="nav-link">The 4 Pillars</a></li>
            <li><a href="/#gallery" class="nav-link">Campaign Cards</a></li>
            <li><a href="/#petition" class="nav-link">Petition</a></li>
            <li><a href="/stories" class="nav-link" style="color:var(--orange-400);">Stories</a></li>
            <li><a href="/stories/submit" class="btn-submit">+ Share Your Voice</a></li>
        </ul>
    </div>
</header>

<section class="stories-hero">
    <div class="stories-badge">Real Voices • Real Impact</div>
    <h1>Because Every Woman's Life<br>Is Still Being Written</h1>
    <p>Personal accounts from Nigerian women, community advocates, midwives, doctors, and legal experts calling for maternal healthcare reform.</p>
    <a href="/stories/submit" class="btn-submit" style="padding:14px 32px;font-size:.9rem;">+ Share Your Story or Medical Perspective</a>
</section>

<section class="stories-section">
    @if(session('success'))
        <div style="background:var(--orange-500);color:white;padding:16px 24px;border-radius:12px;margin-bottom:32px;font-weight:700;">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($stories->isEmpty())
        <div class="empty-state">
            <h2>No Stories Published Yet</h2>
            <p style="margin-bottom:24px;">Be the first healthcare worker, advocate, or citizen to share your voice for maternal healthcare reform.</p>
            <a href="/stories/submit" class="btn-submit">Submit The First Story →</a>
        </div>
    @else
        <div class="stories-grid">
            @foreach($stories as $story)
                <div class="story-card">
                    @if($story->featured_image)
                        <img src="{{ asset($story->featured_image) }}" alt="{{ $story->title }}" class="story-card-image">
                    @else
                        <div class="story-card-image-placeholder">unfinished</div>
                    @endif
                    <div class="story-card-body">
                        <div>
                            @if($story->category)
                                <span class="story-badge">{{ $story->category }}</span>
                            @endif
                            <h3 class="story-card-title">{{ $story->title }}</h3>
                            <p class="story-card-excerpt">{{ Str::limit($story->excerpt ?? strip_tags($story->content), 120) }}</p>
                        </div>
                        <div>
                            <div class="story-card-meta">
                                By {{ $story->author_name ?? 'Anonymous Supporter' }} • {{ $story->created_at->format('M d, Y') }}
                            </div>
                            <a href="{{ route('stories.show', $story->slug) }}" class="btn-read">Read Full Story →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:48px;">
            {{ $stories->links() }}
        </div>
    @endif
</section>

<footer class="site-footer">
    <img src="{{ asset('themes/nigeria/img/logos/logo-footer-square.webp') }}" alt="UNFINISHED" style="height:64px;width:auto;margin:0 auto 18px;display:block;">
    <p style="font-family:var(--font-headline);font-size:1.1rem;color:#ff60be;letter-spacing:1px;text-transform:uppercase;margin-bottom:10px;">Unfinished Dreams • Unfinished Futures</p>
    <p style="color:rgba(255,255,255,0.7);margin-bottom:14px;">Reform the law. Protect our future. Sign the petition.</p>
    <p style="color:rgba(255,255,255,0.4);font-size:.82rem;">© {{ date('Y') }} UNFINISHED — Preventing Maternal Mortality. All rights reserved.</p>
</footer>

</body>
</html>
