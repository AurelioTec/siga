<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelRecuvPass.php");
require $_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php";
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelUsuario.php");

$dados = filter_input_array(INPUT_POST,  FILTER_DEFAULT);

if ($dados) {
  $usuario = $dados['username'];
  $senha = $dados['senha'];
  $novaSenha = password_hash($senha, PASSWORD_BCRYPT);
  $data = date("Y-m-d H:i:s");
  $get = getbyname($conectar, $usuario);
  if ($get) {
    $row = $get->fetch(PDO::FETCH_ASSOC);
    $iduser = $row['idusuario'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $titulo = "Redifinir senha";
    $msm = "Alteração da senha de utilizador";

    $updateKey[] = array(
      "usuario" => $usuario,
      "senha" => $novaSenha,
      "chave" => "",
      "data" => $data
    );
    $atualizou = redifinePass($conectar, $updateKey);
    if ($atualizou) {
      $cad[] = array(
        "idusuario" => $iduser,
        "titulo" => $titulo,
        "descricao" => $msm,
        "ip" => $ip,
        "navegador" => $navegador
      );
      cadHistorico($conectar, $cad);
      $saida['Sucesso'] = "Senha redifinida com sucesso";
      $res[] = $saida;
    } else {
      $saida['Erro'] = "Erro ao redifinir a senha ";
      $res[] = $saida;
    }
  }


  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  echo json_encode($res);
}
