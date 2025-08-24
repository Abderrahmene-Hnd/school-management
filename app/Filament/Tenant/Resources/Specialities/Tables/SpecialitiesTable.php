<?php

namespace App\Filament\Tenant\Resources\Specialities\Tables;

use Filament\Tables\Table;
use App\Services\TableService;
use App\Services\FiltersService;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class SpecialitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(TableService::getSpecialityTable())
            ->filters(FiltersService::getSpecialityFilters())
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
