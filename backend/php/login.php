<?php
// backend/php/login.php - COM VERIFICAÇÃO DE HASH E REDIRECIONAMENTO

session_start();

// Configuração da conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "Projeto_072025_Pizzaria_Modestia");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize the input to prevent basic XSS
    $login_ou_email = htmlspecialchars($_POST['login']);
    $senha_digitada = $_POST['senha'];

    // 1. Busca o usuário e o HASH da senha no banco
    // A coluna 'senha' deve conter o hash gerado por password_hash()
    $sql = "SELECT id, nome, senha FROM usuarios WHERE login = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_ou_email, $login_ou_email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        // 2. VERIFICAÇÃO DE SEGURANÇA: Compara a senha digitada com o hash salvo
        if (password_verify($senha_digitada, $usuario['senha'])) {
            
            // Login bem-sucedido: Cria as variáveis de sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['logado'] = true;
            
            // CORREÇÃO DO REDIRECIONAMENTO: 
            // Como perfil_handler.php está na mesma pasta (backend/php/),
            // o nome do arquivo basta.
            header("Location: perfil_handler.php"); 
            exit;
        } else {
            // A senha digitada não corresponde ao hash
            echo "Senha inválida.";
        }
    } else {
        echo "Usuário não encontrado.";
        
    }
    $stmt->close();
}
$conn->close();
?>