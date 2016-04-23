<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterClass extends Model
{
    protected $table = 'classes';
    //
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'character_class');
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
    
    public static function types()
    {
        return CharacterClass::select('type')->distinct('type')->get();
    }
    
    
    // Specials via the class_special m2mpm pivot table. TypeOption = 'specials'
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
