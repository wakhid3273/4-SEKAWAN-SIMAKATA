<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMagang extends Model
{
    protected $table = 'mahasiswa_magang';
    protected $fillable = [
        'user_id',
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
        'portofolio_file',
        'perusahaan_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
