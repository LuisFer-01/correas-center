<?php

namespace App\Filament\Resources\Categorias\RelationManagers;

use App\Models\Aplicacion;
use App\Models\Caracteristica;
use App\Models\Composicion;
use App\Models\GamaProducto;
use App\Models\Marca;
use App\Models\Medida;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Actions\BulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
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
                        Select::make('marca_id')
                            ->label('Marca')
                            ->relationship('marca', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Marca asociada a este detalle (opcional)'),

                        Select::make('gama_producto_id')
                            ->label('Gama / Serie')
                            ->relationship('gamaProducto', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Gama o serie del producto (opcional)'),
                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('caracteristica_id')
                            ->label('Característica Técnica')
                            ->relationship('caracteristica', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Característica técnica destacada (opcional)'),

                        Select::make('composicion_id')
                            ->label('Composición')
                            ->relationship('composicion', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Composición del material (opcional)'),
                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('medida_id')
                            ->label('Medida Base')
                            ->relationship('medida', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->live() // Para reactividad si quisieras mostrar el valor por defecto
                            ->helperText('Selecciona la medida técnica base'),

                        TextInput::make('valor_personalizado')
                            ->label('Valor Personalizado (Opcional)')
                            ->numeric()
                            ->step(0.0001)
                            ->nullable()
                            ->helperText('Si se ingresa un valor, sustituirá a la magnitud de la medida base.'),
                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('aplicacion_id')
                            ->label('Aplicación')
                            ->relationship('aplicacion', 'nombre')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Aplicación o sector de uso (opcional)'),

                        TextInput::make('orden')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Orden de visualización dentro de esta categoría'),
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

                TextColumn::make('valor_final')
                    ->label('Valor Final')
                    ->state(function ($record) {
                        $valor = $record->valor_personalizado ?? $record->medida?->magnitud;
                        $unidad = $record->medida?->tipoMedida?->representacion;
                        return $valor !== null ? "{$valor} {$unidad}" : '—';
                    })
                    ->badge()
                    ->color('success'),

                TextColumn::make('gamaProducto.nombre')
                    ->label('Gama')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->toggleable(),

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
            ->emptyStateDescription('Agrega detalles técnicos como marcas, gamas, características, etc.')
            ->emptyStateIcon('heroicon-o-clipboard-document-list');
    }
}
