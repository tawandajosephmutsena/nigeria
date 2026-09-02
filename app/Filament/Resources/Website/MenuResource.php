<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManageMenus;
use App\Models\Menu;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

/**
 * @extends \Filament\Resources\Resource<Menu>
 */
class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $slug = 'website/menus';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Menu')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Menu::class, 'slug', ignoreRecord: true),

                                Select::make('location')
                                    ->options([
                                        'header' => 'Header (main navigation)',
                                        'footer' => 'Footer',
                                    ])
                                    ->default('header'),
                            ]),
                    ]),

                Section::make('Menu items')
                    ->description('These items appear in the site navigation — add, reorder or nest them freely.')
                    ->schema([
                        Repeater::make('items')
                            ->label('Items')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),
                                        TextInput::make('url')
                                            ->label('URL')
                                            ->placeholder('#about, /stories, https://…')
                                            ->required(),
                                    ]),
                                Repeater::make('children')
                                    ->label('Children')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('label')->label('Label')->required(),
                                                TextInput::make('url')->label('URL')->placeholder('#contact')->required(),
                                            ]),
                                    ])
                                    ->collapsible()
                                    ->collapsed()
                                    ->columns(1),
                            ])
                            ->collapsible()
                            ->reorderableWithDragAndDrop(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                TextColumn::make('location')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'header' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('items')
                    ->label('Items')
                    ->state(fn (Menu $record) => is_countable($record->items) ? count($record->items) : 0),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
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
            'index' => ManageMenus::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
