<?php

use App\Models\PetitionSigner;

test('it renders the public landing page with brand colors, unified headline CTA, and logos', function () {
    $response = $this->get('/');

    $response->assertStatus(200);

    // Meta & title
    $response->assertSee('UNFINISHED — Preventing Maternal Mortality');

    // Unified headline & CTA flow
    $response->assertSee('Unfinished Dreams.');
    $response->assertSee('Unfinished Futures.');
    $response->assertSee('Reform the law. Protect our future. Sign the petition.');

    // Brand color & logo assets
    $response->assertSee('#f71089');
    $response->assertSee('logo-nav-horizontal.webp');
    $response->assertSee('logo-footer-square.webp');

    // Facebook double F fix verification (must not have "f Facebook")
    $response->assertDontSee('f Facebook');
    $response->assertSee('<span>Facebook</span>', false);

    // WhatsApp sharing / file naming without old text
    $response->assertDontSee('Abortion Law Reform Campaign Nigeria');
    $response->assertSee('Unfinished — Preventing Maternal Mortality');

    // WhatsApp campaign desk & FAB receiver number
    $response->assertSee('https://wa.me/2349150684078');
    $response->assertDontSee('263773699063');
});

test('it renders all 10 campaign visuals with updated maternal mortality naming', function () {
    $response = $this->get('/');

    $response->assertStatus(200);

    for ($i = 1; $i <= 10; $i++) {
        $response->assertSee("unfinished-preventing-maternal-mortality-{$i}.jpg");
    }

    $response->assertSee('The 10 Campaign Visuals');
});

test('it allows citizens to sign the petition', function () {
    $response = $this->post('/petition', [
        'name' => 'Amina Bello',
        'email' => 'amina@example.com',
        'role' => 'healthcare_worker',
        'state' => 'Lagos',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    expect(PetitionSigner::where('email', 'amina@example.com')->exists())->toBeTrue();
});

test('it renders stories pages with horizontal nav logo and updated branding', function () {
    $indexResponse = $this->get('/stories');
    $indexResponse->assertStatus(200);
    $indexResponse->assertSee('logo-nav-horizontal.webp');
    $indexResponse->assertSee('logo-footer-square.webp');
    $indexResponse->assertSee('#f71089');

    $submitResponse = $this->get('/stories/submit');
    $submitResponse->assertStatus(200);
    $submitResponse->assertSee('logo-nav-horizontal.webp');
    $submitResponse->assertSee('#f71089');
});
