<?php

namespace App\Filament\Tenant\Resources\Cycles\Pages;

use App\Filament\Tenant\Resources\Cycles\CycleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCycle extends ViewRecord
{
    protected static string $resource = CycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
