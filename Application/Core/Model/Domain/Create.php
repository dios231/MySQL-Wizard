<?php
namespace Application\Core\Model\Domain;


class Create {
    //Query string;
    protected $queryString;
    
    //Table name.
    protected $name;
    protected $numOfRows;
    //An array of query attributes.
    protected $attributes;
    

    
    public function setIdentifiers($identifiers){
        //Make the name to upper case.
        $name = strtoupper($identifiers['name']);
        //init the name inctance variable.
        $this->name = $name;
        
        //init the attribute instance variable.
        $this->attributes = $identifiers['attributes'];
    }

    public function getQuery(){
        $this->queryGenerate();
        return $this->queryString;
    }

    protected function queryGenerate(){
        //Add the table name.
        $this->queryString .= $this->name;
        //Add a new operand
        $this->addOperand('(');
        $numOfAttribues = count($this->attributes);
        for ($i=1; $i<=$numOfAttribues; $i++){
            $current_cell = 'cell' . $i;
            $this->queryString .= $this->attributes[$current_cell][0];
            $this->addOperand(' ');
            $this->queryString .= $this->attributes[$current_cell][1];
            $this->addOperand(' ');
            FALSE !== array_search('AUTO_INCREMET', $this->attributes[$current_cell]) ?  $this->queryString .= ' AUTO_INCREMENT' : '';
            FALSE !== array_search('NOT_NULL', $this->attributes[$current_cell]) ?  $this->queryString .= ' NOT_NULL ' : '';
            FALSE !== array_search('PRIMARY_KEY', $this->attributes[$current_cell]) ?  $this->queryString .= ' PRIMARY_KEY' : '';
            $i == $numOfAttribues ? '' : $this->addOperand(',');
        }
        //The end of the query.
        $this->queryString .= ');';
    }
    
    /**
     * 
     * @param type $operand an operand like ( - ) - , 
     */
    protected function addOperand($operand){
        $this->queryString .= $operand;
    }
}

?>