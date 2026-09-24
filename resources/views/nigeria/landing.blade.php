<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNFINISHED — Preventing Maternal Mortality</title>
    <meta name="description" content="Unfinished Dreams. Unfinished Futures. Reform the law. Protect our future. Sign the petition to prevent maternal mortality in Nigeria.">

    {{-- Open Graph / Social --}}
    <meta property="og:title" content="UNFINISHED — Unfinished Dreams. Unfinished Futures.">
    <meta property="og:description" content="Reform the law. Protect our future. Sign the petition to ensure no woman's life or dreams are left unfinished.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('themes/nigeria/social_gallery/unfinished-preventing-maternal-mortality-1.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/webp" href="{{ asset('themes/nigeria/img/logos/unfinished-logo-option-5.webp') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    {{-- Cinematic Engine: Three.js + GSAP + ScrollTrigger + Lenis + Alpine --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
    <script src="https://unpkg.com/lenis@1.1.13/dist/lenis.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
    /* ═══════════════════════════════════════════════════
       DESIGN SYSTEM — UNFINISHED CAMPAIGN
       Theme: Approved Vibrant Magenta / Luminous Alive
       ═══════════════════════════════════════════════════ */
    @font-face {
        font-family: 'MarkPro';
        src: url("{{ asset('themes/nigeria/fonts/MarkPro-Black.otf') }}") format('opentype');
        font-weight: 900; font-style: normal; font-display: swap;
    }

    :root {
        /* Primary Approved Logo Colors (Vibrant Magenta / Hot Rose) */
        --brand-50:   #fff0f7;
        --brand-100:  #fce7f3;
        --brand-200:  #fbcfe8;
        --brand-300:  #f472b6;
        --brand-400:  #ff2a9d;
        --brand-500:  #f71089;  /* PRIMARY BRAND ACCENT: Exact Approved Logo Color */
        --brand-600:  #db0c77;
        --brand-700:  #b50761;
        --brand-800:  #8d084d;
        --brand-900:  #550730;

        /* Compatibility aliases mapped to new brand theme */
        --orange-50:  var(--brand-50);
        --orange-100: var(--brand-100);
        --orange-200: var(--brand-200);
        --orange-300: var(--brand-300);
        --orange-400: var(--brand-400);
        --orange-500: var(--brand-500);
        --orange-600: var(--brand-600);
        --orange-700: var(--brand-700);
        --orange-800: var(--brand-800);
        --orange-900: var(--brand-900);

        /* Canvas & Surfaces: Bright, Alive, Modern */
        --canvas-bg:     #fcfbfe;
        --canvas-pure:   #ffffff;
        --card-surface:  #ffffff;
        --card-border:   rgba(247, 16, 137, 0.12);

        /* Contrast Obsidian Plum for hero and footer base */
        --dark-bg:       #120a16;
        --dark-surface:  #1a0f20;
        --dark-card:     #23142c;
        --charcoal:      #0f172a;
        --text-body:     #334155;
        --text-muted:    #64748b;
        --cream:         #fcfbfe;
        --warm-white:    #ffffff;
        --gold-accent:   #f71089;

        --radius-sm: 10px; --radius-md: 18px; --radius-lg: 28px;
        --shadow-sm: 0 2px 10px rgba(0,0,0,0.03);
        --shadow-md: 0 10px 30px rgba(247, 16, 137, 0.06), 0 2px 8px rgba(0,0,0,0.04);
        --shadow-xl: 0 24px 60px rgba(247, 16, 137, 0.12), 0 4px 16px rgba(0,0,0,0.06);

        --font-headline: 'Anton', 'MarkPro', sans-serif;
        --font-body: 'Plus Jakarta Sans', sans-serif;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: initial; }
    html.lenis, html.lenis body { height: auto; }
    .lenis.lenis-smooth { scroll-behavior: auto !important; }
    .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
    .lenis.lenis-stopped { overflow: hidden; }

    body {
        font-family: var(--font-body); color: var(--charcoal);
        background: var(--canvas-bg); -webkit-font-smoothing: antialiased;
        line-height: 1.65; overflow-x: hidden;
    }
    img { max-width: 100%; height: auto; display: block; }
    a { text-decoration: none; color: inherit; transition: color .25s ease; }
    button { cursor: pointer; }

    /* ═══ CUSTOM CURSOR ═══ */
    .cursor-dot, .cursor-ring, .cursor-label { display: none; }

    /* ═══ WEBGL CANVAS ═══ */
    #webgl-canvas {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        z-index: 0; pointer-events: none; opacity: 0.45;
    }

    /* ═══ CINEMATIC PRELOADER ═══ */
    #preloader {
        position: fixed; inset: 0; z-index: 100000;
        background: var(--dark-bg);
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        gap: 28px;
    }
    .preloader-text {
        font-family: var(--font-headline); font-size: clamp(2.2rem, 5vw, 4rem);
        text-transform: uppercase; letter-spacing: 6px; color: white;
        overflow: hidden; display: flex;
    }
    .preloader-char {
        display: inline-block; transform: translateY(110%); opacity: 0;
    }
    .preloader-bar-track {
        width: 180px; height: 2px; background: rgba(255,255,255,0.12);
        border-radius: 2px; overflow: hidden;
    }
    .preloader-bar-fill {
        width: 0%; height: 100%; background: var(--brand-500);
        box-shadow: 0 0 12px var(--brand-500);
        border-radius: 2px;
    }
    .preloader-sub {
        font-size: .75rem; letter-spacing: 3px; text-transform: uppercase;
        color: rgba(255,255,255,0.6); opacity: 0; font-weight: 600;
    }

    /* ═══ HEADER / NAV ═══ */
    .site-header {
        position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
        background: rgba(255, 255, 255, 0.94);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border-bottom: 1px solid rgba(247, 16, 137, 0.12);
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        transition: all .4s cubic-bezier(.4,0,.2,1);
    }
    .site-header.scrolled {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        border-bottom: 1px solid rgba(247, 16, 137, 0.18);
    }
    .header-inner {
        max-width: 1380px; margin: 0 auto; padding: 0 36px;
        display: flex; align-items: center; justify-content: space-between; height: 78px;
    }
    .logo-brand { display: flex; align-items: center; gap: 12px; }
    .nav-logo-img {
        height: 44px; width: auto; display: block;
        transition: transform .25s ease;
    }
    .logo-brand:hover .nav-logo-img { transform: scale(1.02); }

    .nav-links { display: flex; align-items: center; gap: 8px; }
    .nav-link {
        font-size: .8rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.2px; color: #1e293b;
        padding: 8px 14px; border-radius: 8px; transition: all .2s ease;
        position: relative;
    }
    .nav-link::after {
        content: ''; position: absolute; bottom: 4px; left: 50%; width: 0; height: 2px;
        background: var(--brand-500); transition: all .3s cubic-bezier(.4,0,.2,1);
        transform: translateX(-50%);
    }
    .nav-link:hover { color: var(--brand-500); }
    .nav-link:hover::after { width: 60%; }

    .btn-nav-petition {
        background: var(--brand-500); color: white; padding: 11px 24px;
        border-radius: 50px; font-size: .8rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1px;
        box-shadow: 0 4px 18px rgba(247,16,137,0.35); transition: all .3s ease;
    }
    .btn-nav-petition:hover {
        background: var(--brand-600); color: white; transform: translateY(-2px);
        box-shadow: 0 8px 26px rgba(247,16,137,0.5);
    }

    .mobile-drawer {
        background: #ffffff;
        border-top: 1px solid rgba(247, 16, 137, 0.12);
        padding: 24px 28px; display: flex; flex-direction: column; gap: 8px;
        box-shadow: 0 16px 36px rgba(0,0,0,0.1);
    }
    .mobile-logo-img { height: 38px; width: auto; margin-bottom: 12px; }
    .mobile-link {
        padding: 12px 0; font-size: .94rem; font-weight: 700; color: #1e293b;
        text-transform: uppercase; letter-spacing: 1px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .mobile-link:hover { color: var(--brand-500); }

    /* ═══ HERO ═══ */
    .hero-wrap {
        position: relative; height: 100vh; min-height: 760px;
        overflow: hidden; background: var(--dark-bg);
        margin-top: 78px;
    }
    .hero-video-bg {
        position: absolute; inset: 0; width: 100%; height: 100%;
        object-fit: cover; z-index: 0; filter: brightness(0.88) contrast(1.05) saturate(1.1);
        will-change: transform;
    }
    .hero-overlay {
        position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(180deg,
            rgba(18,10,22,0.45) 0%,
            rgba(18,10,22,0.65) 55%,
            rgba(18,10,22,0.92) 100%),
            radial-gradient(circle at 50% 25%, rgba(247, 16, 137, 0.22) 0%, transparent 65%);
    }
    .hero-grain {
        position: absolute; inset: 0; z-index: 2;
        opacity: 0.035; pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        background-size: 128px;
    }
    .hero-content {
        position: relative; z-index: 3; height: 100%;
        display: flex; align-items: center; justify-content: center; text-align: center;
        padding: 40px 24px 60px;
    }
    .hero-inner { max-width: 1020px; }
    .hero-badge {
        display: inline-flex; align-items: center; gap: 10px;
        background: rgba(247,16,137,0.18); border: 1px solid rgba(255,42,157,0.4);
        backdrop-filter: blur(12px); color: #ff60be;
        font-size: .75rem; font-weight: 800; padding: 8px 24px; border-radius: 50px;
        margin-bottom: 26px; text-transform: uppercase; letter-spacing: 2px;
        opacity: 0; transform: translateY(20px);
    }
    .hero-badge-pulse {
        width: 8px; height: 8px; background: var(--brand-400); border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(255,42,157,0.7); animation: pulseDot 2.5s infinite;
    }
    @keyframes pulseDot {
        0% { box-shadow: 0 0 0 0 rgba(255,42,157,0.7); }
        70% { box-shadow: 0 0 0 14px rgba(255,42,157,0); }
        100% { box-shadow: 0 0 0 0 rgba(255,42,157,0); }
    }

    /* Split-text word reveal */
    .reveal-text { overflow: hidden; }
    .word-wrap { display: inline-block; overflow: hidden; vertical-align: bottom; }
    .word-inner {
        display: inline-block; transform: translateY(115%);
        will-change: transform;
    }

    .hero-title {
        font-family: var(--font-headline);
        font-size: clamp(3.2rem, 7.5vw, 6.5rem);
        color: white; line-height: 0.96; margin-bottom: 24px;
        letter-spacing: -0.5px; text-transform: uppercase;
        text-shadow: 0 4px 24px rgba(0,0,0,0.8);
    }
    .hero-title .highlight {
        color: var(--brand-400);
        text-shadow: 0 0 35px rgba(247,16,137,0.6), 0 4px 24px rgba(0,0,0,0.8);
    }
    .hero-sub {
        font-size: clamp(1rem, 1.8vw, 1.2rem);
        color: rgba(255,255,255,0.92); max-width: 760px; margin: 0 auto 34px;
        line-height: 1.75; font-weight: 400;
        opacity: 0; transform: translateY(30px);
        text-shadow: 0 2px 14px rgba(0,0,0,0.8);
    }

    /* Unified Headline + CTA Layout Resolution */
    .hero-cta-lockup {
        display: flex; flex-direction: column; align-items: center; gap: 20px;
        margin-bottom: 34px; opacity: 0; transform: translateY(30px);
    }
    .hero-cta-tagline {
        display: inline-flex; align-items: center; gap: 12px;
        font-family: var(--font-headline); font-size: clamp(1.05rem, 2.2vw, 1.45rem);
        text-transform: uppercase; letter-spacing: 1.5px;
        color: #ffffff;
        background: rgba(247, 16, 137, 0.22);
        border: 1px solid rgba(255, 42, 157, 0.4);
        padding: 10px 28px; border-radius: 50px;
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 24px rgba(247, 16, 137, 0.25);
    }
    .cta-dot {
        width: 8px; height: 8px; border-radius: 50%;
        background: #ff2a9d; box-shadow: 0 0 10px #ff2a9d;
        display: inline-block;
    }

    .hero-btns {
        display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;
    }
    .magnetic-wrap { position: relative; display: inline-block; }
    .btn-hero-primary {
        background: var(--brand-500); color: white; padding: 18px 42px;
        border-radius: 50px; font-weight: 800; font-size: .88rem;
        text-transform: uppercase; letter-spacing: 1.5px; border: none;
        box-shadow: 0 8px 32px rgba(247,16,137,0.45);
        transition: background .3s, box-shadow .3s, transform .2s;
        display: inline-flex; align-items: center; gap: 10px;
        position: relative; overflow: hidden;
    }
    .btn-hero-primary:hover {
        background: var(--brand-600); color: white;
        box-shadow: 0 16px 48px rgba(247,16,137,0.6);
        transform: translateY(-2px);
    }
    .btn-hero-secondary {
        border: 1.5px solid rgba(255,255,255,0.35); color: white;
        padding: 18px 38px; border-radius: 50px;
        font-weight: 800; font-size: .88rem; text-transform: uppercase;
        letter-spacing: 1.5px; backdrop-filter: blur(8px);
        transition: all .3s ease; display: inline-flex; align-items: center; gap: 10px;
    }
    .btn-hero-secondary:hover {
        background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.7);
    }

    .hero-evidence {
        display: inline-flex; align-items: center; gap: 12px;
        background: rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.12);
        padding: 8px 22px; border-radius: 30px; color: rgba(255,255,255,0.85);
        font-size: .8rem; opacity: 0; transform: translateY(20px);
    }
    .hero-scroll-hint {
        position: absolute; bottom: 36px; left: 50%; transform: translateX(-50%);
        z-index: 5; display: flex; flex-direction: column; align-items: center; gap: 8px;
        opacity: 0;
    }
    .scroll-line {
        width: 2px; height: 48px; background: linear-gradient(to bottom, var(--brand-400), transparent);
        animation: scrollPulse 2s ease-in-out infinite;
    }
    @keyframes scrollPulse {
        0%, 100% { opacity: .4; transform: scaleY(1); }
        50% { opacity: 1; transform: scaleY(1.15); }
    }
    .scroll-text {
        font-size: .62rem; letter-spacing: 3px; text-transform: uppercase;
        color: rgba(255,255,255,0.5); writing-mode: vertical-rl;
    }

    /* ═══ MARQUEE TICKER ═══ */
    .marquee-wrap {
        overflow: hidden; padding: 18px 0;
        background: linear-gradient(90deg, #db0c77 0%, #f71089 50%, #db0c77 100%);
        border-top: 1px solid rgba(255,255,255,0.2);
        border-bottom: 1px solid rgba(255,255,255,0.2);
        box-shadow: 0 4px 20px rgba(247,16,137,0.2);
    }
    .marquee-track {
        display: flex; gap: 0; width: max-content;
        animation: marqueeScroll 35s linear infinite;
    }
    .marquee-item {
        flex-shrink: 0; padding: 0 36px;
        font-family: var(--font-headline); font-size: 1.1rem;
        letter-spacing: 3px; text-transform: uppercase; color: white;
        white-space: nowrap; display: flex; align-items: center; gap: 36px;
    }
    .marquee-dot {
        width: 7px; height: 7px; background: rgba(255,255,255,0.7);
        border-radius: 50%; flex-shrink: 0;
        box-shadow: 0 0 6px rgba(255,255,255,0.8);
    }
    @keyframes marqueeScroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    /* ═══ SECTION COMMONS ═══ */
    .section-container { max-width: 1380px; margin: 0 auto; padding: 0 36px; }
    .section-padding { padding: 120px 0; }
    .section-label {
        font-size: .75rem; font-weight: 900; text-transform: uppercase;
        letter-spacing: 4px; color: var(--brand-600); margin-bottom: 14px;
        display: flex; align-items: center; gap: 14px;
    }
    .section-line {
        width: 0; height: 2px; background: var(--brand-500);
        display: inline-block;
    }
    .section-title {
        font-family: var(--font-headline);
        font-size: clamp(2.4rem, 4.5vw, 4rem);
        color: var(--charcoal); line-height: 1.05;
        letter-spacing: -0.3px; text-transform: uppercase; margin-bottom: 18px;
    }
    .section-subtitle {
        color: var(--text-muted); max-width: 680px;
        font-size: 1.05rem; line-height: 1.75; font-weight: 400;
    }
    .divider-line {
        width: 0; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(247,16,137,0.25), transparent);
        margin: 0 auto;
    }

    /* ═══ ABOUT / NARRATIVE ═══ */
    .narrative-wrap {
        background: linear-gradient(135deg, #ffffff 0%, #fff2f8 100%);
        color: var(--charcoal); border-radius: var(--radius-lg); padding: 72px 56px;
        position: relative; overflow: hidden;
        border: 1.5px solid rgba(247, 16, 137, 0.16);
        box-shadow: 0 20px 60px rgba(247, 16, 137, 0.08);
    }
    .narrative-wrap::before {
        content: ''; position: absolute; top: -50%; right: -15%;
        width: 500px; height: 500px; border-radius: 50%;
        background: radial-gradient(circle, rgba(247,16,137,0.08), transparent 70%);
        pointer-events: none;
    }
    .narrative-quote {
        font-family: var(--font-headline);
        font-size: clamp(2rem, 3.8vw, 3rem);
        line-height: 1.12; text-transform: uppercase;
        color: var(--brand-500); margin-bottom: 24px;
    }
    .narrative-img-wrap {
        border-radius: var(--radius-md); overflow: hidden;
        box-shadow: 0 20px 50px rgba(247,16,137,0.12), 0 4px 12px rgba(0,0,0,0.05);
        border: 1.5px solid rgba(247,16,137,0.2);
    }
    .narrative-img-wrap img {
        width: 100%; height: auto; object-fit: cover;
        will-change: transform;
    }

    /* ═══ STATS ═══ */
    .stats-section {
        background: linear-gradient(180deg, #ffffff 0%, #fdf2f8 50%, #fcfbfe 100%);
        padding: 120px 0; position: relative; overflow: hidden;
    }
    .stats-section::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(247,16,137,0.25), transparent);
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 26px;
    }
    .stat-card-alive {
        background: #ffffff;
        border: 1.5px solid rgba(247, 16, 137, 0.14);
        border-radius: var(--radius-md); padding: 40px 30px;
        text-align: left; transition: all .45s cubic-bezier(.4,0,.2,1);
        position: relative; overflow: hidden;
        box-shadow: 0 10px 30px rgba(247, 16, 137, 0.05), 0 2px 8px rgba(0,0,0,0.03);
    }
    .stat-card-alive::before {
        content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 0;
        background: var(--brand-500); transition: height .5s cubic-bezier(.4,0,.2,1);
    }
    .stat-card-alive:hover {
        border-color: rgba(247, 16, 137, 0.4); transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(247, 16, 137, 0.15);
    }
    .stat-card-alive:hover::before { height: 100%; }
    .stat-big-number {
        font-family: var(--font-headline);
        font-size: clamp(3rem, 5.5vw, 4.4rem);
        color: var(--brand-500); line-height: 1;
        margin-bottom: 14px;
    }
    .stat-heading {
        font-size: .9rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.2px;
        color: var(--charcoal); margin-bottom: 12px;
    }
    .stat-desc {
        font-size: .88rem; color: var(--text-body);
        line-height: 1.7;
    }

    /* ═══ 4 PILLARS ═══ */
    .pillar-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 28px;
    }
    .pillar-card {
        background: #ffffff; border: 1.5px solid rgba(247, 16, 137, 0.12);
        border-radius: var(--radius-md); padding: 44px 34px;
        box-shadow: var(--shadow-sm);
        transition: all .4s cubic-bezier(.4,0,.2,1);
        display: flex; flex-direction: column; justify-content: space-between;
        position: relative; overflow: hidden;
    }
    .pillar-card::after {
        content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, #ff2a9d, #f71089);
        transform: scaleX(0); transform-origin: left;
        transition: transform .5s cubic-bezier(.4,0,.2,1);
    }
    .pillar-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 60px rgba(247, 16, 137, 0.14);
        border-color: rgba(247, 16, 137, 0.35);
    }
    .pillar-card:hover::after { transform: scaleX(1); }
    .pillar-num {
        font-family: var(--font-headline); font-size: 3.2rem;
        color: var(--brand-500); opacity: .18;
        line-height: 1; margin-bottom: 16px;
    }
    .pillar-title {
        font-family: var(--font-headline); font-size: 1.5rem;
        text-transform: uppercase; letter-spacing: 0.3px;
        margin-bottom: 14px; line-height: 1.2; color: var(--charcoal);
    }
    .pillar-text {
        font-size: .94rem; color: var(--text-body);
        line-height: 1.8; margin-bottom: 28px;
    }
    .pillar-link {
        font-size: .8rem; font-weight: 800; text-transform: uppercase;
        letter-spacing: 1.2px; color: var(--brand-600);
        display: inline-flex; align-items: center; gap: 8px; margin-top: auto;
        transition: gap .3s, color .2s;
    }
    .pillar-link:hover { gap: 14px; color: var(--brand-500); }

    /* ═══ GALLERY WITH 3D TILT ═══ */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
        gap: 28px;
    }
    .gallery-card {
        background: #fff; border-radius: var(--radius-md); overflow: hidden;
        border: 1.5px solid rgba(247, 16, 137, 0.12);
        box-shadow: 0 10px 30px rgba(247, 16, 137, 0.05), 0 2px 8px rgba(0,0,0,0.03);
        cursor: pointer; position: relative;
        transition: box-shadow .4s, border-color .4s;
        transform-style: preserve-3d; perspective: 800px;
    }
    .gallery-card:hover {
        box-shadow: 0 24px 60px rgba(247, 16, 137, 0.16);
        border-color: rgba(247, 16, 137, 0.4);
    }
    .gallery-card-inner {
        transition: transform .1s ease-out;
        transform-style: preserve-3d;
    }
    .gallery-card-thumb {
        position: relative; aspect-ratio: 1;
        overflow: hidden; background: #120a16;
    }
    .gallery-card-thumb img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .7s cubic-bezier(.4,0,.2,1);
    }
    .gallery-card:hover .gallery-card-thumb img {
        transform: scale(1.06);
    }
    .gallery-card-glare {
        position: absolute; inset: 0;
        background: radial-gradient(circle at var(--glare-x, 50%) var(--glare-y, 50%),
            rgba(255,255,255,0.2) 0%, transparent 60%);
        pointer-events: none; opacity: 0; transition: opacity .3s;
    }
    .gallery-card:hover .gallery-card-glare { opacity: 1; }
    .gallery-card-badge {
        position: absolute; top: 16px; left: 16px; z-index: 2;
        background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px);
        color: var(--brand-600); font-size: .7rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 1.2px;
        padding: 5px 14px; border-radius: 30px;
        border: 1px solid rgba(247, 16, 137, 0.25);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .gallery-card-overlay {
        position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(to top, rgba(18,10,22,0.92) 0%, rgba(18,10,22,0.3) 50%, transparent 100%);
        opacity: 0; transition: opacity .4s ease;
        display: flex; flex-direction: column; justify-content: flex-end; padding: 26px; color: white;
    }
    .gallery-card:hover .gallery-card-overlay { opacity: 1; }
    .gallery-card-meta {
        padding: 22px; background: white;
        border-top: 1px solid rgba(247, 16, 137, 0.08);
    }
    .gallery-card-headline {
        font-family: var(--font-headline); font-size: 1.15rem;
        color: var(--charcoal); text-transform: uppercase;
        line-height: 1.2; margin-bottom: 8px;
    }
    .gallery-card-sub {
        font-size: .86rem; color: var(--text-muted); line-height: 1.55;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .btn-view-card {
        margin-top: 14px; display: inline-flex; align-items: center; gap: 6px;
        font-size: .75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
        color: var(--brand-600); background: var(--brand-50);
        padding: 6px 16px; border-radius: 20px; transition: all .2s;
    }
    .btn-view-card:hover {
        background: var(--brand-500); color: white;
    }

    /* ═══ LIGHTBOX ═══ */
    .lightbox {
        position: fixed; inset: 0; z-index: 9000;
        display: flex; align-items: center; justify-content: center; padding: 20px;
    }
    .lightbox-bg {
        position: absolute; inset: 0; background: rgba(12, 6, 15, 0.94);
        backdrop-filter: blur(20px);
    }
    .lightbox-card {
        position: relative; z-index: 2; background: var(--dark-surface);
        border-radius: var(--radius-lg); overflow: hidden;
        max-width: 980px; width: 100%;
        border: 1px solid rgba(247, 16, 137, 0.25);
        box-shadow: 0 50px 140px rgba(0,0,0,0.85);
        display: grid; grid-template-columns: 1.1fr 1fr;
    }
    .lightbox-media {
        background: #000; display: flex; align-items: center; justify-content: center;
        min-height: 400px;
    }
    .lightbox-img { width: 100%; height: 100%; object-fit: contain; max-height: 75vh; }
    .lightbox-info {
        padding: 44px 38px; display: flex; flex-direction: column;
        justify-content: space-between; color: white;
        overflow-y: auto; max-height: 75vh;
    }
    .lightbox-tag {
        display: inline-block; background: rgba(247, 16, 137, 0.16);
        color: #ff60be; font-size: .74rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: 2px;
        padding: 5px 14px; border-radius: 30px; margin-bottom: 18px;
        border: 1px solid rgba(247, 16, 137, 0.3);
    }
    .lightbox-title {
        font-family: var(--font-headline); font-size: 1.8rem; line-height: 1.1;
        text-transform: uppercase; margin-bottom: 16px;
    }
    .lightbox-body-text {
        font-size: .95rem; color: rgba(255,255,255,0.8);
        line-height: 1.75; margin-bottom: 28px;
    }
    .lightbox-cta-box {
        background: rgba(247, 16, 137, 0.08);
        border: 1px solid rgba(247, 16, 137, 0.25);
        padding: 18px 22px; border-radius: var(--radius-sm); margin-bottom: 28px;
    }
    .lightbox-cta-text {
        font-family: var(--font-headline); font-size: 1.1rem;
        color: #ff60be; letter-spacing: 1px; text-transform: uppercase;
    }
    .lightbox-share-title {
        font-size: .74rem; font-weight: 800; text-transform: uppercase;
        letter-spacing: 2px; color: rgba(255,255,255,0.6); margin-bottom: 14px;
    }
    .lightbox-actions { display: flex; flex-wrap: wrap; gap: 10px; }
    .lb-btn {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 12px 22px; border-radius: 50px; font-size: .78rem;
        font-weight: 800; text-transform: uppercase; letter-spacing: 1px;
        border: none; cursor: pointer; color: white; transition: all .25s;
    }
    .lb-btn:hover { transform: translateY(-2px); }
    .lb-btn-wa { background: #25d366; }
    .lb-btn-x { background: #000; border: 1px solid rgba(255,255,255,0.2); }
    .lb-btn-fb { background: #1877f2; }
    .lb-btn-dl { background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); }
    .lightbox-close {
        position: absolute; top: 18px; right: 18px; z-index: 10;
        background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15);
        color: white; width: 40px; height: 40px; border-radius: 50%;
        font-size: 1rem; cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        transition: all .2s;
    }
    .lightbox-close:hover { background: rgba(255,255,255,0.25); }

    /* ═══ ACTION CENTER / PETITION ═══ */
    .petition-section {
        background: linear-gradient(180deg, #fcfbfe 0%, #fff0f7 50%, #fcfbfe 100%);
        color: var(--charcoal); padding: 120px 0; position: relative; overflow: hidden;
    }
    .petition-section::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(247,16,137,0.25), transparent);
    }
    .petition-card {
        background: #ffffff;
        border: 1.5px solid rgba(247, 16, 137, 0.2);
        border-radius: var(--radius-lg); padding: 52px 44px;
        max-width: 740px; margin: 0 auto;
        box-shadow: 0 24px 64px rgba(247, 16, 137, 0.1);
        position: relative;
    }
    .petition-card::before {
        content: ''; position: absolute; top: -1px; left: 20%; right: 20%;
        height: 3px; background: linear-gradient(90deg, transparent, var(--brand-500), transparent);
        border-radius: 2px;
    }
    .form-input-clean {
        width: 100%; padding: 16px 20px;
        background: #fafafc;
        border: 1.5px solid rgba(0,0,0,0.1);
        border-radius: 14px; font-family: var(--font-body);
        font-size: .95rem; color: var(--charcoal); outline: none;
        transition: border-color .3s, box-shadow .3s, background .3s;
    }
    .form-input-clean:focus {
        border-color: var(--brand-500);
        box-shadow: 0 0 0 3px rgba(247,16,137,0.15);
        background: #ffffff;
    }
    .form-select-clean {
        width: 100%; padding: 16px 20px;
        background: #fafafc;
        border: 1.5px solid rgba(0,0,0,0.1);
        border-radius: 14px; font-family: var(--font-body);
        font-size: .95rem; color: var(--charcoal); outline: none;
        transition: border-color .3s, box-shadow .3s;
    }
    .form-select-clean:focus {
        border-color: var(--brand-500);
        box-shadow: 0 0 0 3px rgba(247,16,137,0.15);
    }
    .btn-petition-submit {
        width: 100%; padding: 20px;
        background: linear-gradient(135deg, #ff2a9d 0%, #f71089 100%);
        color: white; border: none; border-radius: 16px;
        font-family: var(--font-headline); font-size: 1.2rem;
        text-transform: uppercase; letter-spacing: 2px;
        cursor: pointer; transition: all .3s ease;
        box-shadow: 0 8px 32px rgba(247,16,137,0.35);
        position: relative; overflow: hidden;
    }
    .btn-petition-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 48px rgba(247,16,137,0.5);
    }

    /* ═══ FOOTER ═══ */
    footer.site-footer {
        position: relative; padding: 110px 0 52px;
        background: #100814; color: white; overflow: hidden;
        border-top: 1px solid rgba(247, 16, 137, 0.15);
    }
    .footer-orb { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; }
    .footer-orb-1 { width: 500px; height: 500px; background: radial-gradient(circle, rgba(247,16,137,0.12), transparent 70%); top: -150px; left: -100px; }
    .footer-orb-2 { width: 450px; height: 450px; background: radial-gradient(circle, rgba(255,42,157,0.1), transparent 70%); bottom: -150px; right: -80px; }

    .footer-grid {
        display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 48px;
    }
    .footer-logo-brand { display: block; margin-bottom: 22px; }
    .footer-logo-img {
        height: 76px; width: auto; display: block;
        filter: drop-shadow(0 4px 16px rgba(0,0,0,0.3));
    }
    .footer-mission-text {
        color: rgba(255,255,255,0.7); font-size: .95rem; line-height: 1.75;
        max-width: 400px; margin-bottom: 16px;
    }
    .footer-cta-tagline {
        font-family: var(--font-headline); font-size: 1.05rem;
        color: #ff60be; letter-spacing: 1px; text-transform: uppercase;
        margin-bottom: 24px;
    }
    .footer-col-title {
        font-size: .74rem; font-weight: 900; text-transform: uppercase;
        letter-spacing: 3px; color: #ff60be; margin-bottom: 20px;
    }
    .footer-link {
        display: block; color: rgba(255,255,255,0.65); font-size: .9rem;
        padding: 5px 0; transition: color .2s, transform .2s;
    }
    .footer-link:hover { color: white; transform: translateX(3px); }
    .footer-bottom {
        margin-top: 72px; padding-top: 24px; border-top: 1px solid rgba(255,255,255,0.08);
        display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;
        gap: 12px; font-size: .84rem; color: rgba(255,255,255,0.45);
    }

    /* ═══ RESPONSIVE ═══ */
    @media (max-width: 900px) {
        .lightbox-card { grid-template-columns: 1fr; max-height: 90vh; }
        .lightbox-info { padding: 24px; }
        .lightbox-media { min-height: 240px; max-height: 40vh; }
        .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
        .nav-links { display: none; }
        .md-toggle { display: block !important; }
        .hero-title { font-size: 2.8rem; letter-spacing: 0; }
        .hero-cta-tagline { font-size: .95rem; padding: 8px 18px; }
        .petition-card { padding: 32px 20px; }
        .narrative-wrap { padding: 40px 24px; }
        .footer-grid { grid-template-columns: 1fr; }
        #webgl-canvas { opacity: 0.2; }
    }
    </style>
</head>

<body>

<!-- Three.js WebGL Background Canvas -->
<canvas id="webgl-canvas"></canvas>

<!-- ═══ PRELOADER ═══ -->
<div id="preloader">
    <div class="preloader-text" id="preloader-text">
        <span class="preloader-char">U</span>
        <span class="preloader-char">N</span>
        <span class="preloader-char">F</span>
        <span class="preloader-char">I</span>
        <span class="preloader-char">N</span>
        <span class="preloader-char">I</span>
        <span class="preloader-char">S</span>
        <span class="preloader-char">H</span>
        <span class="preloader-char">E</span>
        <span class="preloader-char">D</span>
    </div>
    <div class="preloader-bar-track">
        <div class="preloader-bar-fill" id="preloader-bar"></div>
    </div>
    <div class="preloader-sub" id="preloader-sub">Unfinished Dreams • Unfinished Futures</div>
</div>

<!-- ═══ HEADER / NAVIGATION ═══ -->
<header class="site-header" x-data="{ mobileOpen: false }">
    <div class="header-inner">
        <a href="/" class="logo-brand">
            <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED — Dreams • Futures • Care" class="nav-logo-img">
        </a>

        <nav class="nav-links">
            <a href="#about" class="nav-link">About</a>
            <a href="#pillars" class="nav-link">The 4 Pillars</a>
            <a href="#stats" class="nav-link">Research Data</a>
            <a href="#gallery" class="nav-link">Campaign Cards</a>
            <a href="#petition" class="nav-link">Petition</a>
            <a href="/stories" class="nav-link">Stories</a>
            <a href="/admin" class="nav-link" style="color:var(--brand-500);">Admin</a>
            <a href="#petition" class="btn-nav-petition magnetic-wrap" style="margin-left:8px;">Sign Petition</a>
        </nav>

        <button @click="mobileOpen = !mobileOpen" style="display:none;background:none;border:none;cursor:pointer;padding:8px;color:#1e293b;" class="md-toggle" aria-label="Menu">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
        </button>
    </div>
    <div x-show="mobileOpen" x-transition class="mobile-drawer">
        <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED" class="mobile-logo-img">
        <a href="#about" @click="mobileOpen=false" class="mobile-link">About</a>
        <a href="#pillars" @click="mobileOpen=false" class="mobile-link">The 4 Pillars</a>
        <a href="#stats" @click="mobileOpen=false" class="mobile-link">Research Data</a>
        <a href="#gallery" @click="mobileOpen=false" class="mobile-link">Campaign Cards</a>
        <a href="#petition" @click="mobileOpen=false" class="mobile-link">Sign Petition</a>
        <a href="/stories" @click="mobileOpen=false" class="mobile-link">Stories</a>
        <a href="/admin" @click="mobileOpen=false" class="mobile-link" style="color:var(--brand-500);">Admin Portal</a>
    </div>
</header>

<!-- ═══ HERO ═══ -->
<section id="home" class="hero-wrap">
    <video autoplay muted loop playsinline class="hero-video-bg" id="hero-video"
           poster="{{ asset('themes/nigeria/site_images/ChatGPT Image Sep 1, 2026, 11_09_56 AM (4).png') }}">
        <source src="{{ asset('themes/nigeria/videos/hero-bg.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-grain"></div>

    <div class="hero-content">
        <div class="hero-inner">
            <div class="hero-badge" id="hero-badge">
                <span class="hero-badge-pulse"></span>
                <span>UNFINISHED • PREVENTING MATERNAL MORTALITY</span>
            </div>

            <h1 class="hero-title reveal-text" id="hero-title">
                Unfinished Dreams.<br>
                <span class="highlight">Unfinished Futures.</span>
            </h1>

            <p class="hero-sub" id="hero-sub">
                Across Nigeria, every woman lost to preventable pregnancy complications leaves behind a name, a family, and a life still being written. Outdated legal frameworks must not stand between Nigerian women and timely healthcare.
            </p>

            <div class="hero-cta-lockup" id="hero-cta-lockup">
                <div class="hero-cta-tagline">
                    <span class="cta-dot"></span>
                    <span>Reform the law. Protect our future. Sign the petition.</span>
                </div>

                <div class="hero-btns" id="hero-btns">
                    <div class="magnetic-wrap">
                        <a href="#petition" class="btn-hero-primary" data-cursor="SIGN">
                            <span>Sign The Petition</span>
                            <span>✍️</span>
                        </a>
                    </div>
                    <div class="magnetic-wrap">
                        <a href="#gallery" class="btn-hero-secondary" data-cursor="EXPLORE">
                            <span>Campaign Visuals</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hero-evidence" id="hero-evidence">
                <span style="color:var(--brand-400);font-weight:800;">✓ EVIDENCE-BASED</span>
                <span style="opacity:0.4;">•</span>
                <span>Protecting Women, Healthcare Workers & Families Across Nigeria</span>
            </div>
        </div>
    </div>

    <div class="hero-scroll-hint" id="hero-scroll-hint">
        <div class="scroll-line"></div>
        <span class="scroll-text">Scroll</span>
    </div>
</section>

<!-- ═══ MARQUEE TICKER ═══ -->
<div class="marquee-wrap">
    <div class="marquee-track">
        <div class="marquee-item">Unfinished Dreams<span class="marquee-dot"></span>Unfinished Futures<span class="marquee-dot"></span>Reform the law<span class="marquee-dot"></span>Protect our future<span class="marquee-dot"></span>Sign the petition<span class="marquee-dot"></span>610,000 women seeking care<span class="marquee-dot"></span>Unfinished Dreams<span class="marquee-dot"></span>Unfinished Futures<span class="marquee-dot"></span>Reform the law<span class="marquee-dot"></span>Protect our future<span class="marquee-dot"></span>Sign the petition<span class="marquee-dot"></span></div>
        <div class="marquee-item">Unfinished Dreams<span class="marquee-dot"></span>Unfinished Futures<span class="marquee-dot"></span>Reform the law<span class="marquee-dot"></span>Protect our future<span class="marquee-dot"></span>Sign the petition<span class="marquee-dot"></span>610,000 women seeking care<span class="marquee-dot"></span>Unfinished Dreams<span class="marquee-dot"></span>Unfinished Futures<span class="marquee-dot"></span>Reform the law<span class="marquee-dot"></span>Protect our future<span class="marquee-dot"></span>Sign the petition<span class="marquee-dot"></span></div>
    </div>
</div>

<!-- ═══ ABOUT / NARRATIVE ═══ -->
<section id="about" class="section-padding" style="background:var(--canvas-bg);">
    <div class="section-container">
        <div class="narrative-wrap">
            <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:56px;align-items:center;">
                <div>
                    <div class="section-label">
                        <span class="section-line"></span>The Campaign Mission
                    </div>
                    <h2 class="narrative-quote reveal-text">
                        A Law Should Never Arrive Too Late.
                    </h2>
                    <p style="font-size:1.05rem;color:#334155;line-height:1.8;margin-bottom:22px;" class="fade-up">
                        When a woman faces a severe pregnancy complication, minutes matter. Today in Nigeria, healthcare providers are trained and ready to save her, but narrow, colonial-era laws leave doctors uncertain and without clear legal grounds to intervene.
                    </p>
                    <p style="font-size:1rem;color:#475569;line-height:1.8;margin-bottom:32px;" class="fade-up">
                        <strong style="color:#0f172a;">Completing the legal framework does not abandon Nigeria's commitment to protecting life.</strong> It strengthens the country's ability to prevent deaths by keeping women inside safe, regulated healthcare systems.
                    </p>
                    <div class="magnetic-wrap fade-up">
                        <a href="#pillars" class="btn-hero-primary" style="padding:14px 34px;font-size:.84rem;" data-cursor="LEARN">
                            Learn How Reform Protects Women →
                        </a>
                    </div>
                </div>

                <div class="narrative-img-wrap parallax-img">
                    <img src="{{ asset('themes/nigeria/social_gallery/unfinished-preventing-maternal-mortality-1.jpg') }}" alt="She Had A Life">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ DIVIDER ═══ -->
<div style="padding:0 36px;"><div class="divider-line" style="max-width:1380px;margin:0 auto;"></div></div>

<!-- ═══ STATS ═══ -->
<section id="stats" class="stats-section">
    <div class="section-container">
        <div style="text-align:center;margin-bottom:72px;">
            <div class="section-label" style="justify-content:center;">
                <span class="section-line"></span>Verified Healthcare Data<span class="section-line"></span>
            </div>
            <h2 class="section-title reveal-text" style="text-align:center;">The Cost of Unfinished Law</h2>
            <p class="section-subtitle fade-up" style="margin:0 auto;">
                Evidence from the Guttmacher Institute & maternal healthcare research in Nigeria demonstrates the urgent need for clear legal pathways.
            </p>
        </div>

        <div class="stats-grid">
            <div class="stat-card-alive card-reveal">
                <div class="stat-big-number" data-count="610000" data-suffix="" data-prefix="">0</div>
                <h4 class="stat-heading">Women Seeking Care Yearly</h4>
                <p class="stat-desc">Estimated Nigerian women who seek abortion care each year. Without legal clarity, care is forced underground.</p>
            </div>
            <div class="stat-card-alive card-reveal">
                <div class="stat-big-number" data-count="1" data-suffix=" in 8" data-prefix="">0</div>
                <h4 class="stat-heading">Maternal Deaths in Nigeria</h4>
                <p class="stat-desc">Maternal deaths caused by unsafe abortion complications — lives that skilled healthcare providers could save.</p>
            </div>
            <div class="stat-card-alive card-reveal">
                <div class="stat-big-number" data-count="285000" data-suffix="" data-prefix="">0</div>
                <h4 class="stat-heading">Untreated Complications</h4>
                <p class="stat-desc">Women each year suffering severe, life-altering complications without receiving prompt medical treatment.</p>
            </div>
            <div class="stat-card-alive card-reveal">
                <div class="stat-big-number" data-count="3000" data-suffix="+" data-prefix="">0</div>
                <h4 class="stat-heading">Preventable Deaths Annually</h4>
                <p class="stat-desc">Annual preventable deaths of Nigerian mothers, daughters, and sisters — losses that timely healthcare would prevent.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══ 4 PILLARS ═══ -->
<section id="pillars" class="section-padding" style="background:#ffffff;">
    <div class="section-container">
        <div style="text-align:center;margin-bottom:72px;">
            <div class="section-label" style="justify-content:center;">
                <span class="section-line"></span>Core Platform<span class="section-line"></span>
            </div>
            <h2 class="section-title reveal-text" style="text-align:center;">The 4 Pillars for Reform</h2>
            <p class="section-subtitle fade-up" style="margin:0 auto;">
                A respectful, evidence-based roadmap for Nigerian policymakers, healthcare workers, and citizens.
            </p>
        </div>

        <div class="pillar-grid">
            <div class="pillar-card card-reveal">
                <div>
                    <div class="pillar-num">01</div>
                    <h3 class="pillar-title">A Law Should Never Arrive Too Late</h3>
                    <p class="pillar-text">Nigeria has made strides reducing deaths from haemorrhage and hypertension. Unsafe abortion remains a major unaddressed cause. Delayed care turns treatable conditions into preventable maternal deaths.</p>
                </div>
                <a href="#petition" class="pillar-link" data-cursor="SIGN">Sign For Timely Care →</a>
            </div>
            <div class="pillar-card card-reveal">
                <div>
                    <div class="pillar-num">02</div>
                    <h3 class="pillar-title">Trained to Save Her. Let Providers Act.</h3>
                    <p class="pillar-text">Nigerian doctors, nurses, and midwives are trained, willing, and bound by medical oath. Narrow, ambiguous laws leave providers without grounds to act in critical circumstances.</p>
                </div>
                <a href="#petition" class="pillar-link" data-cursor="SIGN">Support Healthcare Workers →</a>
            </div>
            <div class="pillar-card card-reveal">
                <div>
                    <div class="pillar-num">03</div>
                    <h3 class="pillar-title">She Is More Than A Statistic</h3>
                    <p class="pillar-text">Behind every maternal death number is a woman with a life, a family, a livelihood, and a future. When a mother survives, her family's future and her children's prospects survive with her.</p>
                </div>
                <a href="#petition" class="pillar-link" data-cursor="SIGN">Protect Women's Futures →</a>
            </div>
            <div class="pillar-card card-reveal">
                <div>
                    <div class="pillar-num">04</div>
                    <h3 class="pillar-title">The Courts Have Moved. Finish The Law.</h3>
                    <p class="pillar-text">The Criminal and Penal Codes must be amended to permit healthcare providers to provide care in additional circumstances. Regulated healthcare keeps women safe inside hospitals.</p>
                </div>
                <a href="#petition" class="pillar-link" data-cursor="SIGN">Demand Legal Reform →</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ DIVIDER ═══ -->
<div style="padding:0 36px;"><div class="divider-line" style="max-width:1380px;margin:0 auto;"></div></div>

@php
    $campaignCards = [
        [
            'id' => 1,
            'tag' => 'Maternal Health & Lives',
            'title' => 'SHE HAD A LIFE...',
            'quote' => 'She had dreams, a family and a future lost to preventable pregnancy complications.',
            'image' => 'unfinished-preventing-maternal-mortality-1.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - She had a life.jpg'
        ],
        [
            'id' => 2,
            'tag' => 'Daughters, Sisters & Mothers',
            'title' => 'DAUGHTERS, SISTERS, MOTHERS AND FRIENDS',
            'quote' => 'Each one had a name — but their dreams, plans and futures left unfinished.',
            'image' => 'unfinished-preventing-maternal-mortality-2.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Daughters sisters mothers.jpg'
        ],
        [
            'id' => 3,
            'tag' => 'Counted In Data',
            'title' => 'COUNTED IN DATA. MISSED IN LIFE.',
            'quote' => 'They were daughters, sisters, mothers, friends — futures left unfinished.',
            'image' => 'unfinished-preventing-maternal-mortality-3.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Counted in data.jpg'
        ],
        [
            'id' => 4,
            'tag' => 'Healthcare Workers',
            'title' => 'TRAINED TO SAVE HER. WAITING FOR PERMISSION FROM THE LAW.',
            'quote' => 'Delayed care can turn treatable maternal complications fatal.',
            'image' => 'unfinished-preventing-maternal-mortality-4.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Trained to save her.jpg'
        ],
        [
            'id' => 5,
            'tag' => 'Regulated Healthcare',
            'title' => 'A LAW SHOULD NOT ARRIVE TOO LATE.',
            'quote' => 'Addressing unsafe abortion means keeping women inside safe, regulated healthcare systems.',
            'image' => 'unfinished-preventing-maternal-mortality-5.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - A law should not arrive too late.jpg'
        ],
        [
            'id' => 6,
            'tag' => 'Scales of Justice',
            'title' => 'REFORM THE LAW.',
            'quote' => 'Balance the scales of justice. The criminal and penal code should be expanded to allow additional grounds in line with lived realities.',
            'image' => 'unfinished-preventing-maternal-mortality-6.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Balance the scales of justice.jpg'
        ],
        [
            'id' => 7,
            'tag' => 'Judicial & Statutory Reform',
            'title' => 'THE COURTS HAVE MOVED. THE LAW HAS NOT.',
            'quote' => 'Completing the legal framework does not abandon Nigeria’s commitment to protecting life. It strengthens the country’s ability to prevent maternal deaths.',
            'image' => 'unfinished-preventing-maternal-mortality-7.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - The courts have moved.jpg'
        ],
        [
            'id' => 8,
            'tag' => 'Timely Care',
            'title' => 'A LAW SHOULD NEVER ARRIVE TOO LATE.',
            'quote' => 'Delayed care can turn a treatable complication into a preventable maternal death.',
            'image' => 'unfinished-preventing-maternal-mortality-8.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - A law should never arrive too late.jpg'
        ],
        [
            'id' => 9,
            'tag' => 'Legal Framework',
            'title' => 'REFORM THE LAW. COMPLETE THE FRAMEWORK.',
            'quote' => 'Completing the legal framework does not abandon Nigeria’s commitment to protecting life. It strengthens the country’s ability to prevent maternal deaths.',
            'image' => 'unfinished-preventing-maternal-mortality-9.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Reform the law.jpg'
        ],
        [
            'id' => 10,
            'tag' => 'Faith & Shared Humanity',
            'title' => 'WE CAN HONOR FAITH AND STILL SAVE LIVES.',
            'quote' => 'She is a woman with a life, a family, a livelihood and a future. Every preventable cause must be addressed.',
            'image' => 'unfinished-preventing-maternal-mortality-10.jpg',
            'downloadName' => 'Unfinished — Preventing Maternal Mortality - Honor faith and save lives.jpg'
        ],
    ];
@endphp

<!-- ═══ CAMPAIGN CARDS GALLERY ═══ -->
<section id="gallery" class="section-padding" style="background:var(--canvas-bg);" x-data="campaignGallery()">
    <div class="section-container">
        <div style="text-align:center;margin-bottom:72px;">
            <div class="section-label" style="justify-content:center;">
                <span class="section-line"></span>Amplifying The Message<span class="section-line"></span>
            </div>
            <h2 class="section-title reveal-text" style="text-align:center;">The 10 Campaign Visuals</h2>
            <p class="section-subtitle fade-up" style="margin:0 auto;">
                Explore, download, and share these 10 official campaign graphics across WhatsApp, X, Facebook, and Instagram to build public support across Nigeria.
            </p>
        </div>

        <div class="gallery-grid">
            @foreach($campaignCards as $index => $card)
            <div class="gallery-card card-reveal" data-tilt @click="openModal({{ $index }})" data-cursor="VIEW">
                <div class="gallery-card-inner">
                    <div class="gallery-card-thumb">
                        <span class="gallery-card-badge">{{ $card['tag'] }}</span>
                        <img src="{{ asset('themes/nigeria/social_gallery/' . $card['image']) }}" alt="{{ $card['title'] }}" loading="lazy">
                        <div class="gallery-card-glare"></div>
                        <div class="gallery-card-overlay">
                            <p style="font-family:var(--font-headline);font-size:1.05rem;text-transform:uppercase;letter-spacing:.5px;">{{ $card['title'] }}</p>
                        </div>
                    </div>
                    <div class="gallery-card-meta">
                        <h4 class="gallery-card-headline">{{ $card['title'] }}</h4>
                        <p class="gallery-card-sub">{{ $card['quote'] }}</p>
                        <span class="btn-view-card">View & Share ↗</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox" x-show="isOpen" x-transition @keydown.escape.window="closeModal()" style="display:none;">
        <div class="lightbox-bg" @click="closeModal()"></div>
        <div class="lightbox-card" @click.stop x-show="currentCard !== null">
            <button class="lightbox-close" @click="closeModal()" aria-label="Close">&#10005;</button>
            <div class="lightbox-media">
                <img :src="currentCard?.image" :alt="currentCard?.title" class="lightbox-img">
            </div>
            <div class="lightbox-info">
                <div>
                    <span class="lightbox-tag" x-text="currentCard?.tag"></span>
                    <h3 class="lightbox-title" x-text="currentCard?.title"></h3>
                    <p class="lightbox-body-text" x-text="currentCard?.quote"></p>
                    <div class="lightbox-cta-box">
                        <div class="lightbox-cta-text">"Reform the law. Protect our future. Sign the petition."</div>
                    </div>
                </div>
                <div>
                    <div class="lightbox-share-title">Share This Message Across Nigeria</div>
                    <div class="lightbox-actions">
                        <button type="button" @click="shareWhatsApp()" class="lb-btn lb-btn-wa">
                            <span>💬 WhatsApp</span>
                        </button>
                        <a :href="getXUrl()" target="_blank" rel="noopener noreferrer" class="lb-btn lb-btn-x">
                            <span>𝕏 Share</span>
                        </a>
                        <a :href="getFacebookUrl()" target="_blank" rel="noopener noreferrer" class="lb-btn lb-btn-fb">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block;vertical-align:-1px;margin-right:6px;"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span>Facebook</span>
                        </a>
                        <a :href="currentCard?.image" :download="currentCard?.downloadName" class="lb-btn lb-btn-dl">
                            <span>⬇ Download</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ ACTION CENTER / PETITION ═══ -->
<section id="petition" class="petition-section">
    <div class="section-container">
        <div style="text-align:center;margin-bottom:48px;">
            <div class="section-label" style="justify-content:center;">
                <span class="section-line"></span>Action Center<span class="section-line"></span>
            </div>
            <h2 class="section-title reveal-text" style="text-align:center;">
                Reform The Law. Protect Our Future.
            </h2>
            <p class="section-subtitle fade-up" style="margin:0 auto;text-align:center;">
                Sign the petition to ensure no woman's life, dreams, or future are left unfinished. Stand with healthcare workers, policymakers, and families demanding legal clarity across Nigeria.
            </p>
        </div>

        <div class="petition-card card-reveal">
            @if(session('success'))
            <div style="background:var(--brand-500);color:white;padding:18px 24px;border-radius:14px;margin-bottom:24px;font-weight:800;text-align:center;">
                &#10004; {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('petition.store') }}" method="POST">
                @csrf
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;">
                    <div>
                        <label style="display:block;font-size:.78rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:var(--charcoal);margin-bottom:8px;">Your Name *</label>
                        <input type="text" name="name" class="form-input-clean" placeholder="e.g. Amina Bello" required value="{{ old('name') }}">
                    </div>
                    <div>
                        <label style="display:block;font-size:.78rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:var(--charcoal);margin-bottom:8px;">Email Address *</label>
                        <input type="email" name="email" class="form-input-clean" placeholder="you@example.com" required value="{{ old('email') }}">
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:18px;margin-bottom:28px;">
                    <div>
                        <label style="display:block;font-size:.78rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:var(--charcoal);margin-bottom:8px;">I Am Signing As</label>
                        <select name="role" class="form-select-clean">
                            <option value="citizen" selected>Citizen / Advocate</option>
                            <option value="healthcare_worker">Healthcare Worker (Doctor / Nurse / Midwife)</option>
                            <option value="policymaker">Policymaker / Legal Professional</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:.78rem;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:var(--charcoal);margin-bottom:8px;">State (Optional)</label>
                        <input type="text" name="state" class="form-input-clean" placeholder="e.g. Lagos, Abuja, Kano" value="{{ old('state') }}">
                    </div>
                </div>
                <div class="magnetic-wrap" style="display:block;">
                    <button type="submit" class="btn-petition-submit">Sign The Petition Now &#8594;</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer class="site-footer">
    <div class="footer-orb footer-orb-1"></div>
    <div class="footer-orb footer-orb-2"></div>
    <div class="section-container" style="position:relative;z-index:2;">
        <div class="footer-grid">
            <div>
                <a href="/" class="footer-logo-brand">
                    <img src="{{ asset('themes/nigeria/img/logos/logo-footer-square.webp') }}" alt="UNFINISHED — Dreams • Futures • Care" class="footer-logo-img">
                </a>
                <p class="footer-mission-text">
                    Amplifying the call to review Nigeria's maternal healthcare laws so fewer lives, dreams, and futures are left unfinished.
                </p>
                <div class="footer-cta-tagline">
                    "Reform the law. Protect our future. Sign the petition."
                </div>
            </div>
            <div>
                <p class="footer-col-title">Navigation</p>
                <a href="#about" class="footer-link">About Campaign</a>
                <a href="#pillars" class="footer-link">The 4 Pillars</a>
                <a href="#stats" class="footer-link">Research Data</a>
                <a href="#gallery" class="footer-link">Campaign Visuals</a>
            </div>
            <div>
                <p class="footer-col-title">Action</p>
                <a href="#petition" class="footer-link">Sign Petition</a>
                <a href="/stories/submit" class="footer-link">Share Story</a>
                <a href="/stories" class="footer-link">Community Stories</a>
                <a href="/admin" class="footer-link">Admin Portal</a>
            </div>
            <div>
                <p class="footer-col-title">Contact</p>
                <a href="https://wa.me/263773699063" target="_blank" class="footer-link">WhatsApp Campaign Desk</a>
                <p style="color:rgba(255,255,255,0.4);font-size:.82rem;margin-top:18px;line-height:1.6;">Abuja & Lagos, Nigeria</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} UNFINISHED &mdash; Preventing Maternal Mortality.</p>
            <p>Reform the law. Protect our future. Sign the petition.</p>
        </div>
    </div>
