<?php

    use App\Utils\App;
    
    $config = array(

        /*
        |--------------------------------------------------------------------------
        | enabled
        |--------------------------------------------------------------------------
        |
        | Habilita ou desabilita o envio de email, valores:
        | -> true | false
        |
        */
        
        'enabled' => false,

        /*
        |--------------------------------------------------------------------------
        | email
        |--------------------------------------------------------------------------
        |
        | Email que será utilizado para envio
        |
        */

        'email' => '',
        
        /*
        |--------------------------------------------------------------------------
        | server_smtp
        |--------------------------------------------------------------------------
        |
        | Host do servidor
        |
        */

        'server_smtp' => '',

        /*
        |--------------------------------------------------------------------------
        | user
        |--------------------------------------------------------------------------
        |
        | Usuário do email        
        |
        */

        'user' => '',

        /*
        |--------------------------------------------------------------------------
        | password
        |--------------------------------------------------------------------------
        |
        | Senha de acesso para authenticação        
        |
        */

        'password' => '',

        /*
        |--------------------------------------------------------------------------
        | authentication
        |--------------------------------------------------------------------------
        |
        | Define se o servidor requer authenticação, valores:
        | -> true | false
        |
        */

        'authentication' => true,
        
        /*
        |--------------------------------------------------------------------------
        | encrypt
        |--------------------------------------------------------------------------
        |
        | Define se o envio será criptografado, valores:
        | -> Nenhum | SSL | TLS
        |
        */

        'encrypt' => 'TLS',
        
        /*
        |--------------------------------------------------------------------------
        | port
        |--------------------------------------------------------------------------
        |
        | Porta que será utilizada para envio
        |
        */

        'port' => '587',        
        
        /*
        |--------------------------------------------------------------------------
        | message
        |--------------------------------------------------------------------------
        |
        | Mensagem padrão para os emails
        |
        */

        'message' => '',

        /*
        |--------------------------------------------------------------------------
        | inbox
        |--------------------------------------------------------------------------
        |
        | Emails dos administradores do app separados por "," virgula        
        |
        */

        'inbox' => '', 
        
        /*
        |--------------------------------------------------------------------------
        | enabledLog
        |--------------------------------------------------------------------------
        |
        | Registra os emails enviados, valores:
        | true | false
        |
        */
        
        'enabledLog' => false,

    );
                            
    $sendEmail = function ($recipients, $subject, $layout, $data) use ($config) {        

        require_once ('template/smarty.config.php');  
        require_once (dirname(1).'/tools/php-mailer/class.phpmailer.php');        
        
        //Se ativado envio
        if ($config['enabled']) {
          
            //Instância o app
            $app = new App;            

            //Instância o template
            $template = new SmartyCustom(); 
            $template->template_dir     = dirname(__FILE__,2).'/email/';
            $template->compile_dir      = dirname(__FILE__,2).'/cache/smarty/compile/';
            $template->config_dir       = dirname(__FILE__,2).'/cache/smarty/cache/';
            $template->cache_dir        = dirname(__FILE__,2).'/settings/configs/';
            $template->left_delimiter   = '{{';
            $template->right_delimiter  = '}}';                                

            //Prepara para enviar a um ou mais destinatarios            
            if ($recipients == "") {
            
                if ($config['inbox'] == "") {

                    $recipientsList = '';

                } else {

                    $recipientsList = explode(',', $config['inbox']);

                }
                
            } else {

                $recipientsList = explode(',', $recipients);            

            }            

            //Se não houver nenhum destinatario para execução
            if ($recipientsList === '') {return false;}

            //Envia as informações para o template
            $template->assign(array(
                
                'data'      => $data,
                'app_name'  => $app->getValue('name'),
                'app_url'   => $app->getValue('url'),
                'logo'      => ($app->getValue('logo_email') == '') ? '': $app->getValue('url') . _img_logo_dir_ . $app->getValue('logo_email'),                
                'message'   => $config['message']
            
            ));	

            //Recupera o layout
            $body = $template->getHtml($layout);                                    
            
            //Instância o email
            $mail = new PHPMailer(true);                
            $mail->IsSMTP();
            
            try {
                //Configurações iniciais            
                $mail->Host       = $config['server_smtp']; 
                $mail->SMTPAuth   = $config['authentication']; 
                $mail->Port       = $config['port']; 
                $mail->Username   = $config['user']; 
                $mail->Password   = $config['password'];             
                $mail->CharSet    = 'UTF-8';

                if ($config['encrypt'] != 'nenhum') {

                    $mail->SMTPSecure = $config['encrypt']; 
                }                            
                
                $mail->SetFrom($config['email'], $app->getValue('name')); 
                $mail->AddReplyTo($config['email'], $app->getValue('name')); 
                            
                //Configurações do envio
                $mail->Subject = $subject;           
                
                //Envia para um ou mais destinatarios
                foreach ($recipientsList as $email) {
               
                    $mail->AddAddress($email);
                }               
                
                $mail->IsHTML(true);
                $mail->Body=$body;            
            
                //Envia o email
                $mail->Send();

                //Verifica Log de envio
                if ($config['enabledLog']) {

                    date_default_timezone_set('America/Sao_Paulo');
                    Self::registerLog($recipientsList, $subject, $body, date("Y-m-d H:i:s"));
                }
                
                return true;
                
            }catch (phpmailerException $e) {
            
                return false;
            }
            
        }

    };

    function registerLog($recipientsList, $subject, $body, $datetime){
        
        //Escopo
    }

?>