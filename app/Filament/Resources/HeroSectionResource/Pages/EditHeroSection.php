<?php

namespace App\Filament\Resources\HeroSectionResource\Pages;

use App\Filament\Resources\HeroSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use EditRecord\Concerns\Translatable;

class EditHeroSection extends EditRecord
{
    protected static string $resource = HeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
