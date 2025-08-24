<?php

namespace App\Filament\Tenant\Resources\Professors\Pages;

use App\Filament\Tenant\Resources\Professors\ProfessorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfessor extends CreateRecord
{
    protected static string $resource = ProfessorResource::class;
}
