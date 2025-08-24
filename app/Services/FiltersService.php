<?php

namespace App\Services;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;

class FiltersService
{
    /** ---------- Session FILTERS ---------- */
    public static function getSessionFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('Du'),
                    DatePicker::make('until')->label('Au'),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                )
                ->label('Date de création'),
        ];
    }

    /** ---------- FIELD FILTERS ---------- */
    public static function getFieldFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('Du'),
                    DatePicker::make('until')->label('Au'),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                )
                ->label('Date de création'),
        ];
    }

    /** ---------- SPECIALITY FILTERS ---------- */
    public static function getSpecialityFilters(): array
    {
        return [
            Filter::make('field_id')
                ->form([
                    Select::make('field_id')
                        ->label('Domaine')
                        ->relationship('field', 'name')
                        ->searchable(),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when($data['field_id'], fn($q, $id) => $q->where('field_id', $id))
                ),
        ];
    }

    /** ---------- CYCLE FILTERS ---------- */
    public static function getCycleFilters(): array
    {
        return [
            Filter::make('duration')
                ->form([
                    Select::make('duration')
                        ->label('Durée (années)')
                        ->options([
                            1 => '1 an',
                            2 => '2 ans',
                            3 => '3 ans',
                            5 => '5 ans',
                        ]),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when($data['duration'], fn($q, $d) => $q->where('duration', $d))
                ),
        ];
    }

    /** ---------- LEVEL FILTERS ---------- */
    public static function getLevelFilters(): array
    {
        return [
            Filter::make('cycle_id')
                ->form([
                    Select::make('cycle_id')
                        ->label('Cycle')
                        ->relationship('cycle', 'name')
                        ->searchable(),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when($data['cycle_id'], fn($q, $id) => $q->where('cycle_id', $id))
                ),
        ];
    }

    /** ---------- COURSE FILTERS ---------- */
    public static function getCourseFilters(): array
    {
        return [
            Filter::make('type')
                ->form([
                    Select::make('type')
                        ->label('Type de cours')
                        ->options([
                            'mandatory' => 'Obligatoire',
                            'elective' => 'Optionnel',
                        ]),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when($data['type'], fn($q, $t) => $q->where('type', $t))
                ),

            Filter::make('professor_id')
                ->form([
                    Select::make('professor_id')
                        ->label('Professeur')
                        ->relationship('professors', 'last_name')
                        ->searchable(),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when(
                        $data['professor_id'],
                        fn($q, $id) =>
                        $q->whereHas('professors', fn($sub) => $sub->where('id', $id))
                    )
                ),
        ];
    }

    /** ---------- ROOM FILTERS ---------- */
    public static function getRoomFilters(): array
    {
        return [
            Filter::make('type')
                ->form([
                    Select::make('type')
                        ->label('Type de salle')
                        ->options([
                            'amphi' => 'Amphithéâtre',
                            'salle' => 'Salle de cours',
                            'laboratoire' => 'Laboratoire',
                        ]),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query->when($data['type'], fn($q, $t) => $q->where('type', $t))
                ),

            TernaryFilter::make('capacity')
                ->label('Capacité définie')
                ->placeholder('Indifférent')
                ->trueLabel('Avec capacité')
                ->falseLabel('Sans capacité')
                ->queries(
                    true: fn($q) => $q->whereNotNull('capacity'),
                    false: fn($q) => $q->whereNull('capacity'),
                ),
        ];
    }

    /** ---------- PROFESSOR FILTERS ---------- */
    public static function getProfessorFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('from')->label('Du'),
                    DatePicker::make('until')->label('Au'),
                ])
                ->query(
                    fn($query, array $data) =>
                    $query
                        ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                        ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']))
                )
                ->label('Date de création'),
        ];
    }
}
