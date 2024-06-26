<?php

//include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelMatriAluno.php");
//$_SERVER['SERVER_NAME'];
$dadosMatri = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dadosMatri['SendMatricula'])) {
    $idInsc = $dadosMatri['IdAluno'];
    $idTurma = $dadosMatri['Turma'];
    $idlestrang = $dadosMatri['Lestrang'];
    $nomeenc = $dadosMatri['NomeEnc'];
    $telf = $dadosMatri['Telf'];
    $idusuario = $id;
    $tipomat = $dadosMatri['Tipo'];
    $estado = "Ativo";
    $anexo = $_FILES['Documento']['name'];
    $anexoFormato = array("PDF", "pdf");
    $anexoExtensao = pathinfo($anexo, PATHINFO_EXTENSION);
    $anoAtual = date("Y");
    $idIns = $idInsc < 10 ? "0" . $idInsc : $idInsc;
    $idTu = $idTurma < 10 ? "0" . $idTurma : $idTurma;
    $numatricula = $anoAtual . $idTu . $idInsc;
    $buscar = buscarAluno($conectar, $idInsc);
    if (($buscar) and ($buscar->rowCount() != 0)) {
        $result = $buscar->fetch(PDO::FETCH_ASSOC);
        extract($result);
        $Idaluno = $idaluno;
        if ($anoAtual == $anoletivo) {
            $_SESSION["msgTitulo"] = "Atenção!";
            $_SESSION["msgcab"] = "O Aluno $nomealuno ja está matriculado na $classe Classe, turma: $turma";
            $_SESSION["msgCod"] = "warning";
            $_SESSION["url"] = "../../views/admin/listAluno.php";
        } else {
            if (in_array($anexoExtensao, $anexoFormato)) {
//Atribuir novo Nome
                $nomeNovo = uniqid() . ".$anexoExtensao";
                $matriAluno[] = array(
                    "idTurma" => $idTurma,
                    "numatricula" => $numatricula,
                    "idInsc" => $idInsc,
                    "idlestrang" => $idlestrang,
                    "nomeenc" => $nomeenc,
                    "telf" => $telf,
                    "idusuario" => $idusuario,
                    "tipomat" => $tipomat,
                    "estado" => $estado,
                    "anexo" => $nomeNovo
                );
                $consultar = buscarAluno($conectar, $idInsc);
                if ($consultar) {
                    $_SESSION["msgTitulo"] = "Atenção!";
                    $_SESSION["msgcab"] = " O aluno ja está matriculado!?";
                    $_SESSION["msgCod"] = "warning";
                } else {
                    $matriculado = matriAluno($conectar, $matriAluno);
                    if ($matriculado != false) {
                        $ultId = $conectar->lastInsertId();
//Directorio onde será salvo a imagem!
                        $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/files/alunos/' . $ultId . '/';
//Criar a Pasta da Foto
                        mkdir($diretorio, 0755);
                        if (move_uploaded_file($_FILES['Documento']['tmp_name'], $diretorio . $nomeNovo)) {
                            $_SESSION["msgTitulo"] = "Sucesso!";
                            $_SESSION["msgcab"] = " Dados do Utilizador Salvos e Uploud feito com sucesso!?";
                            $_SESSION["msgCod"] = "success";
                        } else {
                            $idamask = mascararID($Idaluno);
                            $_SESSION["msgTitulo"] = "Erro!";
                            $_SESSION["msgcab"] = "Uploud não efectuado";
                            $_SESSION["msgCod"] = "error";
                            $_SESSION["url"] = "../../views/admin/matriAluno.php?banv=$idamask";
                        }
                    } else {
                        $_SESSION["msgTitulo"] = "Atenção!";
                        $_SESSION["msgcab"] = " O aluno ja está matriculado!?";
                        $_SESSION["msgCod"] = "warning";
                    }
                }
            }
        }
    } else {
        if (in_array($anexoExtensao, $anexoFormato)) {
//Atribuir novo Nome
            $nomeNovo = uniqid() . ".$anexoExtensao";
            $matriAluno[] = array(
                "idTurma" => $idTurma,
                "numatricula" => $numatricula,
                "idInsc" => $idInsc,
                "idlestrang" => $idlestrang,
                "nomeenc" => $nomeenc,
                "telf" => $telf,
                "idusuario" => $idusuario,
                "tipomat" => $tipomat,
                "estado" => $estado,
                "anexo" => $nomeNovo
            );

            $matriculado = matriAluno($conectar, $matriAluno);
            if ($matriculado) {
                $ultId = $conectar->lastInsertId();
//Directorio onde será salvo a imagem!
                $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/files/alunos/' . $ultId . '/';
                if (is_dir($diretorio)) {
                    $arquivos = scandir($diretorio);
                    $arquivos = array_diff($arquivos, array('.', '..'));
                    if (count($arquivos) == 0) {
                        $movido = move_uploaded_file($_FILES['Documento']['tmp_name'], $diretorio . $nomeNovo);
                        if ($movido) {
                            $_SESSION["msgTitulo"] = "Sucesso!";
                            $_SESSION["msgcab"] = " Dados do Utilizador Salvos e Uploud feito com sucesso!?";
                            $_SESSION["msgCod"] = "success";
                            $_SESSION["urlR"] = "../../controllers/controllerRelMatriAluno.php?id=. $ultId";
                            $_SESSION["msgRelTitulo"] = "Atenção!";
                        } else {
                            $_SESSION["msgTitulo"] = "Erro!";
                            $_SESSION["msgcab"] = "Uploud não efectuado";
                            $_SESSION["msgCod"] = "error";
                            $_SESSION["msgRelTitulo"] = "Atenção!";
                            $_SESSION["urlR"] = "../../controllers/controllerRelMatriAluno.php?id=. $ultId";
                        }
                    }
                } else {
                    mkdir($diretorio, 0755);
                    $movido = move_uploaded_file($_FILES['Documento']['tmp_name'], $diretorio . $nomeNovo);
                    if ($movido) {
                        $_SESSION["msgTitulo"] = "Sucesso!";
                        $_SESSION["msgcab"] = " Dados do Utilizador Salvos e Uploud feito com sucesso!?";
                        $_SESSION["msgCod"] = "success";
                        $_SESSION["urlR"] = "../../controllers/controllerRelMatriAluno.php?id=. $ultId";
                        $_SESSION["msgRelTitulo"] = "Atenção!";
                    } else {
                        $_SESSION["msgTitulo"] = "Erro!";
                        $_SESSION["msgcab"] = "Uploud não efectuado";
                        $_SESSION["msgCod"] = "error";
                        $_SESSION["msgRelTitulo"] = "Atenção!";
                        $_SESSION["urlR"] = "../../controllers/controllerRelMatriAluno.php?id=. $ultId";
                    }
                }
            }
        }
    }
//var_dump($dados);
}    