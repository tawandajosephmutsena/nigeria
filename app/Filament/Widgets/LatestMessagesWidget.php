<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Website\MessageResource;
use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMessagesWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Latest website messages';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ContactMessage::query()
                    ->latest()
                    ->limit(8)
            )
            ->columns([
                IconColumn::make('read')
                    ->label('')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedEnvelopeOpen)
                    ->falseIcon(Heroicon::OutlinedEnvelope)
                    ->color(fn (bool $state) => $state ? 'gray' : 'info'),
                TextColumn::make('name')
                    ->weight('medium'),
                TextColumn::make('subject')
                    ->limit(30)
                    ->placeholder('—'),
                TextColumn::make('message')
                    ->limit(40)
                    ->wrap(),
                TextColumn::make('created_at')
                    ->since(),
            ])
            ->recordUrl(fn (ContactMessage $record) => MessageResource::getUrl('index'))
            ->actions([
                Action::make('open')
                    ->url(fn (ContactMessage $record) => MessageResource::getUrl('index')),
            ]);
    }
}
