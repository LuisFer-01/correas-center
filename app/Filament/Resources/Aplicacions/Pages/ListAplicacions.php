<?php

namespace App\Filament\Resources\Aplicacions\Pages;

use App\Filament\Resources\Aplicacions\AplicacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAplicacions extends ListRecords
{
    protected static string $resource = AplicacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Aplicación'),
        ];
    }
}
