<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('firstname')
                    ->label('Prénom'),
                TextEntry::make('lastname')
                    ->label('Nom'),
                TextEntry::make('phone')
                    ->label('Téléphone'),
                TextEntry::make('birthday')
                    ->label('Date de naissance')
                    ->date(),
                TextEntry::make('type')
                    ->label('Rôle utilisateur'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('email_verified_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
