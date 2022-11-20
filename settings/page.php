<?php

use App\Utils\Dispatch;

$dispatch = new Dispatch();

$config   = [

    /*
    |--------------------------------------------------------------------------
    | front
    |--------------------------------------------------------------------------
    |
    | Define as páginas que serão de acesso restrito e será utilizado login
    |
    */

    'front' => [

        /*
        |--------------------------------------------------------------------------
        | checkAccess
        |--------------------------------------------------------------------------
        |
        | Ativa a checagem de acesso, valores:
        | -> true | false
        |
        */
        'checkAccess' => false,

        /*
        |--------------------------------------------------------------------------
        | checkType
        |--------------------------------------------------------------------------
        |
        | Define o tipo de checagem, valores:         
        | -> restrictedPage   | Todas as páginas são liberadas exceto as que estiverem em "checkPages"
        | -> unrestrictedPage | Todas as páginas são restritas exceto as que estiverem em "checkPages"
        |
        */

        'checkType' => 'restrictedPage',                

        /*
        |--------------------------------------------------------------------------
        | checkPages
        |--------------------------------------------------------------------------
        |
        | Define as páginas que serão checadas por "restrictedPage" ou "unrestrictedPage"
        | -> array de valores - utilize o valor de "php_self"
        |
        */

        'checkPages' => [

            
        ],

        /*
        |--------------------------------------------------------------------------
        | redirectToLoginURL
        |--------------------------------------------------------------------------
        |
        | Define a URL pra onde será redirecionado em caso de login
        |
        */

        'redirectToLoginURL' => $dispatch->getValue('front','router_login'),                

        /*
        |--------------------------------------------------------------------------
        | redirectIfLoggedIn
        |--------------------------------------------------------------------------
        |
        | Se estiver logado redireciona se tentar acessar...
        | Exemplo: login | cadastro | esquci_minha_senha
        | -> array de valores - utilize o valor de "php_self"
        |
        */

        'redirectIfLoggedIn' => [

            'login',
            'forgot_password',
            'change_password',
            'new_register'
        ],
        
        /*
        |--------------------------------------------------------------------------
        | redirectIfLoggedURL
        |--------------------------------------------------------------------------
        |
        | Define a URL pra onde será redirecionado em caso de tentar acessar e já estiver logado
        | -> deixe em branco para redirecionar para  "Home" (domain + uri_base)
        |
        */

        'redirectIfLoggedURL' => ''

    ]

];