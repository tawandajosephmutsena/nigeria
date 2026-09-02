<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\PetitionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePetitions extends ManageRecords
{
    protected static string $resource = PetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
