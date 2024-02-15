

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Login Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="public/img/0-square-fill.svg" type="image/x-icon">
    <style>
        li
        {
          max-width: 200px;
          margin: 10px 0px;
          padding: 10px 20px;
          list-style-position: inside;
          list-style: none;
          text-decoration: none;

          background-color: black;
          color: white;

          border-left: 10px solid black;

          /* transition: transform 0.5s ease; */
          transition: all 0.5s ease;
        }
        a{
          text-decoration: none;
          transition: all 0.5s ease;
        }
        a:hover li
        {
          transform: translateX(10px);
          border-left: 10px solid rgb(146, 146, 146);
        }
    </style>
  </head>
  <body>



        <div class="container my-5">
          <h1>CRUD LoginForm With PHP</h1>
          <ul class='my-5'>
              <a href='views/cadastro.php'>
                  <li class=" fw-bold ">
                    Sign up
                  </li>
              </a>
              <a href='views/login.php'>
                  <li class="fw-bold">
                    Sign in
                  </li>
              </a>
              <a href="https://github.com/LacamJC/LoginForm.git" target='_BLANK'>
                <li class="fw-bold">
                  Github Repository
                </li>
              </a>
          </ul>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>