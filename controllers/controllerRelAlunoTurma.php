<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();
header('Content-Type: text/html; charset=utf-8');
$data = date('%d de %B de %Y');
date_default_timezone_set('Africa/Luanda');
setlocale(LC_TIME, 'pt_br.utf-8');
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
//include($_SERVER['DOCUMENT_ROOT'] . '/siga/controllers/relAlunoTurma.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/siga/fpdf/fpdf.php";

//include($_SERVER['DOCUMENT_ROOT'] . "/siga/controllers/controllerRelAlunoTurma.php");
Class PDF extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Image($_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/images/insignia.png', 95, 20, 20);
        $this->Ln(40);
        $this->Cell(0, 10, 'REPÚBLICA DE ANGOLA', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(0, 10, 'ADMINISTRAÇÃO MUNICIPAL DE BENGUELA', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(0, 10, 'DIREÇÃO MUNICIPAL DA EDUCAÇÃO DE BENGUELA', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(0, 10, 'COMPLEXO ESCOLAR BG Nº 1237', 0, 0, 'C');
        $this->Ln(20);
    }

    public function Footer() {
          global $conectar;
          $sql="SELECT * FROM tbconfig ORDER BY idinicio ASC";
          $stmt=$conectar->prepare($sql);
          $stmt->execute();
          $res=$stmt->fetchAll();
          foreach ($res as $key) {
          extract($key);
          $diretor=$nomediretor;
          $pedago=$nomepedagogico;
        }
        $this->Ln(20);
        $this->Cell(70, 12, 'O Director', 0, 0, 'C');
        $this->Cell(140, 12, 'O Pedagógico', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(70, 12, $diretor, 0, 0, 'C');
        $this->Cell(140, 12,$pedago, 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'página: ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            # code...
         
        
    }

}

$Turma='';
$Classe='';
$Periodo='';
$Sala='';
$Anoletivo='';

$result = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$sqlAlunos = "SELECT idmatricula, numatricula, nomealuno, genero,"
        . "idturmas, turma, idclasse, classe, periodo, sala, "
        . "anoletivo, tipomatricula FROM vwmatriculas "
        . "WHERE idturmas=:idturmas AND idclasse=:idclasse "
        . "AND anoletivo=:anoletivo";
$pst = $conectar->prepare($sqlAlunos);
$pst->bindParam(":idturmas", $result['Turma']);
$pst->bindParam(":idclasse", $result['Classe']);
$pst->bindParam(":anoletivo", $result['AnoLectiv']);
$pst->execute();
$resultado = $pst->fetchAll();
/* print_r($resultado);
  die(); */

$pdf = new PDF();
$pdf->AddPage('P', 'A4');
$pdf->AliasNbPages();
$pdf->Cell(0, 10, 'RELAÇÃO NOMINAL DE ALUNOS MATRICULADOS', 0, 0, 'C');
$pdf->Ln(10);
foreach ($resultado as $head) {
    extract($head);
    $Turma = $turma;
    $Classe = $classe;
    $Periodo = $periodo;
    $Sala = $sala;
    $Anoletivo = $anoletivo;
    
}
$pdf->SetFontSize(12);
$pdf->SetFont('Arial', 'B');
$pdf->SetTextColor(0, 0, 0);
$pdf->setX(25);
$pdf->Cell(15, 8, 'Turma:', 0, 0, 'L');
$pdf->Cell(16, 8, $Turma, 0, 0, 'L');
$pdf->Cell(10, 8, 'Classe:', 0, 0, 'R');
$pdf->Cell(15, 8, $Classe, 0, 0, 'L');
$pdf->Cell(15, 8, 'Periodo:', 0, 0, 'R');
$pdf->Cell(16, 8, $Periodo, 0, 0, 'L');
$pdf->Cell(15, 8, 'Sala:', 0, 0, 'R');
$pdf->Cell(16, 8, $Sala, 0, 0, 'L');
$pdf->Cell(26, 8, 'Ano Lectivo:', 0, 0, 'R');
$pdf->Cell(16, 8, $Anoletivo, 0, 0, 'R');

$pdf->Ln(10);
$pdf->SetFontSize(10);
$pdf->SetFont('Arial', 'B');
$pdf->setX(25);
$pdf->SetFillColor(177, 177, 177);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20, 8, 'ORD', 1, 0, 'C', 1);
$pdf->Cell(20, 8, 'Nº Matric.', 1, 0, 'C', 1);
$pdf->Cell(60, 8, 'NOME', 1, 0, 'C', 1);
$pdf->Cell(20, 8, 'SEXO', 1, 0, 'C', 1);
$pdf->Cell(40, 8, 'OBS', 1, 0, 'C', 1);
$i=1;
foreach ($resultado as $row) {
    extract($row);
    $pdf->Ln();
    $pdf->setX(25);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(20, 8, $i, 1, 0, 'C');
    $pdf->Cell(20, 8, $numatricula, 1, 0, 'C');
    $pdf->Cell(60, 8, $nomealuno, 1, 0, 'L');
    $pdf->Cell(20, 8, $genero, 1, 0, 'C');
    $pdf->Cell(40, 8, $tipomatricula, 1, 0, 'C');
    $i++;
}


$pdf->Output('AlunosTurmas.pdf', 'I');
ob_end_flush();

