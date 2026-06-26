<?php

namespace App\Filament\Resources\GamaProductos;

use App\Filament\Resources\GamaProductos\Pages\CreateGamaProducto;
use App\Filament\Resources\GamaProductos\Pages\EditGamaProducto;
use App\Filament\Resources\GamaProductos\Pages\ListGamaProductos;
use App\Filament\Resources\GamaProductos\Schemas\GamaProductoForm;
use App\Filament\Resources\GamaProductos\Tables\GamaProductosTable;
use App\Models\GamaProducto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GamaProductoResource extends Resource
{
    protected static ?string $model = GamaProducto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?int $navigationSort = 18;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Gamas de Producto';
    }

    public static function getModelLabel(): string
    {
        return 'Gama';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Gamas';
    }

    public static function form(Schema $schema): Schema
    {
        return GamaProductoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GamaProductosTable::configure($table);
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
            'index' => ListGamaProductos::route('/'),
            'create' => CreateGamaProducto::route('/create'),
            'edit' => EditGamaProducto::route('/{record}/edit'),
        ];
    }
}