</footer>

<!-- WhatsApp FAB -->
<a href="https://wa.me/263773699063?text=I%20want%20to%20support%20the%20Unfinished%20Preventing%20Maternal%20Mortality%20Campaign"
   target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp" data-cursor="CHAT"
   style="position:fixed;bottom:28px;right:28px;z-index:9000;width:60px;height:60px;background:#25d366;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 6px 28px rgba(37,211,102,0.45);transition:transform .3s cubic-bezier(.4,0,.2,1);"
   onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="28" height="28"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>

<!-- ═══════════════════════════════════════════════════════
     CINEMATIC ENGINE — Three.js / GSAP / Lenis / Cursor
     ═══════════════════════════════════════════════════════ -->
<script>
document.addEventListener('DOMContentLoaded', () => {

/* ═══════════════════════════════════════════
   1. LENIS SMOOTH SCROLL
   ═══════════════════════════════════════════ */
window.lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    orientation: 'vertical',
    gestureOrientation: 'vertical',
    smoothWheel: true,
});
function raf(time) {
    window.lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// Link Lenis with GSAP ScrollTrigger
window.lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => { window.lenis.raf(time * 1000); });
gsap.ticker.lagSmoothing(0);

/* ═══════════════════════════════════════════
   2. PRELOADER ANIMATION SEQUENCE
   ═══════════════════════════════════════════ */
