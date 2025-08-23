<?php

namespace App\Filament\Tenant\Resources\Sessions;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\AcademicSession;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Tenant\Resources\Sessions\Pages\EditSession;
use App\Filament\Tenant\Resources\Sessions\Pages\ViewSession;
use App\Filament\Tenant\Resources\Sessions\Pages\ListSessions;
use App\Filament\Tenant\Resources\Sessions\Pages\CreateSession;
use App\Filament\Tenant\Resources\Sessions\Schemas\SessionForm;
use App\Filament\Tenant\Resources\Sessions\Tables\SessionsTable;
use App\Filament\Tenant\Resources\Sessions\Schemas\SessionInfolist;

class SessionResource extends Resource
{
    protected static ?string $model = AcademicSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;

    protected static ?string $recordTitleAttribute = 'Sessions';

    public static function form(Schema $schema): Schema
    {
        return SessionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SessionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SessionsTable::configure($table);
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
            'index' => ListSessions::route('/'),
            'create' => CreateSession::route('/create'),
            'view' => ViewSession::route('/{record}'),
            'edit' => EditSession::route('/{record}/edit'),
        ];
    }
}
