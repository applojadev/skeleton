<?php

$c['notFoundHandler'] = function ($c) {

    return function ($request, $response) use ($c) {                   

        $notFoundUrl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                                

        $content_404 = "<h1>Página não encontrada</h1><p><h4>$notFoundUrl</h4></p>";        
        return $c['response']->withStatus(404)->withHeader('Content-Type', 'text/html')->write($content_404);        
        
    };

};

?>