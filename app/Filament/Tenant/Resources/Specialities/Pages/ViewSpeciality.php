<?php

namespace App\Filament\Tenant\Resources\Specialities\Pages;

use App\Filament\Tenant\Resources\Specialities\SpecialityResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpeciality extends ViewRecord
{
    protected static string $resource = SpecialityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
