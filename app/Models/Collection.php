<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'fields',
        'settings',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'fields' => 'array',
            'settings' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /** @return HasMany<CollectionItem, $this> */
    public function items(): HasMany
    {
        return $this->hasMany(CollectionItem::class);
    }

    /** @return HasMany<CollectionItem, $this> */
    public function publishedItems(): HasMany
    {
        return $this->items()->where('status', 'published');
    }
}
