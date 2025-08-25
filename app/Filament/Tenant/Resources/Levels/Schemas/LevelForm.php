<?php

namespace App\Filament\Tenant\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use App\Services\FormService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FormService::getLevelForm());
    }
}
