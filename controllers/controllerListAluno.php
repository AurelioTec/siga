<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . '/siga/session/conexao.php';

$conectar=$conectar;



  $query = "SELECT * FROM vwinscricao WHERE idinscricao NOT IN "
          . "(SELECT idinscricao FROM tbmatriculas WHERE estado = 'ativo');";
  $stmt = $conectar->prepare($query);
  $stmt->execute();
if (($stmt) and ($stmt->rowCount() != 0)) {

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($result);
        ?>    
        <tr>
            <td> <?php echo $idaluno; ?></td>
            <td> <?php echo $numero; ?></td>
            <td> <?php echo $nome; ?></td>
            <td> <?php echo $datanasc; ?></td>
            <td> <?php echo $cidade ?></td>
            <td> <?php echo $telf; ?></td>
            <td>
                <a href="#" class="btn btn-info btn-sm" title="Editar"><i class="fa fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar"><i class="fa fa-trash"></i></a>
                <?php $idmask = mascararID($idaluno); echo"<a href='../admin/matriAluno.php?banv=$idmask' class='btn btn-success btn-sm' title='Matricular aluno' id='Matricular'><i class='fa fa-graduation-cap'></i></a>";?>
                <a href='javascript:void(0);' onclick="imprimir('relatorioAlunoIsncrito.php?dank=<?php $idmasc= mascararID($idaluno); echo $idmasc;?>')" class='btn btn-warning btn-sm' title='Impimir ficha de Inscrição'><i class='fa fa-print'></i></a>
            </td>
        </tr>
        <?php  
        
    }
}
?>







        
        
         