const preloader = document.getElementById('preloader');
const preloaderChars = document.querySelectorAll('.preloader-char');
const preloaderBar = document.getElementById('preloader-bar');
const preloaderSub = document.getElementById('preloader-sub');

const preloaderTl = gsap.timeline({
    onComplete: () => {
        gsap.to(preloader, {
            yPercent: -100,
            duration: 1.0,
            ease: 'power4.inOut',
            onComplete: () => {
                preloader.style.display = 'none';
                animateHeroEntrance();
            }
        });
    }
});

preloaderTl
    .to(preloaderChars, {
        y: '0%',
        opacity: 1,
        duration: 0.8,
        stagger: 0.05,
        ease: 'power3.out'
    }, 0.2)
    .to(preloaderBar, {
        width: '100%',
        duration: 1.2,
        ease: 'power2.inOut'
    }, 0.4)
    .to(preloaderSub, {
        opacity: 1,
        duration: 0.6,
        ease: 'power2.out'
    }, 1.0)
    .to({}, { duration: 0.3 });

/* ═══════════════════════════════════════════
   3. SPLIT TEXT UTILITY
   ═══════════════════════════════════════════ */
function splitTextIntoWords(element) {
    if (!element) return [];
    const html = element.innerHTML;
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;

    function processNode(node) {
        if (node.nodeType === 3) {
            const words = node.textContent.split(/(\s+)/);
            const frag = document.createDocumentFragment();
            words.forEach(word => {
                if (word.trim() === '') {
                    frag.appendChild(document.createTextNode(word));
                } else {
                    const wrap = document.createElement('span');
                    wrap.className = 'word-wrap';
                    const inner = document.createElement('span');
                    inner.className = 'word-inner';
                    inner.textContent = word;
                    wrap.appendChild(inner);
                    frag.appendChild(wrap);
                }
            });
            return frag;
        } else if (node.nodeName === 'BR') {
            return node.cloneNode();
        } else {
            const clone = node.cloneNode(false);
            node.childNodes.forEach(child => {
                clone.appendChild(processNode(child));
            });
            return clone;
        }
    }

    const result = document.createDocumentFragment();
    tempDiv.childNodes.forEach(child => {
        result.appendChild(processNode(child));
    });
    element.innerHTML = '';
    element.appendChild(result);
    return element.querySelectorAll('.word-inner');
}

