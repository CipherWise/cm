<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterClass extends Model
{
    protected $table = 'classes';
    //
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character');
    }
    
    public function levels()
    {
        return $this->hasMany('App\Models\ClassLevel');
    }
    
    public function level_spells()
    {
        return $this->hasMany('App\Models\ClassLevelSpell');
    }
    
    public function archtypes()
    {
        return $this->hasMany('App\Models\ClassArchtype');
    }
}
