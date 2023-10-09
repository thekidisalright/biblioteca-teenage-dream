<?

if(!isset($_SESSION['cd_usuario'])){
    header("Location: index.php");
    exit;
}
else if($_SESSION['privilegio'] == 'comum'){
    header("Location: home.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar reserva</title>
</head>
<body>
    
</body>
</html>