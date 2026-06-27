<?php

namespace App\Filament\Resources\TipoMedidas;

use App\Filament\Resources\TipoMedidas\Pages\CreateTipoMedida;
use App\Filament\Resources\TipoMedidas\Pages\EditTipoMedida;
use App\Filament\Resources\TipoMedidas\Pages\ListTipoMedidas;
use App\Filament\Resources\TipoMedidas\Schemas\TipoMedidaForm;
use App\Filament\Resources\TipoMedidas\Tables\TipoMedidasTable;
use App\Models\TipoMedida;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TipoMedidaResource extends Resource
{
    protected static ?string $model = TipoMedida::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPencil;

    protected static ?int $navigationSort = 22;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Tipos de Medida';
    }

    public static function getModelLabel(): string
    {
        return 'Tipo de Medida';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Tipos de Medida';
    }

    public static function form(Schema $schema): Schema
    {
        return TipoMedidaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipoMedidasTable::configure($table);
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
            'index' => ListTipoMedidas::route('/'),
            'create' => CreateTipoMedida::route('/create'),
            'edit' => EditTipoMedida::route('/{record}/edit'),
        ];
    }
}
