<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('grupo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Producto' => 'primary',
                        'Aplicacion' => 'success',
                        'Servicio' => 'warning',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Producto' => 'heroicon-o-cube',
                        'Aplicacion' => 'heroicon-o-building-office',
                        'Servicio' => 'heroicon-o-wrench-screwdriver',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->sortable(),

                TextColumn::make('campo_relacionado')
                    ->label('Elemento')
                    ->state(function ($record) {
                        return match($record->grupo) {
                            'Producto' => $record->campo?->nombre ?? 'N/A',
                            'Aplicacion' => $record->campo?->nombre ?? 'N/A',
                            'Servicio' => $record->campo?->nombre ?? 'N/A',
                            default => 'N/A',
                        };
                    })
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('ruta')
                    ->label('Ruta')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->copyable()
                    ->tooltip('Click para copiar la ruta'),

                TextColumn::make('icon')
                    ->label('Icono')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('detalle_menus_count')
                    ->label('Submenús')
                    ->counts('detalleMenus')
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

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('grupo', 'asc')
            ->filters([
                SelectFilter::make('grupo')
                    ->label('Tipo de Menú')
                    ->options([
                        'Producto' => 'Producto',
                        'Aplicacion' => 'Aplicación',
                        'Servicio' => 'Servicio',
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
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Menú' : 'Activar Menú')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar este menú? No se mostrará en el sitio web.'
                        : '¿Estás seguro de activar este menú? Se mostrará en el sitio web.'
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
                        ->modalHeading('Desactivar Menús')
                        ->modalDescription('¿Estás seguro de desactivar los menús seleccionados?')
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
                        ->modalHeading('Activar Menús')
                        ->modalDescription('¿Estás seguro de activar los menús seleccionados?')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay menús registrados')
            ->emptyStateDescription('Crea el primer menú para configurar la navegación del sitio web.')
            ->emptyStateIcon('heroicon-o-bars-3');
    }
}
