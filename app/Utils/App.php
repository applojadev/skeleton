<?php

namespace App\Utils;

class App
{
    
    /**
     * Informações do app
     *
     * @var array
     */
    private $app = [];

    /**
     * Contrutor da classe
     *
     * @return void
     */
    public function __construct() {

        include (dirname(2).'/settings/app.php');

        $this->app = $config;
    }

    /**
     * Recupera o valor do array
     *
     * @return void
     */
    public function getValue($chave) {        

        return $this->app[$chave];
        
    }

}

?>