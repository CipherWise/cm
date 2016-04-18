<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'character_skill');
    }
}
