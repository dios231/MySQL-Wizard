<?php
namespace Application\Core\View;
/**
 * Home page view.
 */
class Home{
    //Number of rows.
    protected $rows;
    //Create instance.
    protected $create;
    
    public function render($request){
        //Rende the main page.
        include 'Templates/home-template.html';
    }
}
?>