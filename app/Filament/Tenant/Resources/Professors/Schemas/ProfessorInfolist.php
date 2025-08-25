<?php

namespace App\Filament\Tenant\Resources\Professors\Schemas;

use Filament\Schemas\Schema;
use App\Services\InfolistService;
use Filament\Infolists\Components\TextEntry;

class ProfessorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getProfessorInfolist());
    }
}
