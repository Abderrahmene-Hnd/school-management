<?php

namespace App\Filament\Tenant\Resources\Sessions\Pages;

use App\Filament\Tenant\Resources\Sessions\SessionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSession extends CreateRecord
{
    protected static string $resource = SessionResource::class;
}
