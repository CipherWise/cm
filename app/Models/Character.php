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
    
    public function party()
    {
        return $this->belongsTo('App\Models\Party');
    }
    
    public function classes()
    {
        return $this->hasMany('App\Models\Class');
    }
    
    public function race()
    {
        return $this->hasOne('App\Models\Race');
    }
}
