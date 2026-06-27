<?php

namespace App\Filament\Resources\TipoMedidas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TipoMedidaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Tipo de Medida')
                    ->description('Define las unidades de medida utilizadas en el catálogo')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre Completo')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Milímetro, Pulgada, Grado')
                            ->helperText('Nombre completo de la unidad de medida'),

                        TextInput::make('abreviatura')
                            ->label('Abreviatura')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('Ej: mm, in, deg')
                            ->helperText('Abreviatura estándar (ej: mm, in, psi)'),

                        TextInput::make('representacion')
                            ->label('Representación Visual')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('Ej: mm, ", °')
                            ->helperText('Símbolo o representación visual (ej: mm, ", °, psi)'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Configuración')
                    ->description('Estado de visualización')
                    ->schema([
                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los tipos activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
