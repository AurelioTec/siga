<?php

date_default_timezone_set('Africa/Luanda');
setlocale(LC_TIME, 'pt_br.utf-8');
//require_once $_SERVER['DOCUMENT_ROOT'] . '/siga/vendor/autoload.php';
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");


$result = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sqlAlunos = "SELECT idmatricula, numatricula, nomealuno, genero,"
        . "idturmas, turma, idclasse, classe, periodo, sala, "
        . "anoletivo, tipomatricula FROM vwmatriculas "
        . "WHERE idturmas=:idturmas AND idclasse=:idclasse "
        . "AND anoletivo=:anoletivo";
$pst = $conectar->prepare($sqlAlunos);
$pst->bindParam(":idturmas", $result['turma']);
$pst->bindParam(":idclasse", $result['classe']);
$pst->bindParam(":anoletivo", $result['anoletivo']);
$pst->execute();
$resultado = $pst->fetchAll();
$res=[];
foreach ($resultado as $dados) {
    $saida['idmatricula'] = $dados['idmatricula'];
    $saida['numatricula'] = $dados['numatricula'];
    $saida['nomealuno'] = $dados['nomealuno'];
    $saida['genero'] = $dados['genero'];
    $saida['turma'] = $dados['turma'];
    $saida['classe'] = $dados['classe'];
    $saida['sala'] = $dados['sala'];
    $saida['periodo'] = $dados['periodo'];
    $saida['tipomatricula'] = $dados['tipomatricula'];
    $saida['anoletivo'] = $dados['anoletivo'];
    $res[] = $saida;
}

//echo json_encode($res);
/*
// Converter o JSON em uma array
$array = json_decode($res, true);

// Verificar se houve algum erro na decodificação
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Erro ao decodificar JSON: ' . json_last_error_msg());
}*/
