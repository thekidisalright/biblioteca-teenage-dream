<?php
if (!isset($_SESSION)) {
    session_start();
}

require("./conexao.php");

if (isset($_POST['emprestar'])) {
    $cd_pedido = $_POST['cd_pedido'];
    $cd_livro = $_POST['cd_livro'];
    $cd_usuario = $_POST['cd_usuario'];

    // Inserir informações na tabela de empréstimo
    $dataHoje = date("Y-m-d H:i:s");
    $emprestimoInsert = "INSERT INTO tb_emprestimo (cd_livro, cd_usuario, dt_emprestimo) 
                        VALUES ('$cd_livro', '$cd_usuario', '$dataHoje')";
    $emprestimoQuery = $mysqli->query($emprestimoInsert);

    if ($emprestimoQuery) {
        // Excluir o pedido referente
        $pedidoDelete = "DELETE FROM tb_pedido WHERE cd_pedido = '$cd_pedido'";
        $pedidoQuery = $mysqli->query($pedidoDelete);

        if ($pedidoQuery) {
            // Atualizar a disponibilidade do livro
            $disponivelUpdate = "UPDATE tb_livro SET disponivel = 0 WHERE cd_livro = '$cd_livro'";
            $disponivelQuery = $mysqli->query($disponivelUpdate);

            if ($disponivelQuery) {
                echo "<script>alert('Empréstimo realizado com sucesso!')</script>";
                header("Location: ./reserva.php");
            } else {
                echo "<script>alert('Erro ao atualizar a disponibilidade do livro!')</script>";
                echo "<script>window.location.href = './reserva.php'</script>";
            }
        } else {
            echo "<script>alert('Erro ao excluir o pedido referente!')</script>";
            echo "<script>window.location.href = './reserva.php'</script>";
        }
    } else {
        echo "<script>alert('Erro ao realizar o empréstimo!')</script>";
        echo "<script>window.location.href = './reserva.php'</script>";
    }
}

if (isset($_POST['devolver'])) {
    $cd_emprestimo = $_POST['cd_emprestimo'];
    $cd_livro = $_POST['cd_livro'];

    $dataHoje = date("Y-m-d H:i:s");
    $devolucaoUpdate = "UPDATE tb_emprestimo SET dt_devolucao = '$dataHoje' WHERE cd_emprestimo = '$cd_emprestimo'";
    $devolucaoQuery = $mysqli->query($devolucaoUpdate);

    if ($devolucaoQuery) {
        $disponivelUpdate = "UPDATE tb_livro SET disponivel = 1 WHERE cd_livro = '$cd_livro'";
        $disponivelQuery = $mysqli->query($disponivelUpdate);

        if ($disponivelQuery) {
            echo "<script>alert('Devolução realizada com sucesso!')</script>";
            header("Location: ./home.php");
        } else {
            echo "<script>alert('Erro ao atualizar a disponibilidade do livro!')</script>";
            echo "<script>window.location.href = './home.php'</script>";
        }
    } else {
        echo "<script>alert('Erro ao realizar a devolução!')</script>";
        echo "<script>window.location.href = './home.php'</script>";
    }
}

if (isset($_POST['reservar'])) {
    $cd_livro = $_POST['cd_livro'];
    $cd_usuario = $_POST['cd_usuario'];

    $checkReservaQuery = "SELECT * FROM tb_pedido WHERE cd_livro = '$cd_livro' AND cd_usuario = '$cd_usuario'";
    $checkReservaResult = $mysqli->query($checkReservaQuery);
    $checkEmprestimoQuery = "SELECT * FROM tb_emprestimo WHERE cd_livro = '$cd_livro' AND cd_usuario = '$cd_usuario' AND dt_devolucao IS NULL";
    $checkEmprestimoResult = $mysqli->query($checkEmprestimoQuery);

    if ($checkReservaResult->num_rows > 0) {
        echo "<script>alert('Você já reservou este livro anteriormente!')</script>";
        echo "<script>window.location.href = './home.php'</script>";
    } else {
        if ($checkEmprestimoResult->num_rows > 0) {
            echo "<script>alert('Você já possui um empréstimo deste livro!')</script>";
            echo "<script>window.location.href = './home.php'</script>";
        } else {
            $dataHoje = date("Y-m-d H:i:s");

            $reservaInsert = "INSERT INTO tb_pedido (cd_livro, cd_usuario, dt_pedido) VALUES ('$cd_livro', '$cd_usuario', '$dataHoje')";
            $reservaQuery = $mysqli->query($reservaInsert);

            if ($reservaQuery) {
                echo "<script>alert('Reserva realizada com sucesso!')</script>";
                header("Location: ./home.php");
            } else {
                echo "<script>alert('Erro ao realizar a reserva!')</script>";
                echo "<script>window.location.href = './home.php'</script>";
            }
        }
    }

}

