<?php
namespace Application\Core\Controller;


/**
 * Home page controller.
 */
class Home extends BaseController{
    public function index($router){
        $this->view->setRows($rows);
        
        $create = $this->factory->create(\Application\Core\Model\Create::class);
        
        $identifiers = array(
                "name"=>$router->getTableName(),
                "attributes"=>$router->getEntries()
            );
        
        $create->setIdentifiers($identifiers);
        //einai hack sto MVC. Prepei na ginei me diaforetiko tropo. Den eimai sigouros 
        //an einai best practice o controller na pernaei apeuthias sto view objects.
        $this->view->setCreateInstance($create);
    }
}

?>