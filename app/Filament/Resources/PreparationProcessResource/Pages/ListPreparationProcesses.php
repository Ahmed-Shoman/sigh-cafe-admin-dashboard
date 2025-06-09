<?php

namespace App\Filament\Resources\PreparationProcessResource\Pages;

use App\Filament\Resources\PreparationProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPreparationProcesses extends ListRecords
{
    protected static string $resource = PreparationProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
