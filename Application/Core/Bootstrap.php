<?php
$builder = new Fracture\Http\RequestBuilder;
$request = $builder->create([
    'get'    => $_GET,
    'files'  => $_FILES,
    'server' => $_SERVER,
    'post'   => $_POST,
    'cookies'=> $_COOKIE,
]);

$uri = isset($_SERVER['REQUEST_URI'])
           ? $_SERVER['REQUEST_URI']
           : '/';

//Exei ginei hack sto routing (sugekrimena sto $uri) gia na doulepsei me to localhost!!!!
$uri = explode("/",$uri);
unset($uri[1]);
$uri = implode("/",$uri);
////////////////////////////////

$request->setUri($uri);

/*
 * Defining the config
 */


$configuration = [
    'primary' => [
        'notation' => ':resource',
        'defaults' => [
            'resource' => 'vgf',
        ],
    ],
    'fallback' => [
        'notation' => ':any',
        'conditions' => [
            'any' => '.*',
        ],
        'defaults' => [
            'resource' => 'Home',
            'command' => 'index',
        ],
    ],
];

/*
 * Routing the request
 */

$router = new Fracture\Routing\Router(new Fracture\Routing\RouteBuilder);
$router->import($configuration);

// The $request now is fully initialized.
$router->route($request);





use Application\Core\Model\Factories\QueryFactory;
use Application\Core\Routing\Router;
use Application\Core\View\Home;

$factory = new QueryFactory();
var_dump($request->getParameter('resource'));
var_dump($request->getParameter('Query'));
var_dump($request->getParameter('Rows'));

$class = 'Application\\Core\\View\\' . $request->getParameter('resource');
$view = new $class();

//Create the controller class.
$class = 'Application\\Core\\Controller\\' . $request->getParameter('resource');
$controller = new $class($factory, $view);

//Generate the response.
$view->render($request);
?>