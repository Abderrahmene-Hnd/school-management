<?php

namespace App\Filament\Tenant\Resources\Professors;

use BackedEnum;
use App\Models\User;
use App\Models\Professor;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Tenant\Resources\Professors\Pages\EditProfessor;
use App\Filament\Tenant\Resources\Professors\Pages\ViewProfessor;
use App\Filament\Tenant\Resources\Professors\Pages\ListProfessors;
use App\Filament\Tenant\Resources\Professors\Pages\CreateProfessor;
use App\Filament\Tenant\Resources\Professors\Schemas\ProfessorForm;
use App\Filament\Tenant\Resources\Professors\Tables\ProfessorsTable;
use App\Filament\Tenant\Resources\Professors\Schemas\ProfessorInfolist;

class ProfessorResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?int $navigationSort = 8;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    public static function form(Schema $schema): Schema
    {
        return ProfessorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProfessorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfessorsTable::configure($table);
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
            'index' => ListProfessors::route('/'),
            'create' => CreateProfessor::route('/create'),
            'view' => ViewProfessor::route('/{record}'),
            'edit' => EditProfessor::route('/{record}/edit'),
        ];
    }
    public static function getnavigationGroup(): ?string
    {
        return trans('Resources');
    }
    public static function getNavigationLabel(): string
    {
        return trans('Professeurs');
    }
    public static function getPluralModelLabel(): string
    {
        return trans('Professeurs');
    }
    public static function getModelLabel(): string
    {
        return trans('Professeurs');
    }
    public static function getLabel(): ?string
    {
        return trans('Professeur');
    }
}
