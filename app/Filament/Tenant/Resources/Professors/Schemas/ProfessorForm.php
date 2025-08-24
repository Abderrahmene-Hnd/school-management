<?php

namespace App\Filament\Tenant\Resources\Professors\Schemas;

use Filament\Schemas\Schema;
use App\Services\FormService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

class ProfessorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(FormService::getProfessorForm());
    }
}
