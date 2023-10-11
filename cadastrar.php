<?php

if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['privilegio'] == 'comum') {
    header("Location: ./home.php");
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
    <title>Administrador</title>
</head>

<body class="admin">
    <div class='container'>
        <div class='row mb-5 mt-3 justify-content-center'>
            <nav class='navbar navbar-expand-lg rounded-pill navbar-top col-11'>
                <div class='container-fluid'>
                    <div class='col-auto me-4 px-3 h-75 logo-navbar d-flex rounded-pill'>
                        <a class='navbar-brand m-0' href='#'><span class='fw-semibold text-center'>Teenage
                                Dream</span></a>
                    </div>
                    <div class='col-auto'>
                        <button class='navbar-toggler menu-hamburguer rounded-circle' type='button'
                            data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent'
                            aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
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

        <div class="row">
            <form action="./queries.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nomeLivro" id="nomeLivro" required>
                    <label for="nomeLivro">Nome do livro</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="fileLivro" id="fileLivro" required>
                    <label for="fileLivro">Capa do livro</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="imgLivro" id="imgLivro" required>
                    <label for="imgLivro">Nome do arquivo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="autorLivro" id="autorLivro" required>
                    <label for="autorLivro">Nome do autor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="fileAutor" id="fileAutor" required>
                    <label for="fileAutor">Foto do autor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="imgAutor" id="imgAutor" required>
                    <label for="imgAutor">Nome do arquivo</label>
                </div>
                <button type="submit" name="cadastro-livro" class="btn botao-cadastro">Cadastrar Livro</button>
            </form>
        </div>