<?php
// backend/php/logout.php

// 1. INICIA A SESSÃO: Obrigatorio para poder apagar.
session_start();

// 2. Limpa o array de sessão
$_SESSION = array();

// 3. Destrói a sessão no servidor.
session_destroy();

// 4. Redireciona para o login.
header("Location: /Projeto_072025_Pizzaria_Modestia/frontend/html/login.html");
exit;
?>
