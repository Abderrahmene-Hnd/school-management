<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@admin.site'],
            [
                'firstname' => 'Admin',
                'lastname' => 'User',
                'phone' => '1234567890',
                'birthday' => '1998-11-03',
                'type' => UserType::SuperAdmin,
                'password' => Hash::make('password'), // ✅ Hash the password
                'email_verified_at' => now(),
            ]
        );

        // Assign super-admin role
        Artisan::call('shield:super-admin', [
            '--user' => $user->id,
            '--panel' => 'admin'
        ]);

        // Generate permissions & policies for admin panel
        Artisan::call('shield:generate', [
            '--all' => true,
            '--ignore-existing-policies' => true,
            '--panel' => 'admin',
        ]);

        // Generate permissions & policies for tenant panel
        Artisan::call('shield:generate', [
            '--all' => true,
            '--ignore-existing-policies' => true,
            '--panel' => 'tenant',
        ]);
    }
}
