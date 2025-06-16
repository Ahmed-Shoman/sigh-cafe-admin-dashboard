<?php

namespace App\Filament\Resources\StatisticSectionResource\Pages;

use App\Filament\Resources\StatisticSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStatisticSection extends CreateRecord
{
    protected static string $resource = StatisticSectionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
}

}
