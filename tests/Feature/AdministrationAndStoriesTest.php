<?php

use App\Models\Story;
use App\Models\User;
use Filament\Facades\Filament;

test('public signup routes are unavailable and only admin roles can access the admin panel', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $editor = User::factory()->create(['role' => 'editor']);
    $panel = Filament::getPanel('admin');

    expect($admin->canAccessPanel($panel))->toBeTrue()
        ->and($editor->canAccessPanel($panel))->toBeFalse();

    $this->get('/app/register')->assertNotFound();
    $this->get('/app/new')->assertNotFound();
    $this->get('/admin/login')
        ->assertOk()
        ->assertDontSee('admin@filamentphp.com')
        ->assertDontSee('demo.Filament@2021!');
});

test('public story submissions are saved as pending for admin moderation', function () {
    $this->post('/stories', [
        'title' => 'A story awaiting review',
        'excerpt' => 'A short introduction to this community perspective.',
        'body' => 'This is a sufficiently detailed community account that is saved for review by an existing site administrator.',
    ])->assertRedirect(route('stories.index'));

    $this->assertDatabaseHas('stories', [
        'title' => 'A story awaiting review',
        'status' => Story::STATUS_PENDING,
    ]);
});

test('stories use the same public-site shell on the list, submission, and detail pages', function () {
    $story = Story::query()->create([
        'title' => 'A community voice',
        'body' => 'A sufficiently long approved community story that is visible to visitors on the campaign website.',
        'status' => Story::STATUS_APPROVED,
        'published_at' => now(),
    ]);

    foreach ([
        '/stories',
        '/stories/submit',
        "/stories/{$story->slug}",
    ] as $url) {
        $this->get($url)
            ->assertOk()
            ->assertSee('site-header', false)
            ->assertSee('btn-nav-petition', false)
            ->assertSee('footer-grid', false)
            ->assertSee('WhatsApp Campaign Desk');
    }
});
