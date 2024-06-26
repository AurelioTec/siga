<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelGet.php");

//include_once($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelConfigIni.php");

$input = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($input) {
       $linha = getAlunoNota($conectar, $input);
        if(($linha) and ($linha->rowCount() != 0)){
            $row = $linha->fetchAll(PDO::FETCH_ASSOC);
           foreach ($row as $result) {
            $saida['idmatricula'] = $result['tiponota'];
            $saida['numatricula'] = $result['nota'];
            $res[] = $saida;
            }
        }else{
                $saida['Erro'] ="Nenhum dado encontrado";
                $res[] = $saida;
            }
        echo json_encode($res);
    }
