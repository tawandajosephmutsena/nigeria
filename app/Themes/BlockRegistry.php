<?php

namespace App\Themes;

use App\Models\Collection;
use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;

/**
 * The Elementor-style component library.
 *
 * Every block type the page builder can drop onto a page is registered here:
 * a name, category, icon, an editable schema (form fields), default props,
 * and a Blade view under resources/views/themes/{theme}/blocks/{slug}.blade.php.
 */
class BlockRegistry
{
    /**
     * All registered block types.
     *
     * @return array<string, array{
     *     name: string,
     *     slug: string,
     *     category: string,
     *     icon: string,
     *     description: string,
     *     schema: array,
     *     default_props: array,
     * }>
     */
    public static function all(): array
    {
        return [
            'hero' => [
                'name' => 'Hero Slider',
                'slug' => 'hero',
                'category' => 'Header',
                'icon' => 'heroicon-m-photo',
                'description' => 'Full-width hero with an image slider, headline and call-to-action buttons.',
                'schema' => [
                    self::section('Slider', [
                        self::repeater('slides', 'Slides', [
                            self::image('image', 'Slide Image', '/themes/nigeria/img/hero-bg-1.jpg'),
                            self::text('small_title', 'Small Title', 'AWESOME THEMEZ PRESENT NON-PROFIT SITE'),
                            self::text('title_part1', 'Headline — part 1', 'HUMANITY .'),
                            self::text('title_highlight', 'Headline — highlight', 'INTEGRITY'),
                            self::text('title_part2', 'Headline — part 2', '. HONESTY'),
                            self::textarea('subtitle', 'Subtitle', 'Donation and help us for homeless people. We are a organization that helps for children people.'),
                            self::text('btn1_text', 'Button 1 label', 'DONATE NOW'),
                            self::text('btn1_link', 'Button 1 link', '#cause'),
                            self::text('btn2_text', 'Button 2 label', 'LEARN MORE'),
                            self::text('btn2_link', 'Button 2 link', '#about'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'slides' => [
                        [
                            'image' => '/themes/nigeria/img/hero-bg-1.jpg',
                            'small_title' => 'AWESOME THEMEZ PRESENT NON-PROFIT SITE',
                            'title_part1' => 'HUMANITY .',
                            'title_highlight' => 'INTEGRITY',
                            'title_part2' => '. HONESTY',
                            'subtitle' => 'Donation and help us for homeless people. We are a organization that helps for children people.',
                            'btn1_text' => 'DONATE NOW',
                            'btn1_link' => '#cause',
                            'btn2_text' => 'LEARN MORE',
                            'btn2_link' => '#about',
                        ],
                        [
                            'image' => '/themes/nigeria/img/hero-bg-2.jpg',
                            'small_title' => 'AWESOME THEMEZ PRESENT NON-PROFIT SITE',
                            'title_part1' => 'HELPING .',
                            'title_highlight' => 'TOGETHER',
                            'title_part2' => '. WE RISE',
                            'subtitle' => 'Donation and help us for homeless people. We are a organization that helps for children people.',
                            'btn1_text' => 'DONATE NOW',
                            'btn1_link' => '#cause',
                            'btn2_text' => 'LEARN MORE',
                            'btn2_link' => '#about',
                        ],
                    ],
                ],
            ],

            'features' => [
                'name' => 'Feature Cards',
                'slug' => 'features',
                'category' => 'Content',
                'icon' => 'heroicon-m-sparkles',
                'description' => 'Three highlight cards with icons (black background section).',
                'schema' => [
                    self::section('Features', [
                        self::repeater('items', 'Feature Cards', [
                            self::icon('icon', 'Icon'),
                            self::text('title', 'Title'),
                            self::textarea('text', 'Text'),
                            self::text('link', 'See-more link', '#about'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'items' => [
                        ['icon' => 'icofont-coins', 'title' => 'Donation Now', 'text' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#cause'],
                        ['icon' => 'icofont-users', 'title' => 'Join As Volunteer', 'text' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-read-book', 'title' => 'Provide Education', 'text' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#service'],
                    ],
                ],
            ],

            'about' => [
                'name' => 'About (Accordion + Video)',
                'slug' => 'about',
                'category' => 'Content',
                'icon' => 'heroicon-m-information-circle',
                'description' => 'Section header, an accordion of details and an embedded video.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'About Us'),
                        self::textarea('subtitle', 'Subtitle', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.'),
                    ]),
                    self::section('Accordion', [
                        self::repeater('accordion', 'Accordion Items', [
                            self::text('heading', 'Item Heading'),
                            self::textarea('body', 'Item Body', null, 4),
                        ]),
                    ]),
                    self::section('Video', [
                        self::text('video_url', 'Video embed URL', 'https://www.youtube.com/embed/C2FFe5FiAqc?modestbranding=1&autohide=1&showinfo=0&controls=0'),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'About Us',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'accordion' => [
                        ['heading' => 'Charity Owner / Founder', 'body' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium htin doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim impo voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequr mni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia. Dolor sit amet, consectetur adipiscing elit.'],
                        ['heading' => 'Our Vision  & Mission', 'body' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium htin doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim impo voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequr mni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia. Dolor sit amet, consectetur adipiscing elit.'],
                        ['heading' => 'Who We Are', 'body' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium htin doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim impo voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequr mni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia. Dolor sit amet, consectetur adipiscing elit.'],
                    ],
                    'video_url' => 'https://www.youtube.com/embed/C2FFe5FiAqc?modestbranding=1&autohide=1&showinfo=0&controls=0',
                ],
            ],

            'services' => [
                'name' => 'Services Grid',
                'slug' => 'services',
                'category' => 'Content',
                'icon' => 'heroicon-m-squares-2x2',
                'description' => 'Grid of service cards with icons (black background section).',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'SERVICES'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Services', [
                        self::repeater('items', 'Service Cards', [
                            self::icon('icon', 'Icon'),
                            self::text('title', 'Title'),
                            self::textarea('text', 'Text'),
                            self::text('link', 'Link', '#contact'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'SERVICES',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'items' => [
                        ['icon' => 'icofont-pixels', 'title' => 'HELP ORPHANAGE', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-food-basket', 'title' => 'FOOD SUPPLY', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-hospital', 'title' => 'HOSPITAL', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-education', 'title' => 'FREE EDUCATION', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-blood-drop', 'title' => 'DONATE BLOOD', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                        ['icon' => 'icofont-building-alt', 'title' => 'PROVIDE SHELTER', 'text' => 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa qua.', 'link' => '#contact'],
                    ],
                ],
            ],

            'donate' => [
                'name' => 'Donate CTA',
                'slug' => 'donate',
                'category' => 'Content',
                'icon' => 'heroicon-m-heart',
                'description' => 'Centered call-to-action banner for donations.',
                'schema' => [
                    self::text('title', 'Title', 'HELP POOR PEOPLE & GIVE DONATION'),
                    self::textarea('text', 'Text', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.'),
                    self::text('btn_text', 'Button label', 'DONATE NOW'),
                    self::text('btn_link', 'Button link', '#contact'),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'title' => 'HELP POOR PEOPLE & GIVE DONATION',
                    'text' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.',
                    'btn_text' => 'DONATE NOW',
                    'btn_link' => '#contact',
                ],
            ],

            'causes' => [
                'name' => 'Causes (Progress)',
                'slug' => 'causes',
                'category' => 'Content',
                'icon' => 'heroicon-m-arrow-trending-up',
                'description' => 'Cause cards with donation progress bars.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'CAUSES'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Causes', [
                        self::repeater('items', 'Causes', [
                            self::image('image', 'Image', '/themes/nigeria/img/cause-1.jpg'),
                            self::text('title', 'Title'),
                            self::textarea('text', 'Text'),
                            self::number('raised', 'Raised ($)'),
                            self::number('target', 'Target ($)'),
                            self::text('link', 'Donate link', '#contact'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'CAUSES',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'items' => [
                        ['image' => '/themes/nigeria/img/cause-1.jpg', 'title' => 'PROVIDE EDUCATION FOR CHILD', 'text' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque point corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident for help.', 'raised' => 5000, 'target' => 7000, 'link' => '#contact'],
                        ['image' => '/themes/nigeria/img/cause-2.jpg', 'title' => 'HELP FOR MEDICAL & HEALTH', 'text' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque point corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident for help.', 'raised' => 5000, 'target' => 8000, 'link' => '#contact'],
                        ['image' => '/themes/nigeria/img/cause-3.jpg', 'title' => 'CLOTHING & LAND PROVIDE', 'text' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque point corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident for help.', 'raised' => 38000, 'target' => 50000, 'link' => '#contact'],
                    ],
                ],
            ],

            'gallery' => [
                'name' => 'Gallery (Lightbox)',
                'slug' => 'gallery',
                'category' => 'Media',
                'icon' => 'heroicon-m-photo',
                'description' => 'Masonry image gallery with a zoom lightbox.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'GALLERY'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Images', [
                        self::repeater('items', 'Images', [
                            self::image('thumb', 'Thumbnail', '/themes/nigeria/img/gallary-1.jpg'),
                            self::image('full', 'Full-size image', '/themes/nigeria/img/gallary-l-1.jpg'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'GALLERY',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'items' => [
                        ['thumb' => '/themes/nigeria/img/gallary-1.jpg', 'full' => '/themes/nigeria/img/gallary-l-1.jpg'],
                        ['thumb' => '/themes/nigeria/img/gallary-2.jpg', 'full' => '/themes/nigeria/img/gallary-l-2.jpg'],
                        ['thumb' => '/themes/nigeria/img/gallary-3.jpg', 'full' => '/themes/nigeria/img/gallary-l-3.jpg'],
                        ['thumb' => '/themes/nigeria/img/gallary-4.jpg', 'full' => '/themes/nigeria/img/gallary-l-4.jpg'],
                        ['thumb' => '/themes/nigeria/img/gallary-5.jpg', 'full' => '/themes/nigeria/img/gallary-l-5.jpg'],
                        ['thumb' => '/themes/nigeria/img/gallary-6.jpg', 'full' => '/themes/nigeria/img/gallary-l-6.jpg'],
                    ],
                ],
            ],

            'funfacts' => [
                'name' => 'Fun Facts (Counters)',
                'slug' => 'funfacts',
                'category' => 'Content',
                'icon' => 'heroicon-m-chart-bar',
                'description' => 'Animated number counters with icons (image background section).',
                'schema' => [
                    self::section('Counters', [
                        self::repeater('items', 'Counters', [
                            self::icon('icon', 'Icon'),
                            self::number('count', 'Count'),
                            self::text('label', 'Label'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'items' => [
                        ['icon' => 'icofont-money', 'count' => 1200, 'label' => 'DONORS'],
                        ['icon' => 'icofont-users-alt-2', 'count' => 500, 'label' => 'VOLUNTEERS'],
                        ['icon' => 'icofont-life-buoy', 'count' => 3500, 'label' => 'LIFE SAVED'],
                        ['icon' => 'icofont-institution', 'count' => 200, 'label' => 'INSTITUTION'],
                    ],
                ],
            ],

            'team' => [
                'name' => 'Team Members',
                'slug' => 'team',
                'category' => 'Content',
                'icon' => 'heroicon-m-user-group',
                'description' => 'Team member cards with social links.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'OUR TEAM'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Members', [
                        self::repeater('items', 'Team Members', [
                            self::image('image', 'Photo', '/themes/nigeria/img/team-1.jpg'),
                            self::text('name', 'Name'),
                            self::text('designation', 'Designation', 'Volunteer'),
                            self::text('facebook', 'Facebook URL', '#'),
                            self::text('linkedin', 'LinkedIn URL', '#'),
                            self::text('skype', 'Skype URL', '#'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'OUR TEAM',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'items' => [
                        ['image' => '/themes/nigeria/img/team-1.jpg', 'name' => 'BONY SMITH', 'designation' => 'Volunteer', 'facebook' => '#', 'linkedin' => '#', 'skype' => '#'],
                        ['image' => '/themes/nigeria/img/team-2.jpg', 'name' => 'JHON DOE', 'designation' => 'Volunteer', 'facebook' => '#', 'linkedin' => '#', 'skype' => '#'],
                        ['image' => '/themes/nigeria/img/team-3.jpg', 'name' => 'LEONEL MIKE', 'designation' => 'Volunteer', 'facebook' => '#', 'linkedin' => '#', 'skype' => '#'],
                        ['image' => '/themes/nigeria/img/team-4.jpg', 'name' => 'JACKY LALIN', 'designation' => 'Volunteer', 'facebook' => '#', 'linkedin' => '#', 'skype' => '#'],
                    ],
                ],
            ],

            'events' => [
                'name' => 'Events',
                'slug' => 'events',
                'category' => 'Content',
                'icon' => 'heroicon-m-calendar-days',
                'description' => 'Event cards with date, location and action buttons.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'OUR EVENT'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Events', [
                        self::repeater('items', 'Events', [
                            self::image('image', 'Image', '/themes/nigeria/img/event-1.jpg'),
                            self::text('title', 'Title'),
                            self::textarea('text', 'Text'),
                            self::text('date', 'Date', 'Dec-11-2017'),
                            self::text('location', 'Location', 'South Africa'),
                            self::text('join_link', 'Join Now link', '#contact'),
                            self::text('details_link', 'Details link', '#event'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'OUR EVENT',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'items' => [
                        ['image' => '/themes/nigeria/img/event-1.jpg', 'title' => 'BUILD SCHOOL FOR CHILDREN', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud alliness.', 'date' => 'Dec-11-2017', 'location' => 'South Africa', 'join_link' => '#contact', 'details_link' => '#event'],
                        ['image' => '/themes/nigeria/img/event-2.jpg', 'title' => 'AWARENESS FOR HEALTH CARE', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud alliness.', 'date' => 'Dec-11-2017', 'location' => 'South Africa', 'join_link' => '#contact', 'details_link' => '#event'],
                    ],
                ],
            ],

            'clients' => [
                'name' => 'Clients Logos',
                'slug' => 'clients',
                'category' => 'Media',
                'icon' => 'heroicon-m-building-office-2',
                'description' => 'A row of client logo images.',
                'schema' => [
                    self::section('Logos', [
                        self::repeater('items', 'Client Logos', [
                            self::image('logo', 'Logo', '/themes/nigeria/img/client-1.png'),
                            self::text('link', 'Link', '#'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'items' => [
                        ['logo' => '/themes/nigeria/img/client-1.png', 'link' => '#'],
                        ['logo' => '/themes/nigeria/img/client-2.png', 'link' => '#'],
                        ['logo' => '/themes/nigeria/img/client-3.png', 'link' => '#'],
                        ['logo' => '/themes/nigeria/img/client-4.png', 'link' => '#'],
                    ],
                ],
            ],

            'blog' => [
                'name' => 'News / Blog',
                'slug' => 'blog',
                'category' => 'Content',
                'icon' => 'heroicon-m-newspaper',
                'description' => 'Latest news posts from the blog collection.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'OUR NEWS'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Source', [
                        self::toggle('from_blog', 'Load from blog posts', true),
                        self::number('post_count', 'Number of posts', 2),
                        self::repeater('items', 'Manual Posts', [
                            self::image('image', 'Image', '/themes/nigeria/img/blog-1.jpg'),
                            self::text('title', 'Title'),
                            self::text('date', 'Date', '10 Jan 2017'),
                            self::text('author', 'Author', 'Post Admin'),
                            self::textarea('text', 'Excerpt'),
                            self::text('link', 'Read-more link', '#blog'),
                        ]),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'OUR NEWS',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'from_blog' => true,
                    'post_count' => 2,
                    'items' => [
                        ['image' => '/themes/nigeria/img/blog-1.jpg', 'title' => 'SAVE LIFE FOR POOR CHILDREN', 'date' => '10 Jan 2017', 'author' => 'Post Admin', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperi rain...', 'link' => '#blog'],
                        ['image' => '/themes/nigeria/img/blog-2.jpg', 'title' => 'WE BUILD SCHOOL & HOSPITAL', 'date' => '1 Jan 2017', 'author' => 'Post Admin', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperi rain...', 'link' => '#blog'],
                    ],
                ],
            ],

            'contact' => [
                'name' => 'Contact Form',
                'slug' => 'contact',
                'category' => 'Forms',
                'icon' => 'heroicon-m-chat-bubble-left-right',
                'description' => 'Contact form that saves submissions to the database.',
                'schema' => [
                    self::section('Heading', [
                        self::text('heading', 'Heading', 'CONTACT'),
                        self::textarea('subtitle', 'Subtitle'),
                    ]),
                    self::section('Form', [
                        self::text('success_message', 'Success message', 'Thank you! Your message has been sent.'),
                        self::text('submit_text', 'Submit button label', 'Send Message'),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'heading' => 'CONTACT',
                    'subtitle' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.',
                    'success_message' => 'Thank you! Your message has been sent.',
                    'submit_text' => 'Send Message',
                ],
            ],

            'spacer' => [
                'name' => 'Spacer',
                'slug' => 'spacer',
                'category' => 'Layout',
                'icon' => 'heroicon-m-arrows-up-down',
                'description' => 'Adds vertical breathing room between sections.',
                'schema' => [
                    self::number('height', 'Height (px)', 60),
                ],
                'default_props' => ['height' => 60],
            ],

            'collection' => [
                'name' => 'Collection Grid',
                'slug' => 'collection',
                'category' => 'Collections',
                'icon' => 'heroicon-m-rectangle-stack',
                'description' => 'Display any custom collection as a responsive card grid.',
                'schema' => [
                    self::section('Source', [
                        Select::make('collection_id')
                            ->label('Collection')
                            ->options(fn () => Collection::query()->where('is_active', true)->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('layout')
                            ->label('Layout')
                            ->options(['grid' => 'Grid (3 per row)', 'list' => 'List', 'carousel' => 'Carousel'])
                            ->default('grid'),
                        self::number('limit', 'Items shown', 6),
                    ]),
                    self::section('Style', self::styleFields()),
                ],
                'default_props' => [
                    'layout' => 'grid',
                    'limit' => 6,
                ],
            ],

            'html' => [
                'name' => 'Custom HTML',
                'slug' => 'html',
                'category' => 'Layout',
                'icon' => 'heroicon-m-code-bracket',
                'description' => 'Raw HTML block for total control.',
                'schema' => [
                    RichEditor::make('html')->label('HTML')->disableToolbarButtons(['attachFiles']),
                ],
                'default_props' => ['html' => '<p>Custom content here.</p>'],
            ],
        ];
    }

    /* ------------------------------------------------------------------ */
    /* Lookups */
    /* ------------------------------------------------------------------ */

    public static function get(string $slug): ?array
    {
        return static::all()[$slug] ?? null;
    }

    public static function names(): array
    {
        return collect(static::all())->map(fn ($b) => $b['name'])->all();
    }

    public static function categories(): array
    {
        return collect(static::all())->pluck('category')->unique()->values()->all();
    }

    /**
     * Merge stored block data over defaults. Null values from the form are
     * treated as "not set" so untouched fields keep their theme defaults.
     */
    public static function mergeProps(string $slug, ?array $data): array
    {
        $defaults = static::get($slug)['default_props'] ?? [];

        return self::fillDefaults($defaults, $data ?? []);
    }

    private static function fillDefaults(array $defaults, array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value) && isset($defaults[$key]) && is_array($defaults[$key])) {
                $defaults[$key] = self::fillDefaults($defaults[$key], $value);
            } elseif ($value !== null) {
                $defaults[$key] = $value;
            }
        }

        return $defaults;
    }

    /** Resolve an image value to a renderable URL (theme asset, upload, or external). */
    public static function imageUrl(?string $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', '/', 'data:'])) {
            return $value;
        }

        return asset('storage/' . ltrim($value, '/'));
    }

    /* ------------------------------------------------------------------ */
    /* Filament form conversion */
    /* ------------------------------------------------------------------ */

    /** @return array<int, BuilderBlock> */
    public static function filamentBlocks(): array
    {
        return collect(static::all())
            ->map(fn (array $block) => BuilderBlock::make($block['slug'])
                ->label($block['name'])
                ->icon($block['icon'])
                ->schema(self::fieldsToFilament($block['schema'])))
            ->values()
            ->all();
    }

    /** Convert the JSON-ish schema definitions into Filament form components. */
    public static function fieldsToFilament(array $schema): array
    {
        $components = [];

        foreach ($schema as $field) {
            $components[] = self::fieldToFilament($field);
        }

        return $components;
    }

    private static function fieldToFilament(mixed $field)
    {
        if (! is_array($field)) {
            return $field;
        }

        $type = $field['type'] ?? 'text';
        $name = $field['name'];
        $label = $field['label'] ?? Str::headline($name);
        $default = $field['default'] ?? null;

        $component = match ($type) {
            'section' => Section::make($label)
                ->schema(self::fieldsToFilament($field['fields'] ?? []))
                ->collapsible()
                ->columns(2),
            'text' => TextInput::make($name)->label($label)->default($default),
            'textarea' => Textarea::make($name)->label($label)->default($default)->rows($field['rows'] ?? 3),
            'rich' => RichEditor::make($name)->label($label)->default($default),
            'number' => TextInput::make($name)->label($label)->numeric()->default($default),
            'select' => Select::make($name)->label($label)->options($field['options'] ?? [])->default($default),
            'toggle' => Toggle::make($name)->label($label)->default($default),
            'color' => ColorPicker::make($name)->label($label)->default($default),
            'date' => DatePicker::make($name)->label($label)->default($default),
            'keyvalue' => KeyValue::make($name)->label($label)->default($default),
            'checkbox_list' => CheckboxList::make($name)->label($label)->options($field['options'] ?? [])->default($default),
            'image' => FileUpload::make($name)
                ->label($label)
                ->image()
                ->directory('theme-images')
                ->visibility('public')
                ->helperText($field['helper'] ?? 'Upload a new image, or leave empty to use the theme default.'),
            'repeater' => Repeater::make($name)
                ->label($label)
                ->schema(self::fieldsToFilament($field['fields'] ?? []))
                ->columns(2)
                ->collapsible()
                ->reorderableWithDragAndDrop(),
            default => TextInput::make($name)->label($label)->default($default),
        };

        if (isset($field['helper'])) {
            $component->helperText($field['helper']);
        }

        return $component;
    }

    /* ------------------------------------------------------------------ */
    /* Schema field helpers */
    /* ------------------------------------------------------------------ */

    private static function section(string $label, array $fields): array
    {
        return ['type' => 'section', 'name' => Str::slug($label), 'label' => $label, 'fields' => $fields];
    }

    private static function styleFields(): array
    {
        return [
            self::text('section_id', 'Section ID (anchor)', null),
            self::color('bg_color', 'Background color', null),
            self::image('bg_image', 'Background image', null, 'Upload a background image, or leave empty.'),
            self::select('text_color', 'Text color', null, [
                '' => 'Default',
                'white' => 'White',
                'dark' => 'Dark',
            ]),
            self::number('padding_top', 'Padding top (px)', null),
            self::number('padding_bottom', 'Padding bottom (px)', null),
        ];
    }

    private static function text(string $name, string $label, ?string $default = null): array
    {
        return ['type' => 'text', 'name' => $name, 'label' => $label, 'default' => $default];
    }

    private static function textarea(string $name, string $label, ?string $default = null, int $rows = 3): array
    {
        return ['type' => 'textarea', 'name' => $name, 'label' => $label, 'default' => $default, 'rows' => $rows];
    }

    private static function number(string $name, string $label, mixed $default = null): array
    {
        return ['type' => 'number', 'name' => $name, 'label' => $label, 'default' => $default];
    }

    private static function select(string $name, string $label, mixed $default = null, array $options = []): array
    {
        return ['type' => 'select', 'name' => $name, 'label' => $label, 'default' => $default, 'options' => $options];
    }

    private static function toggle(string $name, string $label, mixed $default = null): array
    {
        return ['type' => 'toggle', 'name' => $name, 'label' => $label, 'default' => $default];
    }

    private static function color(string $name, string $label, ?string $default = null): array
    {
        return ['type' => 'color', 'name' => $name, 'label' => $label, 'default' => $default];
    }

    private static function image(string $name, string $label, ?string $default = null, ?string $helper = null): array
    {
        return ['type' => 'image', 'name' => $name, 'label' => $label, 'default' => $default, 'helper' => $helper];
    }

    private static function repeater(string $name, string $label, array $fields): array
    {
        return ['type' => 'repeater', 'name' => $name, 'label' => $label, 'fields' => $fields];
    }

    private static function icon(string $name, string $label): array
    {
        $icons = [
            'icofont-coins' => 'Coins (Donation)',
            'icofont-users' => 'Users (Volunteers)',
            'icofont-read-book' => 'Book (Education)',
            'icofont-pixels' => 'Pixels (Orphanage)',
            'icofont-food-basket' => 'Food Basket',
            'icofont-hospital' => 'Hospital',
            'icofont-education' => 'Education',
            'icofont-blood-drop' => 'Blood Drop',
            'icofont-building-alt' => 'Building (Shelter)',
            'icofont-money' => 'Money',
            'icofont-users-alt-2' => 'Users Alt',
            'icofont-life-buoy' => 'Life Buoy',
            'icofont-institution' => 'Institution',
            'icofont-hand-power' => 'Helping Hand',
            'icofont-globe' => 'Globe',
            'icofont-heart' => 'Heart',
            'icofont-water-drop' => 'Water Drop',
            'icofont-food' => 'Food',
            'icofont-social-facebook' => 'Facebook',
            'icofont-social-twitter' => 'Twitter',
            'icofont-social-linkedin' => 'LinkedIn',
            'icofont-social-skype' => 'Skype',
            'icofont-star' => 'Star',
            'icofont-trophy' => 'Trophy',
        ];

        return ['type' => 'select', 'name' => $name, 'label' => $label, 'default' => 'icofont-coins', 'options' => $icons];
    }
}
