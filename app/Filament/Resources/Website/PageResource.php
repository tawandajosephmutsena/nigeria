<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\CreatePage;
use App\Filament\Resources\Website\Pages\EditPage;
use App\Filament\Resources\Website\Pages\ListPages;
use App\Models\Page;
use App\Models\Theme;
use App\Themes\BlockRegistry;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $slug = 'website/pages';

    protected static ?string $recordTitleAttribute = 'title';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Page Settings')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Page::class, 'slug', ignoreRecord: true),

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),

                        Select::make('theme_id')
                            ->label('Theme')
                            ->options(fn () => Theme::query()->pluck('name', 'id'))
                            ->placeholder('Default theme'),

                        DateTimePicker::make('published_at')
                            ->label('Published at'),
                    ]),

                Section::make('Page Builder Components')
                    ->description('Drag & drop blocks to compose your page layout.')
                    ->schema([
                        Builder::make('blocks')
                            ->label('Content Blocks')
                            ->blocks(BlockRegistry::filamentBlocks())
                            ->collapsible()
                            ->reorderableWithDragAndDrop()
                            ->blockNumbers(false)
                            ->required(),
                    ]),

                Section::make('SEO & Social Share')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextInput::make('seo.meta_title')
                            ->label('Meta title')
                            ->maxLength(70),
                        TextInput::make('seo.meta_description')
                            ->label('Meta description')
                            ->maxLength(160),
                        FileUpload::make('seo.og_image')
                            ->label('Open Graph image')
                            ->image()
                            ->directory('seo')
                            ->visibility('public'),
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
                    ->description(fn (Page $record) => '/' . ($record->slug === 'home' ? '' : $record->slug)),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        default => 'warning',
                    }),
                TextColumn::make('blocks')
                    ->label('Blocks')
                    ->state(fn (Page $record) => is_countable($record->blocks) ? count($record->blocks) : 0),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
            ])
            ->recordActions([
                Action::make('preview')
                    ->label('Live Preview')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn (Page $record) => url('/' . ($record->slug === 'home' ? '' : $record->slug)))
                    ->openUrlInNewTab(),
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug'];
    }
}
