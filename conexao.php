<?php

$usuario = "root";
$senha = "root";
$banco = "db_biblioteca";
$host = "localhost";

$mysqli = new mysqli($host, $usuario, $senha, $banco);

if($mysqli->error)
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);

?>