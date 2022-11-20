<?php

use App\Utils\Page;
use App\Utils\Auth;        
    
    /*
    |--------------------------------------------------------------------------
    | Define o controller base
    |--------------------------------------------------------------------------    
    */
    define('controllerBase', 'front');          

    /*
    |--------------------------------------------------------------------------
    | Smarty template | Define o thema do front
    |--------------------------------------------------------------------------    
    */
    define('template_dir', dirname(1).'/mvc/front/view/theme/');        
    
    require_once (dirname(1).'/settings/template/smarty.config.php');      

    /*
    |--------------------------------------------------------------------------
    | Global controller
    |--------------------------------------------------------------------------    
    */
	include(_controller_dir_.'/globalController.php');	      

    /*
    |--------------------------------------------------------------------------
    | Informações do login
    |--------------------------------------------------------------------------    
    */
    $auth = new Auth('');

    $template->assign('auth', $auth);
    
    /*
    |--------------------------------------------------------------------------
    | Checagem de acesso
    |--------------------------------------------------------------------------    
    */
    $responseRedirect = Page::prepareToCheck(controllerBase, $auth->isLogged, $php_self)
                            ->checkAccess()
                            ->redirectIfLoggedIn()
                            ->response();

    if ($responseRedirect) {        
        
        header("location:$responseRedirect");	
        exit;                                            

    }                     
    
    /*
    |--------------------------------------------------------------------------
    | Exporta JS dir
    |--------------------------------------------------------------------------    
    */
    $template->assign('_js_front_dir_', _js_front_dir_); 

    /*
    |--------------------------------------------------------------------------
    | Define icon
    |--------------------------------------------------------------------------    
    */
    $icon_page = $app->getValue('icon');

    $template->assign(array(        
   
        'og_imagem_thumbnail' => _img_icon_dir_.$icon_page,
        'icon_16'             => _img_icon_dir_.$icon_page,        
        'icon_32'             => _img_icon_dir_.$icon_page,
        'icon_96'             => _img_icon_dir_.$icon_page,
        'apple_icon_57'       => _img_icon_dir_.$icon_page,
        'apple_icon_60'       => _img_icon_dir_.$icon_page,
        'apple_icon_72'       => _img_icon_dir_.$icon_page,
        'apple_icon_76'       => _img_icon_dir_.$icon_page,
        'apple_icon_114'      => _img_icon_dir_.$icon_page,
        'apple_icon_120'      => _img_icon_dir_.$icon_page,
        'apple_icon_144'      => _img_icon_dir_.$icon_page,
        'apple_icon_152'      => _img_icon_dir_.$icon_page,
        'ms_icon_32'          => _img_icon_dir_.$icon_page,
    
    )); 