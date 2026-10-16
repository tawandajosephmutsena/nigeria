@extends('layouts.nigeria')

@section('title', $story->title . ' — UNFINISHED Campaign Nigeria')
@section('meta_description', $story->excerpt)

@push('styles')
<style>
    .story-page { padding: 78px 0 108px; }
    .story-frame { width: min(100% - 48px, 860px); margin: 0 auto; }
    .back-link { display: inline-flex; margin-bottom: 34px; color: var(--brand-600); font-size: .8rem; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; }
    .back-link:hover { color: var(--brand-500); }
    .story-category { display: inline-flex; margin-bottom: 18px; padding: 6px 12px; border: 1px solid var(--brand-200); border-radius: 50px; background: var(--brand-50); color: var(--brand-700); font-size: .7rem; font-weight: 900; letter-spacing: 1px; text-transform: uppercase; }
    .story-title { margin-bottom: 22px; color: var(--charcoal); font-family: var(--font-headline); font-size: clamp(2.8rem, 6vw, 5rem); font-weight: 400; line-height: .96; letter-spacing: .02em; text-transform: uppercase; }
    .story-meta { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 34px; color: var(--text-muted); font-size: .86rem; }
    .story-cover { width: 100%; max-height: 500px; margin-bottom: 42px; border-radius: var(--radius-md); object-fit: cover; box-shadow: var(--shadow-md); }
    .story-body { color: var(--text-body); font-size: 1.08rem; line-height: 1.9; }
    .story-body p { margin-bottom: 24px; }
    .share-card { margin-top: 52px; padding: 34px; border: 1px solid rgba(247,16,137,.14); border-radius: var(--radius-md); background: #fff; box-shadow: var(--shadow-sm); text-align: center; }
    .share-card h2 { margin-bottom: 10px; font-family: var(--font-headline); font-size: 1.75rem; font-weight: 400; letter-spacing: .02em; text-transform: uppercase; }
    .share-card p { max-width: 600px; margin: 0 auto 22px; color: var(--text-muted); }
    .share-btn { display: inline-flex; margin: 5px; padding: 12px 20px; border-radius: 50px; color: #fff; font-size: .78rem; font-weight: 800; letter-spacing: .8px; text-transform: uppercase; }
    @media (max-width: 640px) { .story-page { padding: 58px 0 78px; } .story-frame { width: min(100% - 40px, 860px); } .share-card { padding: 28px 18px; } }
</style>
@endpush

@section('content')
<article class="story-page">
    <div class="story-frame">
        <a href="{{ route('stories.index') }}" class="back-link">← All Community Stories</a>
        @if($story->featured)<span class="story-category">Featured Story</span>@endif
        <h1 class="story-title">{{ $story->title }}</h1>
        <div class="story-meta"><span>Community story</span><span>•</span><span>{{ optional($story->published_at ?? $story->created_at)->format('F d, Y') }}</span></div>

        @if($story->image)
            <img src="{{ \Illuminate\Support\Facades\Storage::url($story->image) }}" alt="{{ $story->title }}" class="story-cover">
        @endif

        <div class="story-body">{!! nl2br(e($story->body)) !!}</div>

        <section class="share-card">
            <h2>Help Amplify This Story</h2>
            <p>Share this story to build public support for completing Nigeria's maternal healthcare laws.</p>
            <div>
                <a href="{{ $shareLinks['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="share-btn" style="background:#25d366">Share on WhatsApp</a>
                <a href="{{ $shareLinks['twitter'] }}" target="_blank" rel="noopener noreferrer" class="share-btn" style="background:#000">Share on X</a>
                <a href="{{ $shareLinks['facebook'] }}" target="_blank" rel="noopener noreferrer" class="share-btn" style="background:#1877f2">Share on Facebook</a>
            </div>
        </section>
    </div>
</article>
@endsection
