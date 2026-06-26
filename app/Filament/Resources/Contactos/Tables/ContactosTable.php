<?php

namespace App\Filament\Resources\Contactos\Tables;

use App\Filament\Resources\Contactos\ContactoResource;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactosTable
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
                        'nuevo' => 'danger',
                        'leido' => 'warning',
                        'respondido' => 'success',
                        'archivado' => 'gray',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'nuevo' => 'heroicon-o-envelope',
                        'leido' => 'heroicon-o-envelope-open',
                        'respondido' => 'heroicon-o-check-circle',
                        'archivado' => 'heroicon-o-archive-box',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->sortable(),

                /* TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(25),

                TextColumn::make('empresa')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable()
                    ->placeholder('N/A')
                    ->limit(20)
                    ->toggleable(), */

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->limit(30),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Teléfono copiado'),

                TextColumn::make('mensaje')
                    ->label('Mensaje')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->mensaje)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'nuevo' => 'Nuevo',
                        'leido' => 'Leído',
                        'respondido' => 'Respondido',
                        'archivado' => 'Archivado',
                    ]),
            ])
            ->actions([
                // ✅ CORREGIDO: Usar ContactoResource::getUrl() en lugar de static::class::getUrl()
                Action::make('ver')
                    ->label('Ver')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn ($record) => ContactoResource::getUrl('view', ['record' => $record])),

                // Marcar como leído
                Action::make('marcarLeido')
                    ->label('Marcar como Leído')
                    ->icon('heroicon-o-envelope-open')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Marcar como Leído')
                    ->modalDescription('¿Marcar este mensaje como leído?')
                    ->action(function ($record) {
                        $record->update(['estado' => 'leido']);
                    })
                    ->visible(fn ($record) => $record->estado === 'nuevo'),

                // Marcar como respondido
                Action::make('marcarRespondido')
                    ->label('Marcar como Respondido')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Marcar como Respondido')
                    ->modalDescription('¿Marcar este mensaje como respondido?')
                    ->action(function ($record) {
                        $record->update(['estado' => 'respondido']);
                    })
                    ->visible(fn ($record) => in_array($record->estado, ['nuevo', 'leido'])),

                // Archivar
                Action::make('archivar')
                    ->label('Archivar')
                    ->icon('heroicon-o-archive-box')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->modalHeading('Archivar Mensaje')
                    ->modalDescription('¿Archivar este mensaje?')
                    ->action(function ($record) {
                        $record->update(['estado' => 'archivado']);
                    })
                    ->visible(fn ($record) => $record->estado !== 'archivado'),

                // Enviar email rápido
                Action::make('enviarEmail')
                    ->label('Enviar Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->url(fn ($record) => "mailto:{$record->email}?subject=Re: Consulta desde Correas Center")
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('marcarLeido')
                        ->label('Marcar como Leídos')
                        ->icon('heroicon-o-envelope-open')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'leido']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('marcarRespondido')
                        ->label('Marcar como Respondidos')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'respondido']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),

                    BulkAction::make('archivar')
                        ->label('Archivar Seleccionados')
                        ->icon('heroicon-o-archive-box')
                        ->color('gray')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['estado' => 'archivado']);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ])
            ->emptyStateHeading('No hay mensajes de contacto')
            ->emptyStateDescription('Los mensajes enviados desde el formulario de contacto aparecerán aquí.')
            ->emptyStateIcon('heroicon-o-inbox-stack');
    }
}
