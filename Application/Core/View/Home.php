<?php
namespace Application\Core\View;

/**
 * Home page view.
 */
class Home{
    protected $haveGetData;
    protected $query;
    
    public function render($request){
        if ($this->haveGetData){
            $this->doTheRedirection($this->makeTheRedirectQuery());
        }
        else{
            $this->rendeTheMainPage();
        }
    }
    
    public function haveGetData($condition){
        $this->haveGetData = $condition;
    }
    
    public function setQuery($query){
        $this->query = $query;
    }
    
    protected function makeTheRedirectQuery(){
        return 'Location: /Thesis/Generate/'  . $this->query;
    }
    
    protected function doTheRedirection($url){
        header($url);
    }
    
    protected function rendeTheMainPage(){
        include 'Templates/home-template.html';
    }
}
?>