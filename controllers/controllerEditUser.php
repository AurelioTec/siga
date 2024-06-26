<?php

ob_start();
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelUsuario.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['editUsuario'])) {
    $idEditUsu = $dados['idEdit'];
    $nome = $dados['PriNome'] . ' ' . $dados['UltiNome'];
    $usuario = strtolower($dados['PriNome'] . '.' . $dados['UltiNome']);
    $email = $dados['Email'];
    $telef = $dados['Telf'];
    $categoria = $dados['Categoria'];
    $fotoAntiga = $dados['fotoAntiga'];
    $dataTime = date('Y-m-d H:i:s');

    if (!empty($_FILES['Foto']['name'])) {
        $foto = $_FILES['Foto']['name'];
        $imgFormato = array("png", "jpg", "jpeg");
        $imgExtensao = pathinfo($foto, PATHINFO_EXTENSION);

        if (in_array($imgExtensao, $imgFormato)) {
            // Atribuir novo Nome
            $novoNome = bin2hex(random_bytes(8)) . ".$imgExtensao";
            $EditFoto[] = array(
                'nome' => $nome,
                'usuario' => $usuario,
                'email' => $email,
                'telf' => $telef,
                'categoria' => $categoria,
                'data' => $dataTime,
                'foto' => $novoNome
            );

            // Remova a imagem existente
            $idEdit = desmascararID($idEditUsu);
            $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/images/user/' . $idEdit . '/';
            $dirFoto = $diretorio . $fotoAntiga;

            if (file_exists($dirFoto)) {
                unlink($dirFoto);
            }
            mkdir($diretorio, 777,true);
                if (move_uploaded_file($_FILES['Foto']['tmp_name'], $diretorio . $novoNome)) {
                    $editado = editUserFoto($conectar, $idEditUsu, $EditFoto);
                    $_SESSION["msgTitulo"] = "Sucesso!";
                    $_SESSION["msgcab"] = " Dados do Utilizador foram atualizados e Upload feito com sucesso!!";
                    $_SESSION["msgCod"] = "success";
                    $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . "/siga/views/admin/editUsuario.php?id=" .$idEditUsu;

                } else {
                    $_SESSION["msgTitulo"] = "Erro!";
                    $_SESSION["msgcab"] = "O arquivo não pôde ser movido para o diretório.";
                    $_SESSION["msgCod"] = "error";
                    $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . "/siga/views/admin/editUsuario.php?id=" .$idEditUsu;
                }

        } else {
            $_SESSION["msgTitulo"] = "Erro!";
            $_SESSION["msgcab"] = "Formato de arquivo inválido. Use apenas PNG, JPG ou JPEG.";
            $_SESSION["msgCod"] = "error";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . "/siga/views/admin/editUsuario.php?id=" .$idEditUsu;
            exit();
        }
    } else {
        $Edit[] = array(
            'nome' => $nome,
            'usuario' => $usuario,
            'email' => $email,
            'telf' => $telef,
            'data' => $dataTime,
            'categoria' => $categoria);

        $editar = editUser($conectar, $idEditUsu, $Edit);
        if (!$editar) {
            $_SESSION["msgTitulo"] = "Sucesso!";
            $_SESSION["msgcab"] = " Dados do Utilizador foram atualizados com sucesso!!";
            $_SESSION["msgCod"] = "success";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php';
        } else {
            $_SESSION["msgTitulo"] = "Erro!";
            $_SESSION["msgcab"] = "Erro ao atualizar";
            $_SESSION["msgCod"] = "error";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . "/siga/views/admin/editUsuario.php?id=" . $idEditUsu;
        }
    }
} 