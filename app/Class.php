<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterClass extends Model
{
    protected $table = 'classes';
    //
    public function characters()
    {
        return $this->belongsToMany('App\Character');
    }
}
