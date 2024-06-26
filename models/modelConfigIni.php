<?php



function getConfig($conexao) {
    $sql = "SELECT*FROM tbconfig";
    $resultstmt = $conexao->prepare($sql);
    $resultstmt->execute();
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        return $resultstmt;
    }
}   


function cadConfigIni($conexao, array $dados)
{


    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods
    $aql = "INSERT INTO tbconfig (nomediretor, nomepedagogico, nomeadministrativo, "
            . "anolectivo, totalsalas) VALUES (:nomedir, :nomepedag, :nomeadmin, :anolet, :sala);";
    $cadInfo = $conexao->prepare($aql);
    //Nomear os Parametros
    $cadInfo->bindParam(":nomedir", $Nomedir);
    $cadInfo->bindParam(":nomepedag", $Nomepedag);
    $cadInfo->bindParam(":nomeadmin", $NomeAdmin);
    $cadInfo->bindParam(":anolet", $AnoLect);
    $cadInfo->bindParam(":sala", $NumSala);
    //verificar se foi inserido no Banco
    if ($cadInfo->execute()) {
        return $cadInfo=true;
    } else {
         return $cadInfo=false;
    }
   
}
