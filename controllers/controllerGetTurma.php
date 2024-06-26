<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($dados) {
       $linha= getTurma($conectar, $dados);
       $row = $linha->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $result) {
            $saida['idturma'] = $result['idturma'];
            $saida['idclasse'] = $result['idclasse'];
            $saida['classe'] = $result['classe'];
            $saida['codigo'] = $result['codigo'];
            $saida['turma'] = $result['turma'];
            $saida['periodo'] = $result['periodo'];
            $saida['sala'] = $result['sala'];
            $saida['anoletivo'] = $result['anoletivo'];
            $res[] = $saida;
        }
        echo json_encode($res);
    }
