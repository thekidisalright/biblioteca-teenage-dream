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


require_once './vendor/autoload.php';
use ColorThief\ColorThief;
$dominantColor = ColorThief::getColor("./images/livros/jogos-vorazes.jpg");

$cor_red = $dominantColor[0];
$cor_green = $dominantColor[1];
$cor_blue = $dominantColor[2];

$cor = "background-color: rgb($cor_red, $cor_green, $cor_blue);";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/reserva.css">
    <title>Criar reserva</title>
</head>
<body>
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
                <a class='nav-link active' aria-current='page' href='#'>Início</a>
              </li>
            </ul>
            <a class='nav-link mx-md-3 logoutBotao' href='./logout.php'>Logout</a>
          </div>
        </div>
      </nav>
    </div>

    <div class="row justify-content-center">
        <section>
            <div class="swiper mySwiper container1">
                <div class="swiper-wrapper conteudo">
                    <div class="swiper-slide pedido">
                        <div class="box1" style="<?php echo $cor; ?>"></div>
                        <div class="pedido-conteudo">
                            <div class="pedido-imagem">
                                <img src="./images/livros/jogos-vorazes.jpg" alt="">
                            </div>
                        <div class="name-profession">
                            <span class="name">Andrew James</span>
                            <span class="profession">Graphic Designer</span>
                        </div>
                        <div class="about">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque expedita, corrupti ad omnis exercitationem laborum cumque nihil voluptatum quidem et magnam amet hic nisi vitae aliquid repellat odit officiis obcaecati.</p>
                        </div>
                        <div class="botao-pedido b1">
                            <button class="aboutMe">About Me</button>
                            <button class="hireMe">Hire Me</button>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

</div>

</body>
</html>