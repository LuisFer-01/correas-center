<?php

namespace App\Filament\Resources\CaracteristicaInfraestructuras\Schemas;

use App\Filament\Traits\HasLucideIcons;
use App\Models\CaracteristicaInfraestructura;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CaracteristicaInfraestructuraForm
{
    use HasLucideIcons;

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Característica')
                    ->description('Datos que se mostrarán en la sección de infraestructura')
                    ->schema([
                        TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Planta de Fabricación, Centro de Distribución')
                            ->helperText('Título principal de la característica'),

                        TextInput::make('stats')
                            ->label('Estadística / Dato Destacado')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Ej: 500m², 10,000+ productos, +25 técnicos')
                            ->helperText('Dato numérico o estadística que se mostrará destacada'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Descripción detallada de la característica')
                            ->helperText('Descripción que aparecerá debajo del título'),

                        Select::make('icon')
                            ->label('Icono')
                            ->options(self::getLucideIcons())
                            ->searchable()
                            ->required()
                            ->default('Factory')
                            ->helperText('Selecciona el icono que se mostrará en la tarjeta'),
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
                            ->default(fn () => (CaracteristicaInfraestructura::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((CaracteristicaInfraestructura::max('orden') ?? 0) + 1)),

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
