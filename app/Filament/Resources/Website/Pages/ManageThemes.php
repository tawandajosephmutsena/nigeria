<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\ThemeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageThemes extends ManageRecords
{
    protected static string $resource = ThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
