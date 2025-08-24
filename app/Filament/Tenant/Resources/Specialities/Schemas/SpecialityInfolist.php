<?php

namespace App\Filament\Tenant\Resources\Specialities\Schemas;

use Filament\Schemas\Schema;
use App\Services\InfolistService;
use Filament\Infolists\Components\TextEntry;

class SpecialityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getSpecialityInfolist());
    }
}
