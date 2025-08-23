<?php

namespace App\Filament\Tenant\Resources\Specialities\Pages;

use App\Filament\Tenant\Resources\Specialities\SpecialityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpecialities extends ListRecords
{
    protected static string $resource = SpecialityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
