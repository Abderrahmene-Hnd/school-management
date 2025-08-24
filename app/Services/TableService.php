<?php

namespace App\Services;

use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class TableService
{
    /** ---------- Session TABLE ---------- */
    public static function getSessionTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom du domaine')
                ->sortable()
                ->searchable(),

            TextColumn::make('description')
                ->label('Description')
                ->limit(50),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- FIELD TABLE ---------- */
    public static function getFieldTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom du domaine')
                ->sortable()
                ->searchable(),

            TextColumn::make('description')
                ->label('Description')
                ->limit(50),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- SPECIALITY TABLE ---------- */
    public static function getSpecialityTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom de la spécialité')
                ->sortable()
                ->searchable(),

            TextColumn::make('field.name')
                ->label('Filière')
                ->sortable()
                ->searchable(),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- CYCLE TABLE ---------- */
    public static function getCycleTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom du cycle')
                ->sortable()
                ->searchable(),

            TextColumn::make('duration')
                ->label('Durée (années)')
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- LEVEL TABLE ---------- */
    public static function getLevelTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom du niveau')
                ->sortable()
                ->searchable(),

            TextColumn::make('cycle.name')
                ->label('Cycle')
                ->sortable()
                ->searchable(),

            TextColumn::make('years')
                ->label('Années'),

            TextColumn::make('semesters')
                ->label('Semestres'),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- COURSE TABLE ---------- */
    public static function getCourseTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom du cours')
                ->sortable()
                ->searchable(),

            TextColumn::make('credits')
                ->label('Crédits'),

            TextColumn::make('per_week')
                ->label('Heures / semaine'),

            TextColumn::make('per_month')
                ->label('Heures / mois'),

            TextColumn::make('type')
                ->label('Type')
                ->badge()
                ->colors([
                    'primary' => 'mandatory',
                    'success' => 'elective',
                ]),

            TextColumn::make('levels.name')
                ->label('Niveaux')
                ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                ->limit(30),

            TextColumn::make('professors.last_name')
                ->label('Professeurs')
                ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                ->limit(30),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- ROOM TABLE ---------- */
    public static function getRoomTable(): array
    {
        return [
            TextColumn::make('code')
                ->label('Code')
                ->sortable()
                ->searchable(),

            TextColumn::make('name')
                ->label('Nom de la salle')
                ->sortable()
                ->searchable(),

            TextColumn::make('capacity')
                ->label('Capacité'),

            TextColumn::make('type')
                ->label('Type')
                ->badge()
                ->colors([
                    'info' => 'amphi',
                    'success' => 'salle',
                    'warning' => 'laboratoire',
                ]),

            TextColumn::make('fields.name')
                ->label('Filières')
                ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                ->limit(30),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /** ---------- PROFESSOR TABLE ---------- */
    public static function getProfessorTable(): array
    {
        return [
            TextColumn::make('firstname')
                ->label('Prénom')
                ->sortable()
                ->searchable(),

            TextColumn::make('lastname')
                ->label('Nom')
                ->sortable()
                ->searchable(),

            TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable(),

            TextColumn::make('phone')
                ->label('Téléphone'),

            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }
}
