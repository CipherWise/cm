<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\AbilityScore;
use App\Models\CharacterClass;
use App\Models\SkillSpecialty;
use Illuminate\Support\Collection;
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
    
    public function ranked_skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'character_skill')
          ->withPivot('specialty_id', 'ranks');
    }
    
    public function getSkillsAttribute(){
        
        $full_skills = new Collection();
        $skills = Skill::all();
        $specialties = SkillSpecialty::all();
        $ranked = $this->ranked_skills;
        $class_skills = array();
        
        // Build array of class skills
        $classes = $this->classes;
        foreach($classes as $class){
            $cskills = CharacterClass::find($class->id)->class_skills;
            foreach($cskills as $cskill){
                $class_skills[$cskill->id] = $cskill->name;
            }
        }
        
        // Calculate the total skill score
        function calc_skill($skill){
            $abilities = new AbilityScore;
            $skill->ability_modifier = $abilities->modifier($skill->ability_score)->mod;
            $skill->score = $skill->ranks + ($skill->class_skill?2:0) + $skill->ability_modifier;
            // TODO: Additional Modifiers with source info?
            $skill->mods = 0;
            return $skill;
        }
        
        
        // Iterate through skills adding ranking, class skill markers, and specialties.
        foreach($skills as $skill){
            if($ranked->where('id',$skill->id)->count()){
                $selected = $ranked->where('id',$skill->id);
                
                // Remove extranious id layer
                foreach($selected as $current){
                    
                    //    Move pivot values to main collection and unset.
                    $current->ranks = $current->pivot->ranks;
                    
                    if($current->pivot->specialty_id){
                        $spec_list = $specialties->where('id',$current->pivot->specialty_id);
                        // Remove extranious id layer
                        foreach($spec_list as $specialty){
                            $current->specialty = $specialty;
                        }
                    }else{
                        $current->specialty = null;
                    }
                    unset($current->pivot);
                    $current->ability_score = $this[$current->ability];
                    $current->class_skill = (array_key_exists($skill->id, $class_skills)?1:0);
                    $current = calc_skill($current);
                    $full_skills->push($current);
                }
            }else{
                //    Move pivot values to main collection and unset.
                $current = $skill;
                $current->ranks = 0;
                $current->specialty = null;
                $current->ability_score = $this[$current->ability];
                $current->class_skill = (array_key_exists($skill->id, $class_skills)?1:0);
                $current = calc_skill($current);
                $full_skills->push($current);
            }
        }
        return $full_skills;
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