/* ═══════════════════════════════════════════
   4. HERO ENTRANCE CHOREOGRAPHY
   ═══════════════════════════════════════════ */
function animateHeroEntrance() {
    const heroTitle = document.getElementById('hero-title');
    const words = splitTextIntoWords(heroTitle);

    const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });

    tl.to('#hero-badge', { opacity: 1, y: 0, duration: 0.8 })
      .to(words, {
          y: 0, duration: 1.0, stagger: 0.04,
      }, '-=0.4')
      .to('#hero-sub', { opacity: 1, y: 0, duration: 0.8 }, '-=0.5')
      .to('#hero-cta-lockup', { opacity: 1, y: 0, duration: 0.8 }, '-=0.4')
      .to('#hero-evidence', { opacity: 1, y: 0, duration: 0.6 }, '-=0.3')
      .to('#hero-scroll-hint', { opacity: 1, duration: 0.5 }, '-=0.2');

    // Hero video parallax on scroll
    gsap.to('#hero-video', {
        yPercent: 20, ease: 'none',
        scrollTrigger: {
            trigger: '.hero-wrap', start: 'top top', end: 'bottom top',
            scrub: true,
        }
    });

    // Fade hero on scroll
    gsap.to('.hero-content', {
        opacity: 0, y: -60, ease: 'none',
        scrollTrigger: {
            trigger: '.hero-wrap', start: '60% top', end: 'bottom top',
            scrub: true,
        }
    });
}

