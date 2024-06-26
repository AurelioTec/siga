<?php


function gerarChave()
{
    return bin2hex(random_bytes(16)); // Gera uma chave de 32 caracteres
}

function SalvarChave($conexao, array $dados)
{
    foreach ($dados as $row) {
        extract($row);
    }
    // Supondo que você esteja usando PDO para interagir com o banco de dados
    //inserir no Banco de Daods
    $aql = "UPDATE tbusuarios SET recuvakey =:chave WHERE ( usuario =:usuario)";
    $atualizar = $conexao->prepare($aql);
    //Nomear os Parametros
    $atualizar->bindParam(":usuario", $usuario);
    $atualizar->bindParam(":chave", $chave);
    //verificar se foi inserido no Banco
    $atualizar->execute();
}

function getKey($conexao, $usuario)
{
    $query = "SELECT usuario, recuvakey FROM tbusuarios WHERE usuario=:usuario";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();
    if (($stmt) and ($stmt->rowCount() != 0)) {
        return $stmt;
    }
}


function redifinePass($conexao, array $dados)
{

    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods
    $aql = "UPDATE tbusuarios SET senha =:senha, recuvakey=:recuvakey, updated=:data WHERE ( idusuario =:iduser);
";
    $update = $conexao->prepare($aql);
    //Nomear os Parametros
    $update->bindParam(":senha", $senha);
    $update->bindParam(":iduser", $usuario);
    $update->bindParam(":recuvakey", $chave);
    $update->bindParam(":data", $data);
    //verificar se foi inserido no Banco
    if ($update->execute()) {
        return $update = true;
    } else {
        return $update = false;
    }
}
