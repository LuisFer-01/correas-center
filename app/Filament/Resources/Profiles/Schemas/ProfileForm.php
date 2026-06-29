<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información Personal')
                    ->description('Actualiza tu información de perfil')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre Completo')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Tu nombre completo'),

                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Cambiar Contraseña')
                    ->description('Actualiza tu contraseña de acceso')
                    ->schema([
                        TextInput::make('password')
                            ->label('Nueva Contraseña')
                            ->password()
                            ->minLength(8)
                            ->maxLength(255)
                            ->helperText('Deja vacío para mantener la contraseña actual'),

                        TextInput::make('password_confirmation')
                            ->label('Confirmar Nueva Contraseña')
                            ->password()
                            ->same('password')
                            ->helperText('Debe coincidir con la nueva contraseña'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
