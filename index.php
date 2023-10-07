<?php

include("./conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style-login.css">
  <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
  <title>Login - Teenage Dream</title>
</head>
<body>
  
  <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row border rounded-5 p-3 bg-white shadow box-area my-5 my-md-0 mx-2 mx-md-0">

      <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box me-md-4 mb-md-0 mb-4">
        <div class="imagem-especial d-flex justify-content-center">
          <img src="./images/image-login.svg" class="img-fluid w-50">
        </div>
        <p class="fw-bold fs-2 mt-2">Verifique-se</p>
        <small class="text-wrap text-center mb-5">Leia, explore e descubra na Teenage Dream.</small>
      </div>

      <div class="col-md right-box d-flex align-items-center">

        <div class="row align-items-center">
          <div class="header-text mb-4">
            <h1 class="fw-semibold">Olá &#x1F44B;</h1>
            <p>Estamos felizes que você voltou.</p>
          </div>
          <form action="" method="POST">
          <div class="input-group mb-3 d-flex align-items-center">
            <label for="email" class="fs-6 fw-regular me-3">E-mail</label>
            <input type="email" name="email" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira um e-mail">
          </div>
          <div class="input-group mb-4">
            <label for="senha" class="fs-6 fw-regular me-3">Senha</label>
            <input type="password" name="senha" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira uma senha">
          </div>
          <div class="input-group mb-4">
            <button type="submit" class="btn btn-lg w-100 fs-6 botaoLogin fw-semibold">Login</button>
          </div>
          </form>
          <div class="row">
            <p>Não tem uma conta? <a href="./cadastro.php" class="link-cadastro">Cadastre-se</a></p>
          </div>
        </div>

      </div>

    </div>

  </div>

<script src="./js/bootstrap.js"></script>
<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>