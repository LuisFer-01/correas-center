<?php

namespace App\Filament\Resources\Industrias\Pages;

use App\Filament\Resources\Industrias\IndustriaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIndustrias extends ListRecords
{
    protected static string $resource = IndustriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Industria'),
        ];
    }
}
