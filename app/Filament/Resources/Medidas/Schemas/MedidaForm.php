<?php

namespace App\Filament\Resources\Medidas\Schemas;

use App\Models\Medida;
use App\Models\TipoMedida;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MedidaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Medida')
                    ->description('Define las medidas técnicas de los productos')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Medida')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Ancho externo, Diámetro interno, Longitud')
                            ->helperText('Nombre descriptivo de la medida'),

                        Select::make('tipo_medida_id')
                            ->label('Tipo de Medida')
                            ->options(TipoMedida::where('estado', 'activo')
                                ->orderBy('nombre')
                                ->pluck('nombre', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->helperText('Selecciona la unidad de medida (mm, pulgadas, grados, etc.)'),

                        TextInput::make('magnitud')
                            ->label('Magnitud / Valor')
                            ->numeric()
                            ->step(0.0001)
                            ->placeholder('Ej: 40.00, 3000')
                            ->helperText('Valor numérico de la medida (opcional, puede variar por producto)'),
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
                            ->default(fn () => (Medida::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Medida::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las medidas activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
