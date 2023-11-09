<?php

require("./conexao.php");

if(!isset($_SESSION))
{
  session_start();
}

if(!isset($_SESSION['cd_usuario']))
{
  header("Location: ./index.php");
}

if(isset($_POST['pesquisa']))
{
  $termoPesquisa = mysqli_real_escape_string($mysqli, $_POST['pesquisa']);
  $sql_livro = "SELECT * FROM tb_livro WHERE nm_livro LIKE '%$termoPesquisa%'";
  $sql_autor = "SELECT * FROM tb_autor WHERE nm_autor LIKE '%$termoPesquisa%'";
  $resultado_livro = mysqli_query($mysqli, $sql_livro);
  $resultado_autor = mysqli_query($mysqli, $sql_autor);
  $quantidade_pesquisa = mysqli_num_rows($resultado_livro) + mysqli_num_rows($resultado_autor);
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Foram encontrados $quantidade_pesquisa resultados para a pesquisa <strong>$termoPesquisa</strong>!
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
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
            <form class='d-flex' role='search' method="POST" action="./pesquisa.php" style='margin-block-end: 0 !important;'>
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
      <h4>Resultados para "<?php echo $termoPesquisa; ?>": <?php echo $quantidade_pesquisa;?></h4>
    </div>

    <div class="row d-flex align-items-center mt-5 justify-content-center justify-content-md-between">
    <div class="row">
        
          <?php

          if(mysqli_num_rows($resultado_livro) > 0)
          {
            while($row = mysqli_fetch_assoc($resultado_livro))
            {
              $cd_livro = $row['cd_livro'];
              $nm_livro = $row['nm_livro'];
              $img_livro = $row['img_livro'];
              $select_autor = "SELECT nm_autor FROM tb_autor WHERE cd_autor = $row[cd_autor]";
              $resultado_autor = mysqli_query($mysqli, $select_autor);
              $row_autor = mysqli_fetch_assoc($resultado_autor);
              $nm_autor = $row_autor['nm_autor'];

              echo "
              <h1 class='text-wrap fw-bold'>Livros encontrados</h1>
                </div>
              <div class='row'>
              <div class='col-md-2 col-3 todos-livros mx-3'>
                    <div class='position-relative'>
                      <img src='$img_livro'>
                      <div class='livro-nome position-absolute bottom-0 start-0 px-2 py-1'>
                        <span>$nm_livro</span>
                      </div>
                      <form action='./queries.php' method='POST' class='position-absolute top-0 end-0'>
                    <input type='hidden' name='cd_livro' value='" . $cd_livro . "'>
                    <input type='hidden' name='cd_usuario' value='" . $_SESSION['cd_usuario'] . "'>
                      <button class='btn btn-pedir' name='reservar'>Reservar</button>
                        </form>
                    </div>
                </div>
              ";

            }
          }
          else
          {
            echo "  </div>
            <div class='row'><p class='text-wrap fw-bold fs-2'>Não encontramos livros</p>";
          }

        ?>

</div>
</div>

<footer class=" d-flex mt-5 justify-content-center fixed-bottom">
    <div class="text-center rounded-pill w-100">
        <span class="text-wrap fw-bold">Teenage Dream por Alexandre Silva © 2023</span>
    </div>
</footer>
</div>

<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>