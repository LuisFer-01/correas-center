<?php

namespace App\Filament\Resources\Registros;

use App\Filament\Resources\Registros\Pages\CreateRegistro;
use App\Filament\Resources\Registros\Pages\EditRegistro;
use App\Filament\Resources\Registros\Pages\ListRegistros;
use App\Filament\Resources\Registros\RelationManagers\DetalleRegistrosRelationManager;
use App\Filament\Resources\Registros\Schemas\RegistroForm;
use App\Filament\Resources\Registros\Tables\RegistrosTable;
use App\Models\Registro;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RegistroResource extends Resource
{
    protected static ?string $model = Registro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?int $navigationSort = 10;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunicación';

    public static function getNavigationLabel(): string
    {
        return 'Secciones del About';
    }

    public static function getModelLabel(): string
    {
        return 'Sección';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Secciones';
    }

    public static function form(Schema $schema): Schema
    {
        return RegistroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegistrosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            DetalleRegistrosRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRegistros::route('/'),
            'create' => CreateRegistro::route('/create'),
            'edit' => EditRegistro::route('/{record}/edit'),
        ];
    }
}
