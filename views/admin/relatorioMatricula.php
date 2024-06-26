<?php
session_start();
include '../../relatorio/head.php';
include '../../config/Funcoes.php';
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$iduser = filter_input(INPUT_GET, 'dank', FILTER_DEFAULT);
$iddescod = desmascararID($iduser);
if ($iddescod) {
    $resultado = getAlunoMat($conectar, $iddescod);
    $row = $resultado->fetch(PDO::FETCH_ASSOC);
}
$usuario = $_SESSION["usuario"];
?>
<div class="sub-head">
    <div style="text-align: left;">FICHA DE MATRÍCULA Nº:<?php echo ' ' . addZeros($iddescod); ?></div>
    <div style="text-align: right;">DATA DA MATRÍCULA:<?php echo ' ' . date('d/m/Y', strtotime($row['datamatricula'])); ?></div>
</div>
</div>
<div class="sub-title">
    <p><strong>DADOS PESSOAIS</strong> </p>
</div>
<div class="body-content">
    <div class="student-info">
        <p><strong>Nome do Aluno:</strong> </p>
        <p><?php echo $row['nomealuno']; ?></p>
        <p><strong>Local de Nascimento:</strong> </p>
        <p> <?php echo $row['municipio']; ?></p>
        <p><strong>Tipo de Documento:</strong> </p>
        <p> <?php echo $row['documento']; ?></p>
        <p><strong>Nome do Pai:</strong> </p>
        <p> <?php echo $row['pai']; ?></p>
        <p><strong>Morada:</strong> </p>
        <p> <?php echo $row['cidade']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Data de Nascimento:</strong> </p>
        <p><?php echo date('d / m / Y', strtotime($row['datanasc'])); ?></p>
        <p><strong>Município:</strong> </p>
        <p> <?php echo $row['municipio']; ?></p>
        <p><strong>Nº do Documento:</strong> </p>
        <p> <?php echo $row['numero']; ?></p>
        <p><strong>Nome da Mãe:</strong> </p>
        <p> <?php echo $row['mae']; ?></p>
        <p><strong>Bairro:</strong> </p>
        <p><?php echo $row['bairro']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Gênero:</strong> </p>
        <p><?php echo $row['genero']; ?></p>
        <p><strong>Província: </strong> </p>
        <p> <?php echo $row['provincia']; ?></p>
        <p><strong>Data de Emissão::</strong> </p>
        <p><?php echo $row['dataemissao'];; ?> </p>
        <p><strong>Telefone:</strong> </p>
        <p> <?php echo $row['telf']; ?></p>
        <p><strong>Rua:</strong> </p>
        <p> <?php echo $row['rua']; ?></p>
    </div>
</div>
<div class="sub-title">
    <p><strong>DADOS ESCOLARES</strong> </p>
</div>
<div class="body-content">
    <div class="student-info">
        <p><strong>Classe:</strong> </p>
        <p><?php echo $row['classe']; ?></p>
        <p><strong>Turma:</strong> </p>
        <p><?php echo $row['turma']; ?></p>
        <p><strong>Encarregado</strong> </p>
        <p><?php echo $row['encarregado']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Turno</strong> </p>
        <p><?php echo $row['periodo']; ?></p>
        <p><strong>Sala</strong> </p>
        <p><?php echo $row['sala']; ?></p>
        <p><strong>Local de Trabalho</strong> </p>
        <p><?php echo $row['trabalho']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>L. Estrangeira:</strong> </p>
        <p><?php echo $row['lingua']; ?></p>
        <p><strong>Ano lectivo:</strong> </p>
        <p><?php echo $row['anoletivo']; ?></p>
        <p><strong>Telefone</strong> </p>
        <p><?php echo $row['telfenc']; ?></p>
    </div>
</div>
<div class="sub-title">

</div>
<div class="student-info">
    <p style="text-align: left; padding-bottom: 50px;"><strong>OBS</strong> </p>
    <p style="text-align: left; font-size: 10pt; " style="padding-bottom: 50px;"><?php echo $row['obs']; ?></p>
</div>
<div class="container">
    <div class="cell title">O Técnico</div>
    <div class="cell title">O Director</div>
    <div class="cell title">O Pedagógico</div>

    <div class="cell" style="padding-bottom: 45px;"></div>
    <div class="cell" style="padding-bottom: 45px;"></div>
    <div class="cell" style="padding-bottom: 45px;"></div>
</div>
<?php
include '../../relatorio/footer.php';
?>