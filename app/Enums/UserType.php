<?php

namespace App\Enums;

enum UserType: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Client = 'client';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
