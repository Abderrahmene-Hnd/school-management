<?php

namespace App\Filament\Tenant\Resources\Professors\Pages;

use App\Filament\Tenant\Resources\Professors\ProfessorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProfessor extends ViewRecord
{
    protected static string $resource = ProfessorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
