<?php
    session_start();
require_once '../connection.php';
// Certifique-se de validar e filtrar as entradas do usuário
$username = $_GET['username']? $_GET['username'] : $_SESSION['username'];
$password = $_GET['password']? $_GET['password'] : $_SESSION['password'];
// echo $username. "<br>" . $password . "<br>";
$sql = 'SELECT * FROM users where user_username = ? and user_password = ? LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->execute([$username, $password]);
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

$url = 'https://loginform-production-9cc6.up.railway.app/';
//  $url = 'http://localhost/LoginForm/';

if ($resultados) {
    $_SESSION['username'] = $resultados['user_username'];
    $_SESSION['password'] = $resultados['user_password'];

    

    echo "<script>window.location.href='".$url."views/logado/home.php';</script>";
    exit();
} else {
    // Autenticação falhou
    $mensagem = "Usuário não encontrado ou senha incorreta";
    // header("Location: https://loginform-production.up.railway.app//views/erro.php?mensagem=" . urlencode($mensagem));

    echo"<script>window.location.href='".$url."views/login.php?mensagem=".$mensagem."</script>";
    exit();
}
?>