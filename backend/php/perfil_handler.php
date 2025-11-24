<?php
// backend/php/perfil_handler.php

// 1. Inicia a sessão (Obrigatório e deve ser a primeira coisa no arquivo)
session_start();

// 2. Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // Se não estiver logado, redireciona para o login
    header("Location: ../../frontend/html/login.html?erro=nao_logado");
    exit;
}

// 3. O usuário está logado! Inclui o arquivo HTML.
// O PHP encontra este caminho no disco, mas o HTML deve ter caminhos absolutos para o navegador!
include '../../frontend/html/perfil.html'; 
?>