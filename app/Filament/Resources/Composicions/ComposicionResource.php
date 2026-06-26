<?php

namespace App\Filament\Resources\Composicions;

use App\Filament\Resources\Composicions\Pages\CreateComposicion;
use App\Filament\Resources\Composicions\Pages\EditComposicion;
use App\Filament\Resources\Composicions\Pages\ListComposicions;
use App\Filament\Resources\Composicions\Schemas\ComposicionForm;
use App\Filament\Resources\Composicions\Tables\ComposicionsTable;
use App\Models\Composicion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ComposicionResource extends Resource
{
    protected static ?string $model = Composicion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;

    protected static ?int $navigationSort = 20;

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo de Productos';

    public static function getNavigationLabel(): string
    {
        return 'Composiciones';
    }

    public static function getModelLabel(): string
    {
        return 'Composición';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Composiciones';
    }

    public static function form(Schema $schema): Schema
    {
        return ComposicionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComposicionsTable::configure($table);
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
            'index' => ListComposicions::route('/'),
            'create' => CreateComposicion::route('/create'),
            'edit' => EditComposicion::route('/{record}/edit'),
        ];
    }
}
