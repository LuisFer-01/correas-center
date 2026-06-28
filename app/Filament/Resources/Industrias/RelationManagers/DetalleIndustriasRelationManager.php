<?php

namespace App\Filament\Resources\Industrias\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Actions\BulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use App\Models\Categoria;
use App\Models\Servicio;

class DetalleIndustriasRelationManager extends RelationManager
{
    protected static string $relationship = 'detalleIndustrias';

    protected static ?string $title = 'Categorías y Servicios Asociados';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('grupo')
                    ->label('Tipo de Elemento')
                    ->options([
                        'Categoria' => 'Categoría de Producto',
                        'Servicio' => 'Servicio',
                    ])
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, Set $set) {
                        $set('campo_id', null);
                    })
                    ->helperText('Selecciona si vas a asociar una categoría o un servicio'),

                Select::make('campo_id')
                    ->label('Elemento Asociado')
                    ->required()
                    ->options(function (Get $get) {
                        $grupo = $get('grupo');
                        return match($grupo) {
                            'Categoria' => Categoria::where('estado', 'activo')
                                ->orderBy('orden')
                                ->pluck('nombre', 'id'),
                            'Servicio' => Servicio::where('estado', 'activo')
                                ->orderBy('nombre')
                                ->pluck('nombre', 'id'),
                            default => [],
                        };
                    })
                    ->searchable()
                    ->preload()
                    ->helperText('Selecciona la categoría o servicio específico')
                    ->placeholder(function (Get $get) {
                        $grupo = $get('grupo');
                        return match($grupo) {
                            'Categoria' => 'Selecciona una categoría...',
                            'Servicio' => 'Selecciona un servicio...',
                            default => 'Primero selecciona el tipo de elemento',
                        };
                    })
                    ->disabled(fn (Get $get) => !$get('grupo')),

                TextInput::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Orden de visualización'),

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
                TextColumn::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('grupo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Categoria' => 'primary',
                        'Servicio' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('elemento_nombre')
                    ->label('Elemento')
                    ->state(function ($record) {
                        if ($record->grupo === 'Categoria') {
                            $categoria = Categoria::find($record->campo_id);
                            return $categoria?->nombre ?? 'N/A';
                        } elseif ($record->grupo === 'Servicio') {
                            $servicio = Servicio::find($record->campo_id);
                            return $servicio?->nombre ?? 'N/A';
                        }
                        return 'N/A';
                    })
                    ->searchable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'inactivo' => 'danger',
                        default => 'gray',
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
                SelectFilter::make('grupo')
                    ->label('Tipo')
                    ->options([
                        'Categoria' => 'Categoría',
                        'Servicio' => 'Servicio',
                    ]),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nueva Asociación'),
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
            ->emptyStateHeading('No hay asociaciones')
            ->emptyStateDescription('Asocia categorías y servicios a esta industria.')
            ->emptyStateIcon('heroicon-o-link');
    }
}
