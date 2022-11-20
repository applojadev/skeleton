<?php

namespace App\Utils;

    /**
     *
     *   Utilizar no controller (require include breadcrumb.tpl)
     *
     *   Breadcrumb::add('Home','/home');
     *	 Breadcrumb::add('Cadastro','', true);        
     *
    */

class Breadcrumb
{

    /**
     * Array de itens
     *
     * @var array
     */
    private static $breadcrumb = [];

    /**
     * Adiciona itens no breadcrumb
     *
     * @param [string] $rotulo
     * @param [string] $link
     * @param [bools] $active
     * @return void
     */
    public static function add($rotulo, $link, $active=false) {

        array_push(self::$breadcrumb, [

            'rotulo'  => $rotulo,
            'link' 	  => $link,
            'active'  => $active

        ]);

    }

    /**
     * Retorna o array breadcrumb
     *
     * @return void
     */
    public static function get() {

        return self::$breadcrumb;
    }

}

?>