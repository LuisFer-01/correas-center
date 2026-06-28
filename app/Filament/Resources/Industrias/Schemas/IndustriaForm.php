<?php

namespace App\Filament\Resources\Industrias\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Models\Empresa;
use App\Models\Industria;

class IndustriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Industria')
                    ->description('Datos básicos de la industria o aplicación')
                    ->schema([
                        Select::make('empresa_id')
                            ->label('Empresa')
                            ->options(Empresa::pluck('nombre', 'id'))
                            ->default(Empresa::first()?->id)
                            ->required()
                            ->searchable()
                            ->helperText('Selecciona la empresa a la que pertenece esta industria'),

                        TextInput::make('nombre')
                            ->label('Nombre de la Industria')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Industria Alimenticia, Agroindustrial')
                            ->helperText('Nombre que se mostrará en el sitio web')
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
                            ->label('Imagen de la Industria')
                            ->image()
                            ->directory('industria')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Sube una imagen representativa de la industria (máx. 5MB)')
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
                            ->default(fn () => (Industria::max('orden') ?? 0) + 1)
                            ->helperText(fn () => 'Siguiente orden disponible: ' . ((Industria::max('orden') ?? 0) + 1)),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo las industrias activas se mostrarán en el sitio web'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
