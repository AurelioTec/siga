<?php

include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelCadNotas.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);
/*
if (!empty($dados['LancarNota'])) {
    $idturma = intval($dados['Turma']);
    $periodo = $dados['Periodo'];
    $anoletivo = $dados['AnoLectivo'];
    $professor = $dados['Professor'];
    $aluno = $dados['Nome'];
    $disciplina = $dados['Disciplina'];
    $tiponota = $dados['TipoNota'];
    $nota = $dados['Nota'];
    $idusu = $id;
    global $idProfDisc;
    $trimestre = $dados['Trimestre'];
    $idprofdisc = getProfDisc($conectar, $disciplina);
    foreach ($idprofdisc as $item) {
        $idProfDisc = $item['idprofdisciplina'];
    }
    $cadNotas[] = array(
        "turma" => $idturma,
        "periodo" => $periodo,
        "anoletivo" => $anoletivo,
        "idprofdisc" => $idProfDisc,
        "aluno" => $aluno,
        "tiponota" => $tiponota,
        "nota" => $nota,
        "trimestre" => $trimestre,
        "idusu" => $idusu
    );

    $ver = getNotas($conectar, $cadNotas);
    if (($ver) and ($ver->rowCount() != 0)) {
        $result = $ver->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            extract($row);
            if ($aluno == $idmatricula AND
                    $idturma == $idturmas AND
                    $periodo == $periodo AND
                    $anoletivo == $anolectivo AND
                    $trimestre == $trimestre AND
                    $idProfDisc == $idprofdisc AND
                    $tiponota == $tiponota) {
                $_SESSION["msgTitulo"] = "Atenção!";
                $_SESSION["msgcab"] = "A $tiponota, do $trimestre º trimestre do(a) aluno(a): $nomealuno, ja foi lançada";
                $_SESSION["msgCod"] = "warning";
                $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadNotas.php';
            } else {
                $atribuir = cadNotas($conectar, $cadNotas);
                if ($atribuir) {
                    $_SESSION["msgTitulo"] = "Sucesso!";
                    $_SESSION["msgcab"] = "Nota adicionada";
                    $_SESSION["msgCod"] = "success";
                    $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadNotas.php';
                }
            }
        }
    } else {
         $atribuir = cadNotas($conectar, $cadNotas);
          if ($atribuir) {

          $_SESSION["msgTitulo"] = "Sucesso!";
          $_SESSION["msgcab"] = "Nota adicionada";
          $_SESSION["msgCod"] = "success";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadNotas.php';
          } else {
          $_SESSION["msgTitulo"] = "Erro!";
          $_SESSION["msgcab"] = "Erro ao adicionar a nota";
          $_SESSION["msgCod"] = "error";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadNotas.php';
          } 
        //}
    }
}    */