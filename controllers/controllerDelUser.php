<?php

include '../session/conexao.php';
include '../models/modelUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/siga/config/Funcoes.php";


$iduser = filter_input(INPUT_POST, 'id', FILTER_DEFAULT); // Mudado de INPUT_GET para INPUT_POST, pois você está enviando os dados via POST

if ($iduser) {
    // Decodificar o ID (se necessário)  
    if(removeUser($conectar, $iduser)){
        $idesc = desmascararID($iduser);
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/siga/views/assets/build/images/user/' . $idesc . '/';
        excluirDiretorio($dir);
        $saida['info'] = 'sucesso'; 
        echo json_encode($saida); // Formatando a resposta como JSON
    } else {
        $saida['info'] = 'erro'; // Se a remoção do usuário falhar
        echo json_encode($saida); // Formatando a resposta como JSON
    }
} else {
    $saida['info'] = 'erro'; // Se não houver ID fornecido
    echo json_encode($saida); // Formatando a resposta como JSON
}
