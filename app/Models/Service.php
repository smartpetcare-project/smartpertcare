<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'tbl_service';

    protected $fillable = [
        'uuid',
        'title',
        'content',
        'user_id',
        'category_id',
        'is_publish',
        'image_preview',
        'image_header',
        'image_content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
