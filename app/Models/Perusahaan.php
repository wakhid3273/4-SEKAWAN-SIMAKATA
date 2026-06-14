<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $fillable = [
        'nama',
        'lokasi',
        'jenis_kegiatan',
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

    // Jumlah alumni = total mahasiswa magang yang pernah ada
    public function getJumlahAlumniAttribute(): int
    {
        return $this->magang()->count() ?: $this->jumlah_mahasiswa;
    }
}
