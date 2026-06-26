<?php

namespace App\Filament\Resources\Caracteristicas\Schemas;

use App\Models\Caracteristica;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CaracteristicaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Característica')
                    ->description('Datos que se mostrarán en los detalles de categorías')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Característica')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Construcción UniMatch, Dual Branding')
                            ->helperText('Nombre que identificará esta característica técnica'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Ej: Rendimiento consistente en múltiples unidades...')
                            ->helperText('Descripción detallada de la característica técnica'),
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
                            ->default(fn () => (Caracteristica::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Caracteristica::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las características activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
