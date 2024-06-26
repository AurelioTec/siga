<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$idProf = filter_input(INPUT_POST, 'idProf', FILTER_SANITIZE_STRING);
if ($idProf) {
       $linha= getDiscProf($conectar, $idProf);
       $row = $linha->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $result) {
            $saida['iddisc'] = $result['iddisciplina'];
            $saida['codigo'] = $result['codigo'];
            $saida['disciplina'] = $result['disciplina'];
            $res[] = $saida;
        }
        echo json_encode($res);
    }
