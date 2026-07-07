<?php

namespace App\Filament\Resources\Menus\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DetalleMenusRelationManager extends RelationManager
{
    protected static string $relationship = 'detalleMenus';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ruta')
                    ->label('Ruta del Submenú')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ej: /products/correas/correas-en-v')
                    ->helperText('Ruta específica del submenú'),

                TextInput::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Orden de visualización (menor número = primero)'),

                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ruta')
            ->columns([
                TextColumn::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('ruta')
                    ->label('Ruta')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->copyable(),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'inactivo' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'activo' => 'heroicon-o-check-circle',
                        'inactivo' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
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
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nuevo Submenú'),
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),

                Action::make('cambiarEstado')
                    ->label(fn ($record) => $record->estado === 'activo' ? 'Desactivar' : 'Activar')
                    ->icon(fn ($record) => $record->estado === 'activo' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->estado === 'activo' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Asociación' : 'Activar Asociación')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar esta asociación? No se mostrará en el sitio web.'
                        : '¿Estás seguro de activar esta asociación? Se mostrará en el sitio web.'
                    )
                    ->action(function ($record) {
                        $record->update(['estado' => $record->estado === 'activo' ? 'inactivo' : 'activo']);
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('desactivarSeleccionados')
                        ->label('Desactivar Seleccionados')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['estado' => 'inactivo']))
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('activarSeleccionados')
                        ->label('Activar Seleccionados')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['estado' => 'activo']))
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay submenús')
            ->emptyStateDescription('Agrega submenús para crear un menú desplegable.')
            ->emptyStateIcon('heroicon-o-bars-3-bottom-right')
            ->reorderable('orden')
            ->defaultSort('orden');
    }
}
