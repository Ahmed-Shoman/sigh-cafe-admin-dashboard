<?php

namespace App\Filament\Resources\StatisticSectionResource\Pages;

use App\Filament\Resources\StatisticSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use EditRecord\Concerns\Translatable;


class EditStatisticSection extends EditRecord
{
    protected static string $resource = StatisticSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),

        ];
    }
}
