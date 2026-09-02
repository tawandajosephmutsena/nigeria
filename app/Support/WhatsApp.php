<?php

namespace App\Support;

use App\Models\Theme;

/**
 * WhatsApp helpers for the "conversation flow": every lead from the website
 * can be answered directly on WhatsApp from the admin panel.
 */
class WhatsApp
{
    /** The business number messages are forwarded to (default: Ottomate). */
    public static function number(): string
    {
        $config = Theme::query()->where('is_default', true)->value('config') ?? [];

        return data_get($config, 'whatsapp_number') ?: config('services.whatsapp.number', '+263773699063');
    }

    /** Digits only, no + or spaces — the format wa.me links need. */
    public static function digits(?string $number = null): string
    {
        return preg_replace('/\D/', '', $number ?: static::number()) ?: '';
    }

    /** A wa.me deep link with an optional pre-filled message. */
    public static function chatLink(string $text = '', ?string $number = null): string
    {
        $link = 'https://wa.me/' . static::digits($number);

        return $text !== '' ? $link . '?text=' . rawurlencode($text) : $link;
    }
}
