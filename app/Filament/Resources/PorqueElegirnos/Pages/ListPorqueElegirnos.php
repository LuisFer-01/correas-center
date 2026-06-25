<?php

namespace App\Filament\Resources\PorqueElegirnos\Pages;

use App\Filament\Resources\PorqueElegirnos\PorqueElegirnosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPorqueElegirnos extends ListRecords
{
    protected static string $resource = PorqueElegirnosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Elemento'),
        ];
    }
}
