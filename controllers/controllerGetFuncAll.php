<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$dodos = filter_input(INPUT_POST, 'funcionario', FILTER_DEFAULT);
$linha = getFuncioByAll($conectar, $dodos);
if (($linha) and ($linha->rowCount() != 0)) {
    $row = $linha->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $result) {
        if ($result['estado'] == 'Activo') {
            $saida['nagente'] = $result['nagente'];
            $saida['nome'] = $result['nome'];
            $saida['genero'] = $result['genero'];
            $saida['telf'] = $result['telf1'];
            $saida['email'] = $result['email'];
            $res[] = $saida;
        } else {
            $saida['Erro'] = "Este funcionario encontra-se inativo";
            $res[] = $saida;
        }
    }
    echo json_encode($res);
}
