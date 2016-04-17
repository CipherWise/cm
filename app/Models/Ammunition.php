<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ammunition extends Model
{
    //
    public function characters()
    {
        return $this->morphToMany('App\Models\Character', 'character_special');
    }
}
