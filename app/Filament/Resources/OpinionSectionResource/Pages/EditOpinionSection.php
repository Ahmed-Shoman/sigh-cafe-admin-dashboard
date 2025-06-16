<?php

namespace App\Filament\Resources\OpinionSectionResource\Pages;

use App\Filament\Resources\OpinionSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use EditRecord\Concerns\Translatable;

class EditOpinionSection extends EditRecord
{
    protected static string $resource = OpinionSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
