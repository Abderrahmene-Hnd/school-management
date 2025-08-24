<?php

namespace App\Filament\Tenant\Resources\Fields\Schemas;

use Filament\Schemas\Schema;
use App\Services\FormService;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class FieldForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FormService::getFieldForm());
    }
}
