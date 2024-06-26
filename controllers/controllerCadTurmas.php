<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelCadTurmas.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['Cadastrar'])) {
    
    $idclasse = $dados['Classe'];
    $codigo = $dados['Codigo'];
    $desc = $dados['Desc'];
    $periodo = $dados['Periodo'];
    $sala = $dados['Sala'];
    $anoletivo = $dados['AnoLect'];
    

    $lista[] = array(
        "idclasse" => $idclasse,
        "codigo" => $codigo,
        "desc" => $desc, 
        "periodo" => $periodo,
        "sala" => $sala,
        "anoletivo" => $anoletivo
    );
    $ver = getTurmas($conectar, $lista);
   if ($ver)  {
       $result = $ver->fetchAll(PDO::FETCH_ASSOC);
        while ($row = $result) {
            extract($row);
            if ((((((((($idclasse == $idclasses) AND $codigo == $codigo) AND
                    $desc == $descricao) AND $periodo == $periodo) AND
                    $sala == $sala) AND $anoletivo == $anolectivo)))) {
                $_SESSION["msgTitulo"] = "Atenção!";
                $_SESSION["msgcab"] = "A $codigo ja foi criada";
                $_SESSION["msgCod"] = "warning";
                $_SESSION["url"] = $_SERVER['SERVER_NAME'] . '/siga/views/admin/cadTurmas.php';
            } 
                
                //var_dump($cadNotas);
            //var_dump($ver);
        }
         
    } else {
        $atribuir = cadTurmas($conectar, $lista);
        if ($atribuir) {

            $_SESSION["msgTitulo"] = "Sucesso!";
            $_SESSION["msgcab"] = "Turma criada com sucesso";
            $_SESSION["msgCod"] = "success";
            $_SESSION["url"] = '../views/admin/cadTurmas.php';
        } else {
            $_SESSION["msgTitulo"] = "Erro!";
            $_SESSION["msgcab"] = "Erro ao adicionar a nota";
            $_SESSION["msgCod"] = "error";
            $_SESSION["url"] ='../views/admin/cadTurmas.php';
        }
//var_dump($ver); 
    } 
}
    