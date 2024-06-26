<?php


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Inscrição de Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            width: 21cm;
            /* Largura da página A4 */
            height: 29.7cm;
            /* Altura da página A4 */
            padding: 1cm;
            /* Margens */
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .sub-head {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        h3 {
            margin: 10px;
        }

        .body-content {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .student-info {
            width: 30%;
            margin-bottom: 0;
        }

        .sub-title {
            /*background-color: rgb(140, 140, 140, 0.1);*/
            height: 30px;
            margin: 5px 0;
        }

        .sub-title p {
            text-align: center;
            padding-top: 5px;
        }

        .student-info p {
            margin: 5px 0;
        }

        .footer {
            font-size: 8pt;
            text-align: center;
            margin-bottom: 20px;
        }

        .sub-footer {
            font-size: 10pt;
            font-style: bold;
            margin-top: 30px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
        }

        .sub-footer2 {
            font-size: 10pt;
            font-style: bold;
            margin-top: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-around;
        }

        .rodape {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: left;
            font-size: 10px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border: 1px solid darkgrey;
        }

        .cell {
            border: 1px solid darkgrey;
            padding: 10px;
            text-align: center;
        }

        .title {
            font-weight: bold;
        }

        .watermark {
            position: absolute;
            top: 80%;
            right: 100px;
            /* Ajuste conforme necessário para posicionar à direita */
            /*transform: translateY(-50%) rotate(35deg);
            /* Centraliza verticalmente e gira 45 graus */
            font-size: 48pt;
            color: rgba(0, 0, 0, 0.1);
            /* Define a cor e a opacidade do texto */
            pointer-events: none;
            /* Faz com que a marca d'água não interfira nos cliques */
            z-index: -1;
            /* Mantém a marca d'água no fundo */
            white-space: nowrap;
            /* Impede a quebra de linha do texto */
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <img src="../assets/build/images/insignia.png" width="80" height="80" alt="Insignia" />
            <h3>REPÚBLICA DE ANGOLA</h3>
            <h3>ADMINISTRAÇÃO MUNICIPAL DE BENGUELA</h3>
            <h3>DIREÇÃO MUNICIPAL DA EDUCAÇÃO DE BENGUELA</h3>
            <h3>COMPLEXO ESCOLAR BG Nº 1237</h3>
            <div class="watermark">SIGA BG Nº 1237</div>