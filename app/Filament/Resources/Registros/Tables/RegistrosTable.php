<?php

namespace App\Filament\Resources\Registros\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RegistrosTable
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

                TextColumn::make('identificador')
                    ->label('ID Sección')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),

                TextColumn::make('nombre')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),

                TextColumn::make('detalle_registros_count')
                    ->label('Elementos')
                    ->counts('detalleRegistros')
                    ->badge()
                    ->color('primary')
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
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ]),
            ])
            ->actions([
                EditAction::make()->label('Editar'),
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
            ]);
    }
}