/* ═══════════════════════════════════════════
   5. SCROLL-TRIGGERED ANIMATIONS
   ═══════════════════════════════════════════ */
gsap.utils.toArray('.section-line').forEach(line => {
    gsap.to(line, {
        width: 28, duration: 0.8, ease: 'power2.out',
        scrollTrigger: { trigger: line, start: 'top 85%', toggleActions: 'play none none reverse' }
    });
});

gsap.utils.toArray('.divider-line').forEach(line => {
    gsap.to(line, {
        width: '100%', duration: 1.2, ease: 'power2.inOut',
        scrollTrigger: { trigger: line, start: 'top 90%', toggleActions: 'play none none reverse' }
    });
});

gsap.utils.toArray('.reveal-text:not(#hero-title)').forEach(el => {
    const words = splitTextIntoWords(el);
    gsap.to(words, {
        y: 0, duration: 0.8, stagger: 0.03, ease: 'power3.out',
        scrollTrigger: { trigger: el, start: 'top 82%', toggleActions: 'play none none reverse' }
    });
});

gsap.utils.toArray('.fade-up').forEach(el => {
    gsap.from(el, {
        opacity: 0, y: 40, duration: 0.9, ease: 'power3.out',
        scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'play none none reverse' }
    });
});

gsap.utils.toArray('.card-reveal').forEach((card, i) => {
    gsap.from(card, {
        opacity: 0, y: 50, scale: 0.97, duration: 0.8,
        delay: (i % 4) * 0.1,
        ease: 'power3.out',
        scrollTrigger: { trigger: card, start: 'top 88%', toggleActions: 'play none none reverse' }
    });
});

