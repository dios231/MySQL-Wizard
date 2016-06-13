<?php
namespace Application\Core\Controller;

class Generate extends BaseController{
    
    public function create($request){
        $this->doBasicFunction($request);
        
    }
    
    protected function alterModel($reqeuest) {
        $QueryConstructor = $this->serviceFactory->create(\Application\Core\Model\Services\QueryConstructor::class);
    }
    
    protected function alterView($request) {
        echo $request->getParameter('Rows');
        $this->view->setNumberOfRows = $request->getParameter('Rows');
    }
}