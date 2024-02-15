<?php
    require_once '../../connection.php';
    require_once '../../models/Usuario.php';
    
    $user = new Usuario($_GET['id'], $_GET['name'], $_GET['password'] ,$_GET['username'],$_GET['age'],$_GET['sex'], $_GET['adm']);
    
    $sql = 'SELECT * FROM users WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user->getId()]);
    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($resultados)
    {
        echo "Sucessful changes commit at Database";
        echo "<script>setTimeout(()=>{window.location.href='home.php'},500)</script>";
    }else{
        echo "Error";
        
    }
    
    if($resultados){
//        print_r($resultados);
        
        $sql = 'UPDATE users SET id = ?, user_username = ?, user_password = ?, user_name = ?, user_age = ?, user_sex = ?, adm = ? where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user->getId(), $user->getUsername(), $user->getPassword(), $user->getName(), $user->getAge(), $user->getSex(), $user->getAdm(), $user->getId()]);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
    }else{
        echo "Error";
        
    }