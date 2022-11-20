<?php

namespace App\Utils;

class Dispatch
{
    
    /**
     * Informações das rotas
     *
     * @var array
     */
    private $router = [];

    /**
     * Contrutor da classe
     *
     * @return void
     */
    public function __construct() {

        include (dirname(2).'/settings/dispatch.php');      

        $this->router = $router;      

    }

    /**
     * Recupera o valor do array
     *
     * @param [string] $chave
     * @param [string] $valor
     * @return void
     */   
    public function getValue($chave=null, $valor=null) {                
        
        if ($chave) {
            
            if ($valor) {

                return $this->router[$chave][$valor];            

            } else {

                return $this->router[$chave];            

            }
            
        } else {

            return $this->router;            

        }       
                
    }

}

?>