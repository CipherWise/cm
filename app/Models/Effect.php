<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    //
    
    // Specials via the effect_specials m2mpm pivot table. TypeOption = 'specials'
    public function feats()
    {
        return $this->morphedByMany('App\Models\Feat', 'effect_special');
    }
    
    public function special_abilities()
    {
        return $this->morphedByMany('App\Models\SpecialAbility', 'effect_special');
    }
    
    public function spells()
    {
        return $this->morphedByMany('App\Models\Spell', 'effect_special');
    }
}
