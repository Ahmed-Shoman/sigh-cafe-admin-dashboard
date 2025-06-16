<?php

namespace App\Filament\Resources\EmiratiCoffeeCultureSectionResource\Pages;

use App\Filament\Resources\EmiratiCoffeeCultureSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use EditRecord\Concerns\Translatable;

class ListEmiratiCoffeeCultureSections extends ListRecords
{
    protected static string $resource = EmiratiCoffeeCultureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
