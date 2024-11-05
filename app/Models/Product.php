<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_product';

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'category_id',
        'price',
        'is_publish',
        'image_preview',        
        'image_header',
        'image_content',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }
}
