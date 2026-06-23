<?php

namespace App\Filament\Resources\Menus\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
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
                DeleteAction::make()
                    ->label('Eliminar'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Eliminar Seleccionados'),
                ]),
            ])
            ->emptyStateHeading('No hay submenús')
            ->emptyStateDescription('Agrega submenús para crear un menú desplegable.')
            ->emptyStateIcon('heroicon-o-bars-3-bottom-right')
            ->reorderable('orden')
            ->defaultSort('orden');
    }
}
