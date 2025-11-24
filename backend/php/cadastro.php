<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "Projeto_072025_Pizzaria_Modestia");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. SEM prepared statements: Variáveis injetadas diretamente na string SQL (INSEGURO)
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha']; // 2. SENHA SEM HASH (INSEGURO)

    // Comando SQL sem o uso de Prepared Statements
    // Esta consulta é vulnerável a SQL Injection
    $sql = "INSERT INTO usuarios (nome, email, login, senha) VALUES ('$nome', '$email', '$login', '$senha')";
    
    // Execução direta da consulta
    if ($conn->query($sql) === TRUE) {
        // Cadastro feito → redireciona para login
        header("Location: ../../frontend/html/login.html");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
$conn->close();
?>