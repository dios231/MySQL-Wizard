<?php
namespace Application\Core\View;

/**
 * Home page view.
 */
class Home{
    protected $haveGetData;
    protected $query;
    protected $ServiceFactory;
    
    public function __construct($ServiceFactory) {
        $this->ServiceFactory = $ServiceFactory;
    }
    public function render(){
        if ($this->haveGetData){
            $this->ServiceFactory->create(\Application\Core\Model\Services\RequestBuilder::class);
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
        $RequestBuilder = $this->ServiceFactory->create(\Application\Core\Model\Services\RequestBuilder::class);
        $Get = $RequestBuilder->getData();
        return 'Location: /Thesis/Generate/'  . $this->query . '?' . $Get;
    }
    
    protected function doTheRedirection($url){
        header($url);
    }
    
    protected function rendeTheMainPage(){
        include 'Templates/home-template.html';
    }
}
?>