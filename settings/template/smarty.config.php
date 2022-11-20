<?php

    require_once (dirname(1).'/settings/template/smarty.custom.class.php');
    $template = new SmartyCustom();
    $template->left_delimiter  = '{{';
    $template->right_delimiter = '}}';
    
    $template->registerPlugin('block','dynamic', 'smarty_block_dynamic', false);
    $template->registerPlugin("modifier","convertMoney", "convertMoneyBR");
    $template->registerPlugin("modifier","convertDate", "convertDateBR");
    $template->registerPlugin("modifier","convertDateTime", "convertDateTimeBR");        
    $template->registerPlugin("modifier","firstName", "firstName");

    function compress_html($tpl_output, Smarty_Internal_Template $template) {

        $search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--(.|\s)*?-->/');
    
        $replace = array('>', '<', '\\1', '');
    
        $tpl_output = preg_replace($search, $replace, $tpl_output);
    
        return $tpl_output;
    }
    
    function smarty_block_dynamic($param, $content, &$smarty) {
        
        return $content;
    }
    
    function convertMoneyBR($param) {
    
        require_once (dirname(__FILE__, 2).'/class/tools.php'); 
        return Tools::convertMoney($param, 'R$');
    }
    
    function convertDateBR($param) {
    
        require_once (dirname(__FILE__, 2).'/class/tools.php'); 
    
        if (!Tools::isEmpty($param)) {
    
            $data_unformat = strtotime($param);
            return date( 'd/m/Y', $data_unformat);   
    
        }else {
            return '';
        }
    }
    
    function convertDateTimeBR($param) {
    
        require_once (dirname(__FILE__, 2).'/class/tools.php'); 
    
        if (!Tools::isEmpty($param)) {
    
            $data_unformat = strtotime($param);
            return date( 'd/m/Y H:i:s', $data_unformat);   
        
        }else {
            return '';
        }
    
    }

    function firstName($param){            
        
        require_once (dirname(__FILE__, 2).'/class/tools.php'); 
    
        return Tools::getExplode(' ',$param,0);
    }

?>