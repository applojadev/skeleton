<?php

	$router = array(

		/*
        |--------------------------------------------------------------------------
        | app
        |--------------------------------------------------------------------------
        |
        | Rotas e parametros do app
        |
        */
		'app'	=> [
			
			'domain' 						=> 'http://localhost',
			'uri_base' 						=> '/skeleton/',
			'force_ssl' 					=> false			

		],

		/*
        |--------------------------------------------------------------------------
        | front
        |--------------------------------------------------------------------------
        |
        | Rotas e parametros do front
        |
        */

		'front'	=> [

			'meta_title' 					=> '',
			'meta_description' 				=> '',
			'meta_keywords' 				=> '',
			'router_login' 					=> 'login',
			'meta_title_login' 				=> 'Login',
			'router_forgot_password' 		=> 'esqueci-minha-senha',
			'meta_title_forgot_password'	=> 'Esqueci Minha Senha',
			'router_new_register' 			=> 'novo-cadastro',
			'meta_title_new_register' 		=> 'Novo Cadastro'

		],
		
		/*
        |--------------------------------------------------------------------------
        | admin
        |--------------------------------------------------------------------------
        |
        | Rotas e parametros do admin
        |
        */

		'admin'	=> [

			'router_admin' 					=> 'admin'

		]

	);

?>