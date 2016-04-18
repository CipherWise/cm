<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOption extends Model
{
    protected $table = 'type_options';
    //
    
    public static function type_of($option)
    {
        return TypeOption::where('type_of', $option)
               ->orderBy('type_option', 'desc')
               ->get();
    }
}
