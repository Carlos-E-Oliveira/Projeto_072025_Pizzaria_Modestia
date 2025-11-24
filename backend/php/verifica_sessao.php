<?php
// Certifica-se de que a sessão está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Se o ID do usuário não estiver na sessão, redireciona para o login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../frontend/html/login.html");
    exit;
}
?>