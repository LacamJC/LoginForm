<?php
require_once '../connection.php';


$username = $_GET['username'];
$password = $_GET['password'];

echo "Username : ".$username. "<br>";
echo "Password : ".$password."<br>";
        
        
        
        
$sql = 'SELECT * FROM users where user_username = ? and user_password = ? LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->execute([$username, $password]);
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<pre>" . print_r($resultados) . "</pre>";


if($resultados){
    header("Location: http://localhost/LoginForm/views/logado/home.php?username=$username&password=$password&info=$resultados");
    exit();
}else{
//    echo "Erro ao buscar Resultados";
//    echo "<script>window.history.go(-1);</script>";
    
    $mensagem = "Usuário não encontrado";
    header("Location: {$_SERVER['HTTP_REFERER']}?mensagem=$mensagem");
    exit();

}