<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelRecuvPass.php");
require $_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php";
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");

$usuario = filter_input(INPUT_POST, 'TxtUsuario', FILTER_DEFAULT);

if ($usuario) {

    $user = $usuario;
    $chave = gerarChave();
    /*$data = date("Y-m-d H:i:s");
    $idusua = $_SESSION["id"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $titulo = "Recuperar Senha";
    $msm = "Alteração da senha de usuario";*/

    $cadKey[] = array(
        "usuario" => $user,
        "chave" => $chave
    );

    $salvou = SalvarChave($conectar, $cadKey);
}
