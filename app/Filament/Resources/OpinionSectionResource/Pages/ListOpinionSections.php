<?php

namespace App\Filament\Resources\OpinionSectionResource\Pages;

use App\Filament\Resources\OpinionSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use EditRecord\Concerns\Translatable;

class ListOpinionSections extends ListRecords
{
    protected static string $resource = OpinionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
