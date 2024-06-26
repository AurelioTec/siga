<?php

//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");

function cadDiscProf($conexao, array $dados) {
    foreach ($dados as $row) {
        extract($row);
    }
    $sql = "INSERT INTO tbprofessordisciplina(idtbprofessor,iddisciplina) VALUES (:idprof ,:iddisc)";
    $Cadastrar = $conexao->prepare($sql);
    //Nomear os Parametros
    $Cadastrar->bindParam(":idprof", $professor);
    $Cadastrar->bindParam(":iddisc", $disciplina);
    //verificar se foi inserido no Banco
    if ($Cadastrar->execute()) {
        return $Cadastrar = true;
    } else {
        return $Cadastrar = false;
    }
}

function buscarProfDisc($conexao, $idProf) {
    $sql = "SELECT * FROM tbprofessordisciplina WHERE idtbprofessor=:idprof";
    $stmt= $conexao->prepare($sql);
    //Nomear os Parametros
    $stmt->bindParam(":idprof", $idProf);
    $stmt->execute();
    return $stmt;
}


