<?php

namespace App\Themes;

use App\Models\Page;
use App\Models\Theme;
use Illuminate\Support\Facades\View;

/**
 * Renders pages by walking their block instances and delegating each
 * block to the active theme's Blade views:
 *
 *   resources/views/themes/{theme}/blocks/{type}.blade.php
 *
 * Block data stored by the page builder (Filament Builder format):
 *   [['type' => 'hero', 'data' => [...]], ...]
 */
class ThemeRenderer
{
    public static function renderPage(Page $page): string
    {
        $theme = $page->theme ?? Theme::where('is_default', true)->first();
        $slug = $theme?->slug ?? 'nigeria';

        $blocks = is_array($page->blocks) ? $page->blocks : [];

        $html = '';
        foreach ($blocks as $block) {
            $html .= static::renderBlock($slug, $block);
        }

        return $html;
    }

    public static function renderBlock(string $themeSlug, array $block): string
    {
        $type = $block['type'] ?? 'spacer';
        $definition = BlockRegistry::get($type);

        if ($definition === null) {
            return '';
        }

        $props = BlockRegistry::mergeProps($type, $block['data'] ?? []);
        $view = "themes.{$themeSlug}.blocks.{$type}";

        if (! View::exists($view)) {
            return '';
        }

        return view($view, [
            'props' => $props,
            'block' => $block,
        ])->render();
    }

    /** Themes that ship with this application. */
    public static function availableThemes(): array
    {
        $themes = [];

        foreach (glob(resource_path('views/themes/*')) as $dir) {
            $slug = basename($dir);
            $themes[$slug] = $slug;
        }

        return $themes;
    }

    /** Where a theme's public assets (css/js/img) live. */
    public static function assetPath(string $themeSlug, string $path): string
    {
        return "/themes/{$themeSlug}/" . ltrim($path, '/');
    }
}
