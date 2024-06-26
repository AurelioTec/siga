<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
require $_SERVER['DOCUMENT_ROOT'] . '/siga/session/conexao.php';

$conectar = $conectar;



$query = "SELECT * FROM vwmatriculas   ORDER BY idmatricula ASC";
$stmt = $conectar->prepare($query);
$stmt->execute();
if (($stmt) and ($stmt->rowCount() != 0)) {

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($result);
?>
        <tr>
            <td> <?php echo $idmatricula;
                    $maskid = mascararID($idmatricula); ?></td>
            <td> <?php echo $numatricula; ?></td>
            <td> <?php echo $nomealuno; ?></td>
            <td> <?php echo $genero; ?></td>
            <td> <?php echo $classe; ?></td>
            <td> <?php echo $turma; ?></td>
            <td> <?php echo $sala; ?></td>
            <td> <?php echo $periodo; ?></td>
            <td> <?php echo $anoletivo; ?></td>
            <td> <?php echo $estado; ?></td>
            <td>
                <?php
                //echo"<a href='../../controllers/controllerRelMatriAluno.php?id=$idmatricula' class='btn btn-primary btn-sm' title='Impimir ficha de Matricula'><i class='fa fa-print'></i></a>";
                ?>
                <a href='javascript:void(0);' onclick=" imprimir('relatorioMatricula.php?dank=<?php $maskId = mascararID($idmatricula); echo $maskId; ?>','Deseja imprimir ficha de matricula?')" class='btn btn-primary btn-sm' title='Impimir ficha de Matricula'><i class='fa fa-print'></i></a>
            </td>
        </tr>
<?php

    }
}
?>