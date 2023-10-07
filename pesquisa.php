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
  $sql_editora = "SELECT * FROM tb_editora WHERE nm_editora LIKE '%$termoPesquisa%'";
  $sql_genero = "SELECT * FROM tb_genero WHERE nm_genero LIKE '%$termoPesquisa%'";
  $resultado_livro = mysqli_query($mysqli, $sql_livro);
  $resultado_autor = mysqli_query($mysqli, $sql_autor);
  $resultado_editora = mysqli_query($mysqli, $sql_editora);
  $resultado_genero = mysqli_query($mysqli, $sql_genero);
  $quantidade_pesquisa = mysqli_num_rows($resultado_livro) + mysqli_num_rows($resultado_autor) + mysqli_num_rows($resultado_editora) + mysqli_num_rows($resultado_genero);
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
  <link rel='stylesheet' href='./css/style-claro.css' />
  <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
  <title><?php echo "$termoPesquisa";?> - Teenage Dream</title>
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
                <a class='nav-link' href='#'>Meus Livros</a>
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
              aria-label='Search' name="pesquisa" minlength="3"/>
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

    <div class='row justify-content-center'>
        <div class="card col-10 p-0">
          <div class="col-12 d-flex rounded-top-1 header-card">
            <h5 class="card-header col">Livros</h5>
          </div>
          
          <?php

          if(mysqli_num_rows($resultado_livro) > 0)
          {
            while($row = mysqli_fetch_assoc($resultado_livro))
            {
              $cd_livro = $row['cd_livro'];
              $nm_livro = $row['nm_livro'];
              $ds_livro = $row['ds_livro'];
              $img_capa = $row['img_capa'];
              $select_autor = "SELECT nm_autor FROM tb_autor WHERE cd_autor = (SELECT cd_autor FROM tb_livro_autor WHERE cd_livro = '$cd_livro')";
              $resultado_autor = mysqli_query($mysqli, $select_autor);
              $row_autor = mysqli_fetch_assoc($resultado_autor);
              $nm_autor = $row_autor['nm_autor'];
              $select_genero = "SELECT nm_genero FROM tb_genero WHERE cd_genero = (SELECT cd_genero FROM tb_livro_genero WHERE cd_livro = '$cd_livro')";
              $resultado_genero = mysqli_query($mysqli, $select_genero);
              $row_genero = mysqli_fetch_assoc($resultado_genero);
              $nm_genero = $row_genero['nm_genero'];

              echo "
          <div class='row g-0 mb-3'>
            <div class='col-4 col-md-2 p-2 pe-0'>
              <?php <img src='$img_capa' class='img-fluid imagem-meus-livros w-100 object-fit-contain align-self-start'>  ?>
              
            </div>
            <div class='col-8 col-md-10'>
              <div class='card-body'>
                <h6 class='card-title'>$nm_livro</h6>
                <p class='card-text nome-autor'>por <a href=''>$nm_autor</a></p>
                <p class='card-text generos'>"; foreach($resultado_genero as $genero){ echo "<a href=''>$genero</a>";}
                echo "<a href=''>...mais</a></p>
                <p class='card-text'><small class='text-body-secondary'>Reservado há 8 dias 31/09/2023</small></p>
                <p><button type='button' class='btn btn-danger'>Devolver com atraso</button></p>
                <p><button type='button' class='btn btn-primary'>Sobre o livro</button></p>
              </div>
            </div>
          </div>
        <div class='row justify-content-center'><hr class='divisor col-10'></div>";
            }
          }

        ?>
          
          <div class="row g-0 mb-3">
            <div class="col-4 col-md-2 p-2 pe-0">
              <img src="./images/livros/percy-jackson-ladrao-de-raios.jpg" class="img-fluid w-100 imagem-meus-livros object-fit-contain align-self-start" alt="...">
            </div>
            <div class="col-8 col-md-10">
              <div class="card-body">
                <h6 class="card-title">O Ladrão de Raios</h6>
                <p class="card-text nome-autor">por <a href="">Rick Riordan</a></p>
                <p class="card-text generos"><a href="">Fantasia</a> <a href="">Young Adult</a> <a href="">Mitologia</a> <a href="">Aventura</a> <a href="">...mais</a></p>
                <p class="card-text"><small class="text-body-secondary">Reservado há 3 dias 05/10/2023</small></p>
                <p><button type="button" class="btn btn-success">Devolver</button></p>
                <p><button type="button" class="btn btn-primary">Sobre o livro</button></p>
              </div>
            </div>
          </div>

        </div>
    </div>

    <div class='row justify-content-center'>
        <div class="card col-10 p-0">
          <div class="col-12 d-flex rounded-top-1 header-card">
            <h5 class="card-header col">Desejados</h5>
          </div>
          
          <div class="row g-0 mb-3">
            <div class="col-4 col-md-2 p-2 pe-0">
              <img src="./images/livros/nenhum.jpg" class="img-fluid imagem-meus-livros w-100 object-fit-contain align-self-start" alt="...">
            </div>
            <div class="col-8 col-md-10">
              <div class="card-body">
                <h6 class="card-title">Divergente</h6>
                <p class="card-text nome-autor">por <a href="">Veronica Roth</a></p>
                <p class="card-text generos"><a href="">Young Adult</a> <a href="">Ficção</a> <a href="">Fantasia</a> <a href="">Romance</a> <a href="">...mais</a></p>
                <p class="card-text"><small class="text-body-secondary">Disponível</small></p>
                <p><button type="button" class="btn btn-success">Alocar</button></p>
                <p><button type="button" class="btn btn-primary">Sobre o livro</button></p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center"><hr class="divisor col-10"></div>
          
          <div class="row g-0 mb-3">
            <div class="col-4 col-md-2 p-2 pe-0">
              <img src="./images/livros/percy-jackson-ladrao-de-raios.jpg" class="img-fluid w-100 imagem-meus-livros object-fit-contain align-self-start" alt="...">
            </div>
            <div class="col-8 col-md-10">
              <div class="card-body">
                <h6 class="card-title">O Ladrão de Raios</h6>
                <p class="card-text nome-autor">por <a href="">Rick Riordan</a></p>
                <p class="card-text generos"><a href="">Fantasia</a> <a href="">Young Adult</a> <a href="">Mitologia</a> <a href="">Aventura</a> <a href="">...mais</a></p>
                <p class="card-text"><small class="text-body-secondary">Reservado há 3 dias 05/10/2023</small></p>
                <p><button type="button" class="btn btn-success">Devolver</button></p>
                <p><button type="button" class="btn btn-primary">Sobre o livro</button></p>
              </div>
            </div>
          </div>

        </div>
    </div>


  </div>

  <script src='./js/script.js'></script>
  <script src='./js/bootstrap.bundle.js'></script>
</body>

</html>