<!DOCTYPE html>
<html lang='pt-br'>

<head>
  <meta charset='UTF-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel='stylesheet' href='./css/bootstrap.css' />
  <link rel='stylesheet' href='./css/style-claro.css' />
  <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
  <title>Início - Teenage Dream</title>
</head>

<body>
  <div class='container'>
    <div class='row mb-5'>
      <nav class='navbar navbar-expand-lg rounded-pill navbar-top'>
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
            <form class='d-flex' role='search'>
              <input class='form-control me-2 rounded-pill input-pesquisa' type='search' placeholder='Pesquisar'
                aria-label='Search' />
              <button class='btn botao rounded-pill' type='submit'>
                Pesquisar
              </button>
            </form>
          </div>
        </div>
      </nav>
    </div>

    <div class='row mb-3'>
      <h1>Bem-vindo(a), Usuário</h1>
    </div>

    <div class='row justify-content-center mb-4'>
      <div class="card col-8 p-0">
        <div class="card-header header-quote">
          Frase motivacional
        </div>
        <div class="card-body quote">
          <blockquote class="blockquote mb-0">
            <p>A well-known quote, contained in a blockquote element.</p>
            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>
        </div>
      </div>
    </div>

    <div class='row justify-content-center'>
        <div class="card col-10 p-0">
          <div class="col-12 d-flex rounded-top-1 header-card">
            <h5 class="card-header col">Meus livros</h5>
          </div>
          
          <div class="row g-0 mb-3">
            <div class="col-4 col-md-2 p-2 pe-0">
              <img src="./images/livros/jogos-vorazes.jpg" class="img-fluid imagem-meus-livros w-100 object-fit-contain align-self-start" alt="...">
            </div>
            <div class="col-8 col-md-10">
              <div class="card-body">
                <h6 class="card-title">Jogos Vorazes</h6>
                <p class="card-text nome-autor">por <a href="">Suzanne Collins</a></p>
                <p class="card-text generos"><a href="">Young Adult</a> <a href="">Ficção</a> <a href="">Fantasia</a> <a href="">Romance</a> <a href="">...mais</a></p>
                <p class="card-text"><small class="text-body-secondary">Reservado há 8 dias 31/09/2023</small></p>
                <p><button type="button" class="btn btn-danger">Devolver com atraso</button></p>
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