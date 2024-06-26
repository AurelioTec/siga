<?php

function cadAluno($conexao, array $dados) {


    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods
    $aql = "INSERT INTO tbalunos (nome, idmunicipios, datanascimento, genero, doctipo, docnumero, dataemissao, nomepai, nomemae, munimorada, bairro, rua, telefone, foto)" .
            " VALUES (:nome, :idmunicipios, :datanascimento, :genero, :doctipo, :docnumero, :dataemissao, :nomepai, :nomemae, :munimorada, :bairro, :rua, :telefone, :foto);";
    $insertAluno = $conexao->prepare($aql);
    //Nomear os Parametros
    $insertAluno->bindParam(":nome", $nomeAluno);
    $insertAluno->bindParam(":datanascimento", $dataNasc);
    $insertAluno->bindParam(":genero", $genero);
    $insertAluno->bindParam(":idmunicipios", $muniNasc);
    $insertAluno->bindParam(":doctipo", $docTipo);
    $insertAluno->bindParam(":docnumero", $docNum);
    $insertAluno->bindParam(":dataemissao", $dataEmissao);
    $insertAluno->bindParam(":nomepai", $nomePai);
    $insertAluno->bindParam(":nomemae", $nomeMae);
    $insertAluno->bindParam(":munimorada", $cidade);
    $insertAluno->bindParam(":bairro", $bairro);
    $insertAluno->bindParam(":rua", $rua);
    $insertAluno->bindParam(":telefone", $telf);
    $insertAluno->bindParam(":foto", $foto);
    //verificar se foi inserido no Banco
    if ($insertAluno->execute()) {
        return $cadastrou = true;
        // header("Location: index.php");
        /* $_SESSION["msgTitulo"] = "Sucesso!";
          $_SESSION["msgcab"] = "Dados do Utilizador Salvos  com sucesso!!";
          $_SESSION["msgCod"] = "success";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php'; */
    } else {
        return $cadastrou = false;
        /*  $_SESSION["msgTitulo"] = "Erro!";
          $_SESSION["msgcab"] = "Dados do Utilizador não salvos";
          $_SESSION["msgCod"] = "error";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php'; */
    }
    //var_dump($dados);
}

function inscrAluno($conexao, array $dados) {


    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods

    $aql = "INSERT INTO tbinscricao (idaluno,proveniecia,insclasse,turno,lestrangeira,encarregado,trabalho,enctelefone,obs,idusuario)"
            . "VALUES ( :idAluno, :prov,:classe, :periodo, :lestrang, :nomeEnc, :encTrabalho, :telfEnc, :obs, :idUsu)";
    $inscrAluno = $conexao->prepare($aql);
    //Nomear os Parametros
    $inscrAluno->bindParam(":idAluno", $idAluno);
    $inscrAluno->bindParam(":prov", $prov);
    $inscrAluno->bindParam(":classe", $classe);
    $inscrAluno->bindParam(":periodo", $periodo);
    $inscrAluno->bindParam(":lestrang", $lestrang);
    $inscrAluno->bindParam(":nomeEnc", $nomeEnc);
    $inscrAluno->bindParam(":encTrabalho", $encTrabalho);
    $inscrAluno->bindParam(":telfEnc", $telfEnc);
    $inscrAluno->bindParam(":obs", $obs);
    $inscrAluno->bindParam(":idUsu", $idUsu);
    //verificar se foi inserido no Banco
    if ($inscrAluno->execute()) {
        return $inscreveu = true;
        // header("Location: index.php");
        /* $_SESSION["msgTitulo"] = "Sucesso!";
          $_SESSION["msgcab"] = "Dados do Utilizador Salvos  com sucesso!!";
          $_SESSION["msgCod"] = "success";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php'; */
    } else {
        return $inscreveu = false;
        /*  $_SESSION["msgTitulo"] = "Erro!";
          $_SESSION["msgcab"] = "Dados do Utilizador não salvos";
          $_SESSION["msgCod"] = "error";
          $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php'; */
    }
    //var_dump($dados);
}
