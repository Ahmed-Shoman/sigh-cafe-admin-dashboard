<?php

namespace App\Filament\Resources\OpinionSectionResource\Pages;

use App\Filament\Resources\OpinionSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpinionSections extends ListRecords
{
    protected static string $resource = OpinionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
