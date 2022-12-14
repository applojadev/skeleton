<?php

class adminIndexController{  

	public function initContent($request, $response, $args) {        
	
		// Configurações
		//***************************************************************************************************************************************************
		
		$php_self = 'adminIndex';
		
		require_once (dirname(1).'/settings/config.inc.php');								
		
		//Default
		//***************************************************************************************************************************************************

		$toolsAdd('CSS','adminIndex');
		$toolsAdd('JS' ,'adminIndex');	

		//Opcional
		//***************************************************************************************************************************************************		
		
		//CSS | JS opcional

		//***************************************************************************************************************************************************	
		
		// AdminController
		include(_controller_admin_dir_.'/includes/adminController.php');	
		
		// HeaderController
		include(_controller_admin_dir_.'/includes/headerController.php');	

		//***************************************************************************************************************************************************
		//***************************************************************************************************************************************************
		
		// ##### BEGIN CONTEUDO #####
		//***************************************************************************************************************************************************


		$template->assign(array('conteudo'=>'Todo conteúdo'));


		// ##### END CONTEUDO #####
		//***************************************************************************************************************************************************
		
		// FooterController
		include(_controller_admin_dir_.'/includes/footerController.php');		
		
		//***************************************************************************************************************************************************
		
		// Saída
		return $template->getHTML('index');

	}
   
}