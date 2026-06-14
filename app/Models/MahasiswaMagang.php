<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMagang extends Model
{
    protected $table = 'mahasiswa_magang';
    protected $fillable = [
        'nama',
        'angkatan',
        'posisi',
        'periode',
        'perusahaan_id'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
