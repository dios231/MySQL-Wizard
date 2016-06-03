<?php

namespace Application\Core\Model\Services;

class Passer{
    protected $mapperFactory;
    protected $modelFactory;
    
    public function __construct($model_factory, $mapper_factory) {
        $this->modelFactory = $model_factory;
        $this->mapperFactory = $mapper_factory;
    }
   
    public function passTableNameAndRowsToModelAndSetCookie($table_name, $num_of_rows){
        $QueryDraft = $this->modelFactory->create(\Application\Core\Model\Domain\CreateDraft::class);
        $Mapper = $this->mapperFactory->create(\Application\Core\Model\Mappers\CreateDraft::class);
        
        //TODO: prepei na uparxei enas tropos wste na kseroume stin epomeni fasi to tablename kai unofrows.
        //enas tropos einai na uparxei cookie (giauto kai to parakatw)
        //logika tha uparxei kai kaluteros (???)
        //$Cookie = $this->mapperFactory->create(\Application\Core\Model\Mappers\Cookie::create);
        //$id = $Cookie->getID();

        
        $QueryDraft->setTableName($table_name);
        $QueryDraft->setNumOfRows($num_of_rows);
        //$QueryDraft->setId($id);
        
        $Mapper->save($queryDraft);
    }
    
}