<?php
require_once '../connection.php';
// Certifique-se de validar e filtrar as entradas do usuário
$username = $_GET['username'];
$password = $_GET['password'];
$sql = 'SELECT * FROM users WHERE user_username = ? LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->execute([$username]);
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);
if ($resultados) {
    // Autenticação bem-sucedida
    // Armazene informações do usuário em sessão ou cookie
    // Redirecione para a página de login bem-sucedida
    echo "<script>window.location.href='http://localhost/LoginForm/views/logado/home.php';</script>";
    exit();
} else {
    // Autenticação falhou
    $mensagem = "Usuário não encontrado ou senha incorreta";
    header("Location: http://localhost/LoginForm/views/erro.php?mensagem=" . urlencode($mensagem));
    exit();
}
?>