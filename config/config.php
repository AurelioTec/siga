<?php

/*
 * Difine a url padrão do sistema.
 */
define('BASEURL', 'http://localhost/siga/');
/*
 * Difine icone o diretorio pradrão sistema.
 */
define('DIRETORIO', $_SERVER['DOCUMENT_ROOT'] ?? dirname(__FILE__).'/');
/*
 * Difine icone do sistema.
 */
define('FAVICON', DIRETORIO.'views/assets/buid/images/favicon.ico');

/*
 * Difine icone o logotipo sistema.
 */
define('LOGO', $_SERVER['DOCUMENT_ROOT'].'/views/assets/buid/images/logo.png');

/*
 * Difine o diretorio para salvar as fotos dos usuarios do sistema.
 */
define('DIRIMGUSER', $_SERVER['DOCUMENT_ROOT'].'/views/assets/buid/images/user/');
/*
 * Difine o diretorio para salvar as fotos dos alunos no sistema.
 */
define('DIRIMGALUNO', $_SERVER['DOCUMENT_ROOT'].'/views/assets/buid/images/alunos/');
/*
 * Difine o diretorio para salvar os documentos dos alunos no sistema.
 */
define('DIRDOCALUNO', $_SERVER['DOCUMENT_ROOT'].'/views/assets/buid/files/alunos/');
/*
 * Difine o diretorio para salvar os documentos dos professores no sistema.
 */
define('DIRDOCPROF', $_SERVER['DOCUMENT_ROOT'].'/views/assets/buid/files/profs/');

