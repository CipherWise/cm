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
    
    
    // Specials via the character_special m2mpm pivot table. TypeOption = 'specials'
    public function feats()
    {
        return $this->morphedByMany('App\Models\Feat', 'class_special');
    }
    
    public function special_abilities()
    {
        return $this->morphedByMany('App\Models\SpecialAbility', 'class_special');
    }
    
    public function spells()
    {
        return $this->morphedByMany('App\Models\Spell', 'class_special');
    }
    
}
