<?php
namespace Application\Core\View;

class Generate{
    protected $request;
    public function __construct($request) {
        $this->request = $request;
    }


    public function render(){
        $num_of_rows = $this->request->getParameter('Rows');
        echo '<form method="GET"/>';
        for ($i=1; $i<=$num_of_rows; $i++)
            include 'Templates/rows.php';
        echo '<input type="submit" name="query" value="query"/>';
        echo '</form>';
    }
}