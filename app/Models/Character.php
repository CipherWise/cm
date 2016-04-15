<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function party()
    {
        return $this->belongsTo('App\Models\Party');
    }
    
    public function classes()
    {
        return $this->belongsToMany( 'App\Models\CharacterClass', 'character_class')
          ->withPivot('level', 'xp');
    }
    
    public function race()
    {
        return $this->belongsTo('App\Models\Race');
    }
}
