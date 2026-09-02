<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\StoryController;
use App\Livewire\Form;
use Illuminate\Support\Facades\Route;

// ─── Public Website ───────────────────────────────────────────────────────────

Route::get('/', [PublicController::class, 'home'])->name('home');

// Stories
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/submit', [StoryController::class, 'create'])->name('stories.create');
Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
Route::get('/stories/{slug}', [StoryController::class, 'show'])->name('stories.show');

// Contact form POST
Route::post('/contact', [PublicController::class, 'contactStore'])->name('contact.store');

// Petition signature POST
Route::post('/petition', [PublicController::class, 'petitionStore'])->name('petition.store');

// XML Sitemap
Route::get('/sitemap.xml', [PublicController::class, 'sitemap'])->name('sitemap');

// Live Preview Canvas for Elementor-style page builder
Route::get('/preview-canvas/{id}', [PublicController::class, 'previewCanvas'])->name('page.preview');

// Dynamic CMS pages by slug (catch-all, must be last)
Route::get('/{slug}', [PublicController::class, 'page'])
    ->where('slug', '^(?!admin|app|api|_debugbar|_boost|livewire|form)[a-z0-9-]+$')
    ->name('page.show');

// ─── Legacy / misc ────────────────────────────────────────────────────────────
Route::get('form', Form::class);

Route::redirect('login-redirect', 'admin/login')->name('web.login');
