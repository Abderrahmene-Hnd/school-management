<?php

namespace App\Filament\Tenant\Resources\Sessions\Schemas;

use Filament\Schemas\Schema;
use App\Services\FormService;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FormService::getSessionForm());
    }
}
