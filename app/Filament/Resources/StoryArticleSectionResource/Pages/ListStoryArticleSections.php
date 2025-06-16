<?php

namespace App\Filament\Resources\StoryArticleSectionResource\Pages;

use App\Filament\Resources\StoryArticleSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use EditRecord\Concerns\Translatable;

class ListStoryArticleSections extends ListRecords
{
    protected static string $resource = StoryArticleSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
