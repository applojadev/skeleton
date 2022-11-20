<?php        
    
    /**
     * Smarty template
     */    
    define('template_dir', dirname(1).'/mvc/admin/view/theme/');    
    require_once (dirname(1).'/settings/template/smarty.config.php');  
    
    /**
     * Global controller
     */
	include(_controller_dir_.'/globalController.php');	

    /**
     * Export JS dir
     */
    $template->assign('_js_admin_dir_', _js_admin_dir_); 