<?php

namespace App\Filament\Widgets;

use App\Models\Story;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentCommentsAndStoriesWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Recent Community Stories & Comments';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Story::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('title')
                    ->weight('bold')
                    ->description(fn (Story $record) => $record->excerpt),
                TextColumn::make('author.name')
                    ->label('Author')
                    ->placeholder('Community Member'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'warning',
                    }),
                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->since(),
            ])
            ->actions([
                Action::make('review')
                    ->label('Review Story')
                    ->url('/admin/stories'),
            ]);
    }
}
