<?php
namespace App\Utils;

class Colors
{

    /**
     * Cores do app
     *
     * @var array
     */
    private $colors = [];

    /**
     * Contrutor da classe
     *
     * @return void
     */
    public function __construct() {        
        
        include (dirname(2).'/settings/colors.php');

        $this->colors = $config;
    }

    /**
     * Recupera o valor do array
     *
     * @return void
     */
    public function getValue($chave) {        

        return $this->colors[$chave];
        
    }

}

?>