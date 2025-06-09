<?php

namespace App\Filament\Resources\StoryArticleSectionResource\Pages;

use App\Filament\Resources\StoryArticleSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStoryArticleSection extends EditRecord
{
    protected static string $resource = StoryArticleSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
