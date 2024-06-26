<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelConfigIni.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($dados) {
    $Nomedir = $dados['NomeDir'];
    $Nomepedag = $dados['NPedago'];
    $NomeAdmin = $dados['NAmdin'];
    $NumSala = $dados['Tsala'];
    $AnoLect = $dados['AnoLect'];
    $cadConfigIni[] = array(
        "Nomedir" => $Nomedir,
        "Nomepedag" => $Nomepedag,
        "NomeAdmin" => $NomeAdmin,
        "NumSala" => $NumSala,
        "AnoLect" => $AnoLect
    );
    $cad = cadConfigIni($conectar, $cadConfigIni);
    if ($cad) {
        $saida['sucesso'] = "As configurações inicias foram cadastradas";
        $res[] = $saida;
    } else {
        $saida['Erro'] = "Erro ao cadastrar as config iniciais";
        $res[] = $saida;
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    echo json_encode($res);
}
    