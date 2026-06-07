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
}
