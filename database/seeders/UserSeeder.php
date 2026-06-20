<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 4 admin default sesuai permintaan
        $admins = [
            ['nim' => 'wakhid', 'email' => 'wakhid@mhs.unsoed.ac.id', 'password' => 'wakhid3'],
            ['nim' => 'astria', 'email' => 'astria@mhs.unsoed.ac.id', 'password' => 'astria4'],
            ['nim' => 'novia', 'email' => 'novia@mhs.unsoed.ac.id', 'password' => 'novia41'],
            ['nim' => 'naila', 'email' => 'naila@mhs.unsoed.ac.id', 'password' => 'naila43'],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'nim' => $admin['nim'],
                    'password' => Hash::make($admin['password']),
                    'role' => 'admin',
                ]
            );
        }
    }
}
