<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    //
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }
    
    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
}
