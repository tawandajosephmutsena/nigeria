<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\PageResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    public function getMaxContentWidth(): Width | string | null
    {
        return Width::Full;
    }
}
