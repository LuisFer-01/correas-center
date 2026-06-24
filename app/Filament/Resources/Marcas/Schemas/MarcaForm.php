<?php

namespace App\Filament\Resources\Marcas\Schemas;

use App\Models\Marca;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MarcaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Marca')
                    ->description('Datos básicos de la marca')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la Marca')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: SKF, Hércules, FBJ')
                            ->helperText('Nombre de la marca tal como se mostrará en el sitio')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Se genera automáticamente desde el nombre'),

                        FileUpload::make('logo')
                            ->label('Logo de la Marca')
                            ->image()
                            ->directory('marca')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(2048) // 2MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/webp'])
                            ->helperText('Sube el logo en formato PNG, JPG, SVG o WEBP (máx. 2MB)')
                            ->hint('Se recomienda fondo transparente')
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
                    ->description('Configuración de visualización')
                    ->schema([
                        TextInput::make('orden')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            // ✅ CALCULAR AUTOMÁTICAMENTE EL SIGUIENTE ORDEN
                            ->default(fn () => (Marca::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Orden actual: se asignará automáticamente el siguiente número disponible (último: ' . (Marca::max('orden') ?? 0) . ')')
                            ->hint('Puedes modificarlo manualmente si deseas un orden específico')
                            ->hintIcon('heroicon-o-information-circle'),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las marcas activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
