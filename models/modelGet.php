<?php

function getCategoria($conexao)
{
    $query = "SELECT idniveacesso, tipo FROM tbniveacesso ORDER BY idniveacesso ASC LIMIT 1, 18446744073709551615";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getProvincia($conexao)
{
    $query = "SELECT idprovincia, pronome, proabreviacao FROM tbprovincias";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getMunicipio($conect, $idProv)
{
    $sql = "SELECT idmunicipios, muninome, idprovincia FROM tbmunicipios WHERE idprovincia=:idprov ORDER BY muninome";
    $resultstmt = $conect->prepare($sql);
    $resultstmt->bindParam(":idprov", $idProv);
    $resultstmt->execute();
    while ($resultUsu = $resultstmt->fetchAll(PDO::FETCH_ASSOC)) {
        return $resultUsu;
    }
}

function getCidade($conect)
{
    $id = 2;
    $sql = "SELECT muninome, idprovincia FROM tbmunicipios WHERE idprovincia=$id";
    $stmt = $conect->prepare($sql);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getAlunoInsc($conexao, array $dados)
{
    foreach ($dados as $row) {
        extract($row);
    }
    $sql = "SELECT * FROM vwinscricao WHERE nome=:nome and numero=:numero";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->bindParam(":nome", $nomeAluno);
    $resultstmt->bindParam(":numero", $docNum);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}


function getClasse($conexao)
{
    $sql = "SELECT idclasses, classe FROM tbclasses";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}

function getLestrageira($conexao)
{
    $sql = "SELECT idlestrangeira, lingua, codigo FROM tblestrangeira";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}

function getTurma($conexao, array $dados)
{
    $sql = "SELECT * FROM vwturmas WHERE idclasse=:idclasse AND periodo=:periodo";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->bindParam(":idclasse", $dados['idClasse']);
    $resultstmt->bindParam(":periodo", $dados['periodo']);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}

function getTurmaAluno($conexao, array $dados)
{

    $query = "SELECT idmatricula, numatricula, nomealuno, genero,"
        . "idturmas, turma, idclasse, classe, periodo, sala, "
        . "anoletivo, tipomatricula FROM vwmatriculas "
        . "WHERE idturmas=:idturmas AND idclasse=:idclasse "
        . "AND anoletivo=:anoletivo LIMIT 1";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idturmas", $dados['turma']);
    $stmt->bindParam(":idclasse", $dados['classe']);
    $stmt->bindParam(":anoletivo", $dados['anoletivo']);
    $stmt->execute();
    if ($stmt) {
        return $stmt;
    }
}
function getAlunoNota($conexao, array $dados)
{
    $query = "SELECT DISTINCT*FROM vwnotas 
              WHERE idturmas=:idturmas AND 
                    idclasses=:idclasse AND 
                    anolectivo=:anoletivo AND
                    iddisc=:disciplina AND
                    trimestre=:trimestre GROUP BY idaluno";

    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idturmas", $dados['turma']);
    $stmt->bindParam(":idclasse", $dados['classe']);
    $stmt->bindParam(":anoletivo", $dados['anoletivo']);
    $stmt->bindParam(":disciplina", $dados['disciplina']);
    $stmt->bindParam(":trimestre", $dados['trimestre']);
    $stmt->execute();
    if ($stmt) {
        return $stmt;
    }
}

function getAnolectivo($conexao)
{
    $query = "SELECT DISTINCT anoletivo FROM vwmatriculas";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getDisciplina($conexao)
{
    $query = "SELECT iddisciplina as iddisc, codigo, disciplina, peso FROM tbdisciplinas";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getProfessor($conexao)
{
    $query = "SELECT idfuncio, nagente,nome,datanasciemnto,genero,telf1,telf2,email,"
        . "habilitacao,categoria,especesuperior, especimedio, estado, obs FROM tbfuncionarios";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}
function getFuncioByAgente($conexao, $nagente)
{
    $query = "SELECT nagente, nome, genero, email, imagem, estado FROM tbfuncionarios";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getFuncioByAll($conexao, $funcionario)
{
    $query = "SELECT nagente, nome, genero, email, telf1, foto, estado FROM tbfuncionarios WHERE nagente=:nagente OR nome=:nome ORDER BY idfuncio ASC  ";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":nagente", $funcionario);
    $stmt->bindParam(":nome", $funcionario);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getDiscProf($conexao, $idprof)
{
    $query = "SELECT iddisciplina, codigo, disciplina  FROM vwprofdisc WHERE idprofessor=:idprof";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idprof", $idprof);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}
function getProfDisc($conexao, $iddisc)
{
    $query = "SELECT idprofdisciplina FROM tbprofessordisciplina WHERE iddisciplina=:iddisc";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":iddisc", $iddisc);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        while ($resultUsu = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $resultUsu;
        }
    }
}

function getAlunoMat($conexao, $idaluno)
{
    $query = "SELECT * FROM vwmatriculas WHERE idaluno=:idaluno";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":idaluno", $idaluno);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}

function getConfig($conexao)
{
    $sql = "SELECT*FROM tbconfig";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}
