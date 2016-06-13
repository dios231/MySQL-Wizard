<?php
namespace Application\Core\Model\Factories;

class ServiceFactory{
    
    //Ensures that each serivce gets loaded only once by
    //keeping every loaded object in a map.
    protected $ServiceMap  = array(); 
    
    //Create the new instance.
    public function create($name){
        
        if ( isset($this->ServiceMap[$name])) 
            return $this->ServiceMap[$name];
        
        $model_factory_classname = \Application\Core\Model\Factories\ModelFactory::class;
        $mapper_factory_classname = \Application\Core\Model\Factories\MapperFactory::class;
        
        $instance = new $name(new $model_factory_classname, new $mapper_factory_classname);
        $this->ServiceMap[get_class($instance)] = $instance;
        return $instance;
    }
    
}