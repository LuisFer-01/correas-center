<?php

namespace App\Filament\Resources\Diferencials\Pages;

use App\Filament\Resources\Diferencials\DiferencialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDiferencials extends ListRecords
{
    protected static string $resource = DiferencialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Diferencial'),
        ];
    }
}
