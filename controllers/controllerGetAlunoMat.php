<?php
//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php";
require $_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php";

$getid= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmts= getAlunoMat($conectar, $getid);
if(($stmts) AND ($stmt->rowCount() != 0) ){
    
    $resultRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

