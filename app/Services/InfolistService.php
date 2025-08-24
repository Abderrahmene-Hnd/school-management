<?php

namespace App\Services;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class InfolistService
{
    /** ---------- Session INFOLIST ---------- */
    public static function getSessionInfolist(): array
    {
        return [
            Section::make('Session')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom du domaine'),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }
    /** ---------- FIELD INFOLIST ---------- */
    public static function getFieldInfolist(): array
    {
        return [
            Section::make('Filière')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom du domaine'),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- SPECIALITY INFOLIST ---------- */
    public static function getSpecialityInfolist(): array
    {
        return [
            Section::make('Spécialité')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom de la spécialité'),
                    TextEntry::make('field.name')->label('Domaine'),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- CYCLE INFOLIST ---------- */
    public static function getCycleInfolist(): array
    {
        return [
            Section::make('Cycle')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom du cycle'),
                    TextEntry::make('duration')->label('Durée (années)'),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('specialities.name')
                        ->label('Spécialités')
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- LEVEL INFOLIST ---------- */
    public static function getLevelInfolist(): array
    {
        return [
            Section::make('Niveau')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom du niveau'),
                    TextEntry::make('cycle.name')->label('Cycle'),
                    TextEntry::make('years')->label('Années'),
                    TextEntry::make('semesters')->label('Semestres'),
                    TextEntry::make('courses.name')
                        ->label('Cours')
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- COURSE INFOLIST ---------- */
    public static function getCourseInfolist(): array
    {
        return [
            Section::make('Cours')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom du cours'),
                    TextEntry::make('credits')->label('Crédits'),
                    TextEntry::make('per_week')->label('Heures / semaine'),
                    TextEntry::make('per_month')->label('Heures / mois'),
                    TextEntry::make('type')
                        ->label('Type')
                        ->badge()
                        ->colors([
                            'primary' => 'mandatory',
                            'success' => 'elective',
                        ]),
                    TextEntry::make('levels.name')
                        ->label('Niveaux')
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('professors')
                        ->label('Professeurs')
                        ->formatStateUsing(
                            fn($record) =>
                            $record->professors->map(fn($p) => $p->first_name . ' ' . $p->last_name)->toArray()
                        )
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- ROOM INFOLIST ---------- */
    public static function getRoomInfolist(): array
    {
        return [
            Section::make('Salle')
                ->schema([
                    TextEntry::make('code')->label('Code'),
                    TextEntry::make('name')->label('Nom de la salle'),
                    TextEntry::make('capacity')->label('Capacité'),
                    TextEntry::make('type')
                        ->label('Type')
                        ->badge()
                        ->colors([
                            'info' => 'amphi',
                            'success' => 'salle',
                            'warning' => 'laboratoire',
                        ]),
                    TextEntry::make('fields.name')
                        ->label('Domaines')
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('description')->label('Description')->markdown(),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }

    /** ---------- PROFESSOR INFOLIST ---------- */
    public static function getProfessorInfolist(): array
    {
        return [
            Section::make('Professeur')
                ->schema([
                    TextEntry::make('first_name')->label('Prénom'),
                    TextEntry::make('last_name')->label('Nom'),
                    TextEntry::make('email')->label('Email'),
                    TextEntry::make('phone')->label('Téléphone'),
                    TextEntry::make('courses.name')
                        ->label('Cours')
                        ->bulleted()
                        ->limitList(10),
                    TextEntry::make('created_at')->label('Créé le')->dateTime('d/m/Y H:i'),
                ]),
        ];
    }
}
