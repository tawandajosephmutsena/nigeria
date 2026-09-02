<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManageMessages;
use App\Models\ContactMessage;
use App\Support\WhatsApp;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use UnitEnum;

/**
 * Inbox for contact form submissions. Each message can be answered in one
 * click on WhatsApp — the site's conversation flow.
 *
 * @extends \Filament\Resources\Resource<ContactMessage>
 */
class MessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $slug = 'website/messages';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Messages';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Message')
                    ->schema([
                        TextInput::make('name')->disabled(),
                        TextInput::make('email')->disabled(),
                        TextInput::make('phone')->disabled(),
                        TextInput::make('subject')->disabled(),
                        Textarea::make('message')->disabled()->rows(6),
                        Toggle::make('read')->label('Marked as read'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('read')
                    ->label('')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedEnvelopeOpen)
                    ->falseIcon(Heroicon::OutlinedEnvelope)
                    ->color(fn (bool $state) => $state ? 'gray' : 'info')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->weight('medium')
                    ->description(fn (ContactMessage $record) => $record->email),
                TextColumn::make('phone')
                    ->searchable()
                    ->placeholder('—'),
                TextColumn::make('subject')
                    ->limit(30)
                    ->placeholder('—'),
                TextColumn::make('message')
                    ->limit(40)
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                Action::make('reply_whatsapp')
                    ->label('Reply on WhatsApp')
                    ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                    ->color('success')
                    ->url(fn (ContactMessage $record): string => WhatsApp::chatLink(
                        "Hello {$record->name}! Thank you for your message" .
                        ($record->subject ? " “{$record->subject}”" : '') .
                        " about the Nigeria website. We'd love to help — how can we assist?"
                    ))
                    ->openUrlInNewTab(),
                Action::make('toggle_read')
                    ->label(fn (ContactMessage $record) => $record->read ? 'Mark unread' : 'Mark read')
                    ->icon(fn (ContactMessage $record) => $record->read ? Heroicon::OutlinedEnvelope : Heroicon::OutlinedEnvelopeOpen)
                    ->action(function (ContactMessage $record): void {
                        $record->update(['read' => ! $record->read]);
                        Notification::make()
                            ->title($record->read ? 'Marked as read' : 'Marked as unread')
                            ->success()
                            ->send();
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Action::make('mark_read')
                    ->label('Mark read')
                    ->icon(Heroicon::OutlinedEnvelopeOpen)
                    ->action(fn (Collection $records) => $records->each->update(['read' => true])),
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageMessages::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'phone', 'subject', 'message'];
    }
}
