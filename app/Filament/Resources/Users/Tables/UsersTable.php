<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(30),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->limit(30),

                TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'super_admin' => 'danger',
                        'admin' => 'warning',
                        'editor' => 'info',
                        'vendedor' => 'success',
                        'viewer' => 'gray',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),

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

                TextColumn::make('email_verified_at')
                    ->label('Email Verificado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

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
                SelectFilter::make('roles')
                    ->label('Rol')
                    ->options(Role::pluck('name', 'id'))
                    ->multiple()
                    ->relationship('roles', 'name'),
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),

                // ✅ NUEVA ACCIÓN: Asignar Rol
                Action::make('asignarRol')
                    ->label('Asignar Rol')
                    ->icon('heroicon-o-shield-check')
                    ->color('primary')
                    ->form([
                        Select::make('roles')
                            ->label('Roles')
                            ->options(Role::pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required()
                            ->helperText('Selecciona los roles que tendrá este usuario'),
                    ])
                    ->action(function ($record, array $data): void {
                        $record->syncRoles($data['roles']);
                    })
                    ->successNotificationTitle('Roles asignados correctamente')
                    ->modalHeading('Asignar Roles')
                    ->modalDescription('Selecciona los roles para este usuario. Los roles determinan qué recursos puede acceder.'),

                Action::make('cambiarEstado')
                    ->label(fn ($record) => $record->estado === 'activo' ? 'Desactivar' : 'Activar')
                    ->icon(fn ($record) => $record->estado === 'activo' ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->estado === 'activo' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->estado === 'activo' ? 'Desactivar Usuario' : 'Activar Usuario')
                    ->modalDescription(fn ($record) => $record->estado === 'activo'
                        ? '¿Estás seguro de desactivar este usuario? No podrá iniciar sesión.'
                        : '¿Estás seguro de activar este usuario? Podrá iniciar sesión nuevamente.'
                    )
                    ->action(function ($record) {
                        $record->update(['estado' => $record->estado === 'activo' ? 'inactivo' : 'activo']);
                    })
                    ->visible(fn ($record) => $record->id !== auth()->id()), // No permitir cambiar estado del usuario actual
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('desactivarSeleccionados')
                        ->label('Desactivar Seleccionados')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Desactivar Usuarios')
                        ->modalDescription('¿Estás seguro de desactivar los usuarios seleccionados? No podrán iniciar sesión.')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if ($record->id !== auth()->id()) {
                                    $record->update(['estado' => 'inactivo']);
                                }
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('activarSeleccionados')
                        ->label('Activar Seleccionados')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Activar Usuarios')
                        ->modalDescription('¿Estás seguro de activar los usuarios seleccionados? Podrán iniciar sesión.')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('asignarRolMasivo')
                        ->label('Asignar Rol Masivo')
                        ->icon('heroicon-o-shield-check')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->form([
                            Select::make('roles')
                                ->label('Roles')
                                ->options(Role::pluck('name', 'id'))
                                ->multiple()
                                ->preload()
                                ->searchable()
                                ->required()
                                ->helperText('Selecciona los roles que tendrán los usuarios seleccionados'),
                        ])
                        ->modalHeading('Asignar Roles Masivamente')
                        ->modalDescription('Esta acción reemplazará los roles actuales de los usuarios seleccionados.')
                        ->action(function ($records, array $data) {
                            foreach ($records as $record) {
                                $record->syncRoles($data['roles']);
                            }
                        })
                        ->successNotificationTitle('Roles asignados correctamente a los usuarios seleccionados')
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay usuarios registrados')
            ->emptyStateDescription('Crea el primer usuario para acceder al sistema.')
            ->emptyStateIcon('heroicon-o-users');
    }
}
