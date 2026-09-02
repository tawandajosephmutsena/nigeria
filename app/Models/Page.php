<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $fillable = [
        'theme_id',
        'user_id',
        'title',
        'slug',
        'status',
        'blocks',
        'seo',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'blocks' => 'array',
            'seo' => 'array',
            'published_at' => 'datetime',
        ];
    }

    /** @return BelongsTo<Theme, $this> */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /** @return BelongsTo<User, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isPublished(): bool
    {
        return $this->status === 'published' && $this->published_at?->isPast();
    }

    public function getSeoAttribute(mixed $value): array
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        return array_merge([
            'meta_title' => null,
            'meta_description' => null,
            'og_image' => null,
        ], is_array($value) ? $value : []);
    }

    public function scopePublished($query)
    {
        return $query
            ->where('status', 'published')
            ->where(fn ($q) => $q->whereNull('published_at')->orWhere('published_at', '<=', now()));
    }
}
