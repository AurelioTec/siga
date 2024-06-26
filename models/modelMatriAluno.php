<?php

//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");

function matriAluno($conexao, array $dados) {
    foreach ($dados as $row) {
        extract($row);
    }
    //$sql = "INSERT INTO tbmatriculas (idaluno,numatricula, idturmas, idlestrangeira, encarregado,telfencarregado, anexo, idusuario, tipomatricula, estado) VALUES()";
   $sql= "CALL pcmatricular(
       :numatricula, 
       :idinscricao, 
       :idturma, 
       :idlestrang, 
       :encarreg, 
       :telfenc, 
       :anexo,
       :idusu, 
       :tipomat, 
       :estado,
       @mensagem_saida
)";  
    $matriAluno = $conexao->prepare($sql);
    //Nomear os Parametros
    $matriAluno->bindParam(":idinscricao", $idInsc);
    $matriAluno->bindParam(":numatricula", $numatricula);
    $matriAluno->bindParam(":idturma", $idTurma);
    $matriAluno->bindParam(":idlestrang", $idlestrang);
    $matriAluno->bindParam(":encarreg", $nomeenc);
    $matriAluno->bindParam(":telfenc", $telf);
    $matriAluno->bindParam(":anexo", $anexo);
    $matriAluno->bindParam(":idusu", $idusuario);
    $matriAluno->bindParam(":tipomat", $tipomat);
    $matriAluno->bindParam(":estado", $estado);
     // Verificar se foi inserido no Banco
    if ($matriAluno->execute()) {
        // Recuperar a mensagem de saída
        $stmt = $conexao->query("SELECT @mensagem_saida");
        $mensagem_saida = $stmt->fetchColumn();
        return $mensagem_saida;
    } else {
        return false;
    }
}

function buscarAluno($conexao, $idinscrcao) {
    $query = "SELECT * FROM vwmatriculas WHERE idinscricao=:idinsc LIMIT 1";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idinsc", $idinscrcao);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getAlunoTurma($conexao, array $dados) {
    $query = "SELECT idmatricula, numatricula, idaluno, nomealuno, genero,"
            . "idturmas, turma, idclasse, classe, periodo, sala, "
            . "anoletivo, tipomatricula FROM vwmatriculas "
            . "WHERE idturmas=:idturmas AND idclasse=:idclasse "
            . "AND anoletivo=:anoletivo";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idturmas", $dados['turma']);
    $stmt->bindParam(":idclasse",$dados['classe']);
    $stmt->bindParam(":anoletivo",$dados['anoletivo']);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() !=0)) {
        return $stmt;
    }
}

function getMatricula($conexao) {
    $query = "SELECT*FROM vwmatriculas ";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}


