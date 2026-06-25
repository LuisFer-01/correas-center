<?php

namespace App\Filament\Resources\PorqueElegirnos;

use App\Filament\Resources\PorqueElegirnos\Pages\CreatePorqueElegirnos;
use App\Filament\Resources\PorqueElegirnos\Pages\EditPorqueElegirnos;
use App\Filament\Resources\PorqueElegirnos\Pages\ListPorqueElegirnos;
use App\Filament\Resources\PorqueElegirnos\Schemas\PorqueElegirnosForm;
use App\Filament\Resources\PorqueElegirnos\Tables\PorqueElegirnosTable;
use App\Models\PorqueElegirnos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PorqueElegirnosResource extends Resource
{
    protected static ?string $model = PorqueElegirnos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckBadge;

    protected static ?int $navigationSort = 12;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunicación';

    public static function getNavigationLabel(): string
    {
        return 'Por Qué Elegirnos';
    }

    public static function getModelLabel(): string
    {
        return 'Elemento';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Por Qué Elegirnos';
    }

    public static function form(Schema $schema): Schema
    {
        return PorqueElegirnosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PorqueElegirnosTable::configure($table);
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
            'index' => ListPorqueElegirnos::route('/'),
            'create' => CreatePorqueElegirnos::route('/create'),
            'edit' => EditPorqueElegirnos::route('/{record}/edit'),
        ];
    }
}
