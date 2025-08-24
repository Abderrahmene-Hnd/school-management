<?php

namespace App\Filament\Tenant\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use App\Services\InfolistService;
use Filament\Infolists\Components\TextEntry;

class LevelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getLevelInfolist());
    }
}
