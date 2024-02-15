<?php

$username = 'root';
$password = '353heBeeh2BEGeG-DAhe2C2F4e433bEg';
$dbName = 'railway';
// $username = 'ramajo';
// $password = '123456';
// $dbName = 'LoginForm';

try{
    $conn = new PDO('mysql:host=viaduct.proxy.rlwy.net;port=3306;dbname='.$dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Não foi possível se conectar com o banco de dados.");
}
