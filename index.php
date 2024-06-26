<?php
ob_start();
session_start();
require 'session/conexao.php';
require 'controllers/validaLogin.php';
include('views/login/login.php');
