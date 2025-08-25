<?php

namespace App\Filament\Tenant\Resources\Courses\Schemas;

use App\Services\InfolistService;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(InfolistService::getCourseInfolist());
    }
}
