<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . '/siga/session/conexao.php';

$conectar=$conectar;

$query = "SELECT iddisciplina, disciplina FROM tbdisciplinas";
$stmt = $conectar->prepare($query);
$stmt->execute();
if (($stmt) and ($stmt->rowCount() != 0)) {

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($result);
        ?> 
        <tr>
            <td> <?php echo $disciplina?></td>
            <td> <?php echo ""?></td>
            <td> <?php echo ""?></td>
            <td> <?php echo "" ?></td>
            <td> <?php echo""?></td>
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







        
        
         
