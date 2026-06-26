<?php

namespace App\Filament\Resources\Servicios\Schemas;

use App\Models\Empresa;
use App\Models\Servicio;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServicioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Servicio')
                    ->description('Datos que se mostrarán en la sección de servicios')
                    ->schema([
                        Select::make('empresa_id')
                            ->label('Empresa')
                            ->options(Empresa::pluck('nombre', 'id'))
                            ->default(Empresa::first()?->id)
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona la empresa a la que pertenece este servicio'),

                        TextInput::make('nombre')
                            ->label('Nombre del Servicio')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Fabricación de Sellos SKF')
                            ->helperText('Nombre que se mostrará en el sitio web'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Descripción detallada del servicio...')
                            ->helperText('Descripción que aparecerá debajo del nombre'),

                        FileUpload::make('imagen')
                            ->label('Imagen del Servicio')
                            ->image()
                            ->directory('servicio')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Sube una imagen representativa del servicio (máx. 5MB)')
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
                            ->default(fn () => (Servicio::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Servicio::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los servicios activos se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
