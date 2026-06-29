<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(fn () => \App\Models\User::where('id', auth()->id()))
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'inactivo' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->actions([])
            ->bulkActions([])
            ->paginated(false);
    }
}
