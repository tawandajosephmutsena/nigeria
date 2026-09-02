<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollectionItem extends Model
{
    protected $fillable = [
        'collection_id',
        'title',
        'slug',
        'status',
        'data',
        'sort',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    /** @return BelongsTo<Collection, $this> */
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function getDataValue(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }
}
