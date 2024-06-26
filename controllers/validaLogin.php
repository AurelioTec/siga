<?php
include($_SERVER['DOCUMENT_ROOT'] . "/siga/session/conexao.php");
include($_SERVER['DOCUMENT_ROOT'] . "/siga/models/modelHistorico.php");
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados["sendLogin"])) {
    $query = "SELECT * FROM vwlogin WHERE usuario=:usuario LIMIT 1";
    $rs = $conectar->prepare($query);
    $rs->bindParam(":usuario", $dados["TxtUsuario"]);
    $rs->execute();
    if ($rs and $rs->rowCount() != 0) {
        $row = $rs->fetch(PDO::FETCH_ASSOC);
        if (password_verify($dados["TxtSenha"], $row["senha"])) {
            if ($row["idniveacesso"] == 1) {
                $_SESSION["id"] = $row["idusuario"];
                $_SESSION["nome"] = $row["nome"];
                $_SESSION["usuario"] = $row["usuario"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["nivelacesso"] = $row["idniveacesso"];
                $_SESSION["categoria"] = $row["categoria"];
                $_SESSION["mensg"] = $row["messagem"];
                $_SESSION["foto"] = $row["imagem"];
                $idusu=$row["idusuario"];
                $msm=$row["messagem"];
                $ip=$_SERVER['REMOTE_ADDR'];
                $navegador=$_SERVER['HTTP_USER_AGENT'];

                $_SESSION["msgTitulo"] = "Sucesso";
                $_SESSION["msg"] = "Acesso concedido";
                $_SESSION["msgCod"] = "success";
                
            $cad[] = array(
                "idusuario"=> $idusu,
                "titulo"=> "Login",
                "descricao"=> $msm,
                "ip"=>$ip,
                "navegador"=>$navegador
            );
                cadHistorico($conectar, $cad);
                
            }if($row["idniveacesso"] != 0){
                $_SESSION["id"] = $row["idusuario"];
                $_SESSION["nome"] = $row["nome"];
                $_SESSION["usuario"] = $row["usuario"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["nivelacesso"] = $row["idniveacesso"];
                $_SESSION["categoria"] = $row["categoria"];
                $_SESSION["mensg"] = $row["messagem"];
                $_SESSION["foto"] = $row["imagem"];
                $idusu=$row["idusuario"];
                $msm=$row["messagem"];
                $ip=$_SERVER['REMOTE_ADDR'];
                $navegador=$_SERVER['HTTP_USER_AGENT'];

                $_SESSION["msgTitulo"] = "Sucesso";
                $_SESSION["msg"] = "Acesso concedido";
                $_SESSION["msgCod"] = "success";
                
            $cad[] = array(
                "idusuario"=> $idusu,
                "titulo"=> "Login",
                "descricao"=> $msm,
                "ip"=>$ip,
                "navegador"=>$navegador
            );
                cadHistorico($conectar, $cad);
            }
        } else {
            $_SESSION["msgTitulo"] = "Atenção";
            $_SESSION["msg"] = "Utilizador ou senha incorreta";
            $_SESSION["msgCod"] = "error";
        }
    } else {
        $_SESSION["msgTitulo"] = "Atenção";
        $_SESSION["msg"] = "Utilizador ou senha incorreta";
        $_SESSION["msgCod"] = "error";
    }
}
