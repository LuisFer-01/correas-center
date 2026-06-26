<?php

namespace App\Filament\Resources\Aplicacions;

use App\Filament\Resources\Aplicacions\Pages\CreateAplicacion;
use App\Filament\Resources\Aplicacions\Pages\EditAplicacion;
use App\Filament\Resources\Aplicacions\Pages\ListAplicacions;
use App\Filament\Resources\Aplicacions\Schemas\AplicacionForm;
use App\Filament\Resources\Aplicacions\Tables\AplicacionsTable;
use App\Models\Aplicacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AplicacionResource extends Resource
{
    protected static ?string $model = Aplicacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;

    protected static ?int $navigationSort = 21;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Aplicaciones';
    }

    public static function getModelLabel(): string
    {
        return 'Aplicación';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Aplicaciones';
    }

    public static function form(Schema $schema): Schema
    {
        return AplicacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AplicacionsTable::configure($table);
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
            'index' => ListAplicacions::route('/'),
            'create' => CreateAplicacion::route('/create'),
            'edit' => EditAplicacion::route('/{record}/edit'),
        ];
    }
}
