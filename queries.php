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

if(isset($_POST['devolver'])){
    $cd_emprestimo = $_POST['cd_emprestimo'];
    $cd_livro = $_POST['cd_livro'];

    $dataHoje = date("Y-m-d H:i:s");
    $devolucaoUpdate = "UPDATE tb_emprestimo SET dt_devolucao = '$dataHoje' WHERE cd_emprestimo = '$cd_emprestimo'";
    $devolucaoQuery = $mysqli->query($devolucaoUpdate);

    if($devolucaoQuery){
        $disponivelUpdate = "UPDATE tb_livro SET disponivel = 1 WHERE cd_livro = '$cd_livro'";
        $disponivelQuery = $mysqli->query($disponivelUpdate);

        if($disponivelQuery){
            echo "<script>alert('Devolução realizada com sucesso!')</script>";
            header("Location: ./home.php");
        }
        else{
            echo "<script>alert('Erro ao atualizar a disponibilidade do livro!')</script>";
            echo "<script>window.location.href = './home.php'</script>";
        }
    }
    else{
        echo "<script>alert('Erro ao realizar a devolução!')</script>";
        echo "<script>window.location.href = './home.php'</script>";
    }
}

if(isset($_POST['reservar'])){
    $cd_livro = $_POST['cd_livro'];
    $cd_usuario = $_POST['cd_usuario'];

    $checkReservaQuery = "SELECT * FROM tb_pedido WHERE cd_livro = '$cd_livro' AND cd_usuario = '$cd_usuario'";
    $checkReservaResult = $mysqli->query($checkReservaQuery);
    $checkEmprestimoQuery = "SELECT * FROM tb_emprestimo WHERE cd_livro = '$cd_livro' AND cd_usuario = '$cd_usuario' AND dt_devolucao IS NULL";
    $checkEmprestimoResult = $mysqli->query($checkEmprestimoQuery);

    if ($checkReservaResult->num_rows > 0) {
        echo "<script>alert('Você já reservou este livro anteriormente!')</script>";
        echo "<script>window.location.href = './home.php'</script>";
    } else{
        if($checkEmprestimoResult->num_rows > 0){
            echo "<script>alert('Você já possui um empréstimo deste livro!')</script>";
            echo "<script>window.location.href = './home.php'</script>";
        }
        else{
    $dataHoje = date("Y-m-d H:i:s");

    $reservaInsert = "INSERT INTO tb_pedido (cd_livro, cd_usuario, dt_pedido) VALUES ('$cd_livro', '$cd_usuario', '$dataHoje')";
    $reservaQuery = $mysqli->query($reservaInsert);

    if($reservaQuery){
        echo "<script>alert('Reserva realizada com sucesso!')</script>";
        header("Location: ./home.php");
    }
    else{
        echo "<script>alert('Erro ao realizar a reserva!')</script>";
        echo "<script>window.location.href = './home.php'</script>";
    }
}
}

}

if(isset($_POST['cancelar'])){
    $cd_pedido = $_POST['cd_pedido'];

    $cancelarDelete = "DELETE FROM tb_pedido WHERE cd_pedido = '$cd_pedido'";
    $cancelarQuery = $mysqli->query($cancelarDelete);

    if($cancelarQuery){
        echo "<script>alert('Reserva cancelada com sucesso!')</script>";
        header("Location: ./reserva.php");
    }
    else{
        echo "<script>alert('Erro ao cancelar a reserva!')</script>";
        echo "<script>window.location.href = './reserva.php'</script>";
    }
}
?>
