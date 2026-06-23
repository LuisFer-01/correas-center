<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Imagen del Hero')
                    ->description('Imagen de fondo para el slider')
                    ->schema([
                        FileUpload::make('imagen')
                            ->label('Imagen de Fondo')
                            ->image()
                            ->directory('hero')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                            ->helperText('Sube una imagen de alta resolución (recomendado 1920x1080px)')
                            ->hint('Formatos: JPG, PNG, WEBP')
                            ->hintIcon('heroicon-o-information-circle')
                            ->preserveFilenames(false)
                            ->panelLayout('compact')
                            ->required()
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return uniqid() . '.' . $file->getClientOriginalExtension();
                            }),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('Contenido del Hero')
                    ->description('Información que se mostrará sobre la imagen')
                    ->schema([
                        TextInput::make('titulo')
                            ->label('Título Principal')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Soluciones Industriales Confiables')
                            ->helperText('Título principal del slider'),

                        Textarea::make('subtitulo')
                            ->label('Subtítulo')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Descripción detallada del servicio o producto')
                            ->helperText('Descripción que aparece debajo del título'),

                        TextInput::make('badge_text')
                            ->label('Texto del Badge')
                            ->maxLength(100)
                            ->placeholder('Ej: Líder en Soluciones Industriales')
                            ->helperText('Texto pequeño que aparece en la esquina superior (opcional)'),

                        TextInput::make('cta_primary_text')
                            ->label('Texto Botón Principal')
                            ->maxLength(100)
                            ->placeholder('Ej: Solicitar Asesoría')
                            ->helperText('Texto del botón principal (opcional)'),

                        TextInput::make('cta_primary_href')
                            ->label('URL Botón Principal')
                            ->maxLength(255)
                            ->placeholder('Ej: /contact')
                            ->helperText('URL o ruta del botón principal (opcional)'),

                        TextInput::make('cta_secondary_text')
                            ->label('Texto Botón Secundario')
                            ->maxLength(100)
                            ->placeholder('Ej: Ver Productos')
                            ->helperText('Texto del botón secundario (opcional)'),

                        TextInput::make('cta_secondary_href')
                            ->label('URL Botón Secundario')
                            ->maxLength(255)
                            ->placeholder('Ej: /products')
                            ->helperText('URL o ruta del botón secundario (opcional)'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Configuración')
                    ->description('Configuración de visualización')
                    ->schema([
                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required()
                            ->helperText('Solo los heroes activos se mostrarán en el landing'),

                        TextInput::make('orden')
                            ->label('Orden de Visualización')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Los heroes se ordenan de menor a mayor (0, 1, 2...)'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
