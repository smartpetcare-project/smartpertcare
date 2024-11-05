<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'tbl_rating';

    protected $fillable = [
        'uuid',
        'user_id',
        'rating',
        'rateable_id',
        'rateable_type',
        'review',
    ];

    protected $hidden = [
        'id',
        'user_id',
    ];

    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