gsap.utils.toArray('.parallax-img img').forEach(img => {
    gsap.to(img, {
        yPercent: -12, ease: 'none',
        scrollTrigger: { trigger: img, start: 'top bottom', end: 'bottom top', scrub: true }
    });
});

ScrollTrigger.create({
    start: 80, end: 99999,
    toggleClass: { targets: '.site-header', className: 'scrolled' },
});

/* ═══════════════════════════════════════════
   6. COUNTER ANIMATIONS (Stats)
   ═══════════════════════════════════════════ */
document.querySelectorAll('.stat-big-number[data-count]').forEach(el => {
    const target = parseInt(el.getAttribute('data-count'));
    const suffix = el.getAttribute('data-suffix') || '';
    const prefix = el.getAttribute('data-prefix') || '';

    ScrollTrigger.create({
        trigger: el,
        start: 'top 85%',
        once: true,
        onEnter: () => {
            const obj = { val: 0 };
            gsap.to(obj, {
                val: target, duration: 2, ease: 'power2.out',
                onUpdate: () => {
                    const v = Math.round(obj.val);
                    el.textContent = prefix + v.toLocaleString() + suffix;
                }
            });
        }
    });
});

/* ═══════════════════════════════════════════
   7. MAGNETIC BUTTONS
   ═══════════════════════════════════════════ */
