<?php

namespace App\Utils;

class Email
{
    /**
     * Envia email a um ou mais destinatários
     *
     * @param [string] $recipient
     * @param [string] $assunto
     * @param [string] $layout
     * @param [array] $dados
     * @return void
     */
    public static function send($recipient, $subject, $layout, $data) {

        include (dirname(2).'/settings/email.php');
        
        $sendEmail($recipient, $subject, $layout, $data);

    }    

}

?>