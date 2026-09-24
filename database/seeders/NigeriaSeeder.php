<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\CollectionItem;
use App\Models\ContactMessage;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PetitionSigner;
use App\Models\Story;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;

class NigeriaSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->warn(PHP_EOL . 'Seeding Nigeria theme & demo data...');

        // ─── Theme ────────────────────────────────────────────────────────────
        /** @var Theme $theme */
        $theme = Theme::updateOrCreate(
            ['slug' => 'nigeria'],
            [
                'name' => 'Unfinished',
                'description' => 'Unfinished — Abortion Law Reform Campaign for Nigeria.',
                'is_default' => true,
                'is_active' => true,
                'config' => [
                    'site_name' => 'unfinished',
                    'tagline' => 'Unfinished Dreams • Unfinished Futures',
                    'whatsapp_number' => '+263773699063',
                    'primary_color' => '#f71089',
                    'secondary_color' => '#ff269e',
                    'footer_text' => '© ' . date('Y') . ' Unfinished — Preventing Maternal Mortality. All rights reserved.',
                    'meta_description' => 'Unfinished — Preventing Maternal Mortality. Reform the law. Protect our future. Sign the petition.',
                    'socials' => [
                        'facebook' => 'https://facebook.com/',
                        'twitter' => 'https://twitter.com/',
                        'instagram' => 'https://instagram.com/',
                        'youtube' => 'https://youtube.com/',
                    ],
                ],
            ]
        );

        // Unset default on all other themes
        Theme::query()->whereKeyNot($theme->getKey())->update(['is_default' => false]);
        $this->command->info('  ✓ Nigeria theme');

        // ─── Collections ──────────────────────────────────────────────────────
        $causes = Collection::updateOrCreate(
            ['slug' => 'causes'],
            ['name' => 'Causes', 'description' => 'Active fundraising causes', 'settings' => ['type' => 'causes']]
        );

        $causeItems = [
            [
                'title' => 'Clean Water for Rural Communities',
                'sort' => 1,
                'data' => [
                    'description' => 'Providing access to clean, safe drinking water to over 5,000 families in remote areas.',
                    'raised' => 38500,
                    'goal' => 50000,
                    'image' => '/themes/nigeria/images/gallery-1.jpg',
                    'category' => 'Water & Sanitation',
                ],
            ],
            [
                'title' => 'Education for Every Child',
                'sort' => 2,
                'data' => [
                    'description' => 'Building classrooms and providing school supplies to underprivileged children.',
                    'raised' => 72000,
                    'goal' => 100000,
                    'image' => '/themes/nigeria/images/gallery-2.jpg',
                    'category' => 'Education',
                ],
            ],
            [
                'title' => 'Maternal Health Initiative',
                'sort' => 3,
                'data' => [
                    'description' => 'Supporting mothers with prenatal care, nutrition and skilled birth attendants.',
                    'raised' => 15000,
                    'goal' => 30000,
                    'image' => '/themes/nigeria/images/gallery-3.jpg',
                    'category' => 'Healthcare',
                ],
            ],
        ];

        $this->upsertItems($causes, $causeItems);

        $team = Collection::updateOrCreate(
            ['slug' => 'team'],
            ['name' => 'Team', 'description' => 'Our leadership team', 'settings' => ['type' => 'team']]
        );

        $teamItems = [
            ['title' => 'Dr. Amina Hassan', 'sort' => 1, 'data' => ['role' => 'Executive Director', 'bio' => 'Dr. Hassan has 20 years of experience in community development across Africa.', 'image' => '/themes/nigeria/images/team-1.jpg', 'twitter' => '#', 'linkedin' => '#']],
            ['title' => 'Emmanuel Okafor', 'sort' => 2, 'data' => ['role' => 'Programs Director', 'bio' => 'Emmanuel oversees all field operations and community engagement programs.', 'image' => '/themes/nigeria/images/team-2.jpg', 'twitter' => '#', 'linkedin' => '#']],
            ['title' => 'Fatima Al-Rashid', 'sort' => 3, 'data' => ['role' => 'Finance Manager', 'bio' => 'Fatima ensures financial transparency and responsible use of donor funds.', 'image' => '/themes/nigeria/images/team-3.jpg', 'twitter' => '#', 'linkedin' => '#']],
            ['title' => 'James Mwangi', 'sort' => 4, 'data' => ['role' => 'Communications Lead', 'bio' => 'James tells our impact stories and manages media partnerships across the continent.', 'image' => '/themes/nigeria/images/team-4.jpg', 'twitter' => '#', 'linkedin' => '#']],
        ];

        $this->upsertItems($team, $teamItems);

        $events = Collection::updateOrCreate(
            ['slug' => 'events'],
            ['name' => 'Events', 'description' => 'Upcoming events', 'settings' => ['type' => 'events']]
        );

        $eventItems = [
            [
                'title' => 'Annual Gala & Fundraiser 2026',
                'sort' => 1,
                'data' => [
                    'date' => '2026-09-15',
                    'time' => '18:00',
                    'location' => 'Lagos Civic Centre, Nigeria',
                    'description' => 'Join us for an evening of inspiration, awards and fundraising for our 2026 programs.',
                    'image' => '/themes/nigeria/images/gallery-4.jpg',
                    'link' => '#',
                ],
            ],
            [
                'title' => 'Community Health Fair',
                'sort' => 2,
                'data' => [
                    'date' => '2026-08-20',
                    'time' => '09:00',
                    'location' => 'Abuja Community Park, Nigeria',
                    'description' => 'Free health screenings, maternal care advice and nutrition workshops for all.',
                    'image' => '/themes/nigeria/images/gallery-5.jpg',
                    'link' => '#',
                ],
            ],
        ];

        $this->upsertItems($events, $eventItems);

        $gallery = Collection::updateOrCreate(
            ['slug' => 'gallery'],
            ['name' => 'Gallery', 'description' => 'Photo gallery', 'settings' => ['type' => 'gallery']]
        );

        for ($i = 1; $i <= 6; $i++) {
            CollectionItem::updateOrCreate(
                ['collection_id' => $gallery->id, 'title' => "Gallery Image {$i}"],
                [
                    'collection_id' => $gallery->id,
                    'title' => "Gallery Image {$i}",
                    'sort' => $i,
                    'status' => 'published',
                    'data' => ['image' => "/themes/nigeria/images/gallery-{$i}.jpg", 'caption' => "Community impact — moment {$i}"],
                ]
            );
        }

        $stats = Collection::updateOrCreate(
            ['slug' => 'stats'],
            ['name' => 'Impact Stats', 'description' => 'Fun factors / impact counters', 'settings' => ['type' => 'stats']]
        );

        $statItems = [
            ['title' => 'Lives Impacted', 'sort' => 1, 'data' => ['value' => 12500, 'icon' => 'heart', 'suffix' => '+']],
            ['title' => 'Projects Completed', 'sort' => 2, 'data' => ['value' => 84, 'icon' => 'check-circle', 'suffix' => '']],
            ['title' => 'Communities Served', 'sort' => 3, 'data' => ['value' => 37, 'icon' => 'map-pin', 'suffix' => '']],
            ['title' => 'Volunteer Hours', 'sort' => 4, 'data' => ['value' => 50000, 'icon' => 'clock', 'suffix' => '+']],
        ];

        $this->upsertItems($stats, $statItems);

        $blog = Collection::updateOrCreate(
            ['slug' => 'blog-posts'],
            ['name' => 'Blog Posts', 'description' => 'Latest news and updates', 'settings' => ['type' => 'blog']]
        );

        $blogItems = [
            [
                'title' => 'How Clean Water Changed Everything for Kogi State',
                'sort' => 1,
                'data' => [
                    'excerpt' => 'When we first arrived in Okene, the nearest water source was 4km away. Today, 3 boreholes serve over 800 families.',
                    'image' => '/themes/nigeria/images/gallery-1.jpg',
                    'date' => '2026-07-28',
                    'author' => 'Emmanuel Okafor',
                    'slug' => 'how-clean-water-changed-everything',
                    'link' => '/stories/how-clean-water-changed-everything',
                ],
            ],
            [
                'title' => '84 Projects, One Mission: Our 2025 Impact Report',
                'sort' => 2,
                'data' => [
                    'excerpt' => 'From school rebuilds in Borno to maternal clinics in Delta State — here is what your generosity made possible last year.',
                    'image' => '/themes/nigeria/images/gallery-2.jpg',
                    'date' => '2026-07-10',
                    'author' => 'Dr. Amina Hassan',
                    'slug' => '2025-impact-report',
                    'link' => '/stories/2025-impact-report',
                ],
            ],
        ];

        $this->upsertItems($blog, $blogItems);

        $clients = Collection::updateOrCreate(
            ['slug' => 'clients'],
            ['name' => 'Partners', 'description' => 'Partner organisations and donors', 'settings' => ['type' => 'clients']]
        );

        for ($i = 1; $i <= 4; $i++) {
            CollectionItem::updateOrCreate(
                ['collection_id' => $clients->id, 'title' => "Partner {$i}"],
                [
                    'collection_id' => $clients->id,
                    'title' => "Partner {$i}",
                    'sort' => $i,
                    'status' => 'published',
                    'data' => ['logo' => "/themes/nigeria/images/gallery-{$i}.jpg", 'url' => '#'],
                ]
            );
        }

        $this->command->info('  ✓ Collections (causes, team, events, gallery, stats, blog, clients)');

        // ─── Home Page ────────────────────────────────────────────────────────
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'status' => 'published',
                'theme_id' => $theme->id,
                'published_at' => now(),
                'blocks' => $this->homeBlocks(),
                'seo' => [
                    'meta_title' => 'Nigeria Foundation — Empowering Communities',
                    'meta_description' => 'Nigeria Foundation is a non-profit empowering communities through clean water, education and healthcare.',
                ],
            ]
        );

        $this->command->info('  ✓ Home page');

        // ─── Menus ────────────────────────────────────────────────────────────
        Menu::updateOrCreate(
            ['slug' => 'header'],
            [
                'name' => 'Header Navigation',
                'location' => 'header',
                'items' => [
                    ['label' => 'Home', 'url' => '/', 'children' => []],
                    ['label' => 'About', 'url' => '/#about', 'children' => []],
                    ['label' => 'Causes', 'url' => '/#causes', 'children' => []],
                    ['label' => 'Events', 'url' => '/#events', 'children' => []],
                    ['label' => 'Stories', 'url' => '/stories', 'children' => []],
                    ['label' => 'Contact', 'url' => '/#contact', 'children' => []],
                ],
            ]
        );

        Menu::updateOrCreate(
            ['slug' => 'footer'],
            [
                'name' => 'Footer Links',
                'location' => 'footer',
                'items' => [
                    ['label' => 'About', 'url' => '/#about', 'children' => []],
                    ['label' => 'Causes', 'url' => '/#causes', 'children' => []],
                    ['label' => 'Stories', 'url' => '/stories', 'children' => []],
                    ['label' => 'Submit Your Story', 'url' => '/stories/submit', 'children' => []],
                    ['label' => 'Contact', 'url' => '/#contact', 'children' => []],
                ],
            ]
        );

        $this->command->info('  ✓ Menus (header + footer)');

        // ─── Sample Contact Messages ───────────────────────────────────────────
        $messages = [
            ['name' => 'Chioma Eze', 'email' => 'chioma@example.com', 'phone' => '+2348012345678', 'message' => 'I would love to volunteer for the clean water project in Kogi State. How can I get involved?'],
            ['name' => 'Kwame Asante', 'email' => 'kwame@example.com', 'phone' => '+233501234567', 'message' => 'We are a school in Accra looking to partner for educational resources. Please reach out.'],
            ['name' => 'Ngozi Adeyemi', 'email' => 'ngozi@example.com', 'phone' => '+2349087654321', 'message' => 'I want to donate to the maternal health initiative. Can you share bank account details?'],
        ];

        foreach ($messages as $msg) {
            ContactMessage::firstOrCreate(['email' => $msg['email']], $msg);
        }

        $this->command->info('  ✓ Sample contact messages');

        // ─── Sample Stories ────────────────────────────────────────────────────
        $admin = User::where('email', 'admin@filamentphp.com')->first();

        if ($admin) {
            $stories = [
                [
                    'title' => 'Why 610,000 Nigerian Women Seek Care Underground Every Year',
                    'slug' => 'why-610000-women-seek-care-underground',
                    'excerpt' => 'An estimated 610,000 women in Nigeria seek to end a pregnancy each year. When safe legal care is out of reach, care moves into unsafe conditions, putting lives at risk.',
                    'body' => '<p>Behind every statistic is a woman with dreams still in progress. In Nigeria, an estimated 610,000 women seek reproductive care each year. Yet when safe, legal care is out of reach, that need does not disappear — it moves underground into unsafe conditions, putting women’s lives at unnecessary risk.</p><p>Progress on maternal mortality didn’t happen by accident in Nigeria — it happened because leaders reviewed what wasn’t working. Unsafe abortion remains one cause still waiting for that same courageous attention.</p><h3>The Way Forward</h3><p>Reviewing the legal framework is not a departure from Nigeria’s maternal health commitments — it is a direct continuation. Giving healthcare workers legal clarity means fewer women are pushed toward unsafe procedures and preventable deaths.</p>',
                    'status' => Story::STATUS_APPROVED,
                    'featured' => true,
                    'published_at' => now()->subDays(2),
                    'user_id' => $admin->id,
                ],
                [
                    'title' => 'Dr. Folake Ademola: "We Have The Training. We Need The Legal Clarity to Save Lives"',
                    'slug' => 'dr-folake-ademola-we-have-the-training',
                    'excerpt' => 'Nigeria\'s doctors and nurses have the skill to prevent maternal deaths. What they need now is a legal framework that lets them act without delay.',
                    'body' => '<p>Nigeria’s healthcare workers are trained, willing, and ready to provide lifesaving care. Yet medical professionals often find themselves caught between their professional oath to save lives and legal ambiguity during emergency pregnancy complications.</p><p><em>"Every doctor wants to give patients the care they were trained to provide,"</em> says Dr. Folake Ademola, a maternal health advocate in Lagos. <em>"A clearer legal framework helps make sure we can act every time, without delay."</em></p><p>Matching the law to the oath healthcare workers have already taken will empower doctors across all 36 states to save more lives every single day.</p>',
                    'status' => Story::STATUS_APPROVED,
                    'featured' => true,
                    'published_at' => now()->subDays(5),
                    'user_id' => $admin->id,
                ],
                [
                    'title' => 'The Cost of Delay: How Unsafe Complications Impact Families Across Nigeria',
                    'slug' => 'the-cost-of-delay-unsafe-complications',
                    'excerpt' => 'Unsafe abortion is estimated to account for as many as 1 in 8 maternal deaths in Nigeria. Behind every figure is a mother whose life could have been saved.',
                    'body' => '<p>Unsafe abortion is estimated to account for as many as one in eight maternal deaths in Nigeria. Nearly half a million Nigerian women experience complications every year, and most never receive the care they need in time.</p><p>A mother’s survival is also her children’s future. When a mother survives, so does everything she was building for her family. Legal clarity around maternal care protects two generations at once.</p>',
                    'status' => Story::STATUS_APPROVED,
                    'featured' => false,
                    'published_at' => now()->subDays(12),
                    'user_id' => $admin->id,
                ],
                [
                    'title' => 'One Review Away: Protecting Two Generations of Nigerian Women',
                    'slug' => 'one-review-away-protecting-two-generations',
                    'excerpt' => 'Nigeria\'s leaders have made real progress reducing maternal deaths. One chapter remains — and it is within reach.',
                    'body' => '<p>Every gain Nigeria has made in maternal health proves that change is possible when leaders choose to act. Extending that same commitment to abortion law reform is a natural continuation of the work our leaders have already started.</p><p>Join thousands of citizens, healthcare workers, and policymakers signing the petition to ensure no woman’s story ends early because of a legal gap.</p>',
                    'status' => Story::STATUS_APPROVED,
                    'featured' => false,
                    'published_at' => now()->subDays(18),
                    'user_id' => $admin->id,
                ],
            ];

            foreach ($stories as $story) {
                Story::firstOrCreate(['slug' => $story['slug']], $story);
            }

            $this->command->info('  ✓ Sample approved stories');
        }

        // ─── Petition Signers ──────────────────────────────────────────────────
        $signers = [
            ['name' => 'Dr. Folake Ademola', 'email' => 'folake@medical.ng', 'phone' => '+2348031234567', 'state' => 'Lagos', 'role' => 'healthcare_worker', 'comment' => 'Our doctors need legal clarity to save lives without hesitation.'],
            ['name' => 'Hon. Babatunde Sanusi', 'email' => 'bsanusi@nass.gov.ng', 'phone' => '+2348029876543', 'state' => 'Abuja (FCT)', 'role' => 'policymaker', 'comment' => 'We must extend our commitment to maternal health by reviewing this law.'],
            ['name' => 'Blessing Okon', 'email' => 'blessing.okon@gmail.com', 'phone' => '+2348145550192', 'state' => 'Rivers', 'role' => 'citizen', 'comment' => 'For every woman whose story shouldn\'t end early.'],
            ['name' => 'Dr. Chidi Nwosu', 'email' => 'chidi.nwosu@kanohospital.org', 'phone' => '+2347063334455', 'state' => 'Kano', 'role' => 'healthcare_worker', 'comment' => 'Match the law to the oath we have already taken.'],
            ['name' => 'Zainab Aliyu', 'email' => 'zainab.a@yahoo.com', 'phone' => '+2348187778899', 'state' => 'Kaduna', 'role' => 'citizen', 'comment' => 'A mother\'s future is her children\'s future.'],
            ['name' => 'Sen. Grace Danjuma', 'email' => 'gdanjuma@senate.gov.ng', 'phone' => '+2348091112233', 'state' => 'Plateau', 'role' => 'policymaker', 'comment' => 'One more chapter in Nigeria\'s maternal health progress is within reach.'],
        ];

        foreach ($signers as $signer) {
            PetitionSigner::firstOrCreate(['email' => $signer['email']], $signer);
        }

        $this->command->info('  ✓ Sample petition signers');

        $this->command->info(PHP_EOL . '✅ Nigeria seeder complete!');
    }

    /**
     * Upsert a set of collection items.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    private function upsertItems(Collection $collection, array $items): void
    {
        foreach ($items as $item) {
            CollectionItem::updateOrCreate(
                ['collection_id' => $collection->id, 'title' => $item['title']],
                array_merge($item, ['collection_id' => $collection->id, 'status' => 'published'])
            );
        }
    }

    /** @return array<int, array<string, mixed>> */
    private function homeBlocks(): array
    {
        return [
            [
                'type' => 'hero',
                'data' => [
                    'heading' => 'Empowering Communities Through Compassion',
                    'subheading' => 'Together we build a better Africa — one community, one project, one life at a time.',
                    'cta_primary_label' => 'Donate Now',
                    'cta_primary_url' => '#donate',
                    'cta_secondary_label' => 'Learn More',
                    'cta_secondary_url' => '#about',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'features',
                'data' => [
                    'heading' => 'Why We Exist',
                    'items' => [
                        ['icon' => 'heart', 'title' => 'Compassionate Impact', 'description' => 'Every program is designed around community needs, not donor preferences.'],
                        ['icon' => 'shield', 'title' => 'Accountable & Transparent', 'description' => '100% of donations are reported publicly. Zero hidden fees.'],
                        ['icon' => 'globe', 'title' => 'Sustainable Solutions', 'description' => 'We build systems that communities own and maintain long after we leave.'],
                    ],
                    'background_color' => '#1a1a2e',
                    'text_color' => '#ffffff',
                ],
            ],
            [
                'type' => 'about',
                'data' => [
                    'heading' => 'About Nigeria Foundation',
                    'body' => '<p>Founded in 2015, the Nigeria Foundation has been dedicated to sustainable community development across Africa. Our multi-disciplinary team of experts works alongside local leaders to deliver water, education, health and economic empowerment programs.</p><p>We believe that lasting change comes from within communities — our role is to provide the tools, training and resources to unlock that potential.</p>',
                    'accordion' => [
                        ['title' => 'Our Mission', 'content' => 'To empower African communities through sustainable, community-led development programs.'],
                        ['title' => 'Our Vision', 'content' => 'A continent where every person has access to clean water, quality education and healthcare.'],
                        ['title' => 'Our Values', 'content' => 'Accountability, compassion, sustainability and community ownership.'],
                    ],
                    'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'services',
                'data' => [
                    'heading' => 'Our Programs',
                    'items' => [
                        ['icon' => 'droplet', 'title' => 'Clean Water', 'description' => 'Borehole drilling, water purification systems and sanitation infrastructure.'],
                        ['icon' => 'book-open', 'title' => 'Education', 'description' => 'School construction, teacher training, scholarships and digital literacy.'],
                        ['icon' => 'activity', 'title' => 'Healthcare', 'description' => 'Maternal clinics, vaccination campaigns and community health worker training.'],
                        ['icon' => 'sun', 'title' => 'Clean Energy', 'description' => 'Solar micro-grids, clean cooking solutions and energy literacy programs.'],
                        ['icon' => 'trending-up', 'title' => 'Economic Empowerment', 'description' => 'Micro-finance, skills training and market access for small farmers.'],
                        ['icon' => 'users', 'title' => 'Community Leadership', 'description' => 'Leadership training, civic engagement and community governance support.'],
                    ],
                    'background_color' => '#1a1a2e',
                    'text_color' => '#ffffff',
                ],
            ],
            [
                'type' => 'donate-cta',
                'data' => [
                    'heading' => 'Your Generosity Changes Lives',
                    'body' => 'A gift of any size makes a real difference. From clean water to school books — your donation goes directly to communities that need it most.',
                    'cta_label' => 'Donate Today',
                    'cta_url' => '#contact',
                    'background_color' => '#22b87e',
                    'text_color' => '#ffffff',
                ],
            ],
            [
                'type' => 'causes',
                'data' => [
                    'heading' => 'Active Causes',
                    'collection_slug' => 'causes',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'gallery',
                'data' => [
                    'heading' => 'Our Work in Pictures',
                    'collection_slug' => 'gallery',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'stats',
                'data' => [
                    'collection_slug' => 'stats',
                    'background_color' => '#f0fdf6',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'team',
                'data' => [
                    'heading' => 'Meet Our Team',
                    'collection_slug' => 'team',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'events',
                'data' => [
                    'heading' => 'Upcoming Events',
                    'collection_slug' => 'events',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'clients',
                'data' => [
                    'heading' => 'Our Partners',
                    'collection_slug' => 'clients',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'blog',
                'data' => [
                    'heading' => 'Latest Stories',
                    'collection_slug' => 'blog-posts',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
            [
                'type' => 'contact',
                'data' => [
                    'heading' => 'Get In Touch',
                    'subheading' => 'Have a question, a partnership idea, or want to volunteer? We would love to hear from you.',
                    'background_color' => '',
                    'text_color' => '',
                ],
            ],
        ];
    }
}
