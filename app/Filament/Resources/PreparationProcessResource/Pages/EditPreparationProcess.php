<?php

namespace App\Filament\Resources\PreparationProcessResource\Pages;

use App\Filament\Resources\PreparationProcessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreparationProcess extends EditRecord
{
    protected static string $resource = PreparationProcessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
