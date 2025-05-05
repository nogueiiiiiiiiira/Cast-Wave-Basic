<?php

// inicia a sessão para armazenar dados do usuário
session_start();

// verifica se o usuário está logado
$_SESSION = array();

session_destroy(); // destrói a sessão

header("Location: /cast-wave-basic/html/login.html"); // redireciona para a página de login
exit;
?>
