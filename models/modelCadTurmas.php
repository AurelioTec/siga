<?php

function  cadTurmas ($conexao, array $dados) {


    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods
    $aql = "INSERT INTO tbturmas( idclasses,codigo,descricao,periodo,sala,anolectivo) "
            ."VALUES (:idclasses,:codigo,:descricao,:periodo,:sala,:anolectivo)";
    $inserirTurmas = $conexao->prepare($aql);
    //Nomear os Parametros
    $inserirTurmas->bindParam(":idclasses", $idclasse);
    $inserirTurmas->bindParam(":codigo", $codigo);
    $inserirTurmas->bindParam(":descricao", $desc);
    $inserirTurmas->bindParam(":periodo", $periodo);
    $inserirTurmas->bindParam(":sala", $sala);
    $inserirTurmas->bindParam(":anolectivo", $anoletivo);
    //verificar se foi inserido no Banco
    if ($inserirTurmas->execute()) {
        return $inserirTurmas;
        
    } else {
         return $inserirTurmas=false;
     
    }
}


function getTurmas($conexao, array $lista) {
    $query = "SELECT * FROM tbturmas WHERE idclasses=:idclasses "
            . "AND codigo=:codigo AND descricao=:descricao AND 
               periodo=:periodo AND sala=:sala AND "
            . "anolectivo=:anolectivo";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idclasses", $lista['idclasse']);
    $stmt->bindParam(":codigo", $lista['codigo']);
    $stmt->bindParam(":descricao", $lista['desc']);
    $stmt->bindParam(":periodo", $lista['periodo']);
    $stmt->bindParam(":sala", $lista['sala']);
    $stmt->bindParam(":anolectivo", $lista['anoletivo']);
    $stmt->execute();
     if ($stmt){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}