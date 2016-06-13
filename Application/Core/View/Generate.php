<?php
namespace Application\Core\View;

class Generate{
    protected $ServiceFactory;
    protected $num_of_rows;
    
    public function __construct($ServiceFactory) {
        $this->ServiceFactory = $ServiceFactory;
    }
    
    public function render(){
        echo '<form method="GET"/>';
        echo $this->num_of_rows;
        for ($i=1; $i<=$this->num_of_rows; $i++)
            include 'Templates/rows.php';
        echo '<input type="submit" name="query" value="query"/>';
        echo '</form>';
    }
    
    public function setNumberOfRows($nor){
        $this->num_of_rows = $nor;
    }
}