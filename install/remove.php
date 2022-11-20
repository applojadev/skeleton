<?php

//*******************************************************************************************************************************************************
$sql = "DROP TABLE IF EXISTS informacoes_loja;";
try {
    $con->exec($sql);
    echo 'Tabela: informacoes_loja removida com sucesso! </br></br>';
}
catch(PDOException $error) {
    echo '</br></br> Erro ao remover a tabela: informacoes_loja - ' . $error->getMessage();
    
}
$conn = null;    
//*******************************************************************************************************************************************************