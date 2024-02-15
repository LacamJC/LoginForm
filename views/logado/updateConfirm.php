<?php
 
    require_once '../../connection.php';
    require_once '../../models/Usuario.php';
    session_start();
    $user = new Usuario($_GET['id'], $_GET['username'], $_GET['password'] ,$_GET['name'],$_GET['age'],$_GET['sex'], $_GET['adm']);
    
    $sql = 'SELECT * FROM users WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user->getId()]);
    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    // if($resultados)
    // {
    //     echo "Sucessful changes commit at Database";
    //     echo "<script>setTimeout(()=>{window.location.href='home.php'},500)</script>";
    // }else{
    //     echo "Error";
        
    // }
    
    if($resultados){
//        print_r($resultados);
        
        $sql = 'UPDATE users SET id = ?, user_username = ?, user_password = ?, user_name = ?, user_age = ?, user_sex = ?, adm = ? where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user->getId(), $user->getUsername(), $user->getPassword(), $user->getName(), $user->getAge(), $user->getSex(), $user->getAdm(), $user->getId()]);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        // $url = 'http://localhost/LoginForm/views/verficaLogin.php';
        $url = 'https://loginform-production-9cc6.up.railway.app/views/verficaLogin.php';

        if ($_SESSION['user']->getId() == $user->getId()) {
            echo "<br>VOCE ESTA ALTERANDO SEUS PRÓPRIOS DADOS</br>";
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['password'] = $user->getPassword();
            echo "<script>
                   
                        console.log('Redirecionando');
                        window.location.href='" . $url . "?username=" . $_SESSION['username'] . "&password=" . $_SESSION['password'] . "';
                    
                  </script>";
        } else {
            echo "USER UPDATE SUCCESSFUL";
            echo "<script>window.location.href='" . $url . "?username=" . $user->getUsername() . "&password=" . $user->getPassword() . "'</script>";
        }
    }else{
        echo "Error";
        
    }