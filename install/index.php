<?php

    require_once (realpath('../settings/defines_connection.inc.php'));
    date_default_timezone_set('America/Sao_Paulo');

    require_once ('remove.php');

    //*******************************************************************************************************************************************************
    
    $sql = "CREATE  TABLE IF NOT EXISTS informacoes_loja (
            id INT NOT NULL AUTO_INCREMENT ,                                
            nome_loja VARCHAR(150) NOT NULL,               
            PRIMARY KEY (id));";                 
    try {
        $con->exec($sql);        
        echo '</br></br> Tabela: informacoes_loja criada com sucesso! </br></br>';        
    }
    catch(PDOException $error) {
        echo '</br></br> Erro ao criar a tabela: informacoes_loja - ' . $error->getMessage();        
    }
    $conn = null;    

    //*******************************************************************************************************************************************************

    $sql = "INSERT INTO informacoes_loja (                                  
            nome_loja) VALUES (?)";
    try {
        $stmt = $con->prepare($sql);
        $stmt->execute([                                 
            "LojaShop",            
        ]);
        echo 'Dados inseridos com sucesso em: informacoes_loja </br></br>';
    }
    catch(PDOException $error) {
        echo '</br></br> Erro ao inserir dados em: informacoes_loja - ' . $error->getMessage();        
    }                
    $stmt = null;

    //*******************************************************************************************************************************************************
    //*******************************************************************************************************************************************************
    //*******************************************************************************************************************************************************

   






    //Restabelece pastas e arquivos
    //*******************************************************************************************************************************************************
    //*******************************************************************************************************************************************************
    //*******************************************************************************************************************************************************

    /*

    delTree(dirname(__FILE__,2) . '/img');
    copyr(dirname(__FILE__,2) . '/copy/img-copy',dirname(__FILE__,2) . '/img'); 

    delTree(dirname(__FILE__,2) . '/download');
    copyr(dirname(__FILE__,2) . '/copy/download-copy',dirname(__FILE__,2) . '/download');

    delTree(dirname(__FILE__,2) . '/upload');
    copyr(dirname(__FILE__,2) . '/copy/upload-copy',dirname(__FILE__,2) . '/upload');

    */

    //Deleta diretorio

    function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    } 

    //Copia todo diretorio

    function copyr($source, $dest) {
        
        // COPIA UM ARQUIVO
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // CRIA O DIRETÓRIO DE DESTINO
        if (!is_dir($dest)) {
            mkdir($dest);
            echo "DIRET&Oacute;RIO $dest CRIADO<br />";
        }

        // FAZ LOOP DENTRO DA PASTA
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // PULA "." e ".."
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // COPIA TUDO DENTRO DOS DIRETÓRIOS
            if ($dest !== "$source/$entry") {
                copyr("$source/$entry", "$dest/$entry");
                echo "COPIANDO $entry de $source para $dest <br />";
            }
        }

        $dir->close();
        return true;

    }