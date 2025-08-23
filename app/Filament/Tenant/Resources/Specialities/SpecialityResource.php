<?php

namespace App\Filament\Tenant\Resources\Specialities;

use App\Filament\Tenant\Resources\Specialities\Pages\CreateSpeciality;
use App\Filament\Tenant\Resources\Specialities\Pages\EditSpeciality;
use App\Filament\Tenant\Resources\Specialities\Pages\ListSpecialities;
use App\Filament\Tenant\Resources\Specialities\Pages\ViewSpeciality;
use App\Filament\Tenant\Resources\Specialities\Schemas\SpecialityForm;
use App\Filament\Tenant\Resources\Specialities\Schemas\SpecialityInfolist;
use App\Filament\Tenant\Resources\Specialities\Tables\SpecialitiesTable;
use App\Models\Speciality;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SpecialityResource extends Resource
{
    protected static ?string $model = Speciality::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Star;

    protected static ?string $recordTitleAttribute = 'Specialités';

    public static function form(Schema $schema): Schema
    {
        return SpecialityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SpecialityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpecialitiesTable::configure($table);
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
            'index' => ListSpecialities::route('/'),
            'create' => CreateSpeciality::route('/create'),
            'view' => ViewSpeciality::route('/{record}'),
            'edit' => EditSpeciality::route('/{record}/edit'),
        ];
    }
}
