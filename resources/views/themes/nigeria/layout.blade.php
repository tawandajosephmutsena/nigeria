<!doctype html>
<html class="no-js" lang="en">
  <head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="{{ $branding['site_name'] ?? 'Nigeria' }}">
	<meta name="description" content="{{ $page->seo['meta_description'] ?? ($branding['meta_description'] ?? '') }}">
	<meta name="keywords" content="{{ $branding['meta_keywords'] ?? '' }}">
	<!-- Page Title -->
	<title>{{ $page->seo['meta_title'] ?? ($page->title . ' | ' . ($branding['site_name'] ?? 'Nigeria')) }}</title>

	<!-- Open Graph -->
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ $page->seo['meta_title'] ?? $page->title }}">
	<meta property="og:description" content="{{ $page->seo['meta_description'] ?? '' }}">
	<meta property="og:image" content="{{ $page->seo['og_image'] ? url($page->seo['og_image']) : asset('themes/nigeria/img/hero-bg-1.jpg') }}">
	<meta property="og:url" content="{{ url()->current() }}">

    <!-- Favicon Icon -->
  	<link rel="icon" href="{{ asset('themes/nigeria/img/favicon.png') }}">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('themes/nigeria/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('themes/nigeria/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('themes/nigeria/css/branding.css') }}">
	<link rel="stylesheet" href="{{ asset('themes/nigeria/css/custom.css') }}">
	<!-- Modernizr -->
	<script src="{{ asset('themes/nigeria/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    {{-- Live brand variables: set on :root so branding.css overrides follow the dashboard. --}}
    <style>
        :root {
            --brand-primary: {{ $branding['primary_color'] ?? '#f71089' }};
            --brand-secondary: {{ $branding['secondary_color'] ?? '#ff269e' }};
        }
    </style>
  </head>

  <body>
    <!-- Start Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

	<!-- Start Site Header -->
    <header class="site-header">
      <div class="container header-wrap">
          <div class="site-branding">
            @if (! empty($branding['logo']))
                <a href="{{ url('/') }}" class="custom-logo-link">
                    <img src="{{ \App\Themes\BlockRegistry::imageUrl($branding['logo']) }}" alt="{{ $branding['site_name'] ?? '' }}" class="custom-logo" style="max-height:60px;max-width:200px;">
                </a>
            @else
                <span class="site-title">
                    <a href="{{ url('/') }}">{{ strtoupper($branding['site_name'] ?? 'NIGERIA') }}</a>
                </span>
            @endif
          </div>
          <nav class="primary-nav">
            <ul class="primary-nav-list nav">
                @forelse ($navItems as $item)
                    <li class="menu-item">
                        <a href="{{ $item['url'] }}">{{ strtoupper($item['label']) }}</a>
                    </li>
                @empty
                    <li class="menu-item"><a href="#home">HOME</a></li>
                    <li class="menu-item"><a href="#about">ABOUT</a></li>
                    <li class="menu-item"><a href="#service">SERVICE</a></li>
                    <li class="menu-item"><a href="#cause">CAUSES</a></li>
                    <li class="menu-item"><a href="#gallery">GALLERY</a></li>
                    <li class="menu-item"><a href="#event">EVENT</a></li>
                    <li class="menu-item"><a href="#blog">NEWS</a></li>
                    <li class="menu-item"><a href="#contact">CONTACT</a></li>
                @endforelse
            </ul>
          </nav>
      </div><!-- .header-wrap -->
    </header>
	<!-- End Site Header -->

    {!! $content !!}

    <!-- Start Footer -->
    <footer class="site-footer section black-bg text-center">
        <div class="container">
            <p class="copy-right">{{ $branding['footer_text'] ?? 'Copyright 2026. All Rights Reserved.' }}</p>
            <div class="social-btn">
                @if (! empty($branding['social_facebook']))<a href="{{ $branding['social_facebook'] }}"><i class="fa fa-facebook"></i></a>@endif
                @if (! empty($branding['social_twitter']))<a href="{{ $branding['social_twitter'] }}"><i class="fa fa-twitter"></i></a>@endif
                @if (! empty($branding['social_linkedin']))<a href="{{ $branding['social_linkedin'] }}"><i class="fa fa-linkedin"></i></a>@endif
                @if (! empty($branding['social_behance']))<a href="{{ $branding['social_behance'] }}"><i class="fa fa-behance"></i></a>@endif
                @if (empty($branding['social_facebook']) && empty($branding['social_twitter']) && empty($branding['social_linkedin']) && empty($branding['social_behance']))
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                @endif
            </div>
        </div>
    </footer>
    <!-- End Footer -->

	<!-- Scripts -->
	<script src="{{ asset('themes/nigeria/js/vendor/jquery-3.2.0.min.js') }}"></script>
	<script src="{{ asset('themes/nigeria/js/plugins.js') }}"></script>
	<script src="{{ asset('themes/nigeria/js/main.js') }}"></script>
  </body>
</html>
