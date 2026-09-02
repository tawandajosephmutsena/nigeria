<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\Pages\ManagePetitions;
use App\Models\PetitionSigner;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class PetitionResource extends Resource
{
    protected static ?string $model = PetitionSigner::class;

    protected static ?string $slug = 'website/petitions';

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Website';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedPencilSquare;

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Signer Details')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->tel()
                                ->maxLength(50),
                            TextInput::make('state')
                                ->label('State / Location')
                                ->maxLength(100),
                            Select::make('role')
                                ->options([
                                    'citizen' => 'Citizen',
                                    'healthcare_worker' => 'Healthcare Worker',
                                    'policymaker' => 'Policymaker / Leader',
                                ])
                                ->required(),
                            Toggle::make('is_verified')
                                ->label('Verified Signature')
                                ->default(true),
                        ]),
                        Textarea::make('comment')
                            ->label('Personal Statement / Note to Lawmakers')
                            ->rows(3),
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
                    ->weight('bold'),
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
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('state')
                    ->label('State')
                    ->searchable()
                    ->placeholder('—'),
                IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Signed At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'citizen' => 'Citizen',
                        'healthcare_worker' => 'Healthcare Professional',
                        'policymaker' => 'Policymaker',
                    ]),
                SelectFilter::make('state')
                    ->options(fn () => PetitionSigner::query()->whereNotNull('state')->pluck('state', 'state')->all()),
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
            'index' => ManagePetitions::route('/'),
        ];
    }
}
