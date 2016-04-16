<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function parties()
    {
        return $this->hasMany('App\Models\Party');
    }
    
    public function characters()
    {
        return $this->hasManyThrough('App\Models\Character', 'App\Models\Party');
    }
}
