<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbilityScore extends Model
{
    protected $table = 'ability_scores';
    //
    public static function modifier($score)
    {
        return AbilityScore::select('modifier as mod')->where('score',$score)->first();
    }
}
