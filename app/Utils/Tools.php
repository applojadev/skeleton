<?php

namespace App\Utils;

class Tools
{

    /**
     * Retorna o IP atual do cliente
     *
     * @return void
     */
    public static function getClientIP() {
        
        $ipaddress = '';

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
        
    }

    /**
     * Prevenção contra SQL injection
     *
     * @param [string] $obj
     * @return void
     */
    public static function preventSqlInjection($obj){    

        $obj = trim($obj);
        $obj = strip_tags($obj);

        if(!get_magic_quotes_gpc()) {

            $obj = addslashes($obj);
            return $obj;

        }

    }
        
    /**
     * Converte a data de um formato para outro ou vice-versa (US | BR)
     *
     * @param [date] $data
     * @return void
     */
    public static function reverseDate($data){

        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }

    }

    /**
     * Converte a data e hora de um formato para outro ou vice-versa (US | BR)
     *
     * @param [datetime] $dataTime
     * @return void
     */
    public static function reverseDateTime($dataTime){

        $data = substr($dataTime, 0, 10); 
        $hora = substr($dataTime, 11, 8);                      
        		
	    return Self::reverseDate($data) . ' ' . $hora;

    }

    /**
     * Converte dias em segundos (a partir do timestamp atual)
     *
     * @param [int] $day
     * @return void
     */
    public static function convertDaystoSeconds($day){
        
        return time() + ($day * 24 * 3600);

    }    

    /**
     * Converte horas em segundos (a partir do timestamp atual)
     *
     * @param [type] $hours
     * @return void
     */
    public static function convertHourstoSeconds($hours){
        
        return time() + ($hours * 3600);

    }    

    /**
     * Converte minutos em segundos (a partir do timestamp atual)
     *
     * @param [type] $minutes
     * @return void
     */
    public static function convertMinutestoSeconds($minutes){
        
        return time() + ($minutes * 60);

    }    
    
    /**
     * Converte o valor para (dolar ou real)
     *
     * @param [float] $valor
     * @param [string] $moeda
     * @return void
     */
    public static function convertMoney($valor, $moeda) {
        
        if ($moeda == 'U$') {

            if (strpos($valor,',') !== false) {
            
                $valor = str_replace('.','',$valor);
                $valor = str_replace(',','.',$valor);
                return $valor; 
            }else {
                
                return $valor; 
            }

        }else {

            $valor = number_format($valor, 2, ',', '.'); 
            return $valor; 
        }        
        
    }

    /**
     * Convert em peso no formato 1,000
     *
     * @param [string] $valor
     * @return void
     */
    public static function convertPeso($valor) {        
       
        $valor = number_format($valor, 3, ',', '.'); 
        return $valor;        
        
    }

    /**
     * Converte um valor em centavos
     *
     * @param [type] $valor
     * @return void
     */
    public static function convertMoneyCents($valor) {      
       
        $data = $valor;
        $data = "R$ ".number_format($data, 2, ',', '.');
        
        $data = preg_replace('/[^0-9]/', '', $data);
        return $data;     
        
    }

    /**
     * Remove caracteres do CPF
     *
     * @param [type] $valor
     * @return void
     */
    public static function trimCPF($valor) {      
       
        $valor = str_replace('.','',$valor);
        $valor = str_replace('-','',$valor);
        return $valor;                   
    }

    /**
     * Remove caracteres do CNPJ
     *
     * @param [type] $valor
     * @return void
     */
    public static function trimCNPJ($valor) {      
       
        $valor = str_replace('.','',$valor);
        $valor = str_replace('/','',$valor);
        $valor = str_replace('-','',$valor);
        return $valor;                   
    }

    /**
     * Remove caracteres do TEL
     *
     * @param [type] $valor
     * @return void
     */
    public static function trimTEL($valor) {      
       
        $valor = str_replace('(','',$valor);
        $valor = str_replace(')','',$valor);
        $valor = str_replace('-','',$valor);
        return $valor;                   
    }

    /**
     * Remove caracteres do CEP
     *
     * @param [type] $valor
     * @return void
     */
    public static function trimCEP($valor) {      
               
        $valor = str_replace('-','',$valor);
        return $valor;                   
    }

    /**
     * Explode um array e retorna a posição indicada
     *
     * @param [string] $delimiter
     * @param [string] $value
     * @param [int] $position
     * @return void
     */
    public static function getExplode($delimiter, $value, $position) {

        $result = explode($delimiter, $value);
        return $result[$position];
    }

    /**
     * Verifica se um elemento existe no aray $_POST
     *
     * @param [type] $submit
     * @return boolean
     */
    public static function isSubmit($submit) {

        return isset($_POST[$submit]);       
    }

    /**
     * Verifica se um elemento está vazio ou nulo
     *
     * @param [type] $field
     * @return boolean
     */
    public static function isEmpty($field) {

        return ($field === '' || $field === null);
    }

    /**
     * Verifica se algum arquivo foi enviado por $_POST
     *
     * @param [type] $field
     * @return boolean
     */
    public static function isPostFile($field) {

        return (file_exists($_FILES[$field]['tmp_name']) || is_uploaded_file($_FILES[$field]['tmp_name']));
    } 
    
    /**
     * Verifica se a datatime (00/00/00 00:00:00) informada é menor que a data atual
     *
     * @param [string] $data
     * @return boolean
     */
    public static function isExpireData($data){

        date_default_timezone_set('America/Sao_Paulo');
        
        $data = explode(" ", $data);
        
        list($d, $m, $y) = explode('/', $data[0]);
        
        list($g, $i)     = explode(':', $data[1]);
        
        $dat0 = new DateTime(date("Y-m-d G:i:s", mktime($g, $i, 0, $m, $d, $y)));
        
        $dat1 = new DateTime(date("Y-m-d G:i:s"));

        $ret = '';
        
        if ($dat1 == $dat0) {

            $ret = 0;

        } else {

            if ($dat1 < $dat0){

                $ret = 1;

            } else {

                if ($dat1 > $dat0){

                    $ret = -1;

                }

            }

        }

        return $ret;

    }
    
    /**
     * Retorna o primeiro nome de uma pessoa
     *
     * @param [string] $name
     * @return void
     */
    public static function firstName($name){            
        
        return Self::getExplode(' ',$name,0);
    }
    
    /**
     * Remove espaços no componente inputTags
     *
     * @param [string] $value
     * @return void
     */
    public static function trimInputTags($value) { 

        $partials  = explode(',',$value);
        return implode(',',array_map('trim',$partials));
    }
    
    /**
     * Gera um codigo (alphanumerico) na quantidade de caracteres informado
     *
     * @param [int] $length
     * @return void
     */
    public static function generateGenericCode($length) {
   
        return strtoupper(substr(md5(time()), 0, $length));
    }
     
    /**
     * Remove todos os arquivos de um diretório
     *
     * @param [string] $dir
     * @param [string] $deleteRootToo
     * @return void
     */
    public static function deleteAllFile($dir, $deleteRootToo) { 

        if(!$dh = @opendir($dir)) { 
            return; 
        } 
        while (false !== ($obj = readdir($dh))) { 

            if($obj == '.' || $obj == '..') { 
                continue; 
            } 

            if (!@unlink($dir . '/' . $obj)) { 
                deleteAllFile($dir.'/'.$obj, true); 
            } 
        } 

        closedir($dh); 
        if ($deleteRootToo) { 
            @rmdir($dir); 
        } 

        return; 

    } 

    /**
     * Busca os dados do endereço com base no cep na API ViaCep
     *
     * @param [string] $cep
     * @return array
     */
    public static function getBuscaViaCep($cep) {

        $cep = preg_replace("/[^0-9]/", "", $cep);
          
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $dados = curl_exec($curl);        

        if (isset($dados) && $dados != "") {
        
            $dados = simplexml_load_string($dados);
            return $dados;   

        }else {

            return [

                'logradouro'    => '',            
                'bairro'        => '',
                'localidade'    => '',
                'uf'            => ''            

            ];

        }
                         
    }
    
    /**
     * Transforma as primeiras letras de um nome em maiusculo
     *
     * @param [string] $nome
     * @return void
     */
    public static function formatName($nome) {
    
        $saida = '';
        $nome = strtolower($nome); 
        $nome = explode(" ", $nome); 
        for ($i=0; $i < count($nome); $i++) {    
            
            if ($nome[$i] == "de" or $nome[$i] == "da" or $nome[$i] == "e" or $nome[$i] == "dos" or $nome[$i] == "do") {
                $saida .= $nome[$i].' '; 
            }else {
                $saida .= ucfirst($nome[$i]).' '; 
            }
    
        }
        return $saida;    

    }

    /**
     * Remove acentos de uma palavra ou frase
     *
     * @param [string] $texto
     * @return void
     */
    public static function removeAcentos($texto) {
    
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', 'ç', 'Ç');

        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', 'c', 'C');        
        
        return str_replace($comAcentos, $semAcentos, $texto);

    }    

}

?>