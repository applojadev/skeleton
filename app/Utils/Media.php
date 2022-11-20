<?php
namespace App\Utils;

class Media
{

    /**
     * Array de itens
     *
     * @var array
     */
    private static $media = ['CSS'=>[], 'JS'=>[]];

    /**
     * Construtor da classe
     */
    public static function create() {    
        
        include (dirname(2).'/settings/media.php');

        self::$media = $config;

    }

    /**
     * Adiciona media no controller
     *
     * @param [string] $type
     * @param [string] $name
     * @return void
     */
    public static function add($type, $name) {
    
        self::$media[$type][$name]['enabled'] =  true;
    }

    /**
     * Remove media do controller
     *
     * @param [string] $type
     * @param [string] $name
     * @return void
     */
    public static function remove($type, $name) {
    
        self::$media[$type][$name]['enabled'] =  false;
    }

    /**
     * Retorna o array media
     *
     * @return void
     */
    public static function get() {
    
        return self::$media;
    }

}

?>