<?php

namespace App\Filament\Tenant\Resources\Courses;

use App\Filament\Tenant\Resources\Courses\Pages\CreateCourse;
use App\Filament\Tenant\Resources\Courses\Pages\EditCourse;
use App\Filament\Tenant\Resources\Courses\Pages\ListCourses;
use App\Filament\Tenant\Resources\Courses\Pages\ViewCourse;
use App\Filament\Tenant\Resources\Courses\Schemas\CourseForm;
use App\Filament\Tenant\Resources\Courses\Schemas\CourseInfolist;
use App\Filament\Tenant\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    protected static ?string $recordTitleAttribute = 'Cours';

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
            'create' => CreateCourse::route('/create'),
            'view' => ViewCourse::route('/{record}'),
            'edit' => EditCourse::route('/{record}/edit'),
        ];
    }
}
