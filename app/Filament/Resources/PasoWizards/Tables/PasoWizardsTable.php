<?php

namespace App\Filament\Resources\PasoWizards\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PasoWizardsTable
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
                    ->label('Identificador')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->badge()
                    ->color('info'),

                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('fuente_datos')
                    ->label('Fuente de Datos')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'industrias' => 'success',
                        'productos' => 'primary',
                        'categorias' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'industrias' => 'Industrias',
                        'productos' => 'Productos',
                        'categorias' => 'Categorías',
                        default => $state,
                    }),

                TextColumn::make('campo_filtro')
                    ->label('Campo Filtro')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Sin filtro')
                    ->badge()
                    ->color('warning')
                    ->default('—'),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

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
                SelectFilter::make('fuente_datos')
                    ->label('Fuente de Datos')
                    ->options([
                        'industrias' => 'Industrias',
                        'productos' => 'Productos',
                        'categorias' => 'Categorías',
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
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Paso' : 'Activar Paso')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar este paso? No se mostrará en el Product Selector.'
                        : '¿Estás seguro de activar este paso? Se mostrará en el Product Selector.'
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
                        ->modalHeading('Desactivar Pasos')
                        ->modalDescription('¿Estás seguro de desactivar los pasos seleccionados?')
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
                        ->modalHeading('Activar Pasos')
                        ->modalDescription('¿Estás seguro de activar los pasos seleccionados?')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay pasos registrados')
            ->emptyStateDescription('Crea el primer paso para configurar el Product Selector del landing.')
            ->emptyStateIcon('heroicon-o-list-bullet');
    }
}
