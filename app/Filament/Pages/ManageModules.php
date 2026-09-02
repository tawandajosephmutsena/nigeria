<?php

namespace App\Filament\Pages;

use App\Services\ModuleRegistry;
use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use UnitEnum;

class ManageModules extends Page
{
    protected static ?string $slug = 'settings/modules';

    protected static ?string $title = 'Super Admin — Module Control';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cpu-chip';

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 99;

    protected string $view = 'filament.pages.manage-modules';

    public array $modules = [];

    public function mount(): void
    {
        $this->modules = ModuleRegistry::getActiveModules();
    }

    public function save(): void
    {
        ModuleRegistry::saveAll($this->modules);

        Notification::make()
            ->title('Module Settings Saved')
            ->body('Navigation menu groups and features have been updated.')
            ->success()
            ->send();

        $this->js('window.location.reload()');
    }
}
