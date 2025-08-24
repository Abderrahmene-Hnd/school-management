<?php

namespace App\Filament\Tenant\Resources\Courses\Tables;

use App\Models\Level;
use App\Enums\CourseType;
use App\Models\Professor;
use Filament\Tables\Table;
use App\Services\TableService;
use App\Services\FiltersService;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\Filter;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(TableService::getCourseTable())
            ->filters(FiltersService::getCourseFilters())
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
