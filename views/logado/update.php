<?php
    require_once '../../connection.php';
    require_once '../../models/Usuario.php';
    session_start();
   $id = $_GET['id'];
   
//    print_r($_SESSION['user']);
   
   if($id)
   {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        $info = [];
        $control = 0;

        foreach($resultados as $chave => $valor){
            $info[$control] = $valor;
     //       echo $chave . "  ". $valor;
            $control++;
        }
     //   print_r($info);
        $user = new Usuario($info[0], $info[1], $info[2], $info[3], $info[4], $info[5], $info[6]);
     //   print_r($user);
    }else{
        echo "Error";
        
    }
   
   
?>


<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/main.css">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
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
    
    
    <form class="form__form" action="updateConfirm.php" method="GET">
        <h1 class="text-center">Update data from</h1>
        
        <!--<div class="mb-3">-->
            <!--<label for="id">id</label>-->
            <input type="number" class="form-control" value="<?=$user->getId()?>" id="id" name="id" readonly style="visibility: hidden; height: 1px;">
        <!--</div>-->
        
        <!--<div class="mb-3" style="visibility: none;">-->
            <!--<label for="adm">adm</label>-->
            <input type="number" class="form-control" value="<?=$user->getAdm()?>" id="adm" name="adm" readonly style="visibility:hidden; height: 1px;">
        <!--</div>-->
        
        <div class="mb-3">
            <label for="name" class="form__label">Name</label>
            <input type="text" class="form-control" value="<?=$user->getName()?>" id="name" required minlength="1" name="name">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form__label">Password</label>
            <input type="password" class="form-control" value="<?=$user->getPassword()?>" id="password" required minlength="1" name="password">
            <label for="checkOcult">Show</label> <input type="checkbox" name="" id="checkOcult">
        </div>
        
        <div class="mb-3">
            <label for="username" class="form__label">Username</label>
            <input type="text" class="form-control" value="<?=$user->getUsername()?>" id="username" required minlength="1" name="username">
        </div>
        
        <div class="mb-3">
            <label for="age" class="form__label">Age</label>
            <input type="number" class="form-control" value="<?=$user->getAge()?>" id="age" name="age">
        </div>
        
         <div class='mb-3'>
             <select name='sex' class="form-select" aria-label="Default Select Example">
                <option selected><?=$user->getSex()?></option>
                <option value='Male'>Male</option>
                <option value='Female'>Female</option>
             </select>
         </div>
        
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
    
  <script src="../../public/js/ocultPassword.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>