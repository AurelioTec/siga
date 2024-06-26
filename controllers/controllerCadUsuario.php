<?php
ob_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelUsuario.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['SendcadUsuario'])) {
    $nome = $dados['PriNome'] . ' ' . $dados['UltiNome'];
    $usuario = strtolower($dados['PriNome'] . '.' . $dados['UltiNome']);
    $senha = password_hash($dados['PriNome'] . '1', PASSWORD_DEFAULT);
    $email = $dados['Email'];
    $telf = $dados['Telf'];
    $categoria = $dados['Categoria'];
    $genero = $dados['Genero'];

    if ($genero === 'M') {
        $imagem = 'male.png';
    } else {
        $imagem = 'famale.png';
    }
    $cad[] = array('nome' => $nome, 'usuario' => $usuario, 'senha' => $senha, 'email' => $email, 'telf' => $telf, 'categoria' => $categoria, 'imagem' => $imagem);
    //$cad[] = array("usuario" => $usuario);
    cadUsuario($conectar, $cad);
}
