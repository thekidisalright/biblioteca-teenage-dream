<?php

$usuario = "root";
$senha = "root";
$banco = "db_biblioteca";
$host = "127.0.0.1";

$mysqli = new mysqli($host, $usuario, $senha, $banco);

if($mysqli->error)
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);

?>