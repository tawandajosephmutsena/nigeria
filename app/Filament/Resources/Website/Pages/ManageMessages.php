<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\MessageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageMessages extends ManageRecords
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
