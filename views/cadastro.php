<?php
    $check = $_GET['username'] ?? null;
    
    if($check)
    {
        require_once '../connection.php';
        $username = $_GET['username'];
        $password= $_GET['password'];
        $name = $_GET['name'];
        $age = $_GET['age'];
        $sex = $_GET['sex'];
        
       try{
           $sql = "INSERT INTO users (user_username, user_password, user_name, user_age, user_sex) VALUES (?,?,?,?,?)";
           $stmt = $conn->prepare($sql);
  
           $stmt->execute([$username, $password, $name, $age, $sex]);
           
           echo "Inserção realizada com sucesso vá para a <a href='login.php'>pagina de login!</a>";
           
           
           
       } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    }
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/0-square-fill.svg" type="image/x-icon">
  </head>
  <body>
   
    <form class="container my-5" action="<?=$_SERVER['PHP_SELF']?>" method="GET">
         <h1 class="text-center">Cadastro de Novo Usuário</h1>
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required autofocus>
        </div>
        
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required maxlength="6">
            <label for="checkOcult">Mostrar Senha</label> <input type="checkbox" name="" id="checkOcult">
        </div>
            
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="mb-3">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        
         <div class='mb-3'>
             <select name='sex' class="form-select" aria-label="Default Select Example">
             <option selected>Select a sex</option>
             <option value='M'>Male</option>
             <option value='F'>Female</option>
         </select>
         </div>
        <input type="submit" class="btn btn-primary w-25 text-center" value="Register"> <span>Already have an account? <a href="login.php">Log in.</a></span>
    </form>
      
      <!-- <a href='javascript:history.go(-1)'>Voltar</a> -->

    <script src="../public/js/ocultPassword.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>