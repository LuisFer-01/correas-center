<?php

namespace App\Filament\Resources\Composicions\Pages;

use App\Filament\Resources\Composicions\ComposicionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComposicions extends ListRecords
{
    protected static string $resource = ComposicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva Composición'),
        ];
    }
}
