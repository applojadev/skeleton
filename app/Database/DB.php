<?php

namespace App\Database;

use PDO;
use PDOException;
use App\Utils\App;
use App\Utils\Tools;

class DB
{
   
    /**
     * Armazena a instancia
     *
     * @var [type]
     */
    private static $instance = NULL;

    /**
     * Definição o nome da conexão que será utilizado
     *
     * @var [type]
     */
    private static $nameConnection = null;

    /**
     * Armazena diferentes conexões
     *
     * @var [type]
     */
    private $connections = [];

    /**
     * Armazena a conexão padrão
     *
     * @var [type]
     */
    private $defaultConnection = null;

    /**
     * Armazena a conexaõ com o banco de dados
     *
     * @var [class]
     */
    private $con = null;

    /**
     * Define a tabela a ser utilizada
     *
     * @var [string]
     */
    private $table = null;

    /**
     * Define as colunas que serão utilizadas
     *
     * @var string
     */
    private $column = '*';

    /**
     * Definição da clausula where
     *
     * @var [string]
     */
    private $where = [];
    
    /**
     * Definição da clausula orderBy
     *
     * @var [string]
     */
    private $orderBy = null;

    /**
     * Definição da clausula LIMIT
     *
     * @var [type]
     */
    private $limit = null;

    /**
     * O construtor é declarado protected 
     * para garantir que as instâncias 
     * só possam ser criadas por ele mesmo
     *      
     */
    protected function __construct() {

    }

    /**
     * Cria uma instancia se não existir ou retorna a atual
     *
     * @return void
     */
    private static function getInstance() {
        
        if (self::$instance === NULL) {
            
            self::$instance = new DB();
            self::createConnection();
        }
        
        return self::$instance;
    }

    /**
     * Define qual conexão será utilzada, 
     * Se nenhuma for especificada será utilizada a conexão padrão em Settings > db
     *
     * @param [type] $args
     * @return void
     */
    public static function connection($args) {
    
        self::$nameConnection = $args;                
        $instance = self::getInstance();                
        self::createConnection();

        return $instance;
    }

    /**         
     * Cria uma conexão com o banco de dados e
     * armazena na propriedade "con"
     *      
     */
    private static function createConnection() {

        include (dirname(2).'/settings/db.php');                      

        $instance                     = self::$instance;                     
        $instance->defaultConnection  = $config['default'];
        $name_connection              = (self::$nameConnection) ? self::$nameConnection : $instance->defaultConnection;       
        
        if (isset($instance->connections[$name_connection]) && !Tools::isEmpty($instance->connections[$name_connection])) {        
            
            $instance->con = $instance->connections[$name_connection];
        }else {              
           
            if (!array_key_exists($name_connection, $config['connections'])) {            
                die('Erro ao conectar com o banco de dados!');
            }

            $_host      =  $config['connections'][$name_connection]['host'];
            $_port      =  $config['connections'][$name_connection]['port'];
            $_database  =  $config['connections'][$name_connection]['database'];
            $_user      =  $config['connections'][$name_connection]['user'];
            $_password  =  $config['connections'][$name_connection]['password'];
            $_options   =  $config['connections'][$name_connection]['options'];          

            try {

                $con = new PDO("mysql:host=$_host;port=$_port;dbname=$_database", "$_user", "$_password", $_options);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
                $con->setAttribute( PDO::MYSQL_ATTR_FOUND_ROWS, true );            
                $instance->con = $con;                      
                $instance->connections[$name_connection] = $con;                   
            }
            catch ( PDOException $error ) {    
                
                echo '<span class="box-error"><h5>Erro ao conectar com o Banco de dados:' . '<span class="description-error">' .$error->getMessage(). '</span>' .'</span>';        
            }      

           

        }

    }
    
    /**
     * Define as propriedades com seu valores padrões
     *
     * @return void
     */
    private function setPropertyDefault() {        
        
        self::$nameConnection  =  null;        
        $this->table           =  null;
        $this->column          =  '*';
        $this->where           =  [];        
        $this->orderBy         =  null;
        $this->limit           =  null;
        
        if (array_key_exists($this->defaultConnection, (array) $this->connections)) {

            $this->con = $this->connections[$this->defaultConnection];            
        }                                   

    } 
     
    /**
     * Executa insert
     * 
     * Exemplo:
     * $id = DB::sqlInsert('insert into add_html (codigo) values (?)', ['Tag a']);
     * 
     * @param [string] $query
     * @param array $param
     * @return integer - Último id inserido
     */
    public static function sqlInsert($query, $param = []) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;

        $sql = "$query";
        try {        
            $stmt = $con->prepare($sql);				
            $stmt->execute($param);             
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao inserir tabela';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }
                        
        } 	        
        $stmt = null; 
        
        $instance->setPropertyDefault();

