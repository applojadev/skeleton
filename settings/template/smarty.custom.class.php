<?php

require_once (dirname(__FILE__, 3).'/tools/smarty/libs/Smarty.class.php');  
      
class SmartyCustom extends Smarty{
	
	function __construct() {

                parent::__construct();
                $this->template_dir = template_dir;
                $this->compile_dir  = compile_dir;
                $this->config_dir   = config_dir;
                $this->cache_dir    = cache_dir;

	}
    
    public function getHTML($template) {
        
        return Self::fetch($template . '.tpl');
    }
    
}

?>