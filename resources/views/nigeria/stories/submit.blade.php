<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Share Your Voice — UNFINISHED Campaign Nigeria</title>
    <meta name="description" content="Share your medical experience, personal story, or advocacy message to support Nigeria's maternal healthcare law reform.">
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
        body { font-family: var(--font-body); background: var(--cream); color: var(--charcoal); -webkit-font-smoothing: antialiased; line-height: 1.65; }
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

        .submit-hero {
            background: linear-gradient(135deg, #071910 0%, #0d281a 100%);
            padding: 80px 24px 60px; text-align: center; color: white;
        }
        .submit-hero .badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(71,211,153,0.15); color: var(--emerald-300); font-size: 0.78rem; font-weight: 800; padding: 6px 16px; border-radius: 50px; margin-bottom: 18px; text-transform: uppercase; letter-spacing: 2px; border: 1px solid rgba(71,211,153,0.3); }
        .submit-hero h1 { font-family: var(--font-headline); font-size: clamp(2.2rem, 5vw, 3.6rem); text-transform: uppercase; margin-bottom: 14px; }
        .submit-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.8); max-width: 580px; margin: 0 auto; line-height: 1.7; }

        .form-wrapper { max-width: 760px; margin: -30px auto 80px; padding: 0 24px; }
        .form-card { background: #fff; border-radius: var(--radius-md); padding: 48px; box-shadow: 0 12px 40px rgba(0,0,0,0.08); border: 1px solid rgba(0,0,0,0.06); }
        .form-group { margin-bottom: 24px; }
        .form-label { display: block; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: var(--charcoal); margin-bottom: 8px; }
        .form-input, .form-textarea, .form-select {
            width: 100%; padding: 14px 18px; border: 1.5px solid rgba(0,0,0,0.12);
            border-radius: 12px; font-family: inherit; font-size: 0.95rem; color: var(--charcoal); background: #fdfdfc; outline: none; transition: border-color .2s;
        }
        .form-input:focus, .form-textarea:focus, .form-select:focus { border-color: var(--emerald-500); }
        .btn-submit-form { width: 100%; padding: 18px; background: var(--emerald-500); color: white; font-family: var(--font-headline); font-size: 1.15rem; text-transform: uppercase; letter-spacing: 1px; border: none; border-radius: 14px; cursor: pointer; transition: background .2s, transform .2s; }
        .btn-submit-form:hover { background: var(--emerald-600); transform: translateY(-2px); }

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
        <a href="{{ route('stories.index') }}" class="back-link">← Back to Stories</a>
    </div>
</header>

<section class="submit-hero">
    <div class="badge">Community Voices</div>
    <h1>Share Your Story or Perspective</h1>
    <p>Your real-world experience as a healthcare professional, mother, survivor, or advocate gives human weight to the campaign for legal reform.</p>
</section>

<main class="form-wrapper">
    <div class="form-card">
        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:16px 20px;border-radius:12px;margin-bottom:28px;">
                <ul style="padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">Story Title *</label>
                <input type="text" name="title" class="form-input" placeholder="e.g. Why legal clarity matters in the labor ward" required value="{{ old('title') }}">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;" class="md:grid-cols-1">
                <div class="form-group">
                    <label class="form-label">Your Name / Pseudonym</label>
                    <input type="text" name="author_name" class="form-input" placeholder="e.g. Dr. K. / Anonymous Midwife" value="{{ old('author_name') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Location in Nigeria</label>
                    <input type="text" name="author_location" class="form-input" placeholder="e.g. Ibadan, Oyo State" value="{{ old('author_location') }}">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;" class="md:grid-cols-1">
                <div class="form-group">
                    <label class="form-label">Your Role / Perspective</label>
                    <select name="category" class="form-select">
                        <option value="Healthcare Professional">Healthcare Professional (Doctor / Nurse / Midwife)</option>
                        <option value="Advocate / Citizen">Advocate / Citizen</option>
                        <option value="Personal Experience">Personal / Family Experience</option>
                        <option value="Legal / Policy Expert">Legal / Policy Expert</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Your Email (Confidential)</label>
                    <input type="email" name="author_email" class="form-input" placeholder="you@example.com" value="{{ old('author_email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Your Story / Message *</label>
                <textarea name="content" class="form-textarea" rows="6" placeholder="Share what you have witnessed or why timely, safe maternal care and legal reform is essential..." required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Optional Photo / Document</label>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>

            <button type="submit" class="btn-submit-form">Submit For Moderation & Publishing →</button>
        </form>
    </div>
</main>

<footer class="site-footer">
    <p>© {{ date('Y') }} unfinished — Abortion Law Reform Campaign Nigeria. Finish the law. Protect her future.</p>
</footer>

</body>
</html>
