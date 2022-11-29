<?php
namespace App\Utils;

use App\Utils\Tools;
class SMS
{
    
    /**
     * Envia o SMS     
     * 
     * zenvia:     ->  SMS::send('55(12)90000-0000','Mensagem do sms...'); max 160 caracteres
     * sms_barato: ->  SMS::send('(12)90000-0000','Mensagem do sms...'); max 155 caracteres
     * 
     * @param [string] $num
     * @param [string] $msg
     * @return array ( [status] => success | reject , [response_message] => '')
     */  
    public static function send($num, $msg) {
        
        include (dirname(2).'/settings/sms.php');        

        date_default_timezone_set('America/Sao_Paulo');
        
        $today = date("Y-m-d H:i:s");
        $msg   = Tools::removeAcentos(trim($msg));        
        $num   = Tools::trimTEL($num);

        if ($config['default'] == 'zenvia') {

            if ($config['zenvia']['enabled']) {
                                    
                header('Content-Type:application/json;charset=UTF-8');
                
                $url = $config['zenvia']['endpoint'];                    

                $data = array(
                    
                
                    "from"     => $config['zenvia']['from'],
                    "to"       => $num,
                    "contents" => [
                                    [
                        
                            "type" => "text",
                            "text" => "$msg"
                        ]
                    ]
                

                );
                $data_post = json_encode( $data, JSON_UNESCAPED_UNICODE );                                        
                $headers = array();          
                $headers[] = "Content-Type: application/json";
                $headers[] = "X-API-TOKEN: ". $config['zenvia']['token'];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);          
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);          
                $result = curl_exec($ch);
                $json = json_decode($result, true);
                    
                echo '<pre>';  print_r($json);  echo '</pre>';
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                  
                $status             = '';
                $response_message   = '';

                if($httpCode == 200) {
                
                    $status                 = 'success' ;
                    $response_message       = 'O SMS foi enviado!'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }

                if($httpCode == 400) {
                
                    $status                 = 'VALIDATION_ERROR' ;
                    $response_message       = 'Validation error'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }

                if($httpCode == 401) {
                
                    $status                 = 'AUTHENTICATION_ERROR' ;
                    $response_message       = 'No authorization token was found'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }

                if($httpCode == 404) {
                
                    $status                 = 'NOT_FOUND' ;
                    $response_message       = 'Not found'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }

                if($httpCode == 409) {
                
                    $status                 = 'DUPLICATED' ;
                    $response_message       = 'Entity already exists'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }

                if($httpCode == 500) {
                
                    $status                 = 'INTERNAL_ERROR' ;
                    $response_message       = 'Internal error'; 

                    if ($config['zenvia']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];
                        
                }                                  

            }

        }

        if ($config['default'] == 'sms_barato') {

            if ($config['sms_barato']['enabled']) {                                                                
                
                $url = $config['sms_barato']['endpoint'] . "?chave=" . $config['sms_barato']['token'] . "&dest=". $num .  "&text=" .rawurlencode($msg);

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
                $result_sms = curl_exec($curl);
                curl_close($curl);

                $status             = '';
                $response_message   = '';

                if ($result_sms == "ERRO1-1") {

                    $status                 = 'reject' ;
                    $response_message       = 'Problemas com a sua chave'; 
                    
                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }
                    
                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];

                }
                elseif ($result_sms == "ERRO1-2") { 
                    
                    $status                 = 'reject' ;
                    $response_message       = 'Problemas com seu IP (nao autorizado)'; 

                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];

                }
                elseif ($result_sms == "ERRO1-3") { 
                    
                    $status                 = 'reject' ;
                    $response_message       = 'Saldo insuficiente para enviar mensagem'; 

                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];

                }
                elseif ($result_sms == "ERRO2"  ) { 
                    
                    $status                 = 'reject' ;
                    $response_message       = 'Problemas com o numero de destino (parametro dest)'; 
                    
                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ]; 

                }
                elseif ($result_sms == "ERRO3"  ) { 
                    
                    $status                 = 'reject' ;
                    $response_message       = 'Problemas com o texto (parametro text)'; 
                    
                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];

                }                                          
                else { 
                
                    $status             = 'success' ;
                    $response_message   = $result_sms;                   
                                        
                    if ($config['sms_barato']['enabledLog']) { self::registerLog($num, $msg, $status, $response_message, $today); }

                    return [
                        'status'            => $status,
                        'response_message'  => $response_message
                    ];

                }                

            }

        }

    }

    /**
     * Registra os sms enviados e não enviados
     *
     * @param [string] $num
     * @param [string] $msg
     * @param [string] $status
     * @param [string] $response_message
     * @param [datetime] $datetime
     * @return void
     */
    private static function registerLog($num, $msg, $status, $response_message, $datetime){
        
        //Escopo        
    }

}

?>