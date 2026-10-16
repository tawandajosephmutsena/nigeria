@extends('layouts.nigeria')

@section('title', 'Voices & Stories — UNFINISHED Campaign Nigeria')
@section('meta_description', 'Real stories and voices of Nigerian women, families, and healthcare workers advocating for maternal healthcare and law reform.')

@push('styles')
<style>
    .stories-hero { position: relative; overflow: hidden; padding: 112px 24px 92px; background: linear-gradient(135deg, #120a16 0%, #3d1030 55%, #1a0f20 100%); color: #fff; text-align: center; }
    .stories-hero::after { position: absolute; inset: 0; content: ''; background: radial-gradient(circle at 50% 0%, rgba(247,16,137,.28), transparent 50%); pointer-events: none; }
    .stories-hero > * { position: relative; z-index: 1; }
    .stories-badge { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 24px; padding: 8px 20px; border: 1px solid rgba(255,42,157,.45); border-radius: 50px; background: rgba(247,16,137,.18); color: #ff9bd1; font-size: .75rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; }
    .stories-title { max-width: 920px; margin: 0 auto 20px; font-family: var(--font-headline); font-size: clamp(3rem, 7vw, 5.6rem); font-weight: 400; line-height: .95; letter-spacing: .02em; text-transform: uppercase; }
    .stories-title span { color: var(--brand-400); }
    .stories-intro { max-width: 720px; margin: 0 auto 34px; color: rgba(255,255,255,.78); font-size: 1.05rem; line-height: 1.8; }
    .stories-action { display: inline-flex; padding: 14px 28px; border-radius: 50px; background: var(--brand-500); box-shadow: 0 8px 25px rgba(247,16,137,.36); color: #fff; font-size: .82rem; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
    .stories-action:hover { background: var(--brand-600); color: #fff; transform: translateY(-2px); }
    .stories-section { padding: 88px 0 104px; }
    .stories-heading { margin-bottom: 34px; }
    .eyebrow { margin-bottom: 8px; color: var(--brand-600); font-size: .75rem; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; }
    .stories-heading h2 { font-family: var(--font-headline); font-size: clamp(2rem, 4vw, 3.25rem); font-weight: 400; letter-spacing: .02em; line-height: 1; text-transform: uppercase; }
    .stories-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 26px; }
    .story-card { display: flex; min-height: 100%; flex-direction: column; overflow: hidden; border: 1px solid rgba(247,16,137,.12); border-radius: var(--radius-md); background: #fff; box-shadow: var(--shadow-sm); transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
    .story-card:hover { border-color: rgba(247,16,137,.45); box-shadow: var(--shadow-md); transform: translateY(-6px); }
    .story-card-image, .story-card-image-placeholder { width: 100%; height: 225px; object-fit: cover; }
    .story-card-image-placeholder { display: grid; place-items: center; background: linear-gradient(135deg, var(--dark-bg), #4a1239); color: #ff9bd1; font-family: var(--font-headline); font-size: 2.1rem; letter-spacing: .08em; text-transform: uppercase; }
    .story-card-body { display: flex; flex: 1; flex-direction: column; padding: 28px; }
    .story-badge { display: inline-flex; width: fit-content; margin-bottom: 14px; padding: 5px 10px; border: 1px solid var(--brand-200); border-radius: 50px; background: var(--brand-50); color: var(--brand-700); font-size: .68rem; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; }
    .story-card-title { margin-bottom: 12px; color: var(--charcoal); font-family: var(--font-headline); font-size: 1.5rem; font-weight: 400; line-height: 1.05; letter-spacing: .02em; text-transform: uppercase; }
    .story-card-excerpt { margin-bottom: 24px; color: var(--text-muted); font-size: .92rem; line-height: 1.7; }
    .story-card-meta { margin-top: auto; padding-top: 18px; border-top: 1px solid rgba(15,23,42,.08); color: #94a3b8; font-size: .78rem; }
    .story-read { display: inline-flex; margin-top: 16px; color: var(--brand-600); font-size: .8rem; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; }
    .story-read:hover { color: var(--brand-500); }
    .status-alert { margin-bottom: 34px; padding: 18px 22px; border: 1px solid rgba(247,16,137,.25); border-radius: 14px; background: var(--brand-50); color: var(--brand-800); font-weight: 700; }
    .empty-state { padding: 76px 28px; border: 1px dashed rgba(247,16,137,.35); border-radius: var(--radius-md); background: #fff; text-align: center; }
    .empty-state h2 { margin-bottom: 12px; font-family: var(--font-headline); font-size: 2rem; font-weight: 400; text-transform: uppercase; }
    .empty-state p { max-width: 560px; margin: 0 auto 26px; color: var(--text-muted); }
    .pagination-wrap { margin-top: 52px; }
    @media (max-width: 1000px) { .stories-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 640px) { .stories-hero { padding: 86px 20px 72px; } .stories-grid { grid-template-columns: 1fr; } .stories-section { padding: 62px 0 78px; } }
</style>
@endpush

@section('content')
<section class="stories-hero">
    <div class="stories-badge">Real Voices • Real Impact</div>
    <h1 class="stories-title">Every Story Is <span>Still Being Written.</span></h1>
    <p class="stories-intro">Personal accounts from Nigerian women, community advocates, midwives, doctors, and legal experts calling for maternal healthcare reform.</p>
    <a href="{{ route('stories.create') }}" class="stories-action">Share Your Story or Medical Perspective</a>
</section>

<section class="stories-section">
    <div class="section-container">
        @if(session('success'))
            <div class="status-alert">{{ session('success') }}</div>
        @endif

        <div class="stories-heading">
            <p class="eyebrow">Community Voices</p>
            <h2>Stories That Must Be Heard</h2>
        </div>

        @if($stories->isEmpty())
            <div class="empty-state">
                <h2>No Stories Published Yet</h2>
                <p>Be the first healthcare worker, advocate, or citizen to share your voice for maternal healthcare reform.</p>
                <a href="{{ route('stories.create') }}" class="stories-action">Submit the First Story</a>
            </div>
        @else
            <div class="stories-grid">
                @foreach($stories as $story)
                    <article class="story-card">
                        @if($story->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($story->image) }}" alt="{{ $story->title }}" class="story-card-image">
                        @else
                            <div class="story-card-image-placeholder">Unfinished</div>
                        @endif
                        <div class="story-card-body">
                            @if($story->featured)
                                <span class="story-badge">Featured Story</span>
                            @endif
                            <h3 class="story-card-title">{{ $story->title }}</h3>
                            <p class="story-card-excerpt">{{ \Illuminate\Support\Str::limit($story->excerpt, 150) }}</p>
                            <div class="story-card-meta">Published {{ optional($story->published_at ?? $story->created_at)->format('M d, Y') }}</div>
                            <a href="{{ route('stories.show', $story->slug) }}" class="story-read">Read Full Story →</a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="pagination-wrap">{{ $stories->links() }}</div>
        @endif
    </div>
</section>
@endsection
