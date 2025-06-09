<?php

namespace App\Filament\Resources\MemorySectionResource\Pages;

use App\Filament\Resources\MemorySectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemorySection extends EditRecord
{
    protected static string $resource = MemorySectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
