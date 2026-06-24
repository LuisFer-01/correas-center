<?php

namespace App\Filament\Resources\CapacidadInfraestructuras\Schemas;

use App\Filament\Traits\HasLucideIcons;
use App\Models\CapacidadInfraestructura;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CapacidadInfraestructuraForm
{
    use HasLucideIcons;
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Capacidad')
                    ->description('Datos que se mostrarán en la lista de capacidades técnicas')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Capacidad')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Fabricación de sellos SKF a medida')
                            ->helperText('Descripción breve de la capacidad técnica'),

                        Select::make('icon')
                            ->label('Icono')
                            ->options(self::getLucideIcons())
                            ->searchable()
                            ->required()
                            ->default('CheckCircle2')
                            ->helperText('Selecciona el icono que se mostrará junto a la capacidad'),
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
                            ->default(fn () => (CapacidadInfraestructura::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((CapacidadInfraestructura::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las capacidades activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
