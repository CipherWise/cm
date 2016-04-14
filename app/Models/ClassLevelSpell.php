<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassLevelSpell extends Model
{
    protected $table = 'classes_levels_spells';
    //
    public function character_class()
    {
        return $this->belongsTo('App\Models\Class');
    }
}
