<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Vendor\cipherwise\gold\GenoModel;

class Weapon extends GenoModel
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
    
    public function merge_geno()
    {
        $geno = "Vendor\\cipherwise\\gold\\".get_class();
        if(class_exists($geno)){
            $this->geno = new $geno();

            // Get and append properties
            $props = get_object_vars($this->geno);
            foreach($props as $key => $value){
                if(!$this->$key){
                    $this->$key = $value;
                }
            }

            // Get and append methods
            $meths = get_class_methods($this->geno);
            foreach($meths as $mname){
                $this->$mname = function(){ $this->geno->$mname(func_get_arg()); };
            }
        }
    }
}
