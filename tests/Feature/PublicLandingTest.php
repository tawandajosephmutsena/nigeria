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

test('it renders the hero slider with current slide first and the first 3 event photos', function () {
    $response = $this->get('/');

    $response->assertStatus(200);

    // Hero slider component & controls
    $response->assertSee('x-data="heroSlider()"', false);
    $response->assertSee('hero-slide', false);
    $response->assertSee('hero-arrow-prev');
    $response->assertSee('hero-arrow-next');
    $response->assertSee('hero-slider-nav');

    // Slide 0: Current hero with video
    $response->assertSee('hero-video');
    $response->assertSee('Unfinished Dreams.');
    $response->assertSee('Unfinished Futures.');

    // Slide 1: First event photo (_HUR4556)
    $response->assertSee('_HUR4556.webp');

    // Slide 2: Second event photo (_HUR4606)
    $response->assertSee('_HUR4606.webp');

    // Slide 3: Third event photo (_HUR4632)
    $response->assertSee('_HUR4632.webp');
});

test('it renders the abuja events section with full narrative, policy clarity, media and live gallery', function () {
    $response = $this->get('/');

    $response->assertStatus(200);

    // Section ID & title
    $response->assertSee('id="events"', false);
    $response->assertSee('Ten Portraits Stood Unfinished.');

    // Event details
    $response->assertSee('Monday, 28 September 2026');
    $response->assertSee('Transcorp Hilton, Abuja');
    $response->assertSee('ten artists portrayed ten Nigerian women');
    $response->assertSee('The unfinished portraits reflected an unfinished reality: a law that has begun, but has not yet been completed.');

    // Policy clarity: calls for legal expansion, NOT decriminalisation
    $response->assertSee('This campaign calls for an expansion of the existing legal grounds in line with lived realities.');
    $response->assertSee('It does not call for decriminalisation.');
    $response->assertSee('The courts have moved. The law must move with them.');

    // Gratitude & Solidarity partners section must be removed
    $response->assertDontSee('Gratitude & Solidarity');
    $response->assertDontSee('To Every Partner Who Made The Day Possible');

    // Media & news coverage
    $response->assertSee('Unfinished Campaign in the News');
    $response->assertSee('TKIt6IJ4XmQ'); // YouTube embed ID
    $response->assertSee('https://youtu.be/TKIt6IJ4XmQ?si=J9eJkekEgNXYykDj');
    $response->assertSee('https://guardian.ng/news/nigeria/metro/stakeholders-seek-legal-protection-for-survivors-of-rape-and-incest/');
    $response->assertSee('https://dailytrust.com/nhrc-women-group-call-for-abortion-law-amendment/');

    // Live gallery
    $response->assertSee('Live Event Photography');
    $response->assertSee('_HUR4556_thumb.webp');
    $response->assertSee('_HUR4722_thumb.webp');

    // Navigation links
    $response->assertSee('href="#events"', false);
});

