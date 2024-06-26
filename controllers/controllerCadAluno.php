<?php

include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/seguranca.php");

include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelMatriAluno.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelCadAluno.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['CadAluno'])) {
    $nomeAluno = $dados["NomeAluno"];
    $dataNasc = $dados['DataNasc'];
    $genero = $dados['Genero'];
    $proNasc = $dados['ProNasc'];
    $muniNasc = $dados['MuniNasc'];
    $docTipo = $dados['TipoDoc'];
    $docNum = $dados['DocNum'];
    $idusua = $_SESSION["id"];
    if ($docTipo == 'cp' or $docTipo == 'an') {
        $dataEmissao = "";
    } else {
        $dataEmissao = $dados['DataEmissao'];
    }
    $nomePai = $dados['NomePai'];
    $nomeMae = $dados['NomeMae'];
    $cidade = $dados['Cidade'];
    $bairro = $dados['Bairro'];
    $rua = $dados['Rua'];
    $telf = $dados['Telf'];
    $prov = $dados["Proviencia"];
    $periodo = $dados["Periodo"];
    $classe = $dados["Classe"];
    $lestrang = $dados["Lestrang"];
    $nomeEnc = $dados["NomeEnc"];
    $encTrabalho = $dados["EncTrabalho"];
    $telfEnc = $dados["TelfEnc"];
    $obs = $dados['Obs'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $titulo = "Inscrição";
    $msm = "Inscrição de novo aluno";
    $foto = $_FILES['image']['name'];
    $imgFormato = array("png", "jpg", "jpeg", "png");
    $imgExtensao = pathinfo($foto, PATHINFO_EXTENSION);
    if (in_array($imgExtensao, $imgFormato)) {

        $buscar[] = array("nomeAluno" => $nomeAluno, "docNum" => $docNum);
        $getAluno = getAlunoInsc($conectar, $buscar);
        if ($getAluno) {
            //Atribuir novo Nome
            $novoNome = uniqid() . ".$imgExtensao";
            $cadAluno[] = array(
                "nomeAluno" => $nomeAluno,
                "dataNasc" => $dataNasc,
                "genero" => $genero,
                "muniNasc" => $muniNasc,
                "docTipo" => $docTipo,
                "docNum" => $docNum,
                "dataEmissao" => $dataEmissao,
                "nomePai" => $nomePai,
                "nomeMae" => $nomeMae,
                "cidade" => $cidade,
                "bairro" => $bairro,
                "rua" => $rua,
                "telf" => $telf,
                "foto" => $novoNome
            );
            $cadastrado = cadAluno($conectar, $cadAluno);
            if (!$cadastrado) {
                $ultimoId = $conectar->lastInsertId();
                $cadIsncr[] = array(
                    "prov" => $prov,
                    "periodo" => $periodo,
                    "classe" => $classe,
                    "lestrang" => $lestrang,
                    "nomeEnc" => $nomeEnc,
                    "encTrabalho" => $encTrabalho,
                    "telfEnc" => $telfEnc,
                    "obs" => $obs,
                    "idAluno" => $ultimoId,
                    "idUsu" => $idusua
                );
                inscrAluno($conectar, $cadIsncr);
                $cad[] = array(
                    "idusuario" => $idusua,
                    "titulo" => $titulo,
                    "descricao" => $msm,
                    "ip" => $ip,
                    "navegador" => $navegador
                );
                cadHistorico($conectar, $cad);

                //Directorio onde será salvo a imagem!
                $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/images/alunos/' . $ultimoId . '/';
                //Criar a Pasta da Foto
                mkdir($diretorio, 0755);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $diretorio . $novoNome)) {
                    $_SESSION["msgTitulo"] = "Sucesso!";
                    $_SESSION["msgcab"] = " Dados do Utilizador Salvos e Uploud feito com sucesso!!";
                    $_SESSION["msgCod"] = "success";
                } else {
                    $_SESSION["msgTitulo"] = "Erro!";
                    $_SESSION["msgcab"] = "Uploud não efectuado";
                    $_SESSION["msgCod"] = "error";
                    $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php';
                }
            } else {
                $_SESSION["msgTitulo"] = "Atenção";
                $_SESSION["msgcab"] = "Aluno $nomeAluno com $docTipo nº $docNum ja foi inscrito ";
                $_SESSION["msgCod"] = "warning";
                $_SESSION["url"] = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/admin/cadAluno.php';
            }
        }
    }
    //var_dump($dados);
}
