<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $fillable = [
        'nama',
        'lokasi',
        'tentang',
        'website',
        'email',
        'alamat',
        'jumlah_mahasiswa'
    ];

    public function magang()
    {
        return $this->hasMany(MahasiswaMagang::class);
    }
}
