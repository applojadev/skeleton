<?php

use App\Utils\App;
use App\Utils\Dispatch;
use App\Utils\Cookie;
use App\Utils\Tools;
use App\Utils\Detect;
use App\Utils\Url;
use App\Database\DB;
use App\Utils\Colors;

/*
|--------------------------------------------------------------------------
| Cria instancias
|--------------------------------------------------------------------------    
*/
$app        = new App;
$dispatch   = new Dispatch;
$colors     = new Colors;

/*
|--------------------------------------------------------------------------
| Exporta instancias
|--------------------------------------------------------------------------    
*/
$template->assign(array(
    
    'app'       => $app,        
    'dispatch'  => $dispatch,        
    'colors'    => $colors,        

));

/*
|--------------------------------------------------------------------------
| Força SSl quando configurado
|--------------------------------------------------------------------------    
*/
if ($dispatch->getValue('app','force_ssl')) {
    
    if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {        

    }else{

        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        exit;
    } 
              
}  

/*
|--------------------------------------------------------------------------
| Informações globais | disponível para controladores, templates e JS
|--------------------------------------------------------------------------    
*/
define('device'     , Detect::information('device'));
define('user_agent' , Detect::information('user_agent'));
define('app_env'    , $app->getValue('app_env'));

/*
|--------------------------------------------------------------------------
| Exporta definições
|--------------------------------------------------------------------------    
*/
$template->assign(array(
    
    '_img_dir_'         =>  _img_dir_,        
    '_img_logo_dir_'    =>  _img_logo_dir_,
    '_img_icon_dir_'    =>  _img_icon_dir_,
    '_img_load_dir_'    =>  _img_load_dir_,
    '_img_system_dir_'  =>  _img_system_dir_,
    '_upload_dir_'      =>  _upload_dir_,
    '_download_dir_'    =>  _download_dir_,
    'device'            =>  device, 
    'user_agent'        =>  user_agent, 
    'app_env'           =>  app_env

));

/*
|--------------------------------------------------------------------------
| Comprimir Html
|--------------------------------------------------------------------------    
*/

if ($app->getValue('comprimir_html')) {

    $template->registerFilter("output","compress_html");
}







$cnx = DB::connection('mysql')->PDO();

$sql = "SELECT * FROM informacoes_loja";    
try {
    $stmt = $cnx->query($sql);        
    $rs_i = $stmt->fetchAll(PDO::FETCH_ASSOC);      
}
catch(PDOException $error) {
    echo '<span class="box-error"><h5>Erro ao carregar informações loja:' . '<span class="description-error">' .$error->getMessage(). '</span>' .'</span>';        
}         
$stmt = null;

echo '<pre>';  print_r($rs_i);  echo '</pre>';


echo '<pre>';  print_r(
    
  DB::table('produto')
    ->column(['preco_venda','tipo_produto'])
      ->where('preco_venda', '>', 200)        
        ->where('preco_venda', '<', 300)
          ->where('tipo_produto', '=', 'presente')                     
            ->select())



;  echo '</pre>';

echo '<pre>';  print_r(
    
  DB::connection('mysql')
      ->table('produto')
        ->column(['preco_venda','tipo_produto'])
          ->where('preco_venda', '>', 200)        
            ->where('preco_venda', '<', 300)
              ->where('tipo_produto', '=', 'presente')                     
                ->select())



;  echo '</pre>';


echo '<pre>';  print_r(
    
    DB::table('produto') 
          ->where('id', '<', 3)        
            ->orderBy('nome', 'desc')                   
              ->sum('preco_venda'))
    
    
    
;  echo '</pre>';


echo '<pre>';  print_r(
    
    DB::table('produto')
          ->column(['nome', 'referencia', 'preco_venda'])  
            ->where('id', '>', 3)   
              ->orderBy('nome')                   
                ->limit(2,3)     
                  ->select())  
        
;  echo '</pre>';



DB::table('add_html')->truncate();

DB::sqlInsert('insert into add_html (codigo) values (?)', ['Tag a']);

echo '<pre>';  print_r(DB::sqlunPrepared('SELECT * from produto LIMIT 2'));  echo '</pre>';

echo $affected = DB::sqlUpdate('update add_html set codigo=?',['Tag span']);