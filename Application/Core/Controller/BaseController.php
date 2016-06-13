<?php
namespace Application\Core\Controller;

abstract class BaseController{
    //Create instance.
    protected $serviceFactory;
    //Associated View instance.
    protected $view;
    
    public function __construct($factory, $view){
        $this->serviceFactory = $factory;
        $this->view = $view;
    }
    
    protected function doBasicFunction($request){
        $gathering_station = $this->isControlerInGatheringStation($request);
        if ($gathering_station){
            //alter the moden and view state
            $this->alterView($request);
            $this->alterModel($request);
        }
    }

    //Gathering station state is TRUE when the user
    //had  filled a form.
    protected function isControlerInGatheringStation($request){
        return null !== $request->getParameter('Submit') ? true : false;
    }
    
    abstract protected function alterModel($reqeuest);
    abstract protected function alterView($request);
}