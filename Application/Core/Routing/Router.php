<?php
namespace Application\Core\Routing;

//routing mechanism versio 1.
class Router{
    //Default controller and view name.
    protected $resource;
    //Default action.
    protected $command;
    protected $url;
    
//    //The number of rows (Create entries).
//    protected $rows=0;
//    
//    //Entries for the query.
//    protected $entries = [];
//    
//    //Table name.
//    protected $tableName;
    protected $GET;
    
    public function __construct($GET) {
        $this->GET = $GET;
        $this->parseURL();
        $this->init();
//        @$this->rows = $this->GET['rows'];
//        @$this->entries = $this->GET['ENTRIES'];
//        @$this->tableName = $this->GET['table-name'];
    }
    
    protected function parseURL(){
        if(isset($this->GET['url'])) {
            $this->url = explode('/', filter_var(rtrim($this->GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    
    /**
     * If url exist set the associated values else use the default.
     */
    protected function init(){
        $this->resource = isset($this->url[0]) ? $this->url[0] : 'Home';
        if ($this->resource == 'index.php')            $this->resource = 'Home';
        $this->command = isset($this->url[1]) ? $this->url[1] : 'index';
    }
    
    public function getTableName(){
        return $this->tableName;
    }

    public function getEntries(){
        return $this->entries;
    }

    //Returns the url resource.
    public function getResource(){
        return $this->resource;
    }
    
    //Returns the url command.
    public function getCommand(){
        return $this->command;
    }
    
    public function getRows(){
        return $this->rows;
    }
}
?>