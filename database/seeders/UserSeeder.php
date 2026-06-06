<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 4 admin default
        $admins = [
            ['nim' => 'H1D024003', 'password' => 'wakhid'],
            ['nim' => 'H1D024004', 'password' => 'astria'],
            ['nim' => 'H1D024041', 'password' => 'novia'],
            ['nim' => 'H1D024043', 'password' => 'naila'],
        ];

        foreach ($admins as $admin) {
            User::create([
                'nim' => $admin['nim'],
                'password' => Hash::make($admin['password']),
                'role' => 'admin',
            ]);
        }
    }
}
