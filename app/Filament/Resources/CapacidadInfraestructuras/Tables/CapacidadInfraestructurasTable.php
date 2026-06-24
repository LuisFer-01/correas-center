<?php

namespace App\Filament\Resources\CapacidadInfraestructuras\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CapacidadInfraestructurasTable
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

                TextColumn::make('nombre')
                    ->label('Capacidad')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('icon')
                    ->label('Icono')
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                IconColumn::make('estado')
                    ->label('Estado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),
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
                EditAction::make()
                    ->label('Editar'),

                Action::make('cambiarEstado')
                    ->label(fn ($record) => $record->estado === 'activo' ? 'Desactivar' : 'Activar')
                    ->icon(fn ($record) => $record->estado === 'activo' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->estado === 'activo' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Capacidad' : 'Activar Capacidad')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar esta capacidad? No se mostrará en el sitio web.'
                        : '¿Estás seguro de activar esta capacidad? Se mostrará en el sitio web.'
                    )
                    ->action(function ($record) {
                        $nuevoEstado = $record->estado === 'activo' ? 'inactivo' : 'activo';
                        $record->update(['estado' => $nuevoEstado]);
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('desactivarSeleccionados')
                        ->label('Desactivar Seleccionados')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Desactivar Capacidades')
                        ->modalDescription('¿Estás seguro de desactivar las capacidades seleccionadas?')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'inactivo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('activarSeleccionados')
                        ->label('Activar Seleccionados')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Activar Capacidades')
                        ->modalDescription('¿Estás seguro de activar las capacidades seleccionadas?')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay capacidades registradas')
            ->emptyStateDescription('Crea la primera capacidad para mostrar en la sección de infraestructura del landing.')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
