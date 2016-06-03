<?php
namespace Application\Core\Model\Factories;

//momizw pws den xriazete epeidi xristimopoeitai class::class
//use Application\Core\Model\Services\Passer;
class ServiceFactory{
    
    //Create the new instance.
    public function create($name){ 
        $model_factory_classname = \Application\Core\Model\Factories\ModelFactory::class;
        $mapper_factory_classname = \Application\Core\Model\Factories\MapperFactory::class;
        
        $instance = new $name(new $model_factory_classname, new $mapper_factory_classname);
        return $instance;
    }
}