<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Developer',
                'username' => 'itsDeveloper',
                'email' => 'developer@gmail.com',
                'password' => Hash::make('Dev3l@per2023'),
            ],
        ];

        foreach ($user as $key => $value) {
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => $value['password'],
            ]);

        }
    }
}
