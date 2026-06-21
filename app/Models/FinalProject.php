<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'submitted_at', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
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
