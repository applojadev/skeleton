<?php

/*
|--------------------------------------------------------------------------
| Credentials 
|--------------------------------------------------------------------------
|
| Define as credenciasi para conexão com o banco de dados
|
*/

$host      =  ($_SERVER['HTTP_HOST'] == 'localhost') ? "localhost" : "191.252.127.98";
$database  =  ($_SERVER['HTTP_HOST'] == 'localhost') ? "apploja"   : "lojashop_bd"   ;
$user      =  ($_SERVER['HTTP_HOST'] == 'localhost') ? "root"      : "lojashop_user" ;
$password  =  ($_SERVER['HTTP_HOST'] == 'localhost') ? ""          : "prJR%FcrtdxO"  ;      
  
/*
|--------------------------------------------------------------------------
| config
|--------------------------------------------------------------------------
|
| Define as configurações de conexão
|
*/

$config = [

    /*
    |--------------------------------------------------------------------------
    | default 
    |--------------------------------------------------------------------------
    |
    | Define qual conexão será utilizada como padrão por todo app
    | Para alterar a conexão dinamicamente utilize:
    | setConnection
    |
    */

    'default'     => 'mysql',

    /*
    |--------------------------------------------------------------------------
    | connections
    |--------------------------------------------------------------------------
    |
    | Array com todas as conexões de banco de dados configuradas para o app
    |
    */

    'connections' => [

        'mysql' => [

            'driver'   => 'mysql',
            'host'     => $host,
            'port'     => '3306',
            'database' => $database,
            'user'     => $user,
            'password' => $password,
            'options'  => [

                PDO::ATTR_TIMEOUT => 5,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

            ]

        ],        
        
    ]

];