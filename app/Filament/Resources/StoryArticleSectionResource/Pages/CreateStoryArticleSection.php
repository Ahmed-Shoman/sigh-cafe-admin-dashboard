<?php

namespace App\Filament\Resources\StoryArticleSectionResource\Pages;

use App\Filament\Resources\StoryArticleSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use EditRecord\Concerns\Translatable;


class CreateStoryArticleSection extends CreateRecord
{
    protected static string $resource = StoryArticleSectionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
}

}
