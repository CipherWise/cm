<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Character;
use App\Models\AbilityScore;
use App\Models\Skill;
use App\Models\SkillSpecialty;


class CharacterController extends Controller
{
    
    //
    public function character_sheet($id){
        $character = Character::find($id);
        $abilities = new AbilityScore;
        //$n = $this->full_skills($id);
        $n = $character->skills();

        foreach($n as $m){
            echo $m;
            echo "<br /><br />";
        }
        
        die();
        return view('character-sheet')
            ->with('character', $character)
            ->with('abilities', $abilities);
    }
    
    public function full_skills($character_id){
        $full_skills = new Collection();
        $skills = Skill::all();
        $specialties = SkillSpecialty::all();
        $ranked = Character::find($character_id)->skills;
        
        // Iterate through skills adding ranking, class skill markers, and specialties.
        
        foreach($skills as $skill){
            if($ranked->where('id',$skill->id)->count()){
                $selected = $ranked->where('id',$skill->id);
                
                // Remove extranious id layer
                foreach($selected as $current){
                    $current->class_skill = true;
                    
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
                }
                $full_skills->push($current);
            }
        }
        return $full_skills;
        
    }
}
