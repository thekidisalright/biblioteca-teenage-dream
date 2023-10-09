<?php

require("./conexao.php");

if(!isset($_SESSION))
{
  session_start();
}

if(isset($_SESSION['cd_usuario']))
{
  if($_SESSION['privilegio'] == 'comum')
  {
    header("Location: ./home.php");
  }
}
else
{
  header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
  <meta charset='UTF-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel='stylesheet' href='./css/bootstrap.css' />
  <link rel='stylesheet' href='./css/style.css' />
  <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/card.css">
  <title>Administrador</title>
</head>

<body class="admin">
  <div class='container'>
    <div class='row mb-5 mt-3 justify-content-center'>
      <nav class='navbar navbar-expand-lg rounded-pill navbar-top col-11'>
        <div class='container-fluid'>
          <div class='col-auto me-4 px-3 h-75 logo-navbar d-flex rounded-pill'>
            <a class='navbar-brand m-0' href='#'><span class='fw-semibold text-center'>Teenage Dream</span></a>
          </div>
          <div class='col-auto'>
            <button class='navbar-toggler menu-hamburguer rounded-circle' type='button' data-bs-toggle='collapse'
              data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
              aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
          </div>

          <div class='collapse navbar-collapse collapse-navbar' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
              <li class='nav-item col-auto item-navbar'>
                <a class='nav-link active' aria-current='page' href='#'>Início</a>
              </li>
            </ul>
            <a class='nav-link mx-md-3 logoutBotao' href='./logout.php'>Logout</a>
          </div>
        </div>
      </nav>
    </div>

    <div class='row mb-3 justify-content-center'>
      <h1 class="col-11">Bem-vindo(a),
        <?php echo $_SESSION['pnm_usuario']; ?> &#x1F44B;
      </h1>
      <h1 class="mt-1 avisoAdmin col-11">Você tem privilégios de administrador</h1>
    </div>

    <div class="row justify-content-center">
        <div class="label-menu col-6 col-md-3 d-flex flex-column justify-content-between mb-4">
            <span class="text-wrap fw-bold fs-2 col-12">Reservas</span>
            <a href="./reserva.php">
                <button type="button" class="btn rounded-pill label-menu-botao">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M 15.5 4 A 0.5 0.5 0 0 0 15 4.5 L 15 9 L 4 9 C 2.895 9 2 9.895 2 11 L 2 12 L 2 13 C 2 14.105 2.895 15 4 15 L 15 15 L 15 19.5 A 0.5 0.5 0 0 0 15.5 20 A 0.5 0.5 0 0 0 15.853516 19.853516 A 0.5 0.5 0 0 0 15.882812 19.822266 L 22.693359 12.720703 L 22.697266 12.716797 A 1 1 0 0 0 22.728516 12.683594 A 1 1 0 0 0 23 12 A 1 1 0 0 0 22.728516 11.316406 L 22.716797 11.302734 A 1 1 0 0 0 22.701172 11.289062 L 15.859375 4.1523438 A 0.5 0.5 0 0 1 15.857422 4.1503906 A 0.5 0.5 0 0 0 15.5 4 z"></path>
                </svg>
                </button>
            </a>
        </div>
        <div class="label-menu col-6 col-md-3 d-flex flex-column justify-content-between mb-4">
            <span class="text-wrap fw-bold fs-2 col-12">Cadastrar</span>
            <a href="./cadastro.php">
                <button type="button" class="btn rounded-pill label-menu-botao">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M 15.5 4 A 0.5 0.5 0 0 0 15 4.5 L 15 9 L 4 9 C 2.895 9 2 9.895 2 11 L 2 12 L 2 13 C 2 14.105 2.895 15 4 15 L 15 15 L 15 19.5 A 0.5 0.5 0 0 0 15.5 20 A 0.5 0.5 0 0 0 15.853516 19.853516 A 0.5 0.5 0 0 0 15.882812 19.822266 L 22.693359 12.720703 L 22.697266 12.716797 A 1 1 0 0 0 22.728516 12.683594 A 1 1 0 0 0 23 12 A 1 1 0 0 0 22.728516 11.316406 L 22.716797 11.302734 A 1 1 0 0 0 22.701172 11.289062 L 15.859375 4.1523438 A 0.5 0.5 0 0 1 15.857422 4.1503906 A 0.5 0.5 0 0 0 15.5 4 z"></path>
                </svg>
                </button>
            </a>
        </div>
        <div class="label-menu col-6 col-md-3 d-flex flex-column justify-content-between mb-4">
            <span class="text-wrap fw-bold fs-2 col-12">Editar</span>
            <a href="./editar.php">
                <button type="button" class="btn rounded-pill label-menu-botao">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M 15.5 4 A 0.5 0.5 0 0 0 15 4.5 L 15 9 L 4 9 C 2.895 9 2 9.895 2 11 L 2 12 L 2 13 C 2 14.105 2.895 15 4 15 L 15 15 L 15 19.5 A 0.5 0.5 0 0 0 15.5 20 A 0.5 0.5 0 0 0 15.853516 19.853516 A 0.5 0.5 0 0 0 15.882812 19.822266 L 22.693359 12.720703 L 22.697266 12.716797 A 1 1 0 0 0 22.728516 12.683594 A 1 1 0 0 0 23 12 A 1 1 0 0 0 22.728516 11.316406 L 22.716797 11.302734 A 1 1 0 0 0 22.701172 11.289062 L 15.859375 4.1523438 A 0.5 0.5 0 0 1 15.857422 4.1503906 A 0.5 0.5 0 0 0 15.5 4 z"></path>
                </svg>
                </button>
            </a>
        </div>
    </div>
      


  </div>

  <script src='./js/script.js'></script>
  <script src='./js/bootstrap.bundle.js'></script>
</body>

</html>