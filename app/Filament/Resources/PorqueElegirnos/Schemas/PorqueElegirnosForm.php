<?php

namespace App\Filament\Resources\PorqueElegirnos\Schemas;

use App\Filament\Traits\HasLucideIcons;
use App\Models\Empresa;
use App\Models\PorqueElegirnos;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PorqueElegirnosForm
{
    use HasLucideIcons;

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Elemento')
                    ->description('Datos que se mostrarán en la sección "Por qué elegirnos"')
                    ->schema([
                        Select::make('empresa_id')
                            ->label('Empresa')
                            ->options(Empresa::pluck('nombre', 'id'))
                            ->default(Empresa::first()?->id)
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona la empresa a la que pertenece este elemento'),

                        TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Calidad Garantizada, Asesoría Técnica')
                            ->helperText('Título principal del elemento'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Descripción detallada del elemento')
                            ->helperText('Descripción que aparecerá debajo del título'),

                        Select::make('icono')
                            ->label('Icono')
                            ->options(self::getLucideIcons())
                            ->searchable()
                            ->required()
                            ->default('CheckCircle2')
                            ->helperText('Selecciona el icono que se mostrará en el elemento'),
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
                            ->default(fn () => (PorqueElegirnos::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((PorqueElegirnos::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los elementos activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
