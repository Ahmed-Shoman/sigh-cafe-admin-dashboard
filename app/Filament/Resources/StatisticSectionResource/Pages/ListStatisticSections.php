<?php

namespace App\Filament\Resources\StatisticSectionResource\Pages;

use App\Filament\Resources\StatisticSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatisticSections extends ListRecords
{
    protected static string $resource = StatisticSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
