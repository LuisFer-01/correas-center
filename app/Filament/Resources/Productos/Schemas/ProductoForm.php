<?php

namespace App\Filament\Resources\Productos\Schemas;

use App\Models\Empresa;
use App\Models\Producto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Producto')
                    ->description('Datos básicos del producto')
                    ->schema([
                        Select::make('empresa_id')
                            ->label('Empresa')
                            ->options(Empresa::pluck('nombre', 'id'))
                            ->default(Empresa::first()?->id)
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona la empresa a la que pertenece este producto'),

                        TextInput::make('nombre')
                            ->label('Nombre del Producto')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Correas, Rodamientos, Mangueras')
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

                        FileUpload::make('imagen')
                            ->label('Imagen del Producto')
                            ->image()
                            ->directory('producto')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Sube una imagen representativa del producto (máx. 5MB)')
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
                            ->default(fn () => (Producto::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Producto::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los productos activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
