<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSpecialty extends Model
{
    protected $table = 'skills_specialties';
    //
    public function skill()
    {
        return $this->belongsTo('App\Models\Skill');
    }
    
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'character_skill');
    }
}
