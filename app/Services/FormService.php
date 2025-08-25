<?php

namespace App\Services;

use App\Models\Room;
use App\Models\User;
use App\Models\Cycle;
use App\Models\Field;
use App\Models\Level;
use App\Models\Course;
use App\Enums\RoomType;
use App\Enums\CourseType;
use App\Models\Professor;
use App\Models\Speciality;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

class FormService
{
    /** ---------- Session FORM ---------- */
    public static function getSessionForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true)->maxLength(10),
            TextInput::make('name')->label('Nom du domaine')->required(),
            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- FIELD FORM ---------- */
    public static function getFieldForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true)->maxLength(10),
            TextInput::make('name')->label('Nom du domaine')->required(),
            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- SPECIALITY FORM ---------- */
    public static function getSpecialityForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true)->maxLength(10),
            TextInput::make('name')->label('Nom de la spécialité')->required(),

            // SELECT avec toutes les features
            Select::make('field_id')
                ->label('Filière')
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    Field::where('name', 'like', "%{$search}%")
                        ->limit(50)
                        ->pluck('name', 'id')
                        ->toArray()
                )
                ->getOptionLabelUsing(fn($value): ?string => Field::find($value)?->name)
                ->loadingMessage('Chargement des domaines...')
                ->noSearchResultsMessage('Aucun domaine trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-rectangle-stack')
                ->suffixIconColor('primary')
                ->native(false)
                ->createOptionForm(self::getFieldForm())
                ->createOptionUsing(fn(array $data) => Field::create($data)->getKey())
                ->required(),

            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- CYCLE FORM ---------- */
    public static function getCycleForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true),
            TextInput::make('name')->label('Nom du cycle')->required(),
            TextInput::make('duration')->label('Durée (années)')->numeric(),

            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- LEVEL FORM ---------- */
    public static function getLevelForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true),
            TextInput::make('name')->label('Nom du niveau')->required(),
            TextInput::make('years')->label('Années')->numeric(),
            TextInput::make('semesters')->label('Semestres')->numeric(),

            Select::make('cycle_id')
                ->label('Cycle')
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    Cycle::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray()
                )
                ->getOptionLabelUsing(fn($value): ?string => Cycle::find($value)?->name)
                ->loadingMessage('Chargement des cycles...')
                ->noSearchResultsMessage('Aucun cycle trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-rectangle-group')
                ->suffixIconColor('primary')
                ->native(false)
                ->createOptionForm(self::getCycleForm())
                ->createOptionUsing(fn(array $data) => Cycle::create($data)->getKey())
                ->required(),

            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- COURSE FORM ---------- */
    public static function getCourseForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true),
            TextInput::make('name')->label('Nom du cours')->required(),
            TextInput::make('credits')->label('Crédits')->numeric(),
            TextInput::make('per_week')->label('Heures / semaine')->numeric(),
            TextInput::make('per_month')->label('Heures / mois')->numeric(),

            Select::make('type')
                ->label('Type de cours')
                ->options(CourseType::asSelectArray())
                ->required(),

            // Levels
            Select::make('levels')
                ->label('Niveaux')
                ->multiple()
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    Level::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray()
                )
                ->getOptionLabelUsing(fn($value): ?string => Level::find($value)?->name)
                ->loadingMessage('Chargement des niveaux...')
                ->noSearchResultsMessage('Aucun niveau trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-academic-cap')
                ->suffixIconColor('primary')
                ->native(false)
                ->createOptionForm(self::getLevelForm())
                ->createOptionUsing(fn(array $data) => Level::create($data)->getKey()),

            // Professors
            Select::make('professors')
                ->label('Professeurs')
                ->multiple()
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    User::where('last_name', 'like', "%{$search}%")
                        ->orWhere('first_name', 'like', "%{$search}%")
                        ->limit(50)
                        ->get()
                        ->mapWithKeys(fn($p) => [$p->id => $p->first_name . ' ' . $p->last_name])
                        ->toArray()
                )
                ->getOptionLabelUsing(
                    fn($value): ?string =>
                    User::find($value)?->first_name . ' ' . User::find($value)?->last_name
                )
                ->loadingMessage('Chargement des professeurs...')
                ->noSearchResultsMessage('Aucun professeur trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-user-group')
                ->suffixIconColor('primary')
                ->native(false),
            // ->createOptionForm(self::getProfessorForm())
            // ->createOptionUsing(fn(array $data) => User::create($data)->getKey()),

            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- ROOM FORM ---------- */
    public static function getRoomForm(): array
    {
        return [
            TextInput::make('code')->label('Code')->required()->unique(ignoreRecord: true),
            TextInput::make('name')->label('Nom de la salle')->required(),
            TextInput::make('capacity')->label('Capacité')->numeric(),

            Select::make('type')
                ->label('Type de salle')
                ->options(RoomType::asSelectArray())
                ->required(),

            Select::make('fields')
                ->label('Filières')
                ->multiple()
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    Field::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray()
                )
                ->getOptionLabelUsing(fn($value): ?string => Field::find($value)?->name)
                ->loadingMessage('Chargement des domaines...')
                ->noSearchResultsMessage('Aucun domaine trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-book-open')
                ->suffixIconColor('primary')
                ->native(false)
                ->createOptionForm(self::getFieldForm())
                ->createOptionUsing(fn(array $data) => Field::create($data)->getKey()),

            Textarea::make('description')->label('Description'),
        ];
    }

    /** ---------- PROFESSOR FORM ---------- */
    public static function getProfessorForm(): array
    {
        return [
            TextInput::make('firstname')
                ->label('Prénom')
                ->required(),

            TextInput::make('lastname')
                ->label('Nom')
                ->required(),

            TextInput::make('title')
                ->label('Titre')
                ->required(),

            TextInput::make('phone')
                ->label('Téléphone')
                ->tel()
                ->required(),

            DatePicker::make('birthday')
                ->label('Date de naissance')
                ->required(),


            Select::make('courses')
                ->label('Cours')
                ->relationship('courses', 'name')
                ->multiple()
                ->searchable()
                ->getSearchResultsUsing(
                    fn(string $search): array =>
                    Course::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray()
                )
                ->getOptionLabelUsing(fn($value): ?string => Course::find($value)?->name)
                ->loadingMessage('Chargement des Cours...')
                ->noSearchResultsMessage('Aucun Cour trouvé.')
                ->searchingMessage('Recherche en cours...')
                ->suffixIcon('heroicon-m-book-open')
                ->suffixIconColor('primary')
                ->native(false)
                ->createOptionForm(self::getCourseForm())
                ->createOptionUsing(fn(array $data) => Course::create($data)->getKey()),

            Textarea::make('bio')
                ->columnSpanFull(),
            TextInput::make('email')
                ->label('Email address')
                ->email()
                ->required(),
            DateTimePicker::make('email_verified_at'),
            TextInput::make('password')
                ->password()
                ->required(),
        ];
    }
}
