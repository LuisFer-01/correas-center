<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Industria;
use App\Models\Producto;
use App\Models\Servicio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class MenuForm
{
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
                                    'Servicio' => '/services/' . \Illuminate\Support\Str::slug(Servicio::find($state)?->nombre),
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

                        Select::make('icon')
                            ->label('Icono')
                            ->options([
                                'fa-box' => '📦 Caja (Producto)',
                                'fa-industry' => '🏭 Industria (Aplicación)',
                                'fa-wrench' => '🔧 Llave (Servicio)',
                                'fa-cog' => '⚙️ Engranaje',
                                'fa-star' => '⭐ Estrella',
                                'fa-tools' => '🛠️ Herramientas',
                                'fa-cogs' => '⚙️ Engranajes',
                                'fa-truck' => '🚚 Camión',
                                'fa-users' => '👥 Usuarios',
                                'fa-building' => '🏢 Edificio',
                                'fa-home' => '🏠 Inicio',
                                'fa-phone' => '📞 Teléfono',
                                'fa-envelope' => '✉️ Email',
                                'fa-map-marker-alt' => '📍 Ubicación',
                                'fa-clock' => '🕐 Reloj',
                                'fa-search' => '🔍 Búsqueda',
                                'fa-check' => '✓ Check',
                                'fa-check-circle' => '✓ Círculo Check',
                                'fa-info-circle' => 'ℹ️ Info',
                                'fa-exclamation-circle' => '⚠️ Advertencia',
                                'fa-question-circle' => '❓ Pregunta',
                                'fa-plus' => '➕ Más',
                                'fa-minus' => '➖ Menos',
                                'fa-edit' => '✏️ Editar',
                                'fa-trash' => '🗑️ Basura',
                                'fa-save' => '💾 Guardar',
                                'fa-download' => '⬇️ Descargar',
                                'fa-upload' => '⬆️ Subir',
                                'fa-file' => '📄 Archivo',
                                'fa-file-pdf' => '📕 PDF',
                                'fa-image' => '🖼️ Imagen',
                                'fa-link' => '🔗 Enlace',
                                'fa-lock' => '🔒 Candado',
                                'fa-unlock' => '🔓 Desbloqueado',
                                'fa-key' => '🔑 Llave',
                                'fa-shield' => '🛡️ Escudo',
                                'fa-user' => '👤 Usuario',
                                'fa-chart-bar' => '📊 Gráfico',
                                'fa-table' => '📋 Tabla',
                                'fa-list' => '📝 Lista',
                                'fa-filter' => '🔽 Filtro',
                                'fa-sort' => '↕️ Ordenar',
                                'fa-sync' => '🔄 Sincronizar',
                                'fa-history' => '📜 Historial',
                                'fa-calendar' => '📅 Calendario',
                                'fa-bell' => '🔔 Campana',
                                'fa-comment' => '💬 Comentario',
                                'fa-share' => '📤 Compartir',
                                'fa-heart' => '❤️ Corazón',
                                'fa-thumbs-up' => '👍 Like',
                                'fa-flag' => '🚩 Bandera',
                                'fa-bookmark' => '🔖 Marcador',
                                'fa-tag' => '🏷️ Etiqueta',
                                'fa-credit-card' => '💳 Tarjeta',
                                'fa-shopping-cart' => '🛒 Carrito',
                                'fa-store' => '🏪 Tienda',
                                'fa-warehouse' => '🏭 Almacén',
                                'fa-gift' => '🎁 Regalo',
                                'fa-award' => '🏆 Premio',
                                'fa-medal' => '🏅 Medalla',
                                'fa-trophy' => '🏆 Trofeo',
                                'fa-fire' => '🔥 Fuego',
                                'fa-bolt' => '⚡ Rayo',
                                'fa-car' => '🚗 Auto',
                                'fa-bus' => '🚌 Bus',
                                'fa-motorcycle' => '🏍️ Moto',
                                'fa-plane' => '✈️ Avión',
                                'fa-ship' => '🚢 Barco',
                                'fa-rocket' => '🚀 Cohete',
                                'fa-flask' => '🧪 Frasco',
                                'fa-book' => '📖 Libro',
                                'fa-graduation-cap' => '🎓 Graduación',
                                'fa-music' => '🎵 Música',
                                'fa-camera' => '📷 Cámara',
                                'fa-video' => '🎥 Video',
                            ])
                            ->searchable()
                            ->helperText('Selecciona el icono que se mostrará en el menú (usa Font Awesome)'),

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
