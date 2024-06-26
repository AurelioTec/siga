<?php
//ob_start();
//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");

function cadUsuario($conexao, array $dados)
{
    foreach ($dados as $row) {
        extract($row);
        $insertUsu = $conexao->prepare($resultCadUsu = "INSERT INTO tbusuarios( nome, usuario, email, senha, idniveacesso,telf, imagem)VALUES(:nome, :usuario, :email, :senha, :idnivelacesso, :telf, :imagem) ");
        $insertUsu->bindParam(":nome", $nome);
        $insertUsu->bindParam(":usuario", $usuario);
        $insertUsu->bindParam(":email", $email);
        $insertUsu->bindParam(":senha", $senha);
        $insertUsu->bindParam(":idnivelacesso", $categoria);
        $insertUsu->bindParam(":telf", $telf);
        $insertUsu->bindParam(":imagem", $imagem);
        if ($insertUsu->execute()) {
            $_SESSION["msgTitulo"] = "Sucesso!";
            $_SESSION["msgcab"] = "Dados do Utilizador Salvos  com sucesso!!";
            $_SESSION["msgCod"] = "success";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/';
        } else {
            $_SESSION["msgTitulo"] = "Erro!";
            $_SESSION["msgcab"] = "Dados do Utilizador não salvos";
            $_SESSION["msgCod"] = "error";
            $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/';
        }
    }
}

function editUserFoto($conexao, $id, array $dados)
{

    $idDescod = desmascararID($id);

    foreach ($dados as $result) {
        extract($result);
    }


    $query = "UPDATE tbusuarios SET nome =:nome ,
                          usuario = :usuario, 
                          email = :email, 
                          idniveacesso = :categoria, 
                          telf = :telf , 
                          imagem = :foto,
                          updated=:data
            WHERE (idusuario =:id )";
    $EditUsu = $conexao->prepare($query);
    $EditUsu->bindParam(":nome", $nome, PDO::PARAM_STR);
    $EditUsu->bindParam(":usuario", $usuario, PDO::PARAM_STR);
    $EditUsu->bindParam(":email", $email, PDO::PARAM_STR);
    $EditUsu->bindParam(":categoria", $categoria, PDO::PARAM_INT);
    $EditUsu->bindParam(":telf", $telf, PDO::PARAM_STR);
    $EditUsu->bindParam(":data", $data, PDO::PARAM_STR);
    $EditUsu->bindParam(":foto", $foto, PDO::PARAM_STR);
    $EditUsu->bindParam(":id", $idDescod, PDO::PARAM_INT);
    if ($EditUsu->execute()) {
        // header("Location: index.php");
        $_SESSION["msgTitulo"] = "Sucesso!";
        $_SESSION["msgcab"] = "Dados do Utilizador alterados com sucesso!!";
        $_SESSION["msgCod"] = "success";
        $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/';
    } else {
        $_SESSION["msgTitulo"] = "Erro!";
        $_SESSION["msgcab"] = "Dados do Utilizador não alterados";
        $_SESSION["msgCod"] = "error";
        $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/';
    }
}

function editUser($conexao, $id, array $valor)
{
    $idDescod = desmascararID($id);
    foreach ($valor as $row) {
        extract($row);
    }
    $sqlquery = "UPDATE tbusuarios SET nome =:nome,
                          usuario = :usuario, 
                          email = :email, 
                          idniveacesso = :categoria, 
                          telf = :telf, 
                          updated=:data
            WHERE (idusuario =:id )";
    $EditUser = $conexao->prepare($sqlquery);
    $EditUser->bindParam(":id", $idDescod);
    $EditUser->bindParam(":nome", $nome);
    $EditUser->bindParam(":usuario", $usuario);
    $EditUser->bindParam(":email", $email);
    $EditUser->bindParam(":categoria", $categoria);
    $EditUser->bindParam(":data", $data);
    $EditUser->bindParam(":telf", $telf);
    $EditUser->execute();
}

function removeUser($conexao, $id)
{
    $idDescod = desmascararID($id); // Corrigido para usar $iduser
    $sql = "DELETE FROM tbusuarios WHERE idusuario =:id"; // Corrigido espaço extra
    $removeUser = $conexao->prepare($sql);
    $removeUser->bindParam(":id", $idDescod);
    if ($removeUser->execute()) {
        return true;
    }
}

function getbyname($conexao, $name)
{

    $sql = "SELECT idusuario, usuario FROM vwlogin WHERE usuario = :user LIMIT 1";
    $getUser = $conexao->prepare($sql);
    $getUser->bindParam(":user", $name);
    $getUser->execute();
    if (($getUser) and ($getUser->rowCount() != 0)) {
        return $getUser;
    }
}
