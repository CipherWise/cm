<?php

namespace Vendor\cipherwise\gold;

class Character extends Thing
{  
    // properties
    public $speak = "Hi";
    public $geno_name = "Jimmy";
    
    // methods
    public function says($say){
        $this->speak = $say;
        echo $this->speak;
        return true;
    }
    
}