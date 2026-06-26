<?php

namespace App\Filament\Resources\Productos\RelationManagers;

use App\Models\Marca;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DetalleProductosRelationManager extends RelationManager
{
    protected static string $relationship = 'detalleProductos';

    protected static ?string $title = 'Marcas Asociadas';

    protected static ?string $recordTitleAttribute = 'marca.nombre';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('marca_id')
                    ->label('Marca')
                    ->options(Marca::where('estado', 'activo')
                        ->orderBy('nombre')
                        ->pluck('nombre', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Selecciona la marca asociada a este producto. Puedes buscar por nombre.')
                    ->placeholder('Busca o selecciona una marca...')
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre de la Marca')
                            ->required()
                            ->maxLength(255),
                    ]),

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
            ->recordTitleAttribute('marca.nombre')
            ->columns([
                ImageColumn::make('marca.logo')
                    ->label('Logo')
                    ->size(60)
                    ->disk('public')
                    ->defaultImageUrl(url('/images/placeholder.png')),

                TextColumn::make('marca.nombre')
                    ->label('Marca')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

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
                    ->label('Asociado')
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
                    ->label('Asociar Marca'),
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
            ->emptyStateHeading('No hay marcas asociadas')
            ->emptyStateDescription('Asocia marcas a este producto para mostrarlas en el catálogo.')
            ->emptyStateIcon('heroicon-o-tag');
    }
}
