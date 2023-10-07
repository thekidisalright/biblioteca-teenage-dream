<?php

require("./conexao.php");

if(!isset($_SESSION))
{
  session_start();
}

if(isset($_SESSION['cd_usuario']))
{
  header("Location: ./home.php");
}


if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['nome']) || isset($_POST['sobrenome']))
{

  
  if(strlen($_POST['nome']) == 0)
  {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Preencha seu nome!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  else if(strlen($_POST['sobrenome']) == 0)
  {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Preencha seu sobrenome!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  else if(strlen($_POST['email']) == 0)
  {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Preencha seu e-mail!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  else if(strlen($_POST['senha']) == 0)
  {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Preencha sua senha!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
  else
  {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sobrenome = $mysqli->real_escape_string($_POST['sobrenome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM tb_usuario WHERE email_usuario = '$email'";
    $sql_verificar = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if($sql_verificar->num_rows > 0)
    {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>E-mail já cadastrado!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    else
    {
      $sql_inserir = "INSERT INTO tb_usuario (pnm_usuario, snm_usuario, email_usuario, senha_usuario) VALUES ('$nome', '$sobrenome', '$email', '$senha')";
      $sql_query = $mysqli->query($sql_inserir) or die("Falha na execução do código SQL: " . $mysqli->error);
      if($sql_query)
      {
        $sql_update = "UPDATE tb_usuario SET privilegio = 'especial' WHERE email_usuario LIKE '%@etec.sp.gov.br'";
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Usuário cadastrado com sucesso!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        sleep(3);
        header("Location: ./index.php");
      }
      else
      {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Falha ao cadastrar usuário!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
    }
  }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style-cadastro.css">
  <link rel="shortcut icon" href="./images/icone-teenage-dream.png" type="image/x-icon">
  <title>Cadastro - Teenage Dream</title>
</head>
<body>
  
  <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row border rounded-5 p-3 bg-white shadow box-area my-5 my-md-0 mx-2 mx-md-0">

      <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box me-md-4 mb-md-0 mb-4">
        <div class="imagem-especial d-flex justify-content-center">
          <img src="./images/image-login.svg" class="img-fluid w-50">
        </div>
        <p class="fw-bold fs-2 mt-2">Junte-se a nós</p>
        <small class="text-wrap text-center mb-5">Leia, explore e descubra na Teenage Dream.</small>
      </div>

      <div class="col-md right-box d-flex align-items-center">

        <div class="row align-items-center">
          <div class="header-text mb-4">
            <h1 class="fw-semibold">Olá &#x1F44B;</h1>
            <p>Seja bem-vindo a Biblioteca Virtual Teenage Dream</p>
          </div>
          <form action="" method="POST">
          <div class="input-group mb-3 d-flex align-items-center">
            <label for="nome" class="fs-6 fw-regular me-3">Nome</label>
            <input type="text" name="nome" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira seu primeiro nome" maxlength="255">
          </div>
          <div class="input-group mb-3 d-flex align-items-center">
            <label for="sobrenome" class="fs-6 fw-regular me-3">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira seu último nome" maxlength="255">
          </div>
          <div class="input-group mb-3 d-flex align-items-center">
            <label for="email" class="fs-6 fw-regular me-3">E-mail</label>
            <input type="email" name="email" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira um e-mail" maxlength="255">
          </div>
          <div class="input-group mb-4">
            <label for="senha" class="fs-6 fw-regular me-3">Senha</label>
            <input type="password" name="senha" class="form-control form-control-lg fs-6 rounded-3" placeholder="Insira uma senha" maxlength="255" minlength="8">
          </div>
          <div class="input-group mb-4">
            <button type="submit" class="btn btn-lg w-100 fs-6 botaoLogin fw-semibold">Cadastrar</button>
          </div>
          </form>
          <div class="row">
            <p>Já possui uma conta? <a href="./index.php" class="link-cadastro">Faça login</a></p>
          </div>
        </div>

      </div>

    </div>

  </div>

<script src="./js/bootstrap.js"></script>
<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>