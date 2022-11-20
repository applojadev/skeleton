<?php   

    //Admin
    $app->get('/' . $router['admin']['router_admin'], \adminIndexController::class . ':initContent');    

?>
