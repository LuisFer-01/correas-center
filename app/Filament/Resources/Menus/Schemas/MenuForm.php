<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Filament\Traits\HasFontAwesomeIcons;
use App\Models\Industria;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\Servicio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Str;

class MenuForm
{
    use HasFontAwesomeIcons;

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Configuración del Menú')
                    ->description('Define el tipo de menú y su contenido')
                    ->schema([
                        Select::make('grupo')
                            ->label('Tipo de Menú')
                            ->options([
                                'Producto' => 'Producto',
                                'Aplicacion' => 'Aplicación / Industria',
                                'Servicio' => 'Servicio',
                            ])
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                // Resetear campo_id cuando cambia el grupo
                                $set('campo_id', null);
                                // Generar ruta automática
                                $set('ruta', '');
                                // Generar icono automático según el grupo
                                $set('icon', match($state) {
                                    'Producto' => 'fa-box',
                                    'Aplicacion' => 'fa-industry',
                                    'Servicio' => 'fa-wrench',
                                    default => null,
                                });
                            })
                            ->helperText('Selecciona el tipo de elemento que representará este menú'),

                        TextInput::make('orden')
                            ->numeric()
                            ->required()
                            ->default(fn () => (Menu::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Menu::max('orden') ?? 0) + 1)),

                        Select::make('campo_id')
                            ->label('Elemento Asociado')
                            ->required()
                            ->live()
                            ->options(function (Get $get) {
                                $grupo = $get('grupo');
                                return match($grupo) {
                                    'Producto' => Producto::where('estado', 'activo')
                                        ->orderBy('orden')
                                        ->pluck('nombre', 'id'),
                                    'Aplicacion' => Industria::where('estado', 'activo')
                                        ->orderBy('orden')
                                        ->pluck('nombre', 'id'),
                                    'Servicio' => Servicio::where('estado', 'activo')
                                        ->orderBy('nombre')
                                        ->pluck('nombre', 'id'),
                                    default => [],
                                };
                            })
                            ->searchable()
                            ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                if (!$state) return;
                                $grupo = $get('grupo');
                                // Generar ruta automática según el grupo y el elemento seleccionado
                                $ruta = match($grupo) {
                                    'Producto' => '/products/' . Producto::find($state)?->slug,
                                    'Aplicacion' => '/applications/' . Industria::find($state)?->slug,
                                    'Servicio' => '/services/' . Str::slug(Servicio::find($state)?->nombre),
                                    default => '',
                                };
                                $set('ruta', $ruta);
                            })
                            ->helperText('Selecciona el elemento específico que se mostrará en este menú')
                            ->placeholder(function (Get $get) {
                                $grupo = $get('grupo');
                                return match($grupo) {
                                    'Producto' => 'Selecciona un producto...',
                                    'Aplicacion' => 'Selecciona una industria...',
                                    'Servicio' => 'Selecciona un servicio...',
                                    default => 'Primero selecciona un tipo de menú',
                                };
                            })
                            ->disabled(fn (Get $get) => !$get('grupo')),

                        TextInput::make('ruta')
                            ->label('Ruta / URL')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: /products/correas')
                            ->helperText('Ruta que se usará para navegar a este elemento (se genera automáticamente)'),

                        // ✅ AHORA USA EL TRAIT CON 500 ICONOS DE FONT AWESOME
                        Select::make('icon')
                            ->label('Icono')
                            ->options(self::getFontAwesomeIcons()) // ← Aquí se cargan los 500 iconos
                            ->searchable()
                            ->helperText('Selecciona el icono que se mostrará en el menú (Font Awesome Free)'),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los menús activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
