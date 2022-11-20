<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include './vendor/autoload.php';

require_once 'settings/dispatch.php';

$c = new \Slim\Container(); 

require_once (dirname(__FILE__).'/settings/router/not_found.inc.php');

foreach (glob (dirname(__FILE__).'/mvc/front/controller/*.php') as $controller) {
        require_once ($controller);	        
}        

foreach (glob (dirname(__FILE__).'/mvc/admin/controller/*.php') as $controller) {
        require_once ($controller);	        
}        

$app = new \Slim\App($c);

require_once (dirname(__FILE__).'/settings/router/router.inc.php');

$app->run();

?>
