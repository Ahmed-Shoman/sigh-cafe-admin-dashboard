<?php

namespace App\Filament\Resources\StatisticSectionResource\Pages;

use App\Filament\Resources\StatisticSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatisticSection extends EditRecord
{
    protected static string $resource = StatisticSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
