<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'image', 'description', 'btn_name', 'btn_link'
    ];
}
