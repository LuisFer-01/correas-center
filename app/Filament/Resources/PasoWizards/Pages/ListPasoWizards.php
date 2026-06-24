<?php

namespace App\Filament\Resources\PasoWizards\Pages;

use App\Filament\Resources\PasoWizards\PasoWizardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPasoWizards extends ListRecords
{
    protected static string $resource = PasoWizardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Paso'),
        ];
    }
}
