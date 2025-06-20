<?php

namespace App\Filament\Resources\EmiratiCoffeeCultureSectionResource\Pages;

use App\Filament\Resources\EmiratiCoffeeCultureSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use EditRecord\Concerns\Translatable;

class EditEmiratiCoffeeCultureSection extends EditRecord
{
    protected static string $resource = EmiratiCoffeeCultureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
