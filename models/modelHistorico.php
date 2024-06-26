<?php
//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
function cadHistorico($conexao, array $dados)
{

    foreach ($dados as $row) {
        extract($row);
    }

    //extract($dados);
    // inserir no Banco de Daods
    $cadHistorico = "INSERT INTO tbhistoricosistema (idusuario, titulo, descricao, ip, navegador) VALUES (:idusuario,:titulo, :descricao, :ip, :navegador)";
    $insertHist = $conexao->prepare($cadHistorico);
    //Nomear os Parametros
    $insertHist->bindParam(":idusuario", $idusuario);
    $insertHist->bindParam(":titulo", $titulo);
    $insertHist->bindParam(":descricao", $descricao);
    $insertHist->bindParam(":ip", $ip);
    $insertHist->bindParam(":navegador", $navegador);
    //verificar se foi inserido no Banco
    $insertHist->execute();
    //var_dump($dados);*/
}
