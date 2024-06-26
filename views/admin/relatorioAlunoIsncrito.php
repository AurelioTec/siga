<?php
session_start();
include '../../relatorio/head.php';
include '../../config/Funcoes.php';
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

$iduser = filter_input(INPUT_GET, 'dank', FILTER_DEFAULT);
$iddescod = desmascararID($iduser);
if ($iddescod) {
    $resultstmt = getAluno($conectar, $iddescod);
    if (($resultstmt) and ($resultstmt->rowCount() != 0)) {
        $resultstmt->fetch(PDO::FETCH_ASSOC);
    }
}
$usuario = $_SESSION["usuario"];
?>
<div class="sub-head">
    <div style="text-align: left;">FICHA DE INSCRIÇÃO Nº:<?php echo ' ' . addZeros($iddescod); ?></div>
    <div style="text-align: right;">DATA DE INSCRIÇÃO:<?php echo ' ' . date('d/m/Y', strtotime($rowAluno['data'])); ?></div>
</div>
</div>
<div class="sub-title">
    <p><strong>DADOS PESSOAIS</strong> </p>
</div>
<div class="body-content">
    <div class="student-info">
        <p><strong>Nome do Aluno:</strong> </p>
        <p><?php echo $rowAluno['nome']; ?></p>
        <p><strong>Local de Nascimento:</strong> </p>
        <p> <?php echo $rowAluno['municipio']; ?></p>
        <p><strong>Tipo de Documento:</strong> </p>
        <p> <?php echo $rowAluno['documento']; ?></p>
        <p><strong>Nome do Pai:</strong> </p>
        <p> <?php echo $rowAluno['pai']; ?></p>
        <p><strong>Morada:</strong> </p>
        <p> <?php echo $rowAluno['cidade']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Data de Nascimento:</strong> </p>
        <p><?php echo date('d / m / Y', strtotime($rowAluno['datanasc'])); ?></p>
        <p><strong>Município:</strong> </p>
        <p> <?php echo $rowAluno['municipio']; ?></p>
        <p><strong>Nº do Documento:</strong> </p>
        <p> <?php echo $rowAluno['numero']; ?></p>
        <p><strong>Nome da Mãe:</strong> </p>
        <p> <?php echo $rowAluno['mae']; ?></p>
        <p><strong>Bairro:</strong> </p>
        <p><?php echo $rowAluno['bairro']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Gênero:</strong> </p>
        <p><?php echo $rowAluno['genero']; ?></p>
        <p><strong>Província: </strong> </p>
        <p> <?php echo $rowAluno['provincia']; ?></p>
        <p><strong>Data de Emissão::</strong> </p>
        <p><?php echo "-------"; ?> </p>
        <p><strong>Telefone:</strong> </p>
        <p> <?php echo $rowAluno['telf']; ?></p>
        <p><strong>Rua:</strong> </p>
        <p> <?php echo $rowAluno['rua']; ?></p>
    </div>
</div>
<div class="sub-title">
    <p><strong>DADOS ESCOLARES</strong> </p>
</div>
<div class="body-content">
    <div class="student-info">
        <p><strong>Classe:</strong> </p>
        <p><?php echo $rowAluno['classe']; ?></p>
        <p><strong>Encarregado</strong> </p>
        <p><?php echo $rowAluno['encarregado']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>Turno</strong> </p>
        <p><?php echo $rowAluno['periodo']; ?></p>
        <p><strong>Local de Trabalho</strong> </p>
        <p><?php echo $rowAluno['trabalho']; ?></p>
    </div>
    <div class="student-info">
        <p><strong>L. Estrangeira:</strong> </p>
        <p><?php echo $rowAluno['encarregado']; ?></p>
        <p><strong>Telefone</strong> </p>
        <p><?php echo $rowAluno['enctelefone']; ?></p>
    </div>
</div>
<div class="sub-title">

</div>
<div class="student-info">
    <p style="text-align: left;"><strong>OBS</strong> </p>
    <p style="text-align: left; font-size: 10pt;"><?php echo $rowAluno['obs']; ?></p>
</div>
<?php
include '../../relatorio/footer.php';
?>