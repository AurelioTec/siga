<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelPass.php");
require$_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php";
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($dados) {
    $senha = password_hash($dados['Senha'], PASSWORD_DEFAULT);
    $iduser = desmascararID($dados['user']);
    $data = date("Y-m-d H:i:s");
    $idusua = $_SESSION["id"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $titulo="Senha";
    $msm="Alteração da senha de usuario";
    
    $configSenha[] = array(
        "senha" => $senha,
        "iduser" => $iduser,
        "data" => $data
    );

    $config = configPass($conectar, $configSenha);
    if ($config) {
        $cad[] = array(
            "idusuario" => $idusua,
            "titulo" => $titulo,
            "descricao" => $msm,
            "ip" => $ip,
            "navegador" => $navegador
        );
        cadHistorico($conectar, $cad);
        $saida['sucesso'] = "Senha atualizada com sucesso";
        $res[] = $saida;
    } else {
        $saida['Erro'] = "Erro ao atualizar a senha ";
        $res[] = $saida;
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    echo json_encode($res);
    //echo json_encode($dados);
}
    