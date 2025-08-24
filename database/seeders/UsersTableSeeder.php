<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserType;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.site'],
            [
                'firstname' => 'Admin',
                'lastname' => 'User',
                'phone' => '1234567890',
                'birthday' => '1998-11-03',
                'type' => UserType::SuperAdmin,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
