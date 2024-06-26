<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelMatriAluno.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($dados) {
       $linha= getAlunoTurma($conectar, $dados);
       if($linha){
            $row = $linha->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $result) {
            $saida['idmatricula'] = $result['idmatricula'];
            $saida['numatricula'] = $result['numatricula'];
            $saida['idaluno'] = $result['idaluno'];
            $saida['nomealuno'] = $result['nomealuno'];
            $saida['genero'] = $result['genero'];
            $saida['turma'] = $result['turma'];
            $saida['classe'] = $result['classe'];
            $saida['sala'] = $result['sala'];
            $saida['periodo'] = $result['periodo'];
            $saida['tipomatricula'] = $result['tipomatricula'];
            $saida['anoletivo'] = $result['anoletivo'];
            $res[] = $saida;
            }
        }else{
                $saida['Erro'] ="Nenhum dado encontrado";
                $res[] = $saida;
            }
        echo json_encode($res);
    }
