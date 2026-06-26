<?php

namespace App\Filament\Resources\Caracteristicas;

use App\Filament\Resources\Caracteristicas\Pages\CreateCaracteristica;
use App\Filament\Resources\Caracteristicas\Pages\EditCaracteristica;
use App\Filament\Resources\Caracteristicas\Pages\ListCaracteristicas;
use App\Filament\Resources\Caracteristicas\Schemas\CaracteristicaForm;
use App\Filament\Resources\Caracteristicas\Tables\CaracteristicasTable;
use App\Models\Caracteristica;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CaracteristicaResource extends Resource
{
    protected static ?string $model = Caracteristica::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?int $navigationSort = 19;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Características Técnicas';
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
        return CaracteristicaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaracteristicasTable::configure($table);
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
            'index' => ListCaracteristicas::route('/'),
            'create' => CreateCaracteristica::route('/create'),
            'edit' => EditCaracteristica::route('/{record}/edit'),
        ];
    }
}
