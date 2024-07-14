<?php
ob_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelUsuario.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['SendcadUsuario'])) {
    $nome = $dados['NomeFunc'];
    $nomeSeparado = SeparaNome($nome);
    $usuario = strtolower($nomeSeparado);
    $senha1 = $dados['Pass'];
    $senha2 = $dados['Repass'];
    if ($senha2 === $senha1) {
        $senhabanco = password_hash($senha2, PASSWORD_DEFAULT);
    } else {
        $_SESSION['msm'] = 'Passes diferentes';
    }
    $categoria = $dados['Categoria'];
    $idusua = $_SESSION["id"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $titulo = "Usuário";
    $msm = "Cadastro de usuário";
    $funcionario = getFuncioByAll($conectar, $dados['nagente']);
    if (($funcionario) and ($funcionario->rowCount() != 0)) {
        $row = $funcionario->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $result) {
            $idfuncio = $result['idfuncio'];
        }
        $cadUsu[] = array(
            'idfuncio' => $idfuncio,
            'usuario' => $usuario,
            'senha' => $senhabanco,
            'categoria' => $categoria,
        );
        //$cad[] = array("usuario" => $usuario);
        $cadastrado = cadUsuario($conectar, $cadUsu);
        if ($cadastrado) {
            $cadHist[] = array(
                "idusuario" => $idusua,
                "titulo" => $titulo,
                "descricao" => $msm,
                "ip" => $ip,
                "navegador" => $navegador
            );
            cadHistorico($conectar, $cadHist);
            $_SESSION["msgTitulo"] = "Sucesso!";
            $_SESSION["msgcab"] = "Dados do Utilizador Salvos  com sucesso!!";
            $_SESSION["msgCod"] = "success";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/listUsuario.php';
        } else {
            $_SESSION["msgTitulo"] = "Erro!";
            $_SESSION["msgcab"] = "Dados do Utilizador não salvos";
            $_SESSION["msgCod"] = "error";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/';
        }
    } else {
        $_SESSION["msgTitulo"] = "Erro!";
        $_SESSION["msgcab"] = "O funcionário não existe em nossa Base de Dados";
        $_SESSION["msgCod"] = "error";
        $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/';
    }
}
