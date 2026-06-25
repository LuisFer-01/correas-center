<?php

namespace App\Filament\Resources\Registros\Schemas;

use App\Models\Registro;
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
                Section::make('Configuración de la Sección')
                    ->description('Define la sección de la página "Acerca de"')
                    ->schema([
                        Select::make('identificador')
                            ->label('Identificador de Sección')
                            ->options([
                                'header' => 'Header (Título principal y badge)',
                                'introduccion' => 'Introducción (Texto principal)',
                                'estadisticas' => 'Estadísticas (Números destacados)',
                                'filosofia' => 'Filosofía Corporativa (Visión, Misión, Valores)',
                                'porque_elegirnos' => '¿Por qué elegirnos? (Lista de beneficios)',
                            ])
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('Este identificador conecta la sección con el diseño del frontend.'),

                        TextInput::make('nombre')
                            ->label('Título de la Sección')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Nuestra Filosofía Corporativa')
                            ->helperText('Título visible en la página (ej. "Nuestra Filosofía")'),

                        Textarea::make('descripcion')
                            ->label('Descripción / Subtítulo')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Descripción breve que aparece debajo del título...')
                            ->helperText('Texto secundario o descripción general de la sección.'),

                        TextInput::make('orden')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->required()
                            ->default(fn () => (Registro::max('orden') ?? 0) + 1)
                            ->helperText('Orden en el que aparece la sección en la página.'),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
