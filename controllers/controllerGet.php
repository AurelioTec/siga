<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$dados = getCategoria($conectar);
$provincia = getProvincia($conectar);
$cidade= getCidade($conectar);
$classe= getClasse($conectar);
$lestrangeira=getLestrageira($conectar);
$anolectivo=getAnolectivo($conectar);
$disciplina= getDisciplina($conectar);
$professor=getProfessor($conectar);

$idProv = filter_input(INPUT_POST, 'idProv', FILTER_DEFAULT);
if ($idProv) {
    $res;
    $sql = "SELECT idmunicipios, muninome,idprovincia FROM tbmunicipios WHERE idprovincia=:idprov ORDER BY muninome";
    $resultstmt = $conectar->prepare($sql);
    $resultstmt->bindParam(":idprov", $idProv);
    $resultstmt->execute();
    $row = $resultstmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $result) {
        $saida['id'] = $result['idmunicipios'];
        $saida['nome'] = $result['muninome'];
        $valor[] = $saida;
    }
    echo json_encode($valor);
}