<?php

namespace App\Filament\Tenant\Resources\Sessions\Pages;

use App\Filament\Tenant\Resources\Sessions\SessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSessions extends ListRecords
{
    protected static string $resource = SessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
