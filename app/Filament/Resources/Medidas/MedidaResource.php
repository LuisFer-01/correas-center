<?php

namespace App\Filament\Resources\Medidas;

use App\Filament\Resources\Medidas\Pages\CreateMedida;
use App\Filament\Resources\Medidas\Pages\EditMedida;
use App\Filament\Resources\Medidas\Pages\ListMedidas;
use App\Filament\Resources\Medidas\Schemas\MedidaForm;
use App\Filament\Resources\Medidas\Tables\MedidasTable;
use App\Models\Medida;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MedidaResource extends Resource
{
    protected static ?string $model = Medida::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsPointingOut;

    protected static ?int $navigationSort = 23;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Medidas';
    }

    public static function getModelLabel(): string
    {
        return 'Medida';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Medidas';
    }

    public static function form(Schema $schema): Schema
    {
        return MedidaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedidasTable::configure($table);
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
            'index' => ListMedidas::route('/'),
            'create' => CreateMedida::route('/create'),
            'edit' => EditMedida::route('/{record}/edit'),
        ];
    }
}
