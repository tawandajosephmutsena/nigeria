<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class StoryController extends Controller
{
    /** Public stories list — approved only, newest first. */
    public function index(): View
    {
        $stories = Story::approved()
            ->orderByDesc('published_at')
            ->paginate(9);

        $theme = Cache::remember('active_theme', 300, fn () => Theme::where('is_default', true)->first());

        return view('nigeria.stories.index', compact('stories', 'theme'));
    }

    /** Single story page with social share buttons + Open Graph meta. */
    public function show(string $slug): View
    {
        $story = Story::approved()->where('slug', $slug)->firstOrFail();

        $theme = Cache::remember('active_theme', 300, fn () => Theme::where('is_default', true)->first());

        $shareUrl = url("/stories/{$slug}");
        $shareText = urlencode($story->title);

        $shareLinks = [
            'twitter' => "https://twitter.com/intent/tweet?text={$shareText}&url=" . urlencode($shareUrl),
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl),
            'whatsapp' => "https://api.whatsapp.com/send?text={$shareText}%20" . urlencode($shareUrl),
            'url' => $shareUrl,
        ];

        return view('nigeria.stories.show', compact('story', 'theme', 'shareLinks'));
    }

    /** Public story submission form. */
    public function create(): View
    {
        $theme = Cache::remember('active_theme', 300, fn () => Theme::where('is_default', true)->first());

        return view('nigeria.stories.submit', compact('theme'));
    }

    /** Store a new community story (status = pending, awaiting admin approval). */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:300'],
            'body' => ['required', 'string', 'min:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Associate with logged-in user if available
        $userId = Auth::id();

        Story::create([
            'title' => $validated['title'],
            'excerpt' => $validated['excerpt'] ?? null,
            'body' => $validated['body'],
            'status' => Story::STATUS_PENDING,
            'user_id' => $userId,
        ]);

        return redirect()->route('stories.index')
            ->with('success', 'Thank you for sharing your story! It has been submitted for review and will appear once approved.');
    }
}
