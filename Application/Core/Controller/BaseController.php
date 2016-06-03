<?php
namespace Application\Core\Controller;

class BaseController{
    //Create instance.
    protected $serviceFactory;
    //Associated View instance.
    protected $view;
    
    public function __construct($factory, $view){
        $this->serviceFactory = $factory;
        $this->view = $view;
    }
}