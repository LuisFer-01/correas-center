<?php

namespace App\Filament\Resources\Footers\Schemas;

use App\Models\Empresa;
use App\Models\Footer;
use App\Models\Industria;
use App\Models\Producto;
use App\Models\Servicio;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class FooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Configuración del Elemento')
                    ->description('Define el tipo de elemento que aparecerá en el footer')
                    ->schema([
                        Select::make('empresa_id')
                            ->label('Empresa')
                            ->options(Empresa::pluck('nombre', 'id'))
                            ->default(Empresa::first()?->id)
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona la empresa a la que pertenece este elemento'),

                        Select::make('tipo')
                            ->label('Tipo de Elemento')
                            ->options([
                                'producto' => 'Producto',
                                'industria' => 'Industria / Aplicación',
                                'servicio' => 'Servicio',
                                'red_social' => 'Red Social',
                            ])
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                // Resetear campo_id y otros campos cuando cambia el tipo
                                $set('campo_id', null);
                                $set('titulo', null);
                                $set('url', null);
                                $set('icono', null);
                            })
                            ->helperText('Selecciona el tipo de elemento que se mostrará en el footer'),

                        // Campo dinámico según el tipo
                        Select::make('campo_id')
                            ->label('Elemento Asociado')
                            ->required(fn (Get $get) => in_array($get('tipo'), ['producto', 'industria', 'servicio']))
                            ->hidden(fn (Get $get) => $get('tipo') === 'red_social' || !$get('tipo'))
                            ->live()
                            ->options(function (Get $get) {
                                $tipo = $get('tipo');
                                return match($tipo) {
                                    'producto' => Producto::where('estado', 'activo')
                                        ->orderBy('orden')
                                        ->pluck('nombre', 'id'),
                                    'industria' => Industria::where('estado', 'activo')
                                        ->orderBy('orden')
                                        ->pluck('nombre', 'id'),
                                    'servicio' => Servicio::where('estado', 'activo')
                                        ->orderBy('nombre')
                                        ->pluck('nombre', 'id'),
                                    default => [],
                                };
                            })
                            ->searchable()
                            ->helperText('Selecciona el elemento específico que se mostrará'),

                        TextInput::make('titulo')
                            ->label('Título')
                            ->maxLength(255)
                            ->placeholder('Ej: Facebook, Instagram')
                            ->hidden(fn (Get $get) => $get('tipo') !== 'red_social')
                            ->helperText('Nombre visible de la red social'),

                        TextInput::make('url')
                            ->label('URL')
                            ->maxLength(500)
                            ->placeholder('https://...')
                            ->hidden(fn (Get $get) => $get('tipo') !== 'red_social')
                            ->helperText('Enlace completo de la red social'),

                        TextInput::make('icono')
                            ->label('Icono')
                            ->maxLength(100)
                            ->placeholder('Ej: faFacebookF, faInstagram')
                            ->hidden(fn (Get $get) => $get('tipo') !== 'red_social')
                            ->helperText('Nombre del icono de Font Awesome (ej: faFacebookF)'),
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
                            ->default(fn () => (Footer::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Footer::max('orden') ?? 0) + 1)),

                        Checkbox::make('mostrar')
                            ->label('Mostrar en el Footer')
                            ->default(true)
                            ->helperText('Desmarca esta opción para ocultar el elemento sin eliminarlo'),

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
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
