<?php

namespace App\Filament\Resources\Suscriptors;

use App\Filament\Resources\Suscriptors\Pages\CreateSuscriptor;
use App\Filament\Resources\Suscriptors\Pages\EditSuscriptor;
use App\Filament\Resources\Suscriptors\Pages\ListSuscriptors;
use App\Filament\Resources\Suscriptors\Pages\ViewSuscriptor;
use App\Filament\Resources\Suscriptors\Schemas\SuscriptorForm;
use App\Filament\Resources\Suscriptors\Tables\SuscriptorsTable;
use App\Models\Suscriptor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SuscriptorResource extends Resource
{
    protected static ?string $model = Suscriptor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelopeOpen;

    protected static ?int $navigationSort = 14;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunicación';

    public static function getNavigationLabel(): string
    {
        return 'Suscriptores Newsletter';
    }

    public static function getModelLabel(): string
    {
        return 'Suscriptor';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Suscriptores';
    }

    public static function form(Schema $schema): Schema
    {
        return SuscriptorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuscriptorsTable::configure($table);
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
            'index' => ListSuscriptors::route('/'),
            'view' => ViewSuscriptor::route('/{record}'),
        ];
    }

    // Badge con el número de suscriptores activos
    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('estado', 'activo')->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}
