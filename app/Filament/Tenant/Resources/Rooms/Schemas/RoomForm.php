<?php

namespace App\Filament\Tenant\Resources\Rooms\Schemas;

use Filament\Schemas\Schema;
use App\Services\FormService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FormService::getRoomForm());
    }
}
