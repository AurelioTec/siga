<?php
session_start();
unset(
    $_SESSION["id"],
    $_SESSION["nome"],
    $_SESSION["usuario"],
    $_SESSION["email"],
    $_SESSION["nivelacesso"],
    $_SESSION["categoria"],
    $_SESSION["mensg"],
    $_SESSION["foto"]
);
header("Location: ../");
$_SESSION["Tiulo"] = "Antenção";
$_SESSION["Mensagem"] = "Sessão Encerrada";
$_SESSION["icone"] = "warning";
