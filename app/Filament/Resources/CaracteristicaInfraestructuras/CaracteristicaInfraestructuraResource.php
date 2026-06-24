<?php

namespace App\Filament\Resources\CaracteristicaInfraestructuras;

use App\Filament\Resources\CaracteristicaInfraestructuras\Pages\CreateCaracteristicaInfraestructura;
use App\Filament\Resources\CaracteristicaInfraestructuras\Pages\EditCaracteristicaInfraestructura;
use App\Filament\Resources\CaracteristicaInfraestructuras\Pages\ListCaracteristicaInfraestructuras;
use App\Filament\Resources\CaracteristicaInfraestructuras\Schemas\CaracteristicaInfraestructuraForm;
use App\Filament\Resources\CaracteristicaInfraestructuras\Tables\CaracteristicaInfraestructurasTable;
use App\Models\CaracteristicaInfraestructura;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CaracteristicaInfraestructuraResource extends Resource
{
    protected static ?string $model = CaracteristicaInfraestructura::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?int $navigationSort = 7;

    protected static string|UnitEnum|null $navigationGroup = 'Landing Page';

    public static function getNavigationLabel(): string
    {
        return 'Características de Infraestructura';
    }

    public static function getModelLabel(): string
    {
        return 'Característica';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Características';
    }

    public static function form(Schema $schema): Schema
    {
        return CaracteristicaInfraestructuraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaracteristicaInfraestructurasTable::configure($table);
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
            'index' => ListCaracteristicaInfraestructuras::route('/'),
            'create' => CreateCaracteristicaInfraestructura::route('/create'),
            'edit' => EditCaracteristicaInfraestructura::route('/{record}/edit'),
        ];
    }
}
