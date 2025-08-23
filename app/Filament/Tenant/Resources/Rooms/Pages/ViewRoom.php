<?php

namespace App\Filament\Tenant\Resources\Rooms\Pages;

use App\Filament\Tenant\Resources\Rooms\RoomResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRoom extends ViewRecord
{
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
