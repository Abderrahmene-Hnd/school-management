<?php

namespace App\Filament\Tenant\Resources\Cycles\Pages;

use App\Filament\Tenant\Resources\Cycles\CycleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCycle extends EditRecord
{
    protected static string $resource = CycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
