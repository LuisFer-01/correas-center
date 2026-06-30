<?php

namespace App\Filament\Resources\Suscriptors\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SuscriptorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Suscriptor')
                    ->description('Datos del suscriptor al newsletter')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->disabled()
                            ->placeholder('No proporcionado'),

                        TextInput::make('email')
                            ->label('Email')
                            ->disabled()
                            ->email(),

                        TextInput::make('estado')
                            ->label('Estado')
                            ->disabled(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Fechas')
                    ->description('Información temporal del suscriptor')
                    ->schema([
                        TextInput::make('created_at')
                            ->label('Fecha de Suscripción')
                            ->disabled(),

                        TextInput::make('email_verificado_at')
                            ->label('Email Verificado')
                            ->disabled()
                            ->placeholder('No verificado'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
