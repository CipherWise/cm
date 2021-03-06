<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feat extends Model
{
    //
    public function characters()
    {
        return $this->morphToMany('App\Models\Character', 'character_special');
    }
    
    public function effects()
    {
        return $this->morphToMany('App\Models\Effect', 'effect_special');
    }
}
