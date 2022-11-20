<?php
           
    $currentDir = dirname(1); 
    $uriBase    = (new App\Utils\Dispatch)->getValue('app','uri_base');
    
    
    /*
    |--------------------------------------------------------------------------
    | Smarty
    |--------------------------------------------------------------------------
    |
    | definições do smarty exceto template_dir
    |
    */
    
    define('SMARTY_DIR', $currentDir.'/tools/smarty/libs/');
    define('compile_dir', $currentDir.'/cache/smarty/compile/');
    define('cache_dir', $currentDir.'/cache/smarty/cache/');
    define('config_dir', $currentDir.'/settings/template/');

    /*
    |--------------------------------------------------------------------------
    | Gloabal
    |--------------------------------------------------------------------------
    |
    | definições globais 
    |
    */

    define('_tools_dir_', $uriBase.'tools/');
    define('_controller_dir_', $currentDir.'/mvc/');

    /*
    |--------------------------------------------------------------------------
    | FRONT
    |--------------------------------------------------------------------------
    |
    | definições do front
    |
    */

    define('_controller_front_dir_', $currentDir.'/mvc/front/controller/');
    define('_css_front_dir_', $uriBase.'mvc/front/view/css/');
    define('_js_front_dir_', $uriBase.'mvc/front/view/js/');    

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    |
    | definições do admin
    |
    */

    define('_controller_admin_dir_', $currentDir.'/mvc/admin/controller/');
    define('_css_admin_dir_', $uriBase.'mvc/admin/view/css/');
    define('_js_admin_dir_', $uriBase.'mvc/admin/view/js/');    

    /*
    |--------------------------------------------------------------------------
    | Gloabal
    |--------------------------------------------------------------------------
    |
    | definições globais 
    |
    */
    
    define('_img_dir_', $uriBase.'img/');  
    define('_img_logo_dir_', _img_dir_.'logo/');
    define('_img_icon_dir_', _img_dir_.'icon/');    
    define('_img_load_dir_', _img_dir_.'load/');    
    define('_img_system_dir_', _img_dir_.'system/');   
    
    define('_upload_dir_', $uriBase.'upload/');    

    define('_download_dir_', $uriBase.'download/');