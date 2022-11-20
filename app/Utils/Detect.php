<?php

namespace App\Utils;

class Detect
{
    /**
     * Retorna as informações do dispositivo
     *
     * @param [string] $type
     * @return void
     */
    public static function information($type) {                        
        
        if ($type == "device") {

            if ((new \App\Libraries\Mobile_Detect)->isMobile()) { return "mobile"; }else{ return "desktop"; }

        }

        if ($type == "user_agent") { return $_SERVER["HTTP_USER_AGENT"]; }       

    }

}

?>