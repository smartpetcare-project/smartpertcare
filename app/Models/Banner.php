<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'tbl_banner';
    protected $fillable = ['uuid', 'title', 'subtitle', 'image'];
    use HasFactory;
}
