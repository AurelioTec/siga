<?php

//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$getid = filter_input(INPUT_GET, 'banv', FILTER_DEFAULT);
$idAluno = (int) desmascararID($getid);
if ($idAluno) {
        $resultstmt = getAluno($conectar, $idAluno);
        if (($resultstmt) AND ($resultstmt->rowCount() != 0)) {
            $returnAluno = $resultstmt->fetch(PDO::FETCH_ASSOC);
        }
    }