if (isset($_POST['cancelar'])) {
    $cd_pedido = $_POST['cd_pedido'];

    $cancelarDelete = "DELETE FROM tb_pedido WHERE cd_pedido = '$cd_pedido'";
    $cancelarQuery = $mysqli->query($cancelarDelete);

    if ($cancelarQuery) {
        echo "<script>alert('Reserva cancelada com sucesso!')</script>";
        header("Location: ./reserva.php");
    } else {
        echo "<script>alert('Erro ao cancelar a reserva!')</script>";
        echo "<script>window.location.href = './reserva.php'</script>";
    }
}

if (isset($_POST['cadastro-livro'])) {
    $nm_livro = $_POST['nomeLivro'];
    $nm_autor = $_POST['autorLivro'];
    $img_livro = $_POST['imgLivro'];
    $img_autor = $_POST['imgAutor'];

    $select_livro = "SELECT * FROM tb_livro WHERE nm_livro = '$nm_livro'";
    $resultado_livro = mysqli_query($mysqli, $select_livro);
    $select_autor = "SELECT * FROM tb_autor WHERE nm_autor = '$nm_autor'";

    if ($resultado_livro->num_rows > 0) {
        echo "<script>alert('Livro já cadastrado!')</script>";
        echo "<script>window.location.href = './cadastro.php'</script>";
    } else {
        function adaptarNomeArquivo($string)
        {
            // Remove espaços em branco e caracteres especiais
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

            // Converte para letras minúsculas
            $string = strtolower($string);

            // Adicione um número aleatório para garantir a unicidade (opcional)
            $string .= '-' . uniqid();

            return $string;
        }

        $img_livro = adaptarNomeArquivo($img_livro);
        $img_autor = adaptarNomeArquivo($img_autor);

        $resultado_autor = mysqli_query($mysqli, $select_autor);

        if ($resultado_autor->num_rows > 0) {
            $row_autor = mysqli_fetch_assoc($resultado_autor);
            $cd_autor = $row_autor['cd_autor'];
            $insert_livro = "INSERT INTO tb_livro (nm_livro, img_livro, cd_autor) VALUES ('$nm_livro', '$img_livro', '$cd_autor')";
            $query_livro = mysqli_query($mysqli, $insert_livro);
        } else {
            if (isset($_FILES['fileLivro'])) {
                $file_livro = $_FILES['fileLivro'];
                if (isset($_FILES['fileAutor'])) {
                    $file_autor = $_FILES['fileAutor'];
                    if ($file_autor['error'] === UPLOAD_ERR_OK) {
                        $autorType = mime_content_type($file_autor['tmp_name']);
                    } else {
                        echo "<script>alert('Erro ao carregar a imagem do autor!')</script>";
                        echo "<script>window.location.href = './cadastro.php'</script>";
                    }
                }
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $livroType = mime_content_type($fileLivro['tmp_name']);
                    if ($autorType === 'image/jpeg' && $livroType === 'image/jpeg') {
                        move_uploaded_file($file_autor['tmp_name'], './images/autores/' . $img_autor . '.jpg');
                        move_uploaded_file($file_livro['tmp_name'], './images/livros/' . $img_livro . '.jpg');
                    }
                    else {
                        echo "<script>alert('Formato de imagem inválido!')</script>";
                        echo "<script>window.location.href = './cadastro.php'</script>";
                    }
                }
            }
            $img_autor = './images/autores/' . $img_autor . '.jpg';
            $img_livro = './images/livros/' . $img_livro . '.jpg';
            $insert_autor = "INSERT INTO tb_autor (nm_autor, img_autor) VALUES ('$nm_autor', '$img_autor')";
            $query_autor = mysqli_query($mysqli, $insert_autor);
            $cd_autor = $mysqli->insert_id;

            $insert_livro = "INSERT INTO tb_livro (nm_livro, img_livro, cd_autor) VALUES ('$nm_livro', '$img_livro', '$cd_autor')";
            $query_livro = mysqli_query($mysqli, $insert_livro);
        }
    }
}
?>