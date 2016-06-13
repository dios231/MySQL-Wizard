<?php
namespace Application\Core\Model\Services;

class RequestBuilder{
    protected $request = '';

    public function createRequest($tableName, $numOfRows){
        $this->request  = 'Table=' . $tableName . '&Rows=' . $numOfRows;
    }
    
    public function getData(){
        return $this->request;
    }
}

?>