<?php


    require_once '../../connection.php';
    require_once '../../models/Usuario.php';
    include "../../config.php";

 
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : $_GET['username'];
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : $_GET['password'];
    // echo $username;
    // echo "<br>". $password;
    if($username !== null){
        $sql = 'SELECT * FROM users where user_username = ? and user_password = ? LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        // echo "Olá ".$resultados;
        $info = [];
        $control = 0;
        
        foreach($resultados as $chave => $valor){
            // echo $chave . $valor;
            $info[$control] = $valor;
            $control ++;
        }
        
        $_SESSION['user'] = new Usuario($info[0], $info[1], $info[2], $info[3], $info[4], $info[5], $info[6]);
        $user = $_SESSION['user'];
        
        
    }else{
        exit();
    }

    // print_r($user->getSex());
    
    
  //  print_r($user);



    
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../public/img/0-square-fill.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../public/scss/main.css">
  </head>    
  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hello, <?=$_SESSION['user']->getUsername()?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cadastro.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

      
      <main class='container'>
        <h1 class='text-center'>Your Info</h1>
        <div class="table--responsive">
            <table class='table table-bordered'>
                <thead>
                    <tr class="table-light fw-bold">
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
                        <td>
                            <button class='opt remove' title='Remove Profile' onclick=getId(<?=$user->getId()?>)>
                                <img src="../../public/img/x-lg.svg" alt=""></button>
                        </td>
                        <td>
                            <button class='opt edit' title='Edit Profile' onclick="update(<?=$user->getId()?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bibi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
                    
        <?php
        if($user->getAdm() === 1){
            // echo "Adm";
            {
                echo "<h1 class='text-center'>All Users Info</h1>
                <table class='table table-bordered'>
                    <thead>
                        <tr class='table-light'>
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
                        <td><button class='opt remove' title='Remove Profile' onclick='getId(" . $all_user['id'] . ")'  ><img src='../../public/img/x-lg.svg' alt=''></button></td>
                        <td><button class='opt edit' title='Edit Profile' onclick='update(". $all_user['id'] .")'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                        </svg></button></td>
                        </tr>";
            }
                echo "</tr></tbody></table>";
        }
        ?>
                                
      </main>

      <script type='text/javascript'>
        console.log("ASDDDDDDDDDDDD")
           url = "<?=$_SESSION['_url']?>";
        function getId(id){
            console.log(id)
            window.location.href=`${url}views/logado/delete.php?id=${id}`
        }
        
        function update(id)
        {


            console.log("Update data");
            window.location.href=`${url}views/logado/update.php?id=${id}`;
        }

        
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>