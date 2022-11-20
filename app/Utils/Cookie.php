<?php

namespace App\Utils;

class Cookie
{

    /**
     * Recupera o cookie gravado
     *
     * @param [string] $key
     * @param boolean $decode
     * @return void
     */
    public static function get($key, $decode = true) {

        require_once (dirname(__FILE__).'/tools.php');

        if (isset($_COOKIE[$key])) {

            if ($decode) {

                return base64_decode(Tools::preventSqlInjection($_COOKIE[$key]));            
            }else{

                return Tools::preventSqlInjection($_COOKIE[$key]);            
            }

        }else {
            return '';
        }

    }
    
    /**
     * Grava um novo cookie
     *
     * @param [string] $key
     * @param [string] $value
     * @param [int] $expire (timestamp em segundos)
     * @param [string] $path
     * @param boolean $encode
     * @return void
     */
    public static function set($key, $value, $expire, $path, $encode = true) {     
        
        if ($encode) {

            setcookie($key, base64_encode($value), $expire, $path);                          

        }else{

            setcookie($key, $value, $expire, $path);                          
        }
        
    }

    /**
     * Remove o cookie informado
     *
     * @param [string] $key
     * @param [string] $path
     * @return void
     */
    public static function clear($key, $path) {

        if (isset($_COOKIE[$key])) {

            unset($_COOKIE[$key]);
            setcookie($key, null, -1, $path);   
            
        }
     
    }

    /**
     * Verifica se o cookie existe
     *
     * @param [string] $key
     * @return void
     */
    public static function exists($key) {

        return isset($_COOKIE[$key]);

    }

}

?>