<?php



function configPass($conexao, array $dados)
{


    foreach ($dados as $row) {
        extract($row);
    }
    //inserir no Banco de Daods
    $aql = "UPDATE tbusuarios SET senha =:senha, updated=:data WHERE ( idusuario =:iduser);
";
    $cadInfo = $conexao->prepare($aql);
    //Nomear os Parametros
    $cadInfo->bindParam(":senha", $senha);
    $cadInfo->bindParam(":iduser", $iduser);
    $cadInfo->bindParam(":data", $data);
    //verificar se foi inserido no Banco
    if ($cadInfo->execute()) {
        return $cadInfo=true;
    } else {
         return $cadInfo=false;
    }
   
}
