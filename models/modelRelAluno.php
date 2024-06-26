<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");


function getAlunosRel($conexao, $iduser)
{

    $query = "SELECT*FROM vwinscricao WHRE idaluno=:idaluno";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idaluno", $iduser);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

