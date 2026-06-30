<?php

namespace App\Filament\Resources\Contactos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Contacto')
                    ->description('Datos proporcionados por el visitante')
                    ->schema([
                        TextInput::make('tipo')
                            ->label('Tipo')
                            ->disabled()
                            ->helperText(fn ($record) => $record?->tipo === 'newsletter'
                                ? 'Suscripción al newsletter'
                                : 'Mensaje de contacto'),

                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->disabled(),

                        TextInput::make('empresa')
                            ->label('Empresa')
                            ->disabled()
                            ->placeholder('No especificada'),

                        TextInput::make('telefono')
                            ->label('Teléfono')
                            ->disabled()
                            ->tel()
                            ->placeholder('No especificado'),

                        TextInput::make('email')
                            ->label('Email')
                            ->disabled()
                            ->email(),

                        Textarea::make('mensaje')
                            ->label('Mensaje')
                            ->rows(6)
                            ->disabled(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
