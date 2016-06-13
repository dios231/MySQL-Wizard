<?php
namespace Application\Core\Controller;

/**
 * Home page controller.
 */
class Home extends BaseController{
    
    //TODO-isws xriastei na ginei me kapio tropo wste kathe fora pou tha exoume diaforetiko query na
    //ginete call kai diaforetiki methodos.
    public function index($request){
        $this->doBasicFunction($request);
    }    
    
    protected function alterView($request){
        $this->view->haveGetData(true);
        $this->view->setQuery($request->getParameter('Query'));
    }
    
    protected function alterModel($request){
        $RequestBuilder = $this->serviceFactory->create(\Application\Core\Model\Services\RequestBuilder::class);
        $RequestBuilder->createRequest($request->getParameter('Table'), $request->getParameter('Rows'));
    }
    
}

?>