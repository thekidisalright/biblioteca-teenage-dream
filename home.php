<?php

require("./conexao.php");

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['cd_usuario'])) {
  header("Location: ./index.php");
} else if ($_SESSION['privilegio'] == 'admin') {
  header("Location: ./admin.php");
}

$dataHoje = date("d/m/Y");
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
  <title>Início - Teenage Dream</title>
</head>

<body>
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
              <li class='nav-item dropdown col-auto item-navbar'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                  aria-expanded='false'>
                  Biblioteca
                </a>
                <ul class='dropdown-menu dropdown-navbar'>
                  <li>
                    <a class='dropdown-item' href='#'>Todos os livros</a>
                  </li>
                  <li>
                    <hr class='dropdown-divider' />
                  </li>
                  <li>
                    <a class='dropdown-item' href='#'>Autores</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='#'>Editoras</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='#'>Gêneros</a>
                  </li>
                </ul>
              </li>
            </ul>
            <form class='d-flex' role='search' method="POST" action="./pesquisa.php">
              <input class='form-control me-2 rounded-pill input-pesquisa' type='search' placeholder='Pesquisar'
                aria-label='Search' name="pesquisa" minlength="3" />
              <button class='btn botao rounded-pill' type='submit'>
                Pesquisar
              </button>
            </form>
            <a class='nav-link mx-md-3 logoutBotao' href='./logout.php'>Logout</a>
          </div>
        </div>
      </nav>
    </div>

    <div class='row mb-3'>
      <h1>Bem-vindo(a),
        <?php echo $_SESSION['pnm_usuario']; ?> &#x1F44B;
      </h1>
    </div>

    <div class="row d-flex align-items-center">
      <div class="label-livro col-4 col-md-2">
        <p class="text-wrap fw-bold fs-2">Meus Livros</p>
      </div>
      <section class="lista-livros col-8 col-md-10">

        <?php
        $sql_reserva = "SELECT * FROM tb_reserva WHERE cd_usuario = " . $_SESSION['cd_usuario'] . " AND dt_devolucao IS NULL";
        $reserva = $mysqli->query($sql_reserva);
        if($reserva->num_rows > 0)
        {
          foreach($reserva as $col_reserva)
          {
            $sql_livro = "SELECT * FROM tb_livro WHERE cd_livro = " . $col_reserva['cd_livro'];
            $livro = $mysqli->query($sql_livro);
            foreach($livro as $livro)
            {
              $nm_livro = $livro['nm_livro'];
              echo "<p class='text-wrap fw-bold fs-2'>$nm_livro</p>";
              echo "<p class='text-wrap fw-bold fs-2'>Autor: " . $livro['nm_autor'] . "</p>";
            }
          }
        }
        else
        {
          echo "<p class='text-wrap fw-bold fs-2'>Você não possui livros reservados</p>";
        }

        ?>

        <article class="livro">
          <header class="livro-header">
            <div class="d-flex justify-content-between">
              <small class="fw-bold">Vence</small>
              <small>07/10/2023</small>
            </div>

            <h2>Jogos Vorazes</h2>
          </header>

          <div class="d-flex mt-3">
            <div class="img-livro">
              <img src="./images/livros/jogos-vorazes.jpg">
            </div>

            <div class="livro-autor">
              <a href="" class="autor-avatar">
                <img src="./images/livros/jogos-vorazes.jpg">
              </a>
              <div class="nome-autor">
                <div class="nome-autor-prefixo">
                  Autor(a)
                </div>
                Suzanne Collins
              </div>
            </div>
          </div>

          <div class="botoes d-flex">
            <button type="button" class="btn btn-devolver rounded-pill me-4">Devolver</button>
            <button type="button" class="btn btn-sobre rounded-pill">Sobre o livro</button>
          </div>
        </article>

      </section>

    </div>


  </div>

  <script src='./js/script.js'></script>
  <script src='./js/bootstrap.bundle.js'></script>
</body>

</html>