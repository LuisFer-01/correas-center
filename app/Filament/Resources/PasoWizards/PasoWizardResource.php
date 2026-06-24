<?php

namespace App\Filament\Resources\PasoWizards;

use App\Filament\Resources\PasoWizards\Pages\CreatePasoWizard;
use App\Filament\Resources\PasoWizards\Pages\EditPasoWizard;
use App\Filament\Resources\PasoWizards\Pages\ListPasoWizards;
use App\Filament\Resources\PasoWizards\Schemas\PasoWizardForm;
use App\Filament\Resources\PasoWizards\Tables\PasoWizardsTable;
use App\Models\PasoWizard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PasoWizardResource extends Resource
{
    protected static ?string $model = PasoWizard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static ?int $navigationSort = 9;

    protected static string|UnitEnum|null $navigationGroup = 'Landing Page';

    public static function getNavigationLabel(): string
    {
        return 'Pasos del Product Selector';
    }

    public static function getModelLabel(): string
    {
        return 'Paso Wizard';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pasos Wizard';
    }

    public static function form(Schema $schema): Schema
    {
        return PasoWizardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PasoWizardsTable::configure($table);
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
            'index' => ListPasoWizards::route('/'),
            'create' => CreatePasoWizard::route('/create'),
            'edit' => EditPasoWizard::route('/{record}/edit'),
        ];
    }
}
