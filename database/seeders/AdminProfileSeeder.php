<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminProfileSeeder extends Seeder
{
    public function run()
    {
        // Temukan admin pertama untuk kita update
        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            $admin->update([
                'nama_lengkap' => 'Admin Utama',
                'nim' => 'ADM-2024-001',
                'email' => 'admin.utama@simakata.ac.id',
                'last_login_at' => now()->subHours(2), // 2 Jam yang lalu
            ]);
        }
    }
}
