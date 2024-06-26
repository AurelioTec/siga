<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelRecuvPass.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($dados) {
    $usuario = $dados['username'];

    $linha = getKey($conectar, $usuario);
    $row = $linha->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $result) {
        $saida['usuario'] = $result['usuario'];
        $saida['chave'] = $result['recuvakey'];
        $res[] = $saida;
    }
    echo json_encode($res);
    // echo json_encode($usuario);
}
