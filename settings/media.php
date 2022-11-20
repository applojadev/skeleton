<?php

require_once (dirname(2).'/settings/defines_path.php');

$config =  array(

    /*
    |--------------------------------------------------------------------------
    | CSS
    |--------------------------------------------------------------------------
    |
    | Arquivos CSS que serão vinculados a página
    |
    */
    
    'CSS' => [

        /*
        |--------------------------------------------------------------------------
        | FRONT
        |--------------------------------------------------------------------------
        |
        | Arquivos CSS do front
        |
        */

        'index'                => ['enabled' => false, 'path' =>  _css_front_dir_.'index.css'],
        
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        |
        | Arquivos CSS do admin
        |
        */

        'adminIndex'           => ['enabled' => false, 'path' =>  _css_admin_dir_.'index.css'],
        
        /*
        |--------------------------------------------------------------------------
        | FERRAMENTAS
        |--------------------------------------------------------------------------
        |
        | Arquivos CSS | ICONS para ferramentas em geral 
        |
        */

        'mdi-icons'            => ['enabled' => true,  'path' =>  _tools_dir_.'mdi/css/materialdesignicons.min.css'],
        'material-icons'       => ['enabled' => true,  'path' =>  'https://fonts.googleapis.com/icon?family=Material+Icons'],
        'bootstrap'            => ['enabled' => true,  'path' =>  _tools_dir_.'bootstrap/css/bootstrap.min.css'],
        'jquery-ui'            => ['enabled' => false, 'path' =>  _tools_dir_.'jquery-ui/jquery-ui.min.css'],
        'magnific-popup'       => ['enabled' => false, 'path' =>  _tools_dir_.'magnific-popup/magnific-popup.css'],
        'bootstrap-toggle'     => ['enabled' => false, 'path' =>  _tools_dir_.'bootstrap-toggle/bootstrap-toggle.min.css'],
        'tags-input'           => ['enabled' => false, 'path' =>  _tools_dir_.'tags-input/tagsinput.css'],
        'bootstrap-select'     => ['enabled' => false, 'path' =>  _tools_dir_.'bootstrap-select/bootstrap-select.min.css' ],
        'slick-slider'         => ['enabled' => false, 'path' =>  _tools_dir_.'slick-slider/slick/slick.css' ],
        'custom-modal'         => ['enabled' => false, 'path' =>  _tools_dir_.'custom-modal/custom-modal.css'],

    ],

    /*
    |--------------------------------------------------------------------------
    | JS
    |--------------------------------------------------------------------------
    |
    | Arquivos JS que serão vinculados a página
    |
    */

    'JS' => [

        /*
        |--------------------------------------------------------------------------
        | FERRAMENTAS
        |--------------------------------------------------------------------------
        |
        | Arquivos JS para ferramentas em geral 
        |
        */

        'jquery'                    => ['enabled' => true,  'path' =>  _tools_dir_.'jquery/jquery-3.3.1.min.js'],
        'bootstrap'                 => ['enabled' => true,  'path' =>  _tools_dir_.'bootstrap/js/bootstrap.min.js'],
        'jquery-cookie'             => ['enabled' => false, 'path' =>  _tools_dir_.'jquery-cookie/jquery.cookie.js'],
        'jquery-ui'                 => ['enabled' => false, 'path' =>  _tools_dir_.'jquery-ui/jquery-ui.min.js'],
        'jquery-mask'               => ['enabled' => false, 'path' =>  _tools_dir_.'jquery-mask/jquery.mask.min.js'],
        'jquery-mask-money'         => ['enabled' => true,  'path' =>  _tools_dir_.'jquery-mask-money/jquery-mask-money.js'],
        'magnific-popup'            => ['enabled' => false, 'path' =>  _tools_dir_.'magnific-popup/magnific-popup.min.js'],
        'bootstrap-bundle'          => ['enabled' => true,  'path' =>  _tools_dir_.'bootstrap/js/bootstrap.bundle.min.js'],
        'mobile-detect'             => ['enabled' => false, 'path' =>  '//cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.1/mobile-detect.min.js'],
        'bootstrap-toggle'          => ['enabled' => false, 'path' =>  _tools_dir_.'bootstrap-toggle/bootstrap-toggle.min.js'],
        'boot-box'                  => ['enabled' => false, 'path' =>  _tools_dir_.'boot-box/bootbox.min.js'],
        'ckeditor'                  => ['enabled' => false, 'path' =>  _tools_dir_.'ckeditor/ckeditor.js'],
        'tags-input'                => ['enabled' => false, 'path' =>  _tools_dir_.'tags-input/tagsinput.js'],
        'bootstrap-select'          => ['enabled' => false, 'path' =>  _tools_dir_.'bootstrap-select/bootstrap-select.min.js'],
        'bootstrap-select-pt-br'    => ['enabled' => false, 'path' =>  _tools_dir_.'bootstrap-select/i18n/defaults-pt_BR.js'],
        'js-color'                  => ['enabled' => false, 'path' =>  _tools_dir_.'js-color/jscolor.js'],
        'lazy-load'                 => ['enabled' => false, 'path' =>  _tools_dir_.'lazy-load/lazy-load.js'],
        'slick-slider'              => ['enabled' => false, 'path' =>  _tools_dir_.'slick-slider/slick/slick.min.js'],
        'custom-modal'              => ['enabled' => false, 'path' =>  _tools_dir_.'custom-modal/custom-modal.js'],
        
        /*
        |--------------------------------------------------------------------------
        | FRONT
        |--------------------------------------------------------------------------
        |
        | Arquivos JS do front
        |
        */

        'index'                     => ['enabled' => false, 'path' =>  _js_front_dir_.'index.js'],
        
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        |
        | Arquivos JS do admin
        |
        */

        'adminIndex'                => ['enabled' => false, 'path' =>  _js_admin_dir_.'index.js'],

    ]

);