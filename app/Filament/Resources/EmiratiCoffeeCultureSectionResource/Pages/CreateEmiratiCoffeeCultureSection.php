<?php

namespace App\Filament\Resources\EmiratiCoffeeCultureSectionResource\Pages;

use App\Filament\Resources\EmiratiCoffeeCultureSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use EditRecord\Concerns\Translatable;


class CreateEmiratiCoffeeCultureSection extends CreateRecord
{
    protected static string $resource = EmiratiCoffeeCultureSectionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
}

}
