<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManageStories;
use App\Models\Story;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

/**
 * Community stories with an admin approval workflow:
 * pending → approved (published) | rejected (with review note).
 *
 * @extends \Filament\Resources\Resource<Story>
 */
class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $slug = 'website/stories';

    protected static ?string $recordTitleAttribute = 'title';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Story')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Story::class, 'slug', ignoreRecord: true),
                            ]),
                        Textarea::make('excerpt')
                            ->rows(2)
                            ->maxLength(300),
                        RichEditor::make('body')
                            ->required()
                            ->columnSpanFull(),
                        Grid::make(3)
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->directory('stories')
                                    ->visibility('public'),
                                Select::make('status')
                                    ->options([
                                        'pending' => 'Pending review',
                                        'approved' => 'Approved',
                                        'rejected' => 'Rejected',
                                    ])
                                    ->default('pending')
                                    ->required(),
                                Toggle::make('featured')
                                    ->label('Featured story')
                                    ->default(false),
                            ]),
                        Textarea::make('review_note')
                            ->label('Review note (shown to the author)')
                            ->rows(2)
                            ->placeholder('Why was this rejected?'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (Story $record) => $record->author?->name ?? 'Anonymous'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'warning',
                    }),
                IconColumn::make('featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedStar)
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending review',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->recordActions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon(Heroicon::OutlinedCheckCircle)
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Story $record) => $record->status !== 'approved')
                    ->action(function (Story $record): void {
                        $record->update([
                            'status' => Story::STATUS_APPROVED,
                            'published_at' => $record->published_at ?? now(),
                        ]);
                        Notification::make()->title('Story approved and published')->success()->send();
                    }),
                Action::make('reject')
                    ->label('Reject')
                    ->icon(Heroicon::OutlinedXCircle)
                    ->color('danger')
                    ->visible(fn (Story $record) => $record->status !== 'rejected')
                    ->schema([
                        Textarea::make('review_note')
                            ->label('Reason (shown to the author)')
                            ->required()
                            ->rows(2),
                    ])
                    ->action(function (Story $record, array $data): void {
                        $record->update([
                            'status' => Story::STATUS_REJECTED,
                            'review_note' => $data['review_note'] ?? null,
                        ]);
                        Notification::make()->title('Story rejected')->danger()->send();
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageStories::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'excerpt'];
    }
}
