<?php
 /*
  * Author: CipherWise LLC
  * Contact: Michael Schaafsma
  * Updated: 07/12/16
  * 
 */

namespace Vendor\cipherwise\gold;

use Illuminate\Database\Eloquent\Model;

class Thing{
    
    // properties
    public $name = "";
    public $type = "";
    public $id = "";
    public $x_position = 0;
    public $y_position = 0;
    public $z_position = 0;
    // public $hit_points = 0;
    public $affected = []; // Array of Special Objects affecting thing
    public $in_or_on = null;
    public $weight = null;
    public $height = null;
    public $width = null;
    public $length = null;
    public $created = 0;  // datetime born, manufactured, etc.
    public $description = "";
    
    
    // methods
    public function move(){
        return true;
    }
    
    
}

