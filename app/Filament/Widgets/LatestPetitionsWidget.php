<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Website\PetitionResource;
use App\Models\PetitionSigner;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPetitionsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Recent Petition Signatures';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                PetitionSigner::query()
                    ->latest()
                    ->limit(6)
            )
            ->columns([
                TextColumn::make('name')
                    ->weight('bold')
                    ->description(fn (PetitionSigner $record) => $record->email),
                TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'policymaker' => 'danger',
                        'healthcare_worker' => 'info',
                        default => 'success',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'policymaker' => 'Policymaker',
                        'healthcare_worker' => 'Healthcare Professional',
                        default => 'Citizen',
                    }),
                TextColumn::make('state')
                    ->label('State')
                    ->placeholder('—'),
                TextColumn::make('comment')
                    ->label('Statement')
                    ->limit(45)
                    ->placeholder('—')
                    ->wrap(),
                IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->since(),
            ])
            ->recordUrl(fn (PetitionSigner $record) => PetitionResource::getUrl('index'));
    }
}
