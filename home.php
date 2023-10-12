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
              <li class='nav-item col-auto item-navbar'>
                <a class='nav-link' aria-current='page' href='./todos.php'>Todos os livros</a>
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
      <div class="label-livro col-4 col-md-auto">
        <p class="text-wrap fw-bold fs-2">Meus Livros</p>
      </div>
      <section class="lista-livros col-8 col-md">

        <?php
        $sql_emprestimo = "SELECT * FROM tb_emprestimo WHERE cd_usuario = " . $_SESSION['cd_usuario'] . " AND dt_devolucao IS NULL";
        $emprestimo = $mysqli->query($sql_emprestimo);
        if ($emprestimo->num_rows > 0) {
          foreach ($emprestimo as $col_emprestimo) {
            $dt_emprestimo = new DateTime($col_emprestimo['dt_emprestimo']);
            $dt_emprestimo->add(new DateInterval('P15D'));
            $dt_vencimento = $dt_emprestimo->format('d/m/Y');
            $sql_livro = "SELECT * FROM tb_livro WHERE cd_livro = " . $col_emprestimo['cd_livro'];
            $livro = $mysqli->query($sql_livro);
            $livro->data_seek(0);
            $livro = $livro->fetch_assoc();
            $nm_livro = $livro['nm_livro'];
            $img_livro = $livro['img_livro'];
            $sql_autor = "SELECT * FROM tb_autor WHERE cd_autor = " . $livro['cd_autor'];
            $autor = $mysqli->query($sql_autor);
            $autor->data_seek(0);
            $autor = $autor->fetch_assoc();
            $nm_autor = $autor['nm_autor'];
            $img_autor = $autor['img_autor'];

            echo "
            
              <article class='livro'>
                <header class='livro-header'>
                  <div class='d-flex justify-content-between'>
                    <small class='fw-bold'>Vence</small>
                    <small>$dt_vencimento</small>
                  </div>
                  <h2>$nm_livro</h2>
                </header>
                <div class='d-flex mt-3'>
                  <div class='img-livro'>
                    <img src='$img_livro'>
                  </div>
                  <div class='livro-autor'>
                    <div class='autor-avatar'>
                      <img src='$img_autor'>
                    </div>
                    <div class='nome-autor'>
                      <div class='nome-autor-prefixo'>
                        Autor(a)
                      </div>
                      $nm_autor
                    </div>
                  </div>
                </div>
                
                <div class='botoes d-flex'>
                <form action='./queries.php' method='POST'>
                <input type='hidden' name='cd_emprestimo' value='" . $col_emprestimo['cd_emprestimo'] . "'>
                <input type='hidden' name='cd_livro' value='" . $col_emprestimo['cd_livro'] . "'>
      
                  <button type='submit' name='devolver' class='btn btn-devolver rounded-pill me-4'>Devolver</button>
                  </form>
                </div>
                
            
              </article>
            ";

          }
        } else {
          echo "<p class='text-wrap fw-bold fs-2'>Você não possui empréstimos ativos</p>";
        }

        ?>



      </section>

    </div>

    <div class="row d-flex align-items-center mt-5">
      <div class="label-livro col-4 col-md-auto">
        <p class="text-wrap fw-bold fs-2">Meus Pedidos</p>
      </div>
      <section class="lista-livros col-8 col-md">

        <?php
        $sql_pedido = "SELECT * FROM tb_pedido WHERE cd_usuario = " . $_SESSION['cd_usuario'];
        $pedido = $mysqli->query($sql_pedido);
        if ($pedido->num_rows > 0) {
          foreach ($pedido as $col_pedido) {
            $sql_livro = "SELECT * FROM tb_livro WHERE cd_livro = " . $col_pedido['cd_livro'];
            $livro = $mysqli->query($sql_livro);
            $livro->data_seek(0);
            $livro = $livro->fetch_assoc();
            $nm_livro = $livro['nm_livro'];
            $img_livro = $livro['img_livro'];
            $sql_autor = "SELECT * FROM tb_autor WHERE cd_autor = " . $livro['cd_autor'];
            $autor = $mysqli->query($sql_autor);
            $autor->data_seek(0);
            $autor = $autor->fetch_assoc();
            $nm_autor = $autor['nm_autor'];
            $img_autor = $autor['img_autor'];

            echo "
            
              <article class='livro'>
                <header class='livro-header'>
                  <div class='d-flex justify-content-between'>
                    <small class='fw-bold'>Pedido em</small>
                    <small>" . date('d/m/Y', strtotime($col_pedido['dt_pedido'])) . "</small>
                  </div>
                  <h2>$nm_livro</h2>
                </header>
                <div class='d-flex mt-3'>
                  <div class='img-livro'>
                    <img src='$img_livro'>
                  </div>
                  <div class='livro-autor'>
                    <div class='autor-avatar'>
                      <img src='$img_autor'>
                    </div>
                    <div class='nome-autor'>
                      <div class='nome-autor-prefixo'>
                        Autor(a)
                      </div>
                      $nm_autor
                    </div>
                    </div>
                </div>
                
                <div class='botoes d-flex'>
                <form action='./queries.php' method='POST'>
                <input type='hidden' name='cd_pedido' value='" . $col_pedido['cd_pedido'] . "'>
                <input type='hidden' name='cd_livro' value='" . $col_pedido['cd_livro'] . "'>
      
                  <button type='submit' name='cancelar' class='btn btn-devolver rounded-pill me-4'>Cancelar Pedido</button>
                  </form>
                </div>
                
            
              </article>
            ";

          }
        } else {
          echo "<p class='text-wrap fw-bold fs-2'>Você não possui pedidos</p>";
        }

        ?>
      </section>
    </div>

    <div class="row d-flex align-items-center mt-5">
      <div class="label-livro col-4 col-md-auto">
        <p class="text-wrap fw-bold fs-2">Livros disponíveis</p>
      </div>
      <section class="lista-livros col-8 col-md">

        <?php
        $sql_livro = "SELECT * FROM tb_livro WHERE disponivel = 1";
        $livro = $mysqli->query($sql_livro);
        if ($livro->num_rows > 0) {
          foreach ($livro as $col_livro) {
            $sql_autor = "SELECT * FROM tb_autor WHERE cd_autor = " . $col_livro['cd_autor'];
            $autor = $mysqli->query($sql_autor);
            $autor->data_seek(0);
            $autor = $autor->fetch_assoc();
            $nm_autor = $autor['nm_autor'];
            $img_autor = $autor['img_autor'];

            echo "
                
                  <article class='livro'>
                    <header class='livro-header'>
                      <h2>" . $col_livro['nm_livro'] . "</h2>
                    </header>
                    <div class='d-flex mt-3'>
                      <div class='img-livro'>
                        <img src='" . $col_livro['img_livro'] . "'>
                      </div>
                      <div class='livro-autor'>
                        <div class='autor-avatar'>
                          <img src='$img_autor'>
                        </div>
                        <div class='nome-autor'>
                          <div class='nome-autor-prefixo'>
                            Autor(a)
                          </div>
                          $nm_autor
                        </div>
                      </div>
                    </div>
                    
                    <div class='botoes d-flex'>
                    <form action='./queries.php' method='POST'>
                    <input type='hidden' name='cd_livro' value='" . $col_livro['cd_livro'] . "'>
                    <input type='hidden' name='cd_usuario' value='" . $_SESSION['cd_usuario'] . "'>
          
                      <button type='submit' name='reservar' class='btn btn-reservar rounded-pill me-4'>Reservar</button>
                      </form>
                    </div>
                    
                
                  </article>
                ";

          }
        } else {
          echo "<p class='text-wrap fw-bold fs-2'>Não há livros disponíveis</p>";
        }

        ?>
      </section>
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
                  <div class='col-md-2 col-3 todos-livros mx-3 mb-4'>
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

  <script src='./js/bootstrap.bundle.js'></script>
  <script src='./js/script.js'></script>
</body>

</html>