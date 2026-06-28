<?php

namespace App\Filament\Resources\Industrias;

use App\Filament\Resources\Industrias\Pages\CreateIndustria;
use App\Filament\Resources\Industrias\Pages\EditIndustria;
use App\Filament\Resources\Industrias\Pages\ListIndustrias;
use App\Filament\Resources\Industrias\Schemas\IndustriaForm;
use App\Filament\Resources\Industrias\Tables\IndustriasTable;
use App\Filament\Resources\Industrias\RelationManagers\DetalleIndustriasRelationManager;
use App\Models\Industria;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IndustriaResource extends Resource
{
    protected static ?string $model = Industria::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static ?int $navigationSort = 15;

    protected static string|UnitEnum|null $navigationGroup = 'Aplicaciones y Servicios';

    public static function getNavigationLabel(): string
    {
        return 'Industrias / Aplicaciones';
    }

    public static function getModelLabel(): string
    {
        return 'Industria';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Industrias';
    }

    public static function form(Schema $schema): Schema
    {
        return IndustriaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IndustriasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            DetalleIndustriasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIndustrias::route('/'),
            'create' => CreateIndustria::route('/create'),
            'edit' => EditIndustria::route('/{record}/edit'),
        ];
    }
}
