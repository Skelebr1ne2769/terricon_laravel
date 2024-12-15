<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fielder extends Model
{
    protected $fillable = [
        'field_name', 'field_value'
    ];

    public static function ff ($field_name) 
    {
        $field_value = self::where('field_name', $field_name)->first();
        if($field_value) {
            return $field_value->field_value;
        }
        return '';
    }
}
