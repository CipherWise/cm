<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    //
    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
}
