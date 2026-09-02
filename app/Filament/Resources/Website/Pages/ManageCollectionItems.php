<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\CollectionItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCollectionItems extends ManageRecords
{
    protected static string $resource = CollectionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
