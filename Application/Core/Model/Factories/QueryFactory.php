<?php
namespace Application\Core\Model\Factories;

use Application\Core\Model\Create;
class QueryFactory{
    
    //Create the new instance.
    public function create($name){ 
        $instance = new $name();
        return $instance;
    }
}