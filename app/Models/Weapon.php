<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Vendor\cipherwise\gold\Weapon;

class Weapon extends Model
{
    //
    public function characters()
    {
        return $this->morphToMany('App\Models\Character', 'character_special');
    }
    
    public function ammunition()
    {
        return $this->belongsToMany('App\Models\Ammunition');
    }
//    
//    public function merge_gold()
//    {
//        $gow = new Weapon();
//        
//        // Get and append properties
//        $props = get_object_vars($gow);
//        foreach($props as $key => $value){
//            if(!$this->$key){
//                $this->$key = $value;
//            }
//        }
//        
//        $this->go = $gow;
//        
//        
//        
//        
//        
//        // Get and append methods
//        $meths = get_class_methods($gow);
//        foreach($meths as $mname){
//            $gow->$mname();
//            
//            
//            $this->$mname = $gow->$mname();
//        }
//    }
}
