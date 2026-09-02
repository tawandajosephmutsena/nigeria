<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Page;
use App\Models\PetitionSigner;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PublicController extends Controller
{
    /** Render the homepage — loads the published "home" page from the default theme. */
    public function home(): View
    {
        $theme = Cache::remember('active_theme', 300, fn () => Theme::where('is_default', true)->first());

        $page = Page::published()
            ->where('slug', 'home')
            ->first();

        return view('nigeria.landing', compact('theme', 'page'));
    }

    /** Render any published CMS page by slug. */
    public function page(string $slug): View | RedirectResponse
    {
        $page = Page::published()->where('slug', $slug)->firstOrFail();

        $theme = $page->theme ?? Cache::remember('active_theme', 300, fn () => Theme::where('is_default', true)->first());

        return view('nigeria.landing', compact('theme', 'page'));
    }

    /** Live preview canvas endpoint for Elementor-style page builder. */
    public function previewCanvas(string | int $id): View
    {
        $page = Page::find($id) ?? Page::where('slug', $id)->first();
        $theme = Theme::where('is_default', true)->first();

        return view('nigeria.landing', compact('theme', 'page'));
    }

    /** Handle contact form submission. */
    public function contactStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);
        ContactMessage::create($validated);

        return redirect()->back()
            ->with('success', 'Thank you! Your message has been received. We will be in touch shortly.');
    }

    /** Handle petition signature submission. */
    public function petitionStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'state' => ['nullable', 'string', 'max:100'],
            'role' => ['nullable', 'string', 'in:citizen,healthcare_worker,policymaker'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        if (empty($validated['role'])) {
            $validated['role'] = 'citizen';
        }

        PetitionSigner::create($validated);

        return redirect()->back()
            ->with('success', 'Thank you for standing with women across Nigeria! Your signature has been added to the petition.');
    }

    /** Dynamic XML sitemap. */
    public function sitemap(): Response
    {
        $pages = Page::published()->get(['slug', 'updated_at']);

        $xml = view('nigeria.sitemap', compact('pages'))->render();

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
