<?php

function cadNotas($conexao, array $dados) {
    foreach ($dados as $valor) {

        // Certifique-se de que as variáveis estão definidas antes de usar
        $idprofdisc = $valor["idprofdisc"];
        $aluno = $valor["aluno"];
        $tiponota = $valor["tiponota"];
        $nota = $valor["nota"];
        $trimestre = $valor["trimestre"];
        $idusu = $valor["idusu"];

        // Sua lógica de inserção no banco de dados aqui...
        //inserir no Banco de Daods
        $aql = "INSERT INTO tbnotas( idmatricula,idusuario,idprofdisciplina,tiponota,nota,trimestre)
           VALUES (:idmatricula,:idusuario,:idprofdisc,:tiponota,:nota,:trimestre)";
        $inserirNotas = $conexao->prepare($aql);
        //Nomear os Parametros
        $inserirNotas->bindParam(":idmatricula", $aluno);
        $inserirNotas->bindParam(":idusuario", $idusu);
        $inserirNotas->bindParam(":idprofdisc", $idprofdisc);
        $inserirNotas->bindParam(":tiponota", $tiponota);
        $inserirNotas->bindParam(":nota", $nota);
        $inserirNotas->bindParam(":trimestre", $trimestre);
        $cad = $inserirNotas->execute();
        //verificar se foi inserido no Banco
        if ($cad) {
            return $cad = true;
            // header("Location: index.php");
        } else {
            return $cad = false;
        }
    }
}

function getNotas($conexao, array $lista) {
     foreach ($lista as $listas) {
    
    $query = "SELECT * FROM vwnotas WHERE idmatricula=:idmatricula "
            . "AND idturmas=:idturmas AND periodo=:periodo AND "
            . "anolectivo=:anolectivo AND trimestre=:trimestre AND "
            . "tiponota=:tiponota AND idprofdisc=:idprofdisc";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idmatricula", $listas['aluno']);
    $stmt->bindParam(":idturmas", $listas['turma']);
    $stmt->bindParam(":periodo", $listas['periodo']);
    $stmt->bindParam(":anolectivo", $listas['anoletivo']);
    $stmt->bindParam(":trimestre", $listas['trimestre']);
    $stmt->bindParam(":tiponota", $listas['tiponota']);
    $stmt->bindParam(":idprofdisc", $listas['idprofdisc']);
    $stmt->execute();
    if ($stmt) {
        return $stmt;
    }
     }
}
