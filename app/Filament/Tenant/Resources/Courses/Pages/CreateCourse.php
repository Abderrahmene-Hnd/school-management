<?php

namespace App\Filament\Tenant\Resources\Courses\Pages;

use App\Filament\Tenant\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
}
