<?php

namespace App\Filament\Resources\StatisticSectionResource\Pages;

use App\Filament\Resources\StatisticSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use EditRecord\Concerns\Translatable;


class ListStatisticSections extends ListRecords
{
    protected static string $resource = StatisticSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
