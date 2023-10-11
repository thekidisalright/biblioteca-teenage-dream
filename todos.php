<?php

if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['cd_usuario']))
{
    header("Location: index.php");
    exit();
}

require "./conexao.php";

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
            <a class='navbar-brand m-0' href='./home.php'><span class='fw-semibold text-center'>Teenage Dream</span></a>
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
                <a class='nav-link' aria-current='page' href='./home.php'>Início</a>
              </li>
              <li class='nav-item col-auto item-navbar'>
                <a class='nav-link active' aria-current='page' href='#'>Todos os livros</a>
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

<div class="row d-flex align-items-center mt-5 justify-content-center justify-content-md-between">
    <div class="row">
        <h1 class="text-wrap fw-bold">Todos os livros</h1>
    </div>
    <div class="row">
        <?php
        $sql_livro = "SELECT * FROM tb_livro";
        $livro = $mysqli->query($sql_livro);
        if ($livro->num_rows > 0) {
            foreach ($livro as $col_livro) {
                $img_livro = $col_livro['img_livro'];
                echo "
                  <div class='col-md-2 col-3 todos-livros mx-3'>
                    <div class='position-relative'>
                      <img src='$img_livro'>
                      <div class='livro-nome position-absolute bottom-0 start-0 px-2 py-1'>
                        <span>$col_livro[nm_livro]</span>
                      </div>
                      <form action='./queries.php' method='POST' class='position-absolute top-0 end-0'>
                    <input type='hidden' name='cd_livro' value='" . $col_livro['cd_livro'] . "'>
                    <input type='hidden' name='cd_usuario' value='" . $_SESSION['cd_usuario'] . "'>
                      <button class='btn btn-pedir' name='reservar'>Reservar</button>
                        </form>
                    </div>
                  </div>
                  ";

            }
        } else {
            echo "<p class='text-wrap fw-bold fs-2'>Não há livros na biblioteca virtual</p>";
        }

        ?>
    </div>
</div>

<footer class=" d-flex mt-5 justify-content-center">
    <div class="text-center rounded-pill w-100">
        <span class="text-wrap fw-bold">Teenage Dream por Alexandre Silva © 2023</span>
    </div>
</footer>
</div>
</div>
</body>
</html>