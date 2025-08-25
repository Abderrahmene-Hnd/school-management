<?php

namespace App\Filament\Tenant\Resources\Sessions\Tables;

use Filament\Tables\Table;
use App\Services\TableService;
use App\Services\FiltersService;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class SessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(TableService::getSessionTable())
            ->filters(FiltersService::getSessionFilters())
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
