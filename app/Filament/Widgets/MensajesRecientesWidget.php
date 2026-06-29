<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Contactos\ContactoResource;
use App\Models\Contacto;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class MensajesRecientesWidget extends TableWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contacto::query()
                    ->where('estado', 'nuevo')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->weight('bold')
                    ->limit(20),

                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->limit(25),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->limit(15),

                TextColumn::make('mensaje')
                    ->label('Mensaje')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->mensaje),

                TextColumn::make('created_at')
                    ->label('Recibido')
                    ->since()
                    ->sortable(),

                TextColumn::make('acciones')
                    ->label('Acciones')
                    ->html(fn ($record) => '
                        <a href="' . ContactoResource::getUrl('view', ['record' => $record]) . '"
                           class="inline-flex items-center gap-1 text-xs text-primary-600 hover:text-primary-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Ver
                        </a>
                    '),
            ])
            ->emptyStateHeading('No hay mensajes nuevos')
            ->emptyStateDescription('Todos los mensajes han sido atendidos 🎉')
            ->emptyStateIcon('heroicon-o-envelope-open');
    }

    public function getHeading(): string
    {
        $count = Contacto::where('estado', 'nuevo')->count();
        return "📩 Mensajes Recientes ({$count} sin leer)";
    }
}
