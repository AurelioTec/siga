<?php

include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelCadDiscProf.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['CadDiscProf'])) {
    $professor = $dados["Professor"];
    $disciplina = $dados['Disciplina'];
         $cadDiscProf[] = array(
            "professor" => $professor,
            "disciplina" => $disciplina,
        );
    $verificar=buscarProfDisc($conectar,$professor);   
    if(($verificar) and ($verificar->rowCount()<2)){
       $atribuir=cadDiscProf($conectar, $cadDiscProf);
    if ($atribuir) {

                $_SESSION["msgTitulo"] = "Sucesso!";
                $_SESSION["msgcab"] = "A disciplina foi atribuida ao professor";
                $_SESSION["msgCod"] = "success";
                $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadDiscProf.php';
            }else {
        $_SESSION["msgTitulo"] = "Erro!";
        $_SESSION["msgcab"] = "Disciplina não atribuida ao professor";
        $_SESSION["msgCod"] = "error";
        $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadDiscProf.php';
    }
    
    }else{
        $_SESSION["msgTitulo"] = "Atenção!";
        $_SESSION["msgcab"] = "O professor não pode ter mais de duas disciplinas";
        $_SESSION["msgCod"] = "warning";
        $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadDiscProf.php';
    }
}

 

       
 //var_dump($dados);
