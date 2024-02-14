<?php

    session_start();
    require_once '../../connection.php';
    require_once '../../models/Usuario.php';

   
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : null;

    if($username !== null){
        $sql = 'SELECT * FROM users where user_username = ? and user_password = ? LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $info = [];
        $control = 0;
        
        foreach($resultados as $chave => $valor){
            // echo $chave . $valor;
            $info[$control] = $valor;
            $control ++;
        }
        
      
        $user = $_SESSION['user'] = new Usuario($info[1], $info[2], $info[3], $info[4], $info[5], $info[6]);
        
    }else{
        exit();
    }
    
    
    //print_r($user);



    
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../img/0-square-fill.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/home.css">
  </head>
  <body>
      <header>
          <ul>
              <li>
                  <a href="../../index.php">
                      Home
                  </a>
              </li>
              
              <li>
                  <a href="../cadastro.php">
                      Cadastro
                  </a>
              </li>
              
              
              <li>
                  <a href="../login.php">
                      Login
                  </a>
              </li>
          </ul>
          <span>Hello, <?=$user->getUsername()?></span>
      </header>
      
      <main class='container'>
          
          <div class="tabelas">
          <div class="mb-3">
              <h1 class='text-center'>Your Info</h1>
                  <table class='table'>
                      <thead>
                          <tr>
                              <td>Name</td>
                              <td>Password</td>
                              <td>Username</td>
                              <td>Age</td>
                              <td>Sex</td>
                              <td></td>
                              <td></td>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><?=$user->getName()?></td>
                              <td><?=$user->getPassword()?></td>
                              <td><?=$user->getUsername()?></td>
                              <td><?=$user->getAge()?></td>
                              <td><?=$user->getSex()?></td>
                              <td><button class='opt remove' title='Remove Profile'><img src="../../public/img/x-lg.svg" alt=""></button></td>
                              <td><button class='opt edit' title='Edit Profile'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                              </svg></button></td>
              
                          </tr>
                      </tbody>
                  </table>
          </div>
                        <div class="mb-3">
                            <?php
                            if($user->getAdm() === 1){
                                // echo "Adm";
                                {
                                    echo "<h1 class='text-center'>All Users Info</h1>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Password</td>
                                                <td>Username</td>
                                                <td>Age</td>
                                                <td>Sex</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>";
                                  }
                                $sql = 'SELECT * FROM users';
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $all_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($all_list as $all_user){
                                    // echo $all_user['user_username'] . " " . $all_user['user_name'] . "<hr>";
                                    echo "<tr>
                                            <td>" . $all_user['user_name'] . "</td>
                                            <td>" . $all_user['user_password']. "</td>
                                            <td>" . $all_user['user_username']. "</td>
                                            <td>" . $all_user['user_age'] . "</td>
                                            <td>" . $all_user['user_sex'] . "</td>
                                            <td><button class='opt remove' title='Remove Profile'><img src='../../public/img/x-lg.svg' alt=''></button></td>
                                            <td><button class='opt edit' title='Edit Profile'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                            </svg></button></td>
                                            </tr>";
                                }
                                    echo "</tr></tbody></table>";
                            }
                            ?>
                        </div>
          </div>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>