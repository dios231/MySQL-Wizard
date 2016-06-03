<?php
namespace Application\Core\Model\Factories;

class MapperFactory{
    
    protected $dphost_provider;
    
    public function create($name){
        //edw tha uparxei kai o DB provider ston constructor!!!
        $instance = new $name;        
        return $instance;
    }
}