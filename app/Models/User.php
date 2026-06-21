<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nim', 'password', 'role', 'nama_lengkap', 'angkatan', 'program_studi',
        'semester_aktif', 'status_akademik', 'email', 'nomor_telepon', 'last_login_at', 'avatar',
        'profile_photo', 'cover_type', 'cover_file'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'last_login_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
