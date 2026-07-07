<?php

namespace App\Filament\Resources\Categorias\RelationManagers;

use App\Models\Aplicacion;
use App\Models\Caracteristica;
use App\Models\Composicion;
use App\Models\Medida;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DetalleCategoriasRelationManager extends RelationManager
{
    protected static string $relationship = 'detalleCategorias';

    protected static ?string $title = 'Detalles Técnicos';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Select::make('caracteristica_id')
                            ->label('Característica Técnica')
                            ->relationship('caracteristica', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Característica técnica destacada (opcional)')
                            ->createOptionForm([
                                TextInput::make('nombre')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('descripcion')
                                    ->label('Descripción')
                                    ->rows(3)
                                    ->maxLength(500),
                                TextInput::make('orden')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                                Select::make('estado')
                                    ->label('Estado')
                                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                                    ->default('activo')
                                    ->required(),
                            ]),

                        Select::make('composicion_id')
                            ->label('Composición')
                            ->relationship('composicion', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Composición del material (opcional)')
                            ->createOptionForm([
                                TextInput::make('nombre')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('descripcion')
                                    ->label('Descripción')
                                    ->rows(3)
                                    ->maxLength(500),
                                TextInput::make('orden')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                                Select::make('estado')
                                    ->label('Estado')
                                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                                    ->default('activo')
                                    ->required(),
                            ]),
                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('medida_id')
                            ->label('Medida Base')
                            ->relationship('medida', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->live()
                            ->helperText('Selecciona la medida técnica base')
                            ->createOptionForm([
                                TextInput::make('nombre')
                                    ->label('Nombre de la Medida')
                                    ->required()
                                    ->maxLength(255),
                                Select::make('tipo_medida_id')
                                    ->label('Tipo de Medida')
                                    ->relationship('tipoMedida', 'nombre')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('nombre')
                                            ->label('Nombre del Tipo')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('abreviatura')
                                            ->label('Abreviatura')
                                            ->required()
                                            ->maxLength(50),
                                        TextInput::make('representacion')
                                            ->label('Representación')
                                            ->required()
                                            ->maxLength(50),
                                        Select::make('estado')
                                            ->label('Estado')
                                            ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                                            ->default('activo')
                                            ->required(),
                                    ]),
                                TextInput::make('magnitud')
                                    ->label('Magnitud / Valor')
                                    ->numeric()
                                    ->step(0.0001)
                                    ->nullable(),
                                TextInput::make('orden')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                                Select::make('estado')
                                    ->label('Estado')
                                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                                    ->default('activo')
                                    ->required(),
                            ]),

                        Select::make('aplicacion_id')
                            ->label('Aplicación')
                            ->relationship('aplicacion', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Aplicación o sector de uso (opcional)')
                            ->createOptionForm([
                                TextInput::make('nombre')
                                    ->label('Nombre de la Aplicación')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('orden')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                                Select::make('estado')
                                    ->label('Estado')
                                    ->options(['activo' => 'Activo', 'inactivo' => 'Inactivo'])
                                    ->default('activo')
                                    ->required(),
                            ]),
                    ]),

                Grid::make(2)
                    ->schema([
                        TextInput::make('orden')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Orden de visualización dentro de esta categoría'),

                        Select::make('estado')
                            ->label('Estado')
                            ->options([
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                            ])
                            ->default('activo')
                            ->required(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('medida.nombre')
            ->defaultSort('orden', 'asc')
            ->reorderable('orden')
            ->columns([
                TextColumn::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('medida.nombre')
                    ->label('Medida')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(20),

                TextColumn::make('medida.medida_completa')
                    ->label('Valor')
                    ->badge()
                    ->color('success'),

                TextColumn::make('caracteristica.nombre')
                    ->label('Característica')
                    ->searchable()
                    ->sortable()
                    ->limit(25)
                    ->toggleable(),

                TextColumn::make('composicion.nombre')
                    ->label('Composición')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->toggleable(),

                TextColumn::make('aplicacion.nombre')
                    ->label('Aplicación')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->toggleable(),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'inactivo' => 'danger',
                        default => 'gray',
                    })
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
            ->headerActions([
                CreateAction::make()
                    ->label('Nuevo Detalle'),
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
            ->emptyStateHeading('No hay detalles técnicos')
            ->emptyStateDescription('Agrega detalles técnicos como características, medidas, composiciones, etc.')
            ->emptyStateIcon('heroicon-o-clipboard-document-list');
    }
}
