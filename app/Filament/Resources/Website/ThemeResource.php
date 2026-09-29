<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManageThemes;
use App\Models\Theme;
use App\Support\WhatsApp;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
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
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

/**
 * Branding & themes. The default theme drives the whole public site:
 * name, tagline, logo, colors, WhatsApp number, socials and footer.
 *
 * @extends \Filament\Resources\Resource<Theme>
 */
class ThemeResource extends Resource
{
    protected static ?string $model = Theme::class;

    protected static ?string $slug = 'website/branding';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPaintBrush;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Branding & Themes';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Theme')
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
                                    ->unique(Theme::class, 'slug', ignoreRecord: true),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Toggle::make('is_default')
                                    ->label('Default theme')
                                    ->helperText('The theme applied to the public website.')
                                    ->afterStateUpdated(fn (Toggle $component) => $component->getRecord()?->setDefault()),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                            ]),
                    ]),

                Section::make('Brand identity')
                    ->description('Name, logo and colors used across the website.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('config.site_name')
                                    ->label('Site name')
                                    ->maxLength(255),

                                TextInput::make('config.tagline')
                                    ->label('Tagline')
                                    ->maxLength(255),

                                FileUpload::make('config.logo')
                                    ->label('Logo')
                                    ->image()
                                    ->directory('branding')
                                    ->visibility('public'),

                                TextInput::make('config.whatsapp_number')
                                    ->label('WhatsApp number')
                                    ->placeholder('+234 915 068 4078')
                                    ->helperText('Where website messages / chats go. Current: ' . WhatsApp::number()),

                                ColorPicker::make('config.primary_color')
                                    ->label('Primary color'),

                                ColorPicker::make('config.secondary_color')
                                    ->label('Secondary color'),
                            ]),
                    ]),

                Section::make('Footer & socials')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextInput::make('config.footer_text')
                            ->label('Footer text')
                            ->maxLength(255),
                        TextInput::make('config.meta_description')
                            ->label('Default meta description')
                            ->maxLength(160),
                        KeyValue::make('config.socials')
                            ->label('Social links')
                            ->keyLabel('Platform')
                            ->valueLabel('URL'),
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
                    ->weight('medium')
                    ->description(fn (Theme $record) => $record->slug),
                IconColumn::make('is_default')
                    ->label('Default')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedStar)
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since()
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('set_default')
                    ->label('Make default')
                    ->icon(Heroicon::OutlinedStar)
                    ->color('warning')
                    ->visible(fn (Theme $record) => ! $record->is_default)
                    ->action(function (Theme $record): void {
                        $record->setDefault();
                        Notification::make()->title('Default theme updated')->success()->send();
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
            'index' => ManageThemes::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }
}
