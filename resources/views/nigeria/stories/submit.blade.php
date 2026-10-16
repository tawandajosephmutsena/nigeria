@extends('layouts.nigeria')

@section('title', 'Share Your Voice — UNFINISHED Campaign Nigeria')
@section('meta_description', 'Share your medical experience, personal story, or advocacy message to support Nigeria’s maternal healthcare law reform.')

@push('styles')
<style>
    .submit-hero { position: relative; overflow: hidden; padding: 92px 24px 108px; background: linear-gradient(135deg, #120a16 0%, #3d1030 55%, #1a0f20 100%); color: #fff; text-align: center; }
    .submit-hero::after { position: absolute; inset: 0; content: ''; background: radial-gradient(circle at 50% 0%, rgba(247,16,137,.28), transparent 50%); pointer-events: none; }
    .submit-hero > * { position: relative; z-index: 1; }
    .submit-badge { display: inline-flex; margin-bottom: 20px; padding: 8px 18px; border: 1px solid rgba(255,42,157,.45); border-radius: 50px; background: rgba(247,16,137,.18); color: #ff9bd1; font-size: .75rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; }
    .submit-hero h1 { max-width: 820px; margin: 0 auto 16px; font-family: var(--font-headline); font-size: clamp(2.8rem, 6vw, 4.7rem); font-weight: 400; line-height: .96; letter-spacing: .02em; text-transform: uppercase; }
    .submit-hero p { max-width: 660px; margin: 0 auto; color: rgba(255,255,255,.78); font-size: 1.02rem; line-height: 1.8; }
    .form-wrap { width: min(100% - 48px, 780px); margin: -52px auto 100px; position: relative; z-index: 2; }
    .form-card { padding: 46px; border: 1px solid rgba(247,16,137,.15); border-radius: var(--radius-lg); background: #fff; box-shadow: var(--shadow-md); }
    .form-intro { margin-bottom: 32px; color: var(--text-muted); }
    .form-group { margin-bottom: 24px; }
    .form-label { display: block; margin-bottom: 8px; color: var(--charcoal); font-size: .78rem; font-weight: 900; letter-spacing: 1.4px; text-transform: uppercase; }
    .form-input, .form-textarea { width: 100%; border: 1.5px solid rgba(15,23,42,.14); border-radius: 12px; outline: none; background: #fff; padding: 14px 16px; color: var(--charcoal); font: inherit; transition: border-color .2s, box-shadow .2s; }
    .form-textarea { min-height: 180px; resize: vertical; }
    .form-input:focus, .form-textarea:focus { border-color: var(--brand-500); box-shadow: 0 0 0 4px rgba(247,16,137,.10); }
    .form-hint { margin-top: 7px; color: var(--text-muted); font-size: .8rem; }
    .form-error { margin-bottom: 28px; padding: 16px 20px; border: 1px solid #fecaca; border-radius: 12px; background: #fef2f2; color: #991b1b; }
    .submit-button { width: 100%; border: 0; border-radius: 14px; background: var(--brand-500); padding: 18px; box-shadow: 0 8px 25px rgba(247,16,137,.28); color: #fff; cursor: pointer; font-family: var(--font-headline); font-size: 1.1rem; letter-spacing: 1px; text-transform: uppercase; transition: transform .2s, background .2s; }
    .submit-button:hover { background: var(--brand-600); transform: translateY(-2px); }
    @media (max-width: 640px) { .submit-hero { padding: 76px 20px 96px; } .form-wrap { width: min(100% - 40px, 780px); } .form-card { padding: 30px 22px; } }
</style>
@endpush

@section('content')
<section class="submit-hero">
    <div class="submit-badge">Community Voices</div>
    <h1>Share Your Story or Perspective</h1>
    <p>Your real-world experience as a healthcare professional, mother, survivor, or advocate gives human weight to the campaign for legal reform.</p>
</section>

<div class="form-wrap">
    <div class="form-card">
        <p class="form-intro">Every submission is reviewed before publication. Share only what you are comfortable publishing publicly.</p>
        @if ($errors->any())
            <div class="form-error"><ul style="padding-left:20px">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Story Title *</label>
                <input id="title" type="text" name="title" class="form-input" placeholder="e.g. Why legal clarity matters in the labor ward" required value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="excerpt" class="form-label">Short Summary</label>
                <input id="excerpt" type="text" name="excerpt" class="form-input" maxlength="300" placeholder="A short introduction to your perspective" value="{{ old('excerpt') }}">
            </div>
            <div class="form-group">
                <label for="body" class="form-label">Your Story / Message *</label>
                <textarea id="body" name="body" class="form-textarea" placeholder="Share what you have witnessed or why timely, safe maternal care and legal reform is essential..." required>{{ old('body') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Optional Photo</label>
                <input id="image" type="file" name="image" class="form-input" accept="image/*">
                <p class="form-hint">Upload only an image you have permission to share.</p>
            </div>
            <button type="submit" class="submit-button">Submit for Moderation &amp; Publishing →</button>
        </form>
    </div>
</div>
@endsection
