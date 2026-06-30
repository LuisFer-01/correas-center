<?php

namespace App\Filament\Resources\Suscriptors\Tables;

use App\Filament\Resources\Suscriptors\SuscriptorResource;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SuscriptorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'activo' => 'success',
                        'inactivo' => 'warning',
                        'desuscrito' => 'danger',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'activo' => 'heroicon-o-check-circle',
                        'inactivo' => 'heroicon-o-pause-circle',
                        'desuscrito' => 'heroicon-o-x-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->sortable(),

                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->placeholder('Sin nombre')
                    ->limit(25),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->limit(30),

                TextColumn::make('email_verificado_at')
                    ->label('Verificado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->badge()
                    ->color(fn (?string $state): string => $state ? 'success' : 'gray')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'Sí' : 'No'),

                TextColumn::make('created_at')
                    ->label('Suscrito')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                        'desuscrito' => 'Desuscrito',
                    ]),
            ])
            ->actions([
                // Ver detalle
                Action::make('ver')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn ($record) => SuscriptorResource::getUrl('view', ['record' => $record])),

                // Marcar como activo
                Action::make('activar')
                    ->label('Activar')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Activar Suscriptor')
                    ->modalDescription('¿Activar este suscriptor? Recibirá newsletters nuevamente.')
                    ->action(function ($record) {
                        $record->update(['estado' => 'activo']);
                    })
                    ->visible(fn ($record) => $record->estado !== 'activo'),

                // Marcar como inactivo
                Action::make('desactivar')
                    ->label('Desactivar')
                    ->icon('heroicon-o-pause-circle')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Desactivar Suscriptor')
                    ->modalDescription('¿Desactivar este suscriptor? No recibirá newsletters.')
                    ->action(function ($record) {
                        $record->update(['estado' => 'inactivo']);
                    })
                    ->visible(fn ($record) => $record->estado === 'activo'),

                // Marcar como desuscrito
                Action::make('desuscribir')
                    ->label('Desuscribir')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Desuscribir')
                    ->modalDescription('¿Desuscribir permanentemente a este usuario?')
                    ->action(function ($record) {
                        $record->update(['estado' => 'desuscrito']);
                    })
                    ->visible(fn ($record) => $record->estado !== 'desuscrito'),

                // Enviar email
                Action::make('enviarEmail')
                    ->label('Enviar Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->url(fn ($record) => "mailto:{$record->email}?subject=Newsletter - Correas Center")
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('activarSeleccionados')
                        ->label('Activar Seleccionados')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'activo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('desactivarSeleccionados')
                        ->label('Desactivar Seleccionados')
                        ->icon('heroicon-o-pause-circle')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'inactivo']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('desuscribirSeleccionados')
                        ->label('Desuscribir Seleccionados')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'desuscrito']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('exportarEmails')
                        ->label('Exportar Emails')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('info')
                        ->action(function ($records) {
                            $emails = $records->pluck('email')->implode(', ');
                            // Copiar al portapapeles o descargar
                            return response()->streamDownload(function () use ($emails) {
                                echo $emails;
                            }, 'suscriptores-emails.txt');
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay suscriptores')
            ->emptyStateDescription('Los suscriptores del newsletter aparecerán aquí.')
            ->emptyStateIcon('heroicon-o-envelope-open');
    }
}
