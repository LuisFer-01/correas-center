<?php

namespace App\Filament\Resources\Footers\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('orden', 'asc')
            ->reorderable('orden')
            ->columns([
                TextColumn::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->toggleable(),

                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'producto' => 'primary',
                        'industria' => 'success',
                        'servicio' => 'warning',
                        'red_social' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'producto' => 'Producto',
                        'industria' => 'Industria',
                        'servicio' => 'Servicio',
                        'red_social' => 'Red Social',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('elemento')
                    ->label('Elemento')
                    ->state(function ($record) {
                        return match($record->tipo) {
                            'producto' => $record->producto?->nombre ?? 'N/A',
                            'industria' => $record->industria?->nombre ?? 'N/A',
                            'servicio' => $record->servicio?->nombre ?? 'N/A',
                            'red_social' => $record->titulo ?? 'N/A',
                            default => 'N/A',
                        };
                    })
                    ->searchable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('url')
                    ->label('URL')
                    ->searchable()
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('icono')
                    ->label('Icono')
                    ->badge()
                    ->color('info')
                    ->toggleable(),

                IconColumn::make('mostrar')
                    ->label('Visible')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->sortable(),

                IconColumn::make('estado')
                    ->label('Estado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'producto' => 'Producto',
                        'industria' => 'Industria',
                        'servicio' => 'Servicio',
                        'red_social' => 'Red Social',
                    ]),
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ]),
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),

                Action::make('cambiarEstado')
                    ->label(fn ($record) => $record->estado === 'activo' ? 'Desactivar' : 'Activar')
                    ->icon(fn ($record) => $record->estado === 'activo' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->estado === 'activo' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['estado' => $record->estado === 'activo' ? 'inactivo' : 'activo']);
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('desactivarSeleccionados')
                        ->label('Desactivar Seleccionados')
                        ->action(fn ($records) => $records->each->update(['estado' => 'inactivo'])),
                    BulkAction::make('activarSeleccionados')
                        ->label('Activar Seleccionados')
                        ->action(fn ($records) => $records->each->update(['estado' => 'activo'])),
                ]),
            ])
            ->emptyStateHeading('No hay elementos en el footer')
            ->emptyStateDescription('Crea el primer elemento para mostrar en el footer del sitio web.')
            ->emptyStateIcon('heroicon-o-rectangle-stack');
    }
}
