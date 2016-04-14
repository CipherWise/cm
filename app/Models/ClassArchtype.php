<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassArchtype extends Model
{
    protected $table = 'classes_archtypes';
    //
    public function character_class()
    {
        return $this->belongsTo('App\Models\Class');
    }
}
