<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_default',
        'is_active',
        'config',
    ];

    protected function casts(): array
    {
        return [
            'config' => 'array',
            'is_default' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /** @return HasMany<Page, $this> */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    /** Make this the site's default theme (all others lose the flag). */
    public function setDefault(): void
    {
        static::query()->whereKeyNot($this->getKey())->update(['is_default' => false]);

        $this->forceFill(['is_default' => true])->save();
    }
}
