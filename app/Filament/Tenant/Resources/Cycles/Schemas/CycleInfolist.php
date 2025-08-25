<?php

namespace App\Filament\Tenant\Resources\Cycles\Schemas;

use Filament\Schemas\Schema;
use App\Services\InfolistService;
use Filament\Infolists\Components\TextEntry;

class CycleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getCycleInfolist());
    }
}