        return $con->lastInsertId();
        
    }

    /**
     * Executa update
     * 
     * Exemplo:
     * $affected = DB::sqlUpdate('update add_html set codigo=?',['Tag span']);
     * 
     * @param [string] $query
     * @param array $param
     * @return integer - Linhas afetadas
     */
    public static function sqlUpdate($query, $param = []) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;

        $sql = "$query";
        try {        
            $stmt = $con->prepare($sql);				
            $stmt->execute($param);             
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao atualizar tabela';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }
                        
        } 	        
        $affected =  $stmt->rowCount();;
        $stmt     = null; 
        
        $instance->setPropertyDefault();

        return $affected;        
        
    }

    /**
     * Executa delete
     * 
     * Exemplo:
     * $deleted = DB::sqlDelete('delete from add_html where id=?',[2]);
     * 
     * @param [string] $query
     * @param array $param
     * @return integer - Linhas afetadas
     */
    public static function sqlDelete($query, $param = []) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;

        $sql = "$query";
        try {        
            $stmt = $con->prepare($sql);				
            $stmt->execute($param);             
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao deletar tabela';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }
                        
        } 	        
        $affected =  $stmt->rowCount();;
        $stmt     = null; 
        
        $instance->setPropertyDefault();

        return $affected;        
        
    }

    /**
     * Executa uma instrução select
     * 
     * Exemplos:
     * DB::sqlSelect('SELECT * from produto')
     * DB::sqlSelect('SELECT * from produto where id=?', [3])
     * DB::sqlSelect('SELECT * from produto where id=:id', ['id'=>3])
     * 
     * @param [string] $query
     * @param array $param
     * @return array associativo
     */
    public static function sqlSelect($query, $param = []) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;
       
        $sql = "$query";
        try {        
            $stmt = $con->prepare($sql);				
            $stmt->execute($param); 
            $rs = $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao carregar tabela com select';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }

        } 	        
        $stmt = null; 
        
        $instance->setPropertyDefault();

        return $rs;
        
    }
    
    /**
     * Executa uma instrução select com parâmetros embutidos
     * 
     * Exemplos:     
     * DB::sqlUnPrepared('SELECT * from produto where id=3')     
     * 
     * @param [string] $query     
     * @return array associativo
     */
    public static function sqlUnPrepared($query) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;

        $sql = "$query";
        try {        
            $stmt = $con->query($sql);				            
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao carregar tabela com umPrepared';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }            

        } 	        
        $stmt = null; 

        $instance->setPropertyDefault();

        return $rs;
        
    }

    /**
     * Executa uma instrução Statement
     * 
     * Exemplo:     
     * DB::execSql('drop table users')
     * 
     * @param [string] $query          
     */
    public static function execSql($query) {            
        
        $instance = self::getInstance();        
        $con      = $instance->con;

        $sql = "$query";
        try {        
            $con->exec($sql);
        }
        catch(PDOException $error) {

            echo '<span class="box-error"><h5>Erro ao executar statement';
            
            if ((new App)->getValue('app_env') == "dev") {
             
                echo ': <span class="description-error">' . $error->getMessage(). '</span>' .'</span>';        			
            }            

        } 
        
        $instance->setPropertyDefault();
    }    

    /**
     * Retorna uma instancia bruta da conexão PDO
     *
     * @return void
     */
    public static function PDO() {
    
        $instance = self::getInstance();         
        $con      = $instance->con;
        $instance->setPropertyDefault();       
        return $con;

    }

    /**
     * Definição da tabela
     *
     * @param [string] $table
     * @return void
     */
    public static function table($table) {
    
        $instance = self::getInstance();        
        $instance->table = $table;        
        return $instance;
    }

    /**
     * Definição das colunas
     *
     * @param [type] $args
     * @return void
     */
    public function column($args) {    
        
        $this->column = (is_array($args)) ? implode(', ', (array) $args) : $args;
        return $this;
    }

    /**
     * Definição da clausula where
     *
     * @param [string] $field
     * @param [string] $operator
     * @param [string] $value
     * @return void
     */
    public function where($field, $operator, $value) {    

        $this->where[] = [$field, $operator, $value];
        return $this;
    }    
    
    /**
     * Definição do order by
     *
     * @param array $field
     * @param string $sort
     * @return void
     */
    public function orderBy($field = [], $sort='') {            

        $this->orderBy[] = [$field, $sort];        
        return $this;
    } 
    
    /**
     * Definição do LIMIT, utilizar com a OrderBy  
     * -> Quantos registros buscar (10) ou buscar e iniciar em (10,0)
     * @param [string] $args
     * @return void
     */
    public function limit($limit, $offset=null) {            

        $this->limit = ' LIMIT ' . ($offset ? $offset . ',' : '') .$limit;
        return $this;        
    } 

    /**
     * Retorna a consulta
     *
     * @return void
     */
    public function select() {           
               
        return $this->getBuilder();
    }

    /**
     * Pesquisa com base em um ID especifico
     *
     * @param [type] $id
     * @return void
     */
    public function find($id) {
        
        return $this->sqlSelect("select $this->column from $this->table where id=?", [$id]);
    }

    /**
     * Retorna a primeira linha da consulta
     *
     * @return void
     */
    public function first() {
        
        $result = $this->getBuilder();        
        return ($result) ? $result[0] : $result;
    }

    /**
     * Retorna uma linha com o valor da coluna especificada
     *
     * @param [string] $column
     * @return void
     */
    public function value($column) {
        
        $result = $this->getBuilder();        
        $line   = ($result) ? array_column((array) $result, $column) : $result;
        return (isset($line[0])) ? $line[0] : [];
    }

    /**
     * Retorna uma ou mais linhas com o valor da coluna especificada
     *
     * @param [string] $column
     * @return void
     */    
    public function pluck($column) {
        
        $result = $this->getBuilder();                
        return ($result) ? array_column((array) $result, $column) : $result;
    }

    /**
     * Retorna a contagem de registros
     *
     * @return void
     */
    public function count() {             
        
        $this->column('count(*) as count');
        $result = $this->getBuilder();  
        $line   = ($result) ? array_column((array) $result, 'count') : $result;
        return (isset($line[0])) ? $line[0] : [];
        
    }

    /**
     * Retorna o valor máximo da coluna especificada
     *
     * @param [string] $column
     * @return void
     */
    public function max($column) {             

        $this->column("max($column) as max");
        $result = $this->getBuilder();  
        $line   = ($result) ? array_column((array) $result, 'max') : $result;
        return (isset($line[0])) ? $line[0] : [];
        
    }

    /**
     * Retorna o valor minimo da coluna especificada
     *
     * @param [string] $column
     * @return void
     */
    public function min($column) {             

        $this->column("min($column) as min");
        $result = $this->getBuilder();  
        $line   = ($result) ? array_column((array) $result, 'min') : $result;
        return (isset($line[0])) ? $line[0] : [];
        
    }

    /**
     * Retorna o valor médio da coluna especificada
     *
     * @param [string] $column
     * @return void
     */
    public function avg($column) {             

        $this->column("avg($column) as avg");
        $result = $this->getBuilder();  
        $line   = ($result) ? array_column((array) $result, 'avg') : $result;
        return (isset($line[0])) ? $line[0] : [];
        
    }

    /**
     * Retorna a somatória da coluna especificada
     *
     * @param [string] $column
     * @return void
     */
    public function sum($column) {             

        $this->column("sum($column) as sum");
        $result = $this->getBuilder();  
        $line   = ($result) ? array_column((array) $result, 'sum') : $result;
        return (isset($line[0])) ? $line[0] : [];
        
    }

    /**
     * Remove todos os registros e reseta o auto incremento
     *
     * @return void
     */
    public function truncate() {
    
        $table = $this->table;
        $this->sqlDelete("Delete from $table");
        $this->execSql("ALTER TABLE $table AUTO_INCREMENT = 1");
        
    }

    /**
     * Cria a clausula where
     *
     * @return void
     */
    private function createWhere() {
    
        $array = $this->where;

        if ($array) {      

            $where    = ' where ';        
            $values   = [];

            $i = 0;
            $len = count($array);
            
            foreach ($array as $r) {
                
                $where = $where . $r[0] .' ' . $r[1]. ' ?';
                
                if ($i < $len - 1) {
                    $where = $where . ' and ';
                }
            
                $values[] = $r[2];

                $i++;
            }        
            
            return [$where, $values];

        }else {

            return '';
        }       
        
    }
    
    /**
     * Cria o order by
     *
     * @return void
     */
    private function createOrderBy() {
    
        $array = $this->orderBy;

        if ($array) {      
                
            $orderBy  = ' order by ';               

            $i = 0;
            $len = count($array);
            
            foreach ($array as $r) {
                
                $orderBy = $orderBy . $r[0];

                if ($r[1] == '') {                

                    if ($i < $len - 1) {
                        $orderBy = $orderBy . ', ';
                    }

                }

                if ($r[1] != '') {                
                    
                    $orderBy = $orderBy . ' ' . $r[1];                

                    if ($i < $len - 1) {
                        $orderBy = $orderBy . ', ';
                    }
                }                   
                
                $i++;
            }        
            
            return $orderBy;

        }else {
            
            return '';
        }

    }

    /**
     * Monta a query e executa a consulta
     *
     * @return void
     */
    private function getBuilder() {
    
        $where       = $this->createWhere();        
        $orderBy     = $this->createorderBy();                
        $whereText   = (isset($where[0])) ? $where[0] : '';       
        $whereValue  = (isset($where[1])) ? array_values($where[1]) : [];        
        
        return $this->sqlSelect("select $this->column from $this->table $whereText $orderBy $this->limit", $whereValue);
    }
    
}

?>