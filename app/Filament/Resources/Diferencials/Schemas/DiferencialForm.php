<?php

namespace App\Filament\Resources\Diferencials\Schemas;

use App\Filament\Traits\HasLucideIcons;
use App\Models\Diferencial;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DiferencialForm
{
    use HasLucideIcons;
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Diferencial')
                    ->description('Datos que se mostrarán en la sección "Por qué elegirnos"')
                    ->schema([
                        TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: +25 Años, SKF, 10,000+')
                            ->helperText('Título principal del diferencial (puede ser un número o texto corto)'),

                        TextInput::make('subtitulo')
                            ->label('Subtítulo')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Experiencia Comprobada, Licencia Exclusiva')
                            ->helperText('Subtítulo que acompaña al título'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Descripción detallada del diferencial')
                            ->helperText('Descripción que aparecerá debajo del título y subtítulo'),

                        Select::make('icon')
                            ->label('Icono')
                            ->options(self::getLucideIcons())
                            ->searchable()
                            ->required()
                            ->default('CheckCircle2')
                            ->helperText('Selecciona el icono que se mostrará en el diferencial'),
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
                            ->default(fn () => (Diferencial::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Diferencial::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los diferenciales activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
