<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['mediId']) && $_SESSION['mediId'] != '') {
            header("Location: view/usuario/medico/menu.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocGO!</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/css-geral.css">
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
</head>
<body>
    <div class="corpo">
        <nav>
            <img src="img/favicon/android-chrome-192x192.png" class="logo">
            <ul>
                <li><a href="https://docgo.carrd.co">Sobre a equipe</a></li>
                <li><a href="view/usuario/medico/visualizar-medicos.php">Consultar médicos</a></li>
                <a href="view/usuario/login.php" class="nav-btn">Login</a>
            </ul>
        </nav>
        <div class="text-box">
            <p>Bem-vindo ao</p>
            <h1>DocGO!</h1>
            <h3>DocGO é um website especializado na gestão e organização de pacientes, para um atendimento tecnológico, prático e repleto de 
                inovação.</h3>
        </div>

        <div class="img-box">
            <img src="img/png/index.png" class="img">
        </div>
    </div>
</body>
</html>