<?php
namespace Application\Core\Model\Factories;

class ModelFactory{
    public function create($name){
        $instance = new $name;        
        return $instance;
    }
}