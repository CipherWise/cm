<?php

namespace Vendor\cipherwise\gold;

use Illuminate\Database\Eloquent\Model;

class GenOModel extends Model
{
  protected $geno = array();
  protected $geno_namespace = "Vendor\\cipherwise\\gold\\";
  
  public function __construct() 
  {
    $array = explode("\\", get_called_class());
    $class_name = end($array);
    $class_name = $this->geno_namespace.$class_name;
    if(!class_exists($class_name)){
         $class_name = $this->geno_namespace."Thing";   
    }
    $geno = new $class_name();
    $this->extendWith($geno);
  }

  public function extendWith($object)
  {
    $this->geno[] = $object;
    return true;
  }

    public function __call($method, $parameters)
    {   
        foreach ($this->geno as $geno)
        {
            if (method_exists($geno, $method))
            {
              return call_user_func_array(array($geno, $method), $parameters);
            }
        }
        if (in_array($method, ['increment', 'decrement'])) {
            return call_user_func_array([$this, $method], $parameters);
        }

        $query = $this->newQuery();

        return call_user_func_array([$query, $method], $parameters);
    }

    public function __get($key)
    {
        foreach ($this->geno as $geno)
        {
            if (property_exists($geno, $key))
            {
              return $geno->$key;
            }
        }
        return $this->getAttribute($key);
  }

    public function __set($key, $value)
    {
        foreach ($this->geno as $geno)
        {
            if (property_exists($geno, $key))
            {
              return $geno->$key = $value;
            }
        }
        $this->setAttribute($key, $value);
    }

}

