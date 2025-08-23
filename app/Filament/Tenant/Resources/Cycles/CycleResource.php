<?php

namespace App\Filament\Tenant\Resources\Cycles;

use App\Filament\Tenant\Resources\Cycles\Pages\CreateCycle;
use App\Filament\Tenant\Resources\Cycles\Pages\EditCycle;
use App\Filament\Tenant\Resources\Cycles\Pages\ListCycles;
use App\Filament\Tenant\Resources\Cycles\Pages\ViewCycle;
use App\Filament\Tenant\Resources\Cycles\Schemas\CycleForm;
use App\Filament\Tenant\Resources\Cycles\Schemas\CycleInfolist;
use App\Filament\Tenant\Resources\Cycles\Tables\CyclesTable;
use App\Models\Cycle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CycleResource extends Resource
{
    protected static ?string $model = Cycle::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartPie;

    protected static ?string $recordTitleAttribute = 'Cycles';

    public static function form(Schema $schema): Schema
    {
        return CycleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CycleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CyclesTable::configure($table);
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
            'index' => ListCycles::route('/'),
            'create' => CreateCycle::route('/create'),
            'view' => ViewCycle::route('/{record}'),
            'edit' => EditCycle::route('/{record}/edit'),
        ];
    }
}
