<?php
namespace Application\Core\Controller;

class BaseController{
    //Create instance.
    protected $factory;
    //Associated View instance.
    protected $view;
    
    public function __construct($factory, $view){
        $this->factory = $factory;
        $this->view = $view;
    }
}