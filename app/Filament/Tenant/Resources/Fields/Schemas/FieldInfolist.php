<?php

namespace App\Filament\Tenant\Resources\Fields\Schemas;

use Filament\Schemas\Schema;
use App\Services\InfolistService;
use Filament\Infolists\Components\TextEntry;

class FieldInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getFieldInfolist());
    }
}
