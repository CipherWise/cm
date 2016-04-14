<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassLevel extends Model
{
    protected $table = 'classes_levels';
    //
    public function character_class()
    {
        return $this->belongsTo('App\Models\Class');
    }
}
