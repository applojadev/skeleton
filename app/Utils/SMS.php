<?php
namespace App\Utils;

use App\Utils\Tools;

class SMS
{

    /**
     * Ativa ou desativa o envio de SMS
     *
     * @var [bool]
     */
    private $enabled;
    /**
     * Endpoint que será utilizado na integração
     *
     * @var [string]
     */
    private $endpoint;

    /**
     * Token utilizado para validar a integração
     * O token é fornecido pela integradora
     *
     * @var [string]
     */
    private $token;

    /**
     * Controla se vai registrar o log de envios
     *
     * @var [bool]
     */
    private $enabledLog;

    /**
     * Define o integrador que será utilizado, valores:
     * -> sms_barato
     *
     * @var [type]
     */
    private $integrator;

    /**
     * Método estatico para definição do integrador
     * Esse método deve ser encadeado com o método "send"
     *
     * @param [string] $integrador
     * @return void
     */
    public static function setApi($integrator) {

        include (dirname(2).'/settings/sms.php');

        if ($integrator == 'sms_barato') {
            
            $SMS = new SMS();

            $SMS->enabled       = $config['sms_barato']['enabled'];
            $SMS->integrator    = $integrator;
            $SMS->endpoint      = $config['sms_barato']['endpoint'];
            $SMS->token         = $config['sms_barato']['token'];
            $SMS->enabledLog    = $config['sms_barato']['enabledLog'];

            return $SMS;
        }

    }

    /**
     * Envia o SMS     
     * Uso: ->  SMS::setApi('sms_barato')->send('(00)00000-0000','Eu sou o texto do SMS');
     * 
     * @param [string] $num
     * @param [string] $msg
     * @return array ( [status] => success | reject , [response_message] => '')
     */  
    public function send($num, $msg) {

        date_default_timezone_set('America/Sao_Paulo');
        $today      = date("Y-m-d H:i:s");

        $msg            = Tools::removeAcentos(trim($msg));
        $recipientsList = explode(',', $num);

        if ($this->integrator == 'sms_barato') {

            if ($this->enabled) {

                foreach ($recipientsList as $recipient) {
                    
                    $recipient  = Tools::trimTEL($recipient);
                    $url        = $this->endpoint . "?chave=" . $this->token . "&dest=". $recipient .  "&text=" .rawurlencode($msg);

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
                        
                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }
                        
                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ];

                    }
                    elseif ($result_sms == "ERRO1-2") { 
                        
                        $status                 = 'reject' ;
                        $response_message       = 'Problemas com seu IP (nao autorizado)'; 

                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }

                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ];

                    }
                    elseif ($result_sms == "ERRO1-3") { 
                        
                        $status                 = 'reject' ;
                        $response_message       = 'Saldo insuficiente para enviar mensagem'; 

                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }

                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ];

                    }
                    elseif ($result_sms == "ERRO2"  ) { 
                        
                        $status                 = 'reject' ;
                        $response_message       = 'Problemas com o numero de destino (parametro dest)'; 
                        
                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }

                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ]; 

                    }
                    elseif ($result_sms == "ERRO3"  ) { 
                        
                        $status                 = 'reject' ;
                        $response_message       = 'Problemas com o texto (parametro text)'; 
                        
                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }

                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ];

                    }                                          
                    else { 
                    
                        $status             = 'success' ;
                        $response_message   = $result_sms;                   
                                            
                        if ($this->enabledLog) { $this->registerLog($recipient, $msg, $status, $response_message, $today); }

                        return [
                            'status'            => $status,
                            'response_message'  => $response_message
                        ];

                    }

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
    private function registerLog($num, $msg, $status, $response_message, $datetime){
        
        //Escopo
    }


}

?>