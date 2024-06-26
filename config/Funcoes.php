<?php

function codificarTexto($cogidoTexto) {
    $hexadecimal = '';
    for ($i = 0; $i < mb_strlen($cogidoTexto); $i++) {
        $char = mb_substr($cogidoTexto, $i, 1);
        $hexadecimal .= dechex(ord($char));
    }
    return $hexadecimal;
}

function descodificarTexto($codigoHexa) {
    $texto = '';
    for ($i = 0; $i < strlen($codigoHexa); $i += 2) {
        $charCode = hexdec(substr($codigoHexa, $i, 2));
        $texto .= chr($charCode);
    }
    return $texto;
}
function mascararID($id) {
    $idMascarado = base64_encode($id);
    return $idMascarado;
}

function desmascararID($idMascarado) {
    $encodedData = str_replace(' ','+',$idMascarado);
    $id = base64_decode($encodedData);
    return $id;
}

function excluirDiretorio($diretorio) {
    if (!is_dir($diretorio)) {
        return false;
    }

    $objects = scandir($diretorio);
    foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
            if (is_dir($diretorio . "/" . $object)) {
                excluirDiretorioRecursivamente($diretorio . "/" . $object);
            } else {
                unlink($diretorio . "/" . $object);
            }
        }
    }
    reset($objects);
    rmdir($diretorio);
    return true;
}

function addZeros($numero) {
    // Conta a quantidade de números na variável
    $quantidade_numeros = strlen((string)$numero);

    // Determina a quantidade de zeros a adicionar com base na quantidade de números
    switch ($quantidade_numeros) {
        case 1:
            $zeros = str_repeat('0', 7);
            break;
        case 2:
            $zeros = str_repeat('0', 6);
            break;
        case 3:
            $zeros = str_repeat('0', 5);
            break;
        case 4:
            $zeros = str_repeat('0', 4);
            break;
        case 5:
            $zeros = str_repeat('0', 3);
            break;
        case 6:
            $zeros = str_repeat('0', 2);
            break;
        case 7:
            $zeros = str_repeat('0', 1);
            break;
        default:
            $zeros = $numero;
    }

    // Retorna o número com os zeros adicionados
    return $zeros.$numero;
}

function ImprimorRel($url, $id) {
    
    return header("Location:".$url.$id);
}