<?php

namespace App\Filament\Resources\Servicios;

use App\Filament\Resources\Servicios\Pages\CreateServicio;
use App\Filament\Resources\Servicios\Pages\EditServicio;
use App\Filament\Resources\Servicios\Pages\ListServicios;
use App\Filament\Resources\Servicios\Schemas\ServicioForm;
use App\Filament\Resources\Servicios\Tables\ServiciosTable;
use App\Models\Servicio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServicioResource extends Resource
{
    protected static ?string $model = Servicio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?int $navigationSort = 14;

    protected static string|UnitEnum|null $navigationGroup = 'Aplicaciones y Servicios';

    public static function getNavigationLabel(): string
    {
        return 'Servicios';
    }

    public static function getModelLabel(): string
    {
        return 'Servicio';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Servicios';
    }

    public static function form(Schema $schema): Schema
    {
        return ServicioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiciosTable::configure($table);
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
            'index' => ListServicios::route('/'),
            'create' => CreateServicio::route('/create'),
            'edit' => EditServicio::route('/{record}/edit'),
        ];
    }
}
