<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('firstname')
                    ->label('Prénom')
                    ->required(),

                TextInput::make('lastname')
                    ->label('Nom')
                    ->required(),

                TextInput::make('phone')
                    ->label('Téléphone')
                    ->tel()
                    ->required(),

                DatePicker::make('birthday')
                    ->label('Date de naissance')
                    ->required(),

                Select::make('type')
                    ->label('Rôle utilisateur')
                    ->options([
                        \App\Enums\UserType::SuperAdmin => 'Super Admin',
                        \App\Enums\UserType::Admin => 'Admin',
                        \App\Enums\UserType::Client => 'Client',
                    ])

                    ->default(\App\Enums\UserType::Client)
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
            ]);
    }
}
