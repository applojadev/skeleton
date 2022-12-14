<?php

use App\Utils\Dispatch;

$dispatch = new Dispatch;        
    
$config = array(		

    /*
    |--------------------------------------------------------------------------
    | name
    |--------------------------------------------------------------------------
    |
    | Define o nome da loja    
    |
    */
    
    'name' => 'Loja Skeleton',

    /*
    |--------------------------------------------------------------------------
    | url
    |--------------------------------------------------------------------------
    |
    | Define a url completa da loja
    ! Valor dinâmico recuparado através da class Dispatch
    |
    */

    'url' => $dispatch->getValue('app','domain') . $dispatch->getValue('app','uri_base'),

    /*
    |--------------------------------------------------------------------------
    | logo_desktop
    |--------------------------------------------------------------------------
    |
    | Define a logo que será utilzada em desktops    
    |
    */

    'logo_desktop' => '',

    /*
    |--------------------------------------------------------------------------
    | logo_mobile
    |--------------------------------------------------------------------------
    |
    | Define a logo que será utilzada em celulares e tablets    
    |
    */

    'logo_mobile' => '',

    /*
    |--------------------------------------------------------------------------
    | logo_email
    |--------------------------------------------------------------------------
    |
    | Define a logo que será utilzada no envio de emails
    |
    */

    'logo_email' => '',

    /*
    |--------------------------------------------------------------------------
    | icon
    |--------------------------------------------------------------------------
    |
    | Define o icone do appp    
    |
    */

    'icon' => '',   
        
    /*
    |--------------------------------------------------------------------------
    | preposition
    |--------------------------------------------------------------------------
    |
    | Preposição quando se referir ao nome do app, valores: 
    | -> na | no | em
    |
    */

    'preposition' => 'em',

    /*
    |--------------------------------------------------------------------------
    | app_env
    |--------------------------------------------------------------------------
    |
    | Definição do ambiente, valores: 
    | -> prod | dev
    |
    */
    
    'app_env' => 'dev',
    
    /*
    |--------------------------------------------------------------------------
    | comprimir_html
    |--------------------------------------------------------------------------
    |
    | Define se vai comprimir o html (global), valores: 
    | -> true | false
    |
    */
    
    'comprimir_html' => false,
    
    /*
    |--------------------------------------------------------------------------
    | move_js_to_finish
    |--------------------------------------------------------------------------
    |
    | Define se vai mover o JS para o final da página ou não, valores: 
    | -> true | false
    |
    */
    
    'move_js_to_finish' => true    

);