<?php

namespace App\Filament\Resources\GamaProductos\Schemas;

use App\Models\GamaProducto;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GamaProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Gama')
                    ->description('Datos que se mostrarán en los detalles de categorías')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Gama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Serie A, Serie Premium, Serie Industrial')
                            ->helperText('Nombre que identificará esta gama de producto'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Configuración')
                    ->description('Configuración de visualización y estado')
                    ->schema([
                        TextInput::make('orden')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(fn () => (GamaProducto::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((GamaProducto::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las gamas activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
