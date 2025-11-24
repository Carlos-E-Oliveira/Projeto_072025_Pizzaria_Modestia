<?php
// backend/php/conexao.php

$servidor = "localhost";
$usuario_db = "root"; // Altere se usar outro usuário
$senha_db = "";       // Altere se usar outra senha (se não for XAMPP padrão)
$nome_db = "Projeto_072025_Pizzaria_Modestia"; // **Substitua pelo nome do seu banco de dados**

try {
    $conexao = new PDO("mysql:host=$servidor;dbname=$nome_db;charset=utf8", $usuario_db, $senha_db);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão realizada com sucesso!"; // Remova em produção
} catch(PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>