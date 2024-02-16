
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../public/img/0-square-fill.svg" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/all.css">
    <link rel="stylesheet" href="../public/css/form.css">
  </head>
  <body>
     
      <form class='form my-5' method='GET' action='verficaLogin.php'>
          <h1 class='text-center titulo'>Login Form</h1>
          
          <div class='mb-3'>
              <label for='username' class="form-label">Username</label>
              <input type='text' class='form-control' name='username'">
          </div>
          
          <div class='mb-3'>
              <label for='password' class="form-label">Password</label>
              <input type='password' class='form-control' name='password' id='password' maxlength="6">
              <label for="checkOcult">Mostrar Senha</label> <input type="checkbox" name="" id="checkOcult">
          </div>
           <div id='aviso' class='alert' style='height: 50px ; display: flex; justify-content: center; align-items: center;'>
          
           </div>
          <div class="footer">
            <input type='submit' class='btn btn-primary text-center' value="Go to profile">
            <span>Don't have an account? <a href="cadastro.php">Create one now</a></span>
          </div>
      </form>
      <!-- <a href='javascript:history.go(-1)'>Voltar</a> -->
    
    <script type='text/javascript'>
        function obterParametrosDaUrl(nome){
            const urlSearchParams = new URLSearchParams(window.location.search);
            return urlSearchParams.get(nome);
        }
        
        const mensagem = obterParametrosDaUrl('mensagem');
        if(mensagem){
            const mensagemDiv = document.getElementById('aviso');
//            mensagemDiv.classList.add('alert');
            mensagemDiv.classList.add('alert-danger');
            mensagemDiv.innerHTML = mensagem;
        }
    </script>

    <script src="../public/js/ocultPassword.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>