<?php

namespace App\Filament\Resources\Registros\RelationManagers;

use App\Models\Empresa;
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

class DetalleRegistrosRelationManager extends RelationManager
{
    protected static string $relationship = 'detalleRegistros';

    protected static ?string $title = 'Asignaciones a Empresas';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('empresa_id')
                    ->label('Empresa')
                    ->options(Empresa::pluck('nombre', 'id'))
                    ->required()
                    ->searchable()
                    ->helperText('Selecciona la empresa a la que se asignará este registro'),

                TextInput::make('grupo')
                    ->label('Grupo')
                    ->required()
                    ->maxLength(255)
                    ->default('Información Corporativa')
                    ->placeholder('Ej: Información Corporativa')
                    ->helperText('Grupo al que pertenece este registro'),

                TextInput::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->required()
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
            ->recordTitleAttribute('grupo')
            ->defaultSort('orden', 'asc')
            ->reorderable('orden')
            ->columns([
                TextColumn::make('empresa.nombre')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('grupo')
                    ->label('Grupo')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

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
                SelectFilter::make('empresa_id')
                    ->label('Empresa')
                    ->options(Empresa::pluck('nombre', 'id')),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nueva Asignación'),
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
            ->emptyStateHeading('No hay asignaciones')
            ->emptyStateDescription('Asigna este registro a una empresa para que se muestre en el sitio web.')
            ->emptyStateIcon('heroicon-o-building-office');
    }
}
