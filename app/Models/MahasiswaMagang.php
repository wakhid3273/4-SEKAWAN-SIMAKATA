<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMagang extends Model
{
    protected $table = 'mahasiswa_magang';
    protected $fillable = [
        'nama',
        'nim',
        'kegiatan',
        'status',
        'alasan_penolakan',
        'angkatan',
        'posisi',
        'periode',
        'cv_file',
        'transkrip_file',
        'perusahaan_id'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
