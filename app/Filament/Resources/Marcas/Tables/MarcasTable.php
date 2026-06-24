<?php

namespace App\Filament\Resources\Marcas\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MarcasTable
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

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->imageSize(80)
                    ->circular()
                    ->disk('public')
                    ->defaultImageUrl(url('/default/placeholder.png')),

                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
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
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),

                Action::make('cambiarEstado')
                    ->label(fn ($record) => $record->estado === 'activo' ? 'Desactivar' : 'Activar')
                    ->icon(fn ($record) => $record->estado === 'activo' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->estado === 'activo' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Marca' : 'Activar Marca')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar esta marca? No se mostrará en el sitio web.'
                        : '¿Estás seguro de activar esta marca? Se mostrará en el sitio web.'
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
                        ->modalHeading('Desactivar Marcas')
                        ->modalDescription('¿Estás seguro de desactivar las marcas seleccionadas?')
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
                        ->modalHeading('Activar Marcas')
                        ->modalDescription('¿Estás seguro de activar las marcas seleccionadas?')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay marcas registradas')
            ->emptyStateDescription('Crea la primera marca para mostrar en el carrusel del landing.')
            ->emptyStateIcon('heroicon-o-tag');
    }
}
