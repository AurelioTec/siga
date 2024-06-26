<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
function getLinhaUsuarios($conexao)
{
    $query = "SELECT idusuario, nome, usuario, email, categoria,telf, imagem FROM vwlogin ORDER BY idusuario ASC LIMIT 1, 18446744073709551615;";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

