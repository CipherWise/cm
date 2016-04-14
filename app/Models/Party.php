<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    //
    
    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
}
