<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    use HasFactory;

    protected $table = 'gromming';

    protected $fillable = [
        'uuid',
        'user_id',
        'hewan',
        'nohp',
        'alamat',
        'tanggal',
        'waktu',
        'status', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