if (window.innerWidth > 768) {
    document.querySelectorAll('.magnetic-wrap').forEach(wrap => {
        const btn = wrap.querySelector('a, button') || wrap;
        wrap.addEventListener('mousemove', (e) => {
            const rect = wrap.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            gsap.to(btn, { x: x * 0.3, y: y * 0.3, duration: 0.3, ease: 'power2.out' });
        });
        wrap.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
        });
    });
}

/* ═══════════════════════════════════════════
   8. 3D CARD TILT
   ═══════════════════════════════════════════ */
if (window.innerWidth > 768) {
    document.querySelectorAll('[data-tilt]').forEach(card => {
        const inner = card.querySelector('.gallery-card-inner');
        const glare = card.querySelector('.gallery-card-glare');

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;
            const rotateX = (0.5 - y) * 12;
            const rotateY = (x - 0.5) * 12;
            if (inner) inner.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02,1.02,1.02)`;
            if (glare) {
                glare.style.setProperty('--glare-x', (x * 100) + '%');
                glare.style.setProperty('--glare-y', (y * 100) + '%');
            }
        });
        card.addEventListener('mouseleave', () => {
            if (inner) inner.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg) scale3d(1,1,1)';
        });
    });
}

/* ═══════════════════════════════════════════
   9. THREE.JS — AMBIENT FLOATING PARTICLES
   ═══════════════════════════════════════════ */
(function() {
    const canvas = document.getElementById('webgl-canvas');
    if (!canvas || typeof THREE === 'undefined') return;

    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: false });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
    camera.position.z = 400;

    const COUNT = 160;
    const positions = new Float32Array(COUNT * 3);
    const colors = new Float32Array(COUNT * 3);
    const velocities = new Float32Array(COUNT * 3);

    // Alive brand particle colors
    const brandMagenta = new THREE.Color(0xf71089);
    const brandPink = new THREE.Color(0xff4db8);
    const brandWhite = new THREE.Color(0xffffff);

    for (let i = 0; i < COUNT; i++) {
        const i3 = i * 3;
        positions[i3]     = (Math.random() - 0.5) * 1200;
        positions[i3 + 1] = (Math.random() - 0.5) * 800;
        positions[i3 + 2] = (Math.random() - 0.5) * 400;

        velocities[i3]     = (Math.random() - 0.5) * 0.25;
        velocities[i3 + 1] = Math.random() * 0.35 + 0.08;
        velocities[i3 + 2] = (Math.random() - 0.5) * 0.15;

        const rand = Math.random();
        const chosenColor = rand > 0.4 ? brandMagenta : (rand > 0.15 ? brandPink : brandWhite);
        colors[i3]     = chosenColor.r;
        colors[i3 + 1] = chosenColor.g;
        colors[i3 + 2] = chosenColor.b;
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    const material = new THREE.PointsMaterial({
        size: 3.5,
        vertexColors: true,
        transparent: true,
        opacity: 0.65,
        blending: THREE.AdditiveBlending,
    });

    const points = new THREE.Points(geometry, material);
    scene.add(points);

    let mouseXNorm = 0, mouseYNorm = 0;
    window.addEventListener('mousemove', (e) => {
        mouseXNorm = (e.clientX / window.innerWidth) * 2 - 1;
        mouseYNorm = (e.clientY / window.innerHeight) * 2 - 1;
    });

    let scrollVelocity = 0, lastScrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        const currentY = window.scrollY;
        scrollVelocity = (currentY - lastScrollY) * 0.05;
        lastScrollY = currentY;
    }, { passive: true });

    let time = 0;
    function animate() {
        time += 0.003;
        scrollVelocity *= 0.95;

        const pos = geometry.attributes.position.array;
        for (let i = 0; i < COUNT; i++) {
            const i3 = i * 3;
            pos[i3]     += velocities[i3]     + Math.sin(time + i * 0.01) * 0.08;
            pos[i3 + 1] += velocities[i3 + 1] + Math.cos(time + i * 0.008) * 0.06 + scrollVelocity * 0.3;
            pos[i3 + 2] += velocities[i3 + 2] + Math.sin(time * 0.7 + i * 0.005) * 0.05;

            if (pos[i3] > 600) pos[i3] = -600;
            if (pos[i3] < -600) pos[i3] = 600;
            if (pos[i3 + 1] > 400) pos[i3 + 1] = -400;
            if (pos[i3 + 1] < -400) pos[i3 + 1] = 400;
        }
        geometry.attributes.position.needsUpdate = true;

        camera.position.x += (mouseXNorm * 30 - camera.position.x) * 0.02;
        camera.position.y += (-mouseYNorm * 20 - camera.position.y) * 0.02;
        camera.lookAt(scene.position);

        points.rotation.y = time * 0.04;
        points.rotation.x = Math.sin(time * 0.3) * 0.02;

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }
    animate();

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
})();

}); // end DOMContentLoaded

/* ═══════════════════════════════════════════
   ALPINE — CAMPAIGN GALLERY DATA & SHARING
   ═══════════════════════════════════════════ */
window.campaignGallery = function() {
    return {
        isOpen: false,
        currentIndex: 0,
        cards: @json($campaignCards).map(card => ({
            ...card,
            image: "{{ asset('themes/nigeria/social_gallery') }}/" + card.image
        })),
        get currentCard() { return this.cards[this.currentIndex] || this.cards[0]; },
        openModal(index) {
            this.currentIndex = index;
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
            if (window.lenis) window.lenis.stop();
        },
        closeModal() {
            this.isOpen = false;
            document.body.style.overflow = '';
            if (window.lenis) window.lenis.start();
        },
        async shareWhatsApp() {
            const c = this.currentCard;
            const text = `*UNFINISHED — Preventing Maternal Mortality*\n"${c.title}"\n${c.quote}\n\nReform the law. Protect our future. Sign the petition: ${window.location.origin}/#petition`;
            
            // On devices supporting Web Share API with file attachments (e.g. mobile Safari / Chrome)
            if (navigator.share && navigator.canShare) {
                try {
                    const response = await fetch(c.image);
                    const blob = await response.blob();
                    const file = new File([blob], c.downloadName, { type: 'image/jpeg' });
                    if (navigator.canShare({ files: [file] })) {
                        await navigator.share({
                            files: [file],
                            title: 'Unfinished — Preventing Maternal Mortality',
                            text: text
                        });
                        return;
                    }
                } catch (err) {
                    console.log('Native share error or dismissed, falling back to direct URL', err);
                }
            }
            // Direct WhatsApp URL fallback
            window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(text)}`, '_blank');
        },
        getXUrl() {
            const c = this.currentCard;
            const text = `UNFINISHED — Preventing Maternal Mortality: "${c.title}" — Reform the law. Protect our future:`;
            return `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(window.location.origin + '/#petition')}`;
        },
        getFacebookUrl() {
            return `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.origin + '/#petition')}`;
        }
    };
};
</script>

</body>
</html>