<?php

namespace App\Utils;

class Url
{

    /**
     * Recupera a URL atual, incluindo o protocolo
     *
     * @return void
     */
    public static function getCurrentUrl() {        
       
        $current_url = "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";        
        return $current_url;
        
    }        

    /**
     * Recupera o Host atual, incluindo o protocolo
     *
     * @return void
     */
    public static function getCurrentHost() {        
       
        $current_host = "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . "$_SERVER[HTTP_HOST]";        
        return $current_host;
        
    }      
    
    /**
     * Gera uma url amigavel
     *
     * @param [string] $string
     * @param array $replace
     * @param string $delimiter
     * @return void
     */
    public static function gerarURL($string, $replace=array(), $delimiter='-') {
            
        $string = preg_replace('/[\t\n]/', ' ', $string);
        $string = preg_replace('/\s{2,}/', ' ', $string);
        $list = array(
            'Š' => 'S',
            'š' => 's',
            'Đ' => 'Dj',
            'đ' => 'dj',
            'Ž' => 'Z',
            'ž' => 'z',
            'Č' => 'C',
            'č' => 'c',
            'Ć' => 'C',
            'ć' => 'c',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
            'Ŕ' => 'R',
            'ŕ' => 'r',
            '/' => '-',
            ' ' => '-',
            '.' => '-',
            '|' => '-',
            '<' => '-',
            '>' => '-',
            '{' => '-',
            '}' => '-',
            '[' => '-',
            ']' => '-',
            '=' => '-',
            '*' => '-',
            '+' => '-',
            '!' => '-',
            '@' => '-',
            '#' => '-',
            '$' => '-',
            '%' => '-',
            '&' => '-',
            '(' => '-',
            ')' => '-',
            '_' => '-',
            '?' => '-',
            ':' => '-',
            ';' => '-',
            ',' => '-'          
            
        );
    
        $string = strtr($string, $list);
        $string = preg_replace('/-{2,}/', '-', $string);
        $string = strtolower($string);   
                

        if( !empty($replace) ) {
            $string = str_replace((array)$replace, ' ', $string);
        }
     
        $url = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $url = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $url);
        $url = strtolower(trim($url, '-'));
        $url = preg_replace("/[\/_|+ -]+/", $delimiter, $url);
     
        return $url;

    }

    /**
     * Gera o Html pra página não encontrada
     *
     * @return void
     */
    public static function urlNotFound() {

    }

}

?>