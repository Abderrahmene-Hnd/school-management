<?php

namespace App\Filament\Tenant\Resources\Levels;

use App\Filament\Tenant\Resources\Levels\Pages\CreateLevel;
use App\Filament\Tenant\Resources\Levels\Pages\EditLevel;
use App\Filament\Tenant\Resources\Levels\Pages\ListLevels;
use App\Filament\Tenant\Resources\Levels\Pages\ViewLevel;
use App\Filament\Tenant\Resources\Levels\Schemas\LevelForm;
use App\Filament\Tenant\Resources\Levels\Schemas\LevelInfolist;
use App\Filament\Tenant\Resources\Levels\Tables\LevelsTable;
use App\Models\Level;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    protected static ?string $recordTitleAttribute = 'Niveaux';

    public static function form(Schema $schema): Schema
    {
        return LevelForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LevelInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LevelsTable::configure($table);
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
            'index' => ListLevels::route('/'),
            'create' => CreateLevel::route('/create'),
            'view' => ViewLevel::route('/{record}'),
            'edit' => EditLevel::route('/{record}/edit'),
        ];
    }
}
