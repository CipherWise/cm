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
        
        return view('character-sheet')
            ->with('character', $character)
            ->with('abilities', $abilities);
    }
}
