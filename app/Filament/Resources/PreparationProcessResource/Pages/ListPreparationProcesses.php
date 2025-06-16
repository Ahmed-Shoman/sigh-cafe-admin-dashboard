<?php

namespace App\Filament\Resources\PreparationProcessResource\Pages;

use App\Filament\Resources\PreparationProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use EditRecord\Concerns\Translatable;

class ListPreparationProcesses extends ListRecords
{
    protected static string $resource = PreparationProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
