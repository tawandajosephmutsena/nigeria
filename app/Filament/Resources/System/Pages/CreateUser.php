<?php

namespace App\Filament\Resources\System\Pages;

use App\Filament\Resources\System\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
