<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function classes()
    {
        return $this->hasMany('App\Class');
    }
}
