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
    
    public function player()
    {
        return $this->user();
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
    
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'character_skill')
          ->withPivot('specialty_id', 'ranks');
    }
    
    public function modifier($ability){
        
    }
    
    
    // Specials via the character_special m2mpm pivot table. TypeOption = 'specials'
    public function feats()
    {
        return $this->morphedByMany('App\Models\Feat', 'character_special');
    }
    
    public function special_abilities()
    {
        return $this->morphedByMany('App\Models\SpecialAbility', 'character_special');
    }
    
    public function spells()
    {
        return $this->morphedByMany('App\Models\Spell', 'character_special');
    }
    
    
    // Equipment via the character_equipement m2mpm pivot table. TypeOption = 'specials'
    public function ammunition()
    {
        return $this->morphedByMany('App\Models\Ammunition', 'character_equipment');
    }
    
    public function armor()
    {
        return $this->morphedByMany('App\Models\Armor', 'character_equipment');
    }
    
    public function items()
    {
        return $this->morphedByMany('App\Models\Item', 'character_equipment');
    }
    
    public function sustenance()
    {
        return $this->morphedByMany('App\Models\Sustenance', 'character_equipment');
    }
    
    public function weapons()
    {
        return $this->morphedByMany('App\Models\Weapon', 'character_equipment');
    }

}
