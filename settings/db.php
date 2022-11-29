<?php

/*
|--------------------------------------------------------------------------
| config
|--------------------------------------------------------------------------
|
| Define as configurações de conexão!
| É possivel criar diversas conexões e com diversos banco de dados, desde que suportadas pelo PDO
|
*/

$config = [

    /*
    |--------------------------------------------------------------------------
    | default 
    |--------------------------------------------------------------------------
    |
    | Define qual conexão será utilizada como padrão por todo app
    | Para alterar a conexão dinamicamente utilize o metodo:
    | -> connection
    |
    */

    'default' => ($_SERVER['HTTP_HOST'] == 'localhost') ? "dev-mysql" : "prod-mysql",

    /*
    |--------------------------------------------------------------------------
    | connections
    |--------------------------------------------------------------------------
    |
    | Array com todas as conexões de banco de dados configuradas para o app
    |
    */

    'connections' => [

        'dev-mysql' => [

            'driver'   => 'mysql',
            'host'     => 'localhost',
            'port'     => '3306',
            'database' => 'apploja',
            'user'     => 'root',
            'password' => '',
            'options'  => [

                PDO::ATTR_TIMEOUT => 5,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

            ]

        ],        

        'prod-mysql' => [

            'driver'   => 'mysql',
            'host'     => '191.252.127.98',
            'port'     => '3306',
            'database' => 'lojashop_bd',
            'user'     => 'lojashop_user',
            'password' => 'prJR%FcrtdxO',
            'options'  => [

                PDO::ATTR_TIMEOUT => 5,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

            ]

        ],        
        
    ]

];