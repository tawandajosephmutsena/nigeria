<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\PageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    public function getMaxContentWidth(): Width | string | null
    {
        return Width::Full;
    }

    public function content(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(3)
                    ->schema([
                        \Filament\Schemas\Components\Group::make([
                            $this->getFormContentComponent(),
                        ])->columnSpan(1),

                        \Filament\Schemas\Components\Group::make([
                            \Filament\Schemas\Components\View::make('filament.components.page-preview'),
                        ])
                        ->columnSpan(2)
                        ->extraAttributes([
                            'class' => 'sticky top-6',
                            'style' => 'align-self: start; z-index: 10;',
                        ]),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
