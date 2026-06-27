<?php

namespace App\Filament\Resources\Medidas\Tables;

use App\Models\TipoMedida;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MedidasTable
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
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('tipoMedida.nombre')
                    ->label('Tipo')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('tipoMedida.representacion')
                    ->label('Unidad')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('warning'),

                TextColumn::make('magnitud')
                    ->label('Magnitud')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('medida_completa')
                    ->label('Medida Completa')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('detalle_categorias_count')
                    ->label('Usos')
                    ->counts('detalleCategorias')
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
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ]),
                SelectFilter::make('tipo_medida_id')
                    ->label('Tipo de Medida')
                    ->options(TipoMedida::where('estado', 'activo')
                        ->orderBy('nombre')
                        ->pluck('nombre', 'id')),
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
            ->emptyStateHeading('No hay medidas registradas')
            ->emptyStateDescription('Crea la primera medida para usar en los detalles de categorías.')
            ->emptyStateIcon('heroicon-o-arrows-pointing-out');
    }
}
