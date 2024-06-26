<?php

include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelConfigIni.php");

$valor = filter_input(INPUT_POST, 'valor', FILTER_DEFAULT);
if ($valor) {
    $sql = "SELECT*FROM tbconfig ORDER BY idinicio DESC LIMIT 1;";
    $resultstmt = $conectar->prepare($sql);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        $row = $resultstmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $result) {
            $saida['tsala']=$result['totalsalas'];
            $saida['anolect']= $result['anolectivo'];
            $res[] = $saida;
        }
    } else {
        $saida['info'] = "Nenhum valor encontrado";
        $res[] = $saida;
    }

    echo json_encode($res);
}