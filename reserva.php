<?php

if(!isset($_SESSION))
{
  session_start();
}
if(!isset($_SESSION['cd_usuario'])){
    header("Location: index.php");
    exit;
}
else if($_SESSION['privilegio'] == 'comum'){
    header("Location: home.php");
    exit;
}

require("./conexao.php");

require_once './vendor/autoload.php';
use ColorThief\ColorThief;
$dominantColor = ColorThief::getPalette("./images/livros/jogos-vorazes.jpg", 3, 10, null, 'hex');

$color1 = $dominantColor[0];
$color2 = $dominantColor[1];
$color3 = $dominantColor[2];

$cor = "background-image: linear-gradient(to bottom, $color1, $color2, $color3);";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="stylesheet" href="./css/reserva.css">
    <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
    <title>Criar reserva</title>
</head>
<body class="reserva">
<div class="container">
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
                <a class='nav-link active' aria-current='page' href='./admin.php'>Início</a>
              </li>
            </ul>
            <a class='nav-link mx-md-3 logoutBotao' href='./logout.php'>Logout</a>
          </div>
        </div>
      </nav>
    </div>

    <div class="row justify-content-center">
    <div class="row d-flex align-items-center">
      <section class="lista-livros col-8 col-md">

      <?php
$select_pedido = "SELECT p.cd_pedido, p.cd_livro, p.cd_usuario, p.dt_pedido, 
l.nm_livro, l.img_livro, l.cd_autor, 
a.nm_autor, a.img_autor, 
u.email_usuario 
FROM tb_pedido p 
JOIN tb_livro l ON p.cd_livro = l.cd_livro 
JOIN tb_autor a ON l.cd_autor = a.cd_autor 
JOIN tb_usuario u ON p.cd_usuario = u.cd_usuario
ORDER BY p.dt_pedido ASC;";

$query_pedido = $mysqli->query($select_pedido);

if ($query_pedido) {
  if ($query_pedido->num_rows == 0) {
    echo "<h1 class='text-center'>Não há pedidos de empréstimo</h1>";
  }
  else {
  foreach($query_pedido as $pedido){
    $cd_pedido = $pedido['cd_pedido'];
    $cd_livro = $pedido['cd_livro'];
    $cd_usuario = $pedido['cd_usuario'];
    $dt_pedido = $pedido['dt_pedido'];
    $nm_livro = $pedido['nm_livro'];
    $img_livro = $pedido['img_livro'];
    $cd_autor = $pedido['cd_autor'];
    $nm_autor = $pedido['nm_autor'];
    $img_autor = $pedido['img_autor'];
    $email_usuario = $pedido['email_usuario'];

    $verificarDisponibilidade = "SELECT disponivel FROM tb_livro WHERE cd_livro = $cd_livro";
    $resultadoDisponibilidade = $mysqli->query($verificarDisponibilidade);

    if ($resultadoDisponibilidade && $resultadoDisponibilidade->num_rows > 0) {
        $rowDisponibilidade = $resultadoDisponibilidade->fetch_assoc();
        $disponivel = $rowDisponibilidade['disponivel'];

        if ($disponivel == 1) {

        echo "
        <form action='./queries.php' method='POST'>
        <article class='livro'>
                <header class='livro-header'>
                  <div class='d-flex justify-content-between'>
                    <small class='fw-bold'>$email_usuario</small>
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

                <input type='hidden' name='cd_pedido' value='$cd_pedido'>
                <input type='hidden' name='cd_livro' value='$cd_livro'>
                <input type='hidden' name='cd_usuario' value='$cd_usuario'>

                <div class='botoes d-flex'>
                  <button type='submit' name='emprestar' class='btn btn-devolver rounded-pill me-4'>Empréstimo</button>
                </div>
              </article>
              </form>";
            } else {
              // O livro está indisponível, você pode exibir uma mensagem ou fazer algo diferente aqui
              echo "<p>O livro não está disponível para empréstimo no momento.</p>";
          }
    }
  }
}
}
else {
    echo "Erro ao executar a query: " . $mysqli->error;
}

?>

            

          
              </section>

    </div>
    </div>

    <footer class=" d-flex mt-5 justify-content-center fixed-bottom">
    <div class="text-center rounded-pill w-100">
        <span class="text-wrap fw-bold">Teenage Dream por Alexandre Silva © 2023</span>
    </div>
</footer>
</div>
</div>

</body>
</html>