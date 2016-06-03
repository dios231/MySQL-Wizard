<?php
namespace Application\Core\Controller;

/**
 * Home page controller.
 */
class Home extends BaseController{
    
    //TODO-isws xriastei na ginei me kapio tropo wste kathe fora pou tha exoume diaforetiko query na
    //ginete call kai diaforetiki methodos.
    public function index($request){
        $gathering_station = $this->isControlerInGatheringStation($request);
        if ($gathering_station){
            //TODO - na vrw tropo wste na min pernaw to $request stis alterView(), alterModel.
            $this->alterView($request);
            $this->alterModel($request);
        }
    }
    
    protected function alterView($request){
        $this->view->haveGetData(true);
        $this->view->setQuery($request->getParameter('Query'));
    }
    
    protected function alterModel($request){
        $Passer = $this->serviceFactory->create(\Application\Core\Model\Services\Passer::class);
        
        $table_name = $request->getParameter('Table');
        $num_of_rows = $request->getParameter('Rows');
        
        $Passer->passTableNameAndRowsToModelAndSetCookie($table_name, $num_of_rows);
        //$Passer->setCookie();
    }
    
    protected function isControlerInGatheringStation($request){
         return null !== $request->getParameter('Submit') ? true : false;
    }
    
}

?>