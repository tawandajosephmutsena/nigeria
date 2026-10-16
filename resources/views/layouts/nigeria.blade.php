<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'UNFINISHED — Preventing Maternal Mortality')</title>
    <meta name="description" content="@yield('meta_description', 'Unfinished Dreams. Unfinished Futures. Reform the law. Protect our future.')">
    <link rel="icon" type="image/webp" href="{{ asset('themes/nigeria/img/logos/unfinished-logo-option-5.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @font-face {
            font-family: 'MarkPro';
            src: url("{{ asset('themes/nigeria/fonts/MarkPro-Black.otf') }}") format('opentype');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --brand-50: #fff0f7;
            --brand-100: #fce7f3;
            --brand-200: #fbcfe8;
            --brand-300: #f472b6;
            --brand-400: #ff2a9d;
            --brand-500: #f71089;
            --brand-600: #db0c77;
            --brand-700: #b50761;
            --dark-bg: #120a16;
            --dark-surface: #1a0f20;
            --canvas-bg: #fcfbfe;
            --canvas-pure: #ffffff;
            --charcoal: #0f172a;
            --text-body: #334155;
            --text-muted: #64748b;
            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 28px;
            --shadow-sm: 0 2px 10px rgba(0,0,0,.03);
            --shadow-md: 0 10px 30px rgba(247,16,137,.06), 0 2px 8px rgba(0,0,0,.04);
            --font-headline: 'Anton', 'MarkPro', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: var(--font-body); color: var(--charcoal); background: var(--canvas-bg); line-height: 1.65; overflow-x: hidden; }
        img { max-width: 100%; height: auto; display: block; }
        a { color: inherit; text-decoration: none; transition: color .25s ease; }

        .site-header {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            background: rgba(255,255,255,.94); backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(247,16,137,.12); box-shadow: 0 4px 20px rgba(0,0,0,.03);
        }
        .header-inner { max-width: 1380px; height: 78px; margin: 0 auto; padding: 0 36px; display: flex; align-items: center; justify-content: space-between; }
        .logo-brand { display: flex; align-items: center; }
        .nav-logo-img { height: 44px; width: auto; transition: transform .25s ease; }
        .logo-brand:hover .nav-logo-img { transform: scale(1.02); }
        .nav-links { display: flex; align-items: center; gap: 8px; }
        .nav-link { position: relative; padding: 8px 14px; border-radius: 8px; color: #1e293b; font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.2px; }
        .nav-link::after { position: absolute; bottom: 4px; left: 50%; width: 0; height: 2px; content: ''; background: var(--brand-500); transform: translateX(-50%); transition: width .3s ease; }
        .nav-link:hover, .nav-link.is-active { color: var(--brand-500); }
        .nav-link:hover::after, .nav-link.is-active::after { width: 60%; }
        .btn-nav-petition { padding: 11px 24px; border-radius: 50px; background: var(--brand-500); box-shadow: 0 4px 18px rgba(247,16,137,.35); color: #fff; font-size: .8rem; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
        .btn-nav-petition:hover { background: var(--brand-600); color: #fff; transform: translateY(-2px); box-shadow: 0 8px 26px rgba(247,16,137,.5); }
        .menu-toggle { display: none; padding: 8px; border: 0; background: transparent; color: #1e293b; cursor: pointer; }
        .mobile-drawer { display: flex; flex-direction: column; gap: 8px; padding: 24px 28px; border-top: 1px solid rgba(247,16,137,.12); background: #fff; box-shadow: 0 16px 36px rgba(0,0,0,.1); }
        .mobile-logo-img { width: auto; height: 38px; margin-bottom: 12px; }
        .mobile-link { padding: 12px 0; border-bottom: 1px solid rgba(0,0,0,.05); color: #1e293b; font-size: .94rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }
        .mobile-link:hover { color: var(--brand-500); }

        .site-main { min-height: calc(100vh - 78px); padding-top: 78px; }
        .section-container { width: min(100% - 48px, 1280px); margin: 0 auto; }

        .site-footer { position: relative; overflow: hidden; padding: 76px 0 28px; background: var(--dark-bg); color: #fff; }
        .site-footer::before { position: absolute; inset: 0; content: ''; opacity: .5; background: radial-gradient(circle at 15% 10%, rgba(247,16,137,.22), transparent 30%), radial-gradient(circle at 85% 80%, rgba(255,42,157,.14), transparent 28%); pointer-events: none; }
        .footer-grid { position: relative; z-index: 1; display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 56px; }
        .footer-logo-img { width: auto; height: 64px; margin-bottom: 20px; }
        .footer-mission-text { max-width: 340px; color: rgba(255,255,255,.68); font-size: .92rem; line-height: 1.75; }
        .footer-cta-tagline { margin-top: 20px; color: #ff60be; font-family: var(--font-headline); font-size: 1.05rem; letter-spacing: 1px; text-transform: uppercase; }
        .footer-col-title { margin-bottom: 18px; color: #ff60be; font-size: .74rem; font-weight: 900; letter-spacing: 3px; text-transform: uppercase; }
        .footer-link { display: block; padding: 5px 0; color: rgba(255,255,255,.65); font-size: .9rem; }
        .footer-link:hover { color: #fff; transform: translateX(3px); }
        .footer-bottom { position: relative; z-index: 1; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 12px; margin-top: 72px; padding-top: 24px; border-top: 1px solid rgba(255,255,255,.08); color: rgba(255,255,255,.45); font-size: .84rem; }

        @media (max-width: 900px) { .footer-grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 768px) {
            .header-inner { padding: 0 22px; }
            .nav-links { display: none; }
            .menu-toggle { display: block; }
            .section-container { width: min(100% - 40px, 1280px); }
            .footer-grid { grid-template-columns: 1fr; gap: 34px; }
        }
    </style>
    @stack('styles')
</head>
<body>
<header class="site-header" x-data="{ mobileOpen: false }">
    <div class="header-inner">
        <a href="/" class="logo-brand">
            <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED — Dreams • Futures • Care" class="nav-logo-img">
        </a>
        <nav class="nav-links" aria-label="Primary navigation">
            <a href="/#about" class="nav-link">About</a>
            <a href="/#events" class="nav-link">Live Event</a>
            <a href="/#pillars" class="nav-link">The 4 Pillars</a>
            <a href="/#stats" class="nav-link">Research Data</a>
            <a href="/#gallery" class="nav-link">Campaign Cards</a>
            <a href="/stories" class="nav-link is-active">Stories</a>
            <a href="/#petition" class="btn-nav-petition">Sign Petition</a>
        </nav>
        <button type="button" class="menu-toggle" @click="mobileOpen = !mobileOpen" :aria-expanded="mobileOpen.toString()" aria-label="Toggle menu">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
        </button>
    </div>
    <nav x-show="mobileOpen" x-transition class="mobile-drawer" aria-label="Mobile navigation">
        <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED" class="mobile-logo-img">
        <a href="/#about" @click="mobileOpen = false" class="mobile-link">About</a>
        <a href="/#events" @click="mobileOpen = false" class="mobile-link">Live Event</a>
        <a href="/#pillars" @click="mobileOpen = false" class="mobile-link">The 4 Pillars</a>
        <a href="/#stats" @click="mobileOpen = false" class="mobile-link">Research Data</a>
        <a href="/#gallery" @click="mobileOpen = false" class="mobile-link">Campaign Cards</a>
        <a href="/stories" @click="mobileOpen = false" class="mobile-link">Stories</a>
        <a href="/#petition" @click="mobileOpen = false" class="mobile-link" style="color:var(--brand-500)">Sign Petition</a>
    </nav>
</header>

<main class="site-main">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="section-container">
        <div class="footer-grid">
            <div>
                <a href="/" class="logo-brand"><img src="{{ asset('themes/nigeria/img/logos/logo-footer-square.webp') }}" alt="UNFINISHED — Dreams • Futures • Care" class="footer-logo-img"></a>
                <p class="footer-mission-text">Amplifying the call to review Nigeria's maternal healthcare laws so fewer lives, dreams, and futures are left unfinished.</p>
                <div class="footer-cta-tagline">Reform the law. Protect our future. Sign the petition.</div>
            </div>
            <div>
                <p class="footer-col-title">Navigation</p>
                <a href="/#about" class="footer-link">About Campaign</a>
                <a href="/#events" class="footer-link">Live Abuja Event</a>
                <a href="/#pillars" class="footer-link">The 4 Pillars</a>
                <a href="/#stats" class="footer-link">Research Data</a>
                <a href="/#gallery" class="footer-link">Campaign Visuals</a>
            </div>
            <div>
                <p class="footer-col-title">Action</p>
                <a href="/#petition" class="footer-link">Sign Petition</a>
                <a href="/stories/submit" class="footer-link">Share Story</a>
                <a href="/stories" class="footer-link">Community Stories</a>
                <a href="/admin" class="footer-link">Admin Portal</a>
            </div>
            <div>
                <p class="footer-col-title">Contact</p>
                <a href="{{ \App\Support\WhatsApp::chatLink() }}" target="_blank" rel="noopener noreferrer" class="footer-link">WhatsApp Campaign Desk</a>
                <p style="margin-top:18px;color:rgba(255,255,255,.4);font-size:.82rem;line-height:1.6">Abuja &amp; Lagos, Nigeria</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} UNFINISHED — Preventing Maternal Mortality.</p>
            <p>Reform the law. Protect our future. Sign the petition.</p>
        </div>
    </div>
</footer>

<a href="{{ \App\Support\WhatsApp::chatLink('I want to support the Unfinished Preventing Maternal Mortality Campaign') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp" style="position:fixed;right:28px;bottom:28px;z-index:9000;display:flex;width:60px;height:60px;align-items:center;justify-content:center;border-radius:50%;background:#25d366;box-shadow:0 6px 28px rgba(37,211,102,.45)">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="28" height="28"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>
@stack('scripts')
</body>
</html>
