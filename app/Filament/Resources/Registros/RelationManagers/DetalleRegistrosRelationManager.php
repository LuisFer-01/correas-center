<?php

namespace App\Filament\Resources\Registros\RelationManagers;

use App\Filament\Traits\HasLucideIcons;
use App\Models\DetalleRegistro;
use App\Models\Empresa;
use Filament\Actions\Action;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DetalleRegistrosRelationManager extends RelationManager
{
    use HasLucideIcons;

    protected static string $relationship = 'detalleRegistros';

    protected static ?string $title = 'Asignaciones a Empresas';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ej: Visión, +25 Años, Calidad Garantizada')
                    ->helperText('Título del elemento específico.'),

                TextInput::make('subtitulo')
                    ->label('Subtítulo / Dato')
                    ->maxLength(255)
                    ->placeholder('Ej: De experiencia, 500m2')
                    ->helperText('Opcional. Usado principalmente en Estadísticas.'),

                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(4)
                    ->maxLength(1000)
                    ->placeholder('Descripción detallada...')
                    ->helperText('Contenido principal del elemento.'),

                Select::make('icono')
                    ->label('Icono')
                    ->options(self::getLucideIcons())
                    ->searchable()
                    ->helperText('Selecciona un icono de Lucide para este elemento.'),

                TextInput::make('stats')
                    ->label('Estadística (Stats)')
                    ->maxLength(100)
                    ->placeholder('Ej: 500m², 10,000+')
                    ->helperText('Opcional. Dato numérico destacado.'),

                TextInput::make('orden')
                    ->label('Orden de Visualización')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->default(fn () => (DetalleRegistro::max('orden') ?? 0) + 1)
                    ->helperText(fn () => 'Siguiente orden disponible: ' . ((DetalleRegistro::max('orden') ?? 0) + 1)),

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
            ->columns([
                TextColumn::make('orden')
                        ->label('Orden')
                        ->numeric()
                        ->sortable()
                        ->alignCenter(),

                    TextColumn::make('titulo')
                        ->label('Título')
                        ->searchable()
                        ->sortable()
                        ->weight('bold')
                        ->limit(30),

                    TextColumn::make('descripcion')
                        ->label('Subtítulo/Stats')
                        ->searchable()
                        ->limit(20)
                        ->toggleable(),

                    TextColumn::make('icono')
                        ->label('Icono')
                        ->badge()
                        ->color('warning')
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
                        ->options([
                            'activo' => 'Activo',
                            'inactivo' => 'Inactivo',
                        ]),
                ])
                ->headerActions([
                    CreateAction::make()
                        ->label('Nuevo Elemento'),
                ])
                ->actions([
                    EditAction::make()->label('Editar'),
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
                ->emptyStateHeading('No hay elementos en esta sección')
                ->emptyStateDescription('Agrega elementos como Visión, Misión o Estadísticas aquí.');
    }
}
