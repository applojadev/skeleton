<?php
namespace App\Utils;

use App\Utils\Cookie;

class Auth
{
    /**
     * Determina se está logado
     *
     * @var boolean
     */
    public $isLogged = false;

    /**
     * Nome do usuário logado
     *
     * @var [type]
     */
    public $name = null;

    /**
     * Email do usuário lagado
     *
     * @var [type]
     */
    public $email = null;

    /**
     * Data e hora do último login
     *
     * @var [type]
     */
    public $lastLogin = null;

    /**
     * Define a tabela que será utilizada no processo de login
     * Exemplo: customers, users 
     *
     * @var [type]
     */
    private $table;

    public function __construct($table) {
        
        $this->table = $table;
    }

    /**
     * Checa se está logado
     *
     * @return void
     */
    public function checkLogin() {
    
        $cookie = new Cookie;

        if (!$cookie::exists($this->table . '_token')) {
         
            $this->isLogged = false;
        }
        /*
            $token  = $cookie::get('customer_token');            
            
            $sql = "SELECT * FROM clientes where token = ? and ativado = 1";    
            try {
                $stmt = $con->prepare($sql);
                $stmt->execute([ $token_cliente ]); 
                $rs = $stmt->fetch();                           
            }
            catch(PDOException $error) {
                echo '<span class="box-error"><h5>Erro ao carregar dados clientes em loggued:' . '<span class="description-error">' .$error->getMessage(). '</span>' .'</span>';                        
            }             
            if (!$rs) return false;
            $token  = $rs['token'];
            $ip     = $rs['ip'];             
            $stmt   = null; 

            if ($protect_cookie) {
                
                if ($token_cliente === $token && $ip_cliente === $ip) {

                    return true;    
                }else {

                    //Se ip for diferente então reset token e ip
                    $sql = "UPDATE clientes set token = '', ip = '' where token = ?";    
                    try {
                        $stmt = $con->prepare($sql);
                        $stmt->execute([ $token_cliente ]);         
                    }
                    catch(PDOException $error) {
                        echo '<span class="box-error"><h5>Erro ao atualizar cliente em logued:' . '<span class="description-error">' .$error->getMessage(). '</span>' .'</span>';                                        
                    } 
                    $stmt = null;                      

                    return false;
                }

            } else {
                
                if ($token_cliente === $token) {

                    return true;    
                }else {
                    
                    return false;
                }

            }       
        */
        

    }

}

?>