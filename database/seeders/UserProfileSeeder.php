<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['nim' => '12345678'],
            [
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        $user->update([
            'nama_lengkap' => 'Aditya Dharmawan',
            'angkatan' => '2020',
            'program_studi' => 'Informatika',
            'semester_aktif' => 'Gasal 2024/2025',
            'status_akademik' => 'Aktif',
            'email' => 'aditya.d@student.mail.com',
            'nomor_telepon' => '+62 812-3456-7890',
            'last_login_at' => now()->subHours(2),
        ]);
    }
}
