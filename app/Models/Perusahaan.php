<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BroadcastsEvents;

class Perusahaan extends Model
{
    use BroadcastsEvents;
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

    public function broadcastOn($event)
    {
        return new \Illuminate\Broadcasting\Channel('perusahaan');
    }
}
