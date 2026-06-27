<?php

namespace App\Filament\Resources\Categorias\Schemas;

use App\Models\Categoria;
use App\Models\Producto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Categoría')
                    ->description('Datos básicos de la categoría del producto')
                    ->schema([
                        Select::make('producto_id')
                            ->label('Producto Principal')
                            ->options(Producto::where('estado', 'activo')
                                ->orderBy('orden')
                                ->pluck('nombre', 'id'))
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona el producto principal al que pertenece esta categoría'),

                        TextInput::make('nombre')
                            ->label('Nombre de la Categoría')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Correas en V, Rodamientos de Bolas')
                            ->helperText('Nombre que se mostrará en el catálogo')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Set $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Se genera automáticamente desde el nombre'),

                        TextInput::make('uso')
                            ->label('Uso / Aplicación Principal')
                            ->maxLength(255)
                            ->placeholder('Ej: Transmisión de potencia, Alta presión')
                            ->helperText('Descripción breve del uso principal de esta categoría'),

                        Textarea::make('descripcion_corta')
                            ->label('Descripción Corta')
                            ->rows(2)
                            ->maxLength(500)
                            ->placeholder('Descripción breve para tarjetas y listados...')
                            ->helperText('Texto corto que aparece en el listado de productos'),

                        Textarea::make('descripcion')
                            ->label('Descripción Completa')
                            ->rows(4)
                            ->maxLength(2000)
                            ->placeholder('Descripción detallada de la categoría...')
                            ->helperText('Descripción completa que aparece en la página de detalle'),

                        FileUpload::make('imagen')
                            ->label('Imagen de la Categoría')
                            ->image()
                            ->directory('categoria')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Sube una imagen representativa de la categoría (máx. 5MB)')
                            ->hint('Formatos: JPG, PNG, WEBP')
                            ->hintIcon('heroicon-o-information-circle')
                            ->preserveFilenames(false)
                            ->panelLayout('compact')
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return uniqid() . '.' . $file->getClientOriginalExtension();
                            }),
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
                            ->default(fn () => (Categoria::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Categoria::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las categorías activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
