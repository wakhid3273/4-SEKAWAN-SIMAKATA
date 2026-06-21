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

    // Helper methods for status
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    // Status display for frontend
    public function getStatusDisplayAttribute()
    {
        $statuses = [
            'pending' => 'Pending Review',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }
}
