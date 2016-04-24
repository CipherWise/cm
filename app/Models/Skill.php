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
    
    public function classes()
    {
        return $this->belongsToMany('App\Models\Character', 'character_skill');
    }
    
    public function specialties()
    {
        return $this->hasMany('App\Models\SkillSpecialty');
    }
}
