<?php

namespace App\Filament\Resources\Sucursals\Schemas;

use App\Models\Sucursal;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;

class SucursalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información General')
                    ->description('Datos básicos de la sucursal')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Sucursal')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Oficina Central, Sucursal Banzer')
                            ->helperText('Nombre que se mostrará en el sitio web'),

                        Textarea::make('direccion')
                            ->label('Dirección')
                            ->required()
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('Ej: Av. Grigotas 2do anillo, Santa Cruz de la Sierra')
                            ->helperText('Dirección completa de la sucursal'),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('telefono')
                                    ->label('Teléfono')
                                    ->required()
                                    ->maxLength(50)
                                    ->placeholder('+591 7 730-6576')
                                    ->helperText('Número de teléfono de contacto'),

                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->maxLength(255)
                                    ->placeholder('ventas@correascenter.com')
                                    ->helperText('Email de contacto (opcional)'),
                            ]),

                        TextInput::make('horarios')
                            ->label('Horarios de Atención')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Lun-Vie: 8:00-18:00 | Sáb: 8:00-13:00')
                            ->helperText('Horarios en formato legible'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('Ubicación en el Mapa')
                    ->description('Configura la ubicación de la sucursal en Google Maps')
                    ->schema([
                        Textarea::make('mapa_incrustado')
                            ->label('URL del Mapa Incrustado (iframe)')
                            ->rows(3)
                            ->maxLength(1000)
                            ->placeholder('https://www.google.com/maps/embed?pb=!1m18...')
                            ->helperText('Pega aquí la URL completa del iframe de Google Maps. Las coordenadas se extraerán automáticamente.')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Set $set) {
                                // Extraer coordenadas automáticamente
                                $coordenadas = self::extraerCoordenadas($state);

                                if ($coordenadas) {
                                    $set('latitud', $coordenadas['latitud']);
                                    $set('longitud', $coordenadas['longitud']);
                                } else {
                                    // Si no se pueden extraer, limpiar los campos
                                    $set('latitud', null);
                                    $set('longitud', null);
                                }
                            }),

                        // ViewField para la previsualización del mapa
                        ViewField::make('mapa_preview')
                            ->view('filament.components.map-preview')
                            ->label('Previsualización del Mapa')
                            ->columnSpanFull()
                            ->dehydrated(false),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('Coordenadas Geográficas')
                    ->description('Coordenadas extraídas automáticamente del mapa (solo lectura)')
                    ->collapsible()
                    ->collapsed(false) // Abierto por defecto para ver las coordenadas
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('latitud')
                                    ->label('Latitud')
                                    ->numeric()
                                    ->step(0.000001)
                                    ->placeholder('Se extrae automáticamente del mapa')
                                    ->helperText('Coordenada de latitud extraída de Google Maps')
                                    ->readOnly() // Campo de solo lectura
                                    ->disabled(false) // Visible pero no editable
                                    ->prefixIcon('heroicon-o-globe-americas'),

                                TextInput::make('longitud')
                                    ->label('Longitud')
                                    ->numeric()
                                    ->step(0.000001)
                                    ->placeholder('Se extrae automáticamente del mapa')
                                    ->helperText('Coordenada de longitud extraída de Google Maps')
                                    ->readOnly() // Campo de solo lectura
                                    ->disabled(false) // Visible pero no editable
                                    ->prefixIcon('heroicon-o-globe-americas'),
                            ]),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('Configuración')
                    ->description('Configuración de visualización y estado')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('orden')
                                    ->label('Orden de Visualización')
                                    ->numeric()
                                    ->required()
                                    ->minValue(0)
                                    ->default(fn () => (Sucursal::max('orden') ?? 0) + 1)
                                    ->helperText(fn () => 'Siguiente orden disponible: ' . ((Sucursal::max('orden') ?? 0) + 1)),

                                Select::make('estado')
                                    ->label('Estado')
                                    ->options([
                                        'activo' => 'Activo',
                                        'inactivo' => 'Inactivo',
                                    ])
                                    ->default('activo')
                                    ->required()
                                    ->helperText('Solo las sucursales activas se mostrarán en el sitio web'),

                                Checkbox::make('es_principal')
                                    ->label('Sucursal Principal')
                                    ->helperText('Marca esta opción si es la sucursal principal de la empresa'),
                            ]),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }

    /**
     * Extrae las coordenadas de latitud y longitud de una URL de Google Maps embed
     *
     * @param string|null $url URL del mapa incrustado
     * @return array|null Array con 'latitud' y 'longitud', o null si no se pueden extraer
     */
    private static function extraerCoordenadas(?string $url): ?array
    {
        if (empty($url)) {
            return null;
        }

        // La URL de Google Maps embed tiene este formato:
        // https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d...!2d-LONGITUD!3d-LATITUD!...

        // Buscar el patrón !2d (longitud) y !3d (latitud)
        if (preg_match('/!2d(-?\d+\.\d+)/', $url, $longitudMatch) &&
            preg_match('/!3d(-?\d+\.\d+)/', $url, $latitudMatch)) {

            return [
                'latitud' => (float) $latitudMatch[1],
                'longitud' => (float) $longitudMatch[1],
            ];
        }

        // Intentar con otro formato de URL (coordenadas en la URL)
        // https://www.google.com/maps/@LATITUD,LONGITUD,...
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return [
                'latitud' => (float) $matches[1],
                'longitud' => (float) $matches[2],
            ];
        }

        return null;
    }
}
