<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . '/siga/session/conexao.php';

$conectar=$conectar;

$query = "SELECT * FROM vwturmas ORDER BY idturma ASC";
$stmt = $conectar->prepare($query);
$stmt->execute();
if (($stmt) and ($stmt->rowCount() != 0)) {

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($result);
        ?> 
        <tr>
            <td> <?php echo $idturma; ?></td>
            <td> <?php echo $codigo; ?></td>
            <td> <?php echo $classe; ?></td>
            <td> <?php echo $turma; ?></td>
            <td> <?php echo $periodo;?></td>
            <td> <?php echo $sala; ?></td>
            <td> <?php echo $anoletivo; ?></td>
            <td>
                <a href="#" class="btn btn-info btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Remover o intem"><i class="fa fa-trash"></i></a>
                <?php echo"";?>
            </td>
        </tr>
        <?php  
        
    }
}

?>







        
        
         
