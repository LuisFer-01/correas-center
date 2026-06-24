<?php

namespace App\Filament\Resources\CapacidadInfraestructuras;

use App\Filament\Resources\CapacidadInfraestructuras\Pages\CreateCapacidadInfraestructura;
use App\Filament\Resources\CapacidadInfraestructuras\Pages\EditCapacidadInfraestructura;
use App\Filament\Resources\CapacidadInfraestructuras\Pages\ListCapacidadInfraestructuras;
use App\Filament\Resources\CapacidadInfraestructuras\Schemas\CapacidadInfraestructuraForm;
use App\Filament\Resources\CapacidadInfraestructuras\Tables\CapacidadInfraestructurasTable;
use App\Models\CapacidadInfraestructura;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CapacidadInfraestructuraResource extends Resource
{
    protected static ?string $model = CapacidadInfraestructura::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;

    protected static ?int $navigationSort = 8;

    protected static string|UnitEnum|null $navigationGroup = 'Landing Page';

    public static function getNavigationLabel(): string
    {
        return 'Capacidades de Infraestructura';
    }

    public static function getModelLabel(): string
    {
        return 'Capacidad';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Capacidades';
    }

    public static function form(Schema $schema): Schema
    {
        return CapacidadInfraestructuraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapacidadInfraestructurasTable::configure($table);
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
            'index' => ListCapacidadInfraestructuras::route('/'),
            'create' => CreateCapacidadInfraestructura::route('/create'),
            'edit' => EditCapacidadInfraestructura::route('/{record}/edit'),
        ];
    }
}
