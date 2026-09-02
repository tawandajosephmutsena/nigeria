<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'icon',
        'schema',
        'default_props',
        'settings',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'schema' => 'array',
            'default_props' => 'array',
            'settings' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
