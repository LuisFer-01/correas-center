<?php

namespace App\Filament\Resources\Registros\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RegistroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Registro')
                    ->description('Datos que se mostrarán en la página About (Visión, Misión, Valores)')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Registro')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Visión, Misión, Valores')
                            ->helperText('Nombre que identificará este registro corporativo'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(5)
                            ->maxLength(1000)
                            ->placeholder('Describe la visión, misión o valores de la empresa...')
                            ->helperText('Contenido detallado que se mostrará en la página About'),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los registros activos se mostrarán en el sitio web'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
