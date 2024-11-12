<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';

    protected $fillable = [
        'uuid',
        'name',
        'type'
    ];
    

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
