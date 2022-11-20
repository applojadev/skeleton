<?php

namespace App\Utils;

use App\Utils\Appp;

class Page
{

    /**
     * Definição das configurações
     *
     * @var array
     */
    private $config = [];

    /**
     * Define o controllador base, exemplo: front | admin
     *
     * @var [type]
     */
    private $controllerBase;

    /**
     * Define está logado
     *
     * @var [type]
     */
    private $isLogged;    
    
    /**
     * Nome do controllador atual que está sendo checado
     *
     * @var [type]
     */
    private $php_self;

    /**
     * Define o retorno, valores:
     * -> null   | validou com sucesso , tudo ok
     * -> string | URL para redirect, pois não validou
     *
     * @var [type]
     */
    private $response = null;

    /**
     * Prepara para Iniciar a validação     
     * 
     * @return void
     */    
    public static function prepareToCheck($controllerBase, $isLogged, $php_self) {
    
        include (dirname(2).'/settings/page.php');

        $page = new Page();

        $page->config           = $config;
        $page->controllerBase   = $controllerBase;
        $page->isLogged         = $isLogged;
        $page->php_self         = $php_self;        

        return $page;

    }

    /**
     * Faz a checagem do acesso
     *
     * @return instancia
     */    
    public function checkAccess() {    
        
        if ($this->isLogged == false) {                           
            
            if ($this->config[$this->controllerBase]['checkAccess']) {
            
                if ($this->config[$this->controllerBase]['checkType'] == 'restrictedPage') {
                
                    if (in_array($this->php_self, $this->config[$this->controllerBase]['checkPages'] )) {
                                    
                        $this->response = (new app)->getValue('url') . $this->config[$this->controllerBase]['redirectToLoginURL'];                                     
        
                    }

                }                 
                
                if ($this->config[$this->controllerBase]['checkType'] == 'unrestrictedPage') {
                
                    if (!in_array($this->php_self, $this->config[$this->controllerBase]['checkPages'] )) {
                            
                        $this->response = (new app)->getValue('url') . $this->config[$this->controllerBase]['redirectToLoginURL'];                                     

                    }

                }                

            }        
      
        }

        return $this;
    }

    /**
     * Faz a checagem se já está logado
     *
     * @return instancia
     */
    public function redirectIfLoggedIn() {
    
        if ($this->isLogged) {                        
            
            if ($this->config[$this->controllerBase]['checkAccess']) {            
                                
                if (in_array($this->php_self, $this->config[$this->controllerBase]['redirectIfLoggedIn'] )) {
                                            
                    $this->response = (new app)->getValue('url') . $this->config[$this->controllerBase]['redirectIfLoggedURL'];                                    
        
                }                         

            }

        }
      
        return $this;
    }

    /**
     * Retorna a resposta das validsações, valores:
     * -> null   | Tudo ok
     * -> string | Url para redirecionamento 
     *
     * @return void
     */
    public function response() {
    
        return $this->response;
    }

}

?>