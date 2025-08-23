<?php

namespace App\Filament\Tenant\Resources\Fields;

use App\Filament\Tenant\Resources\Fields\Pages\CreateField;
use App\Filament\Tenant\Resources\Fields\Pages\EditField;
use App\Filament\Tenant\Resources\Fields\Pages\ListFields;
use App\Filament\Tenant\Resources\Fields\Pages\ViewField;
use App\Filament\Tenant\Resources\Fields\Schemas\FieldForm;
use App\Filament\Tenant\Resources\Fields\Schemas\FieldInfolist;
use App\Filament\Tenant\Resources\Fields\Tables\FieldsTable;
use App\Models\Field;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    public static function form(Schema $schema): Schema
    {
        return FieldForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FieldInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FieldsTable::configure($table);
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
            'index' => ListFields::route('/'),
            'create' => CreateField::route('/create'),
            'view' => ViewField::route('/{record}'),
            'edit' => EditField::route('/{record}/edit'),
        ];
    }
    public static function getNavigationLabel(): string
    {
        return trans('Filières');
    }
    public static function getPluralModelLabel(): string
    {
        return trans('Filières');
    }
    public static function getModelLabel(): string
    {
        return trans('Filières');
    }
    public static function getLabel(): ?string
    {
        return trans('Filière');
    }
}
