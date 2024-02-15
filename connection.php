<?php

// $username = 'root';
// $password = 'fFDfhfaHedH-hD1eHh5CFHGDH4dfbH5e';
// $dbName = 'railway';
$username = 'ramajo';
$password = '123456';
$dbname = 'LoginForm';

try{
    $conn = new PDO('mysql:host=roundhouse.proxy.rlwy.net;port=37019;dbname='.$dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Não foi possível se conectar com o banco de dados.");
}