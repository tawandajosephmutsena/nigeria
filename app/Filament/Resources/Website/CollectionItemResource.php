<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManageCollectionItems;
use App\Models\Collection;
use App\Models\CollectionItem;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

/**
 * Items belonging to a collection — each can carry arbitrary data
 * (image, title, description, link…) rendered by the collection block.
 *
 * @extends \Filament\Resources\Resource<CollectionItem>
 */
class CollectionItemResource extends Resource
{
    protected static ?string $model = CollectionItem::class;

    protected static ?string $slug = 'website/collection-items';

    protected static ?string $recordTitleAttribute = 'title';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentDuplicate;

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Item')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('collection_id')
                                    ->label('Collection')
                                    ->options(fn () => Collection::query()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),

                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(CollectionItem::class, 'slug', ignoreRecord: true),

                                Select::make('status')
                                    ->options([
                                        'published' => 'Published',
                                        'draft' => 'Draft',
                                    ])
                                    ->default('published'),
                            ]),
                        FileUpload::make('data.image')
                            ->label('Image')
                            ->image()
                            ->directory('collections')
                            ->visibility('public'),
                        KeyValue::make('data')
                            ->label('Extra fields')
                            ->keyLabel('Field')
                            ->valueLabel('Value')
                            ->addActionLabel('Add field'),
                        TextInput::make('sort')
                            ->label('Sort order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('collection.name')
                    ->label('Collection')
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'published' ? 'success' : 'warning'),
                TextColumn::make('sort')
                    ->label('Order')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('collection_id')
                    ->label('Collection')
                    ->options(fn () => Collection::query()->pluck('name', 'id')),
            ])
            ->defaultSort('collection_id')
            ->reorderable('sort')
            ->recordActions([
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
            'index' => ManageCollectionItems::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
