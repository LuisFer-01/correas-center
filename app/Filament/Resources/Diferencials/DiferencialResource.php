<?php

namespace App\Filament\Resources\Diferencials;

use App\Filament\Resources\Diferencials\Pages\CreateDiferencial;
use App\Filament\Resources\Diferencials\Pages\EditDiferencial;
use App\Filament\Resources\Diferencials\Pages\ListDiferencials;
use App\Filament\Resources\Diferencials\Schemas\DiferencialForm;
use App\Filament\Resources\Diferencials\Tables\DiferencialsTable;
use App\Models\Diferencial;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DiferencialResource extends Resource
{
    protected static ?string $model = Diferencial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static ?int $navigationSort = 6;

    protected static string|UnitEnum|null $navigationGroup = 'Landing Page';

    public static function getNavigationLabel(): string
    {
        return 'Diferenciales';
    }

    public static function getModelLabel(): string
    {
        return 'Diferencial';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Diferenciales';
    }

    public static function form(Schema $schema): Schema
    {
        return DiferencialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DiferencialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDiferencials::route('/'),
            'create' => CreateDiferencial::route('/create'),
            'edit' => EditDiferencial::route('/{record}/edit'),
        ];
    }
}
