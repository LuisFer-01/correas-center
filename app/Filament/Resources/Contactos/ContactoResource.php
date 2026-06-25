<?php

namespace App\Filament\Resources\Contactos;

use App\Filament\Resources\ContactoResource\Pages\ViewContacto;
use App\Filament\Resources\Contactos\Pages\CreateContacto;
use App\Filament\Resources\Contactos\Pages\EditContacto;
use App\Filament\Resources\Contactos\Pages\ListContactos;
use App\Filament\Resources\Contactos\Schemas\ContactoForm;
use App\Filament\Resources\Contactos\Tables\ContactosTable;
use App\Models\Contacto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContactoResource extends Resource
{
    protected static ?string $model = Contacto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack;

    protected static ?int $navigationSort = 13;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunicación';

    public static function getNavigationLabel(): string
    {
        return 'Bandeja de Contactos';
    }

    public static function getModelLabel(): string
    {
        return 'Mensaje';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Contactos';
    }

    public static function form(Schema $schema): Schema
    {
        return ContactoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactosTable::configure($table);
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
            'index' => ListContactos::route('/'),
            'view' => ViewContacto::route('/{record}'),
        ];
    }

    // Badge con el número de mensajes nuevos
    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('estado', 'nuevo')->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'danger';
    }
}
