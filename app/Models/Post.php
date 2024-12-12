<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'preview', 
        'user_id', 
        'category_id', 
    ];
}
