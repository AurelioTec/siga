<?php

if (
    !isset($_SESSION["id"]) and
    !isset($_SESSION["nome"]) and
    !isset($_SESSION["usuario"])
) {
    unset($_SESSION["id"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["usuario"]);
    header("Location:../../");
}
